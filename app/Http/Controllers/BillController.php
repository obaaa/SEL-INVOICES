<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Bill;
use App\Bill_item;
use App\Supplier;
use App\Item;
use App\Item_package;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class BillController extends Controller
{
  use Authorizable;

  public function index(){
    $bill_finishs = Bill::where('status', '=', 2)->latest()->paginate();
    $bill_not_finishs = Bill::where('status', '=', 1)->latest()->paginate();
    return view('supplier.bill', compact("bill_finishs","bill_not_finishs"));
  }

  public function create(){
    $suppliers = Supplier::all();
    // $suppliers = Supplier::get()->pluck('name','id')->prepend('Please Select', '');
    $items = Item::all();
    return view('supplier.purchase', compact('suppliers', 'items'));
  }

  public function store(Request $request){

    // get all input filds
    $input = Input::all();

    // get supplier
    $supplier = Supplier::where('name','=', $input['supplier'])->first();

    // create new bill and save data step 1 - 3
    $bill = new Bill;
    $bill->user_id =  Auth::user()->id;
    $bill->supplier_id = $supplier->id;
    $bill->entry_date = $input['entry_date'];
    $bill->invoice_no = $input['invoice_no'];
    $bill->status = 1;
    $bill->note = $input['note'];
    $bill->save();

    // create biil_item reference bill and update bill setp 2 - 3
    $total_amount = 0;
    for ($i=0; $i < count($input['item_id']) ; $i++) {
      //
      $bill_item = new Bill_item;
      $bill_item->bill_id = $bill->id;
      $bill_item->item_id = $input['item_id'][$i];
      $bill_item->item_package_id = $input['item_package_id'][$i];
      $bill_item->quantity = $input['quantity'][$i];
      $bill_item->amount = $input['amount'][$i];
        $total_amount = $total_amount + $bill_item->amount;
      $bill_item->expir_date = $input['expir_date'][$i];
      $bill_item->status = 1;
      $bill_item->save();
      //add item quantity in item
      $items_package_quantity = Item_package::find($input['item_package_id'][$i])->quantity;
      $item = Item::find($input['item_id'][$i]);
      $quantity = $items_package_quantity * $bill_item->quantity;
      $item->quantity = $item->quantity + $quantity;
      $bill_item->quantity_remain = $bill_item->quantity;
      $item->save();
      }

    // save total amount in bill setp 3 - 3
    $bill->total_amount = $total_amount;
    $bill->amount_remain = $total_amount;
    $bill->save();


    return redirect()->back();
  }
  public function destroy($id)
  {
    $bill = Bill::findOrFail($id);
    foreach ($bill->bill_items as $bill_item) {
      $bill_item->delete();
    }
    foreach ($bill->expenses as $expense) {
      $expense->delete();
    }


    $bill->delete();

    // flash()->success('expense has been deleted.');

    return redirect()->back();
  }
}
