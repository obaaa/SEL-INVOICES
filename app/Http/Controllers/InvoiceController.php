<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Bill;
use App\Bill_item;
use App\Item_package;
use App\Customer;
use App\Item;
use App\Income;
use App\Invoice;
use App\Invoice_item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class InvoiceController extends Controller
{
  use Authorizable;

  //
  public function index(){
    $invoice_finishs = Invoice::where('status', '=', '0')->latest()->paginate();
    $invoice_not_finishs = Invoice::where('status', '=', '1')->latest()->paginate();
    return view('customer.invoice', compact("invoice_finishs","invoice_not_finishs"));
  }

  //
  public function create(){
    $customers = Customer::all();
    $items = Item::all();
    return view('customer.sell', compact('customers', 'items'));
  }

  //
  public function store(Request $request){

    // customer entry_date note item item_package_id quantity
    $input = Input::all();
    $customer = Customer::where('name', '=', $input['customer'])->first();

    // check expir_date in all bill items
    $bill_items = Bill_item::where('status', '=', 1)->get();
    foreach ($bill_items as $item) {
      if ($item->expir_date < date("Y-m-d")) {
        $item->status = '0';
        $item->save();
      }
    }

    // check quantity is exsist
    for ($i=0; $i < count($input['item']); $i++) {
      $item = Item::where('name', '=', $input['item'][$i])->first();
      $items_package_quantity = Item_package::find($input['item_package_id'][$i])->quantity;
      $quantity = $items_package_quantity * $input['quantity'][$i];
      if ($quantity > $item->quantity) {
        return redirect()->route('items.index');
      }
    }

    // create new invoice and save data 1 - 3
    // user_id customer_id total_amount amount_remain amount_recipient status entry_date note
    $invoice = new Invoice;
    $invoice->user_id = Auth::user()->id;
    $invoice->customer_id = $customer->id;
    $invoice->entry_date = $input['entry_date'];
    $invoice->note = $input['note'];
    $invoice->status = '1';
    $invoice->save();

    //create invoice_item refrence invoice update invoice step 2 - 3
    // invoice_id item_id item_package_id quantity amount expir_date status
    $total_amount = 0;
    for ($i=0; $i < count($input['item']); $i++) {
      $invoice_item = new Invoice_item;
      $invoice_item->invoice_id = $invoice->id;
      $item = Item::where('name', '=', $input['item'][$i])->first();
      $invoice_item->item_id = $item->id;
      $invoice_item->item_package_id = $input['item_package_id'][$i];
      $invoice_item->quantity = $input['quantity'][$i];
      $invoice_item->amount = ($item->price)*($input['quantity'][$i]);
      // $invoice_item->expir_date = Item::find($input['item_id'][$i])->expir_date;
      $invoice_item->status = '1';
        $total_amount = $total_amount + $invoice_item->amount;
      $invoice_item->save();
      // minus item quantity
      $items_package_quantity = Item_package::find($input['item_package_id'][$i])->quantity;
      // $item = Item::find($input['item_id'][$i]);
      $quantity = $items_package_quantity * $input['quantity'][$i];
      $item->quantity = $item->quantity - $quantity;
      $item->save();

      // // minus quantity in bill item and set status=0 to  quantity_remain=0
      $bill_items = Bill_item::where('status', '=', 1)->where('item_id', '=', $item->id )->orderBy('expir_date', 'ASC')->get();
      foreach ($bill_items as $bill_item) {
        if ($quantity != 0 || $bill_item->quantity_remain != 0) {
          if ($quantity <=  $bill_item->quantity_remain) {
            $bill_item->quantity_remain = $bill_item->quantity_remain - $quantity;
            $quantity = 0;
            $bill_item->save();
          } elseif ($quantity >  $bill_item->quantity_remain) {
            $quantity = $quantity - $bill_item->quantity_remain;
            $bill_item->quantity_remain = 0;
            $bill_item->save();
          }
        }
        if ($bill_item->quantity_remain == 0) {
          $bill_item->status = '0';
          $bill_item->save();
        }
      }
    }

    // save total amount in invoice setp 3 - 3
    $invoice->total_amount = $total_amount;
    $invoice->amount_remain = $total_amount;
    $invoice->save();

    // //regester in income (cash movement)
    // $income = new Income;
    // $income->user_id = Auth::user()->id;
    // $income->income_categorie_id = 1;
    // $income->invoice_id = $invoice->id;
    // $income->account_no = $customer->account;
    // $income->entry_date = date("Y-m-d");
    // $income->amount = $total_amount;
    // $income->note = 'by system';
    // $income->save();

    return redirect()->route('invoices.index');
  }

  public function destroy($id)
  {
    $invoice = Invoice::findOrFail($id);
    foreach ($invoice->invoice_items as $invoice_item) {
      $invoice_item->delete();
    }
    foreach ($invoice->incomes as $income) {
      $income->delete();
    }


    $invoice->delete();

    // flash()->success('expense has been deleted.');

    return redirect()->back();
  }
}
