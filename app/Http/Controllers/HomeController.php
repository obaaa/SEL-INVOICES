<?php

namespace App\Http\Controllers;

use App\User;
use App\Item_package;
use App\Item;
use App\Expense;
use App\Income;
use App\Customer;
use App\Supplier;
use App\Invoice_item;
use App\Bill;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Charts;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $data = Income::all();
      $chart_income = Charts::create('area', 'highcharts')
             ->title('Income')
             ->elementLabel('amount')
             ->labels($data->pluck('entry_date'))
             ->values($data->pluck('amount'))
             ->responsive(true);



             $items = Item::all();
             $customers = Customer::all();
            //  item amount
            $x = 0;
              foreach ($items as $item) {

                $invoice_items = Invoice_item::where('item_id', '=', $item->id)->where('created_at', '>=', Carbon::now()->subMonth())->get();
                $amount = 0;
                foreach ($invoice_items as $invoice_item) {
                  $amount = $amount + $invoice_item->amount;
                }
                //
                $item_amount[$x] = $amount;
                //
                $item_name[$x] = $item->name;

                $x+=1;

              }
            //  $customers
            $x = 0;
              foreach ($customers as $customer) {

                $invoices = Invoice::where('customer_id', '=', $customer->id)->where('created_at', '>=', Carbon::now()->subMonth())->get();
                $amount_customer = 0;
                foreach ($invoices as $key => $invoice) {
                  $invoice_items = $invoice->invoice_items;
                  foreach ($invoice_items as $invoice_item) {
                    $amount_customer = $amount_customer + $invoice_item->amount;
                  }
                }

                $customer_amount[$x] = $amount_customer;
                //
                $customer_name[$x] = $customer->name;

                $x+=1;

              }



      $chart_item = Charts::create('donut', 'highcharts')
        ->title('Percentage of sales. Top 10')
        ->elementLabel('amount')
        ->labels($item_name)
        ->values($item_amount)
        ->responsive(false);

      $data_expense = Expense::all();
      $chart_expense = Charts::create('area', 'highcharts')
             ->title('Expense')
             ->elementLabel('expense')
             ->labels($data_expense->pluck('entry_date'))
             ->values($data_expense->pluck('amount'))
             ->responsive(true);

      $chart_customer = Charts::create('pie', 'highcharts')
            ->title('Purchase of customers')
            ->labels($customer_name)
            ->values($customer_amount)
            ->responsive(false);

    //
      return view('home', compact('chart_income', 'chart_item', 'chart_expense', 'chart_customer'));


        // return view('home');
    }
    //
    public function get_item_packages_item(Request $request)
    {
      $item = Item::where('id', '=', $request->id)->orwhere('name', '=', $request->id)->first();
      $item_packages = Item_package::where('item_id', '=', $item->id)->get();
      return response()->json($item_packages);
    }
    //
    public function get_item_price(Request $request)
    {
      $item_package = Item_package::where('id', '=', $request->id)->first();

      $quantity = $item_package->quantity;
      $item_price = $item_package->item->price;
      $price = $item_price * $quantity;
      return response()->json($price);
    }
    //
    public function get_item_price_item(Request $request)
    {
      $item = Item::where('name', '=', $request->id)->first();

      return response()->json($item->price);
    }
    //
    public function get_items_supplier(Request $request)
    {
      $supplier = Supplier::where('name', '=', $request->name)->first();
      $items = $supplier->items;
      return response()->json($items);
    }
    //
    public function payment_bill(Request $request){
      $bill = Bill::find($request->bill_id);
      if ($request->payment > $bill->amount_remain) {
        return redirect()->back();
      }else {
        $bill->amount_remain =  $bill->amount_remain - $request->payment;
        $bill->amount_recipient =  $bill->amount_recipient + $request->payment;
        if ($bill->status == 0 && $bill->amount_remain == 0) { $bill->status = '1'; }
        $bill->save();

        //regester payment in expense (cash movement)
        $expense = new Expense;
        $expense->user_id = Auth::user()->id;
        $expense->expense_categorie_id = 1;
        $expense->bill_id = $request->bill_id;
        $expense->account = $bill->supplier->account;
        $expense->entry_date = date("Y-m-d",time());
        $expense->amount = $request->payment;
        $expense->note = 'by system';
        $expense->save();

        return redirect()->back();
      }
    }
    //
    public function payment_invoice(Request $request){
      $invoice = Invoice::find($request->invoice_id);
      if ($request->payment > $invoice->amount_remain) {
        return redirect()->back();
      }else {
        $invoice->amount_remain =  $invoice->amount_remain - $request->payment;
        $invoice->amount_recipient =  $invoice->amount_recipient + $request->payment;
        if ($invoice->status == 0 && $invoice->amount_remain == 0) { $invoice->status = '1'; }
        $invoice->save();
        //regester payment in income (cash movement)
        $income = new Income;
        $income->user_id = Auth::user()->id;
        $income->income_categorie_id = 1;
        $income->invoice_id = $request->invoice_id;
        $income->account_no = $invoice->customer->account;
        $income->entry_date = date("Y-m-d",time());
        $income->amount = $request->payment;
        $income->note = 'by system';
        $income->save();

        //
        //
        if ($invoice->amount_remain == 0) {
          $invoice->status = '0';
          $invoice->save();
        }
        return redirect()->back();
      }
    }
    //
    public function get_item_bill_bill(Request $request)
    {
      $bill = Bill::find($request->bill_id);
      $bill_items = $bill->bill_items;
      foreach ($bill_items as $item) {
        $name_item = Item::find($item->item_id)->name;
        $name_package = Item_package::find($item->item_package_id)->name;
        $item->item_name = $name_item;
        $item->item_package = $name_package;
      }
      return response()->json($bill_items);
    }
    //
    public function get_item_invoice_invoice(Request $request)
    {
      $invoice = Invoice::find($request->invoice_id);
      $invoice_items = $invoice->invoice_items;
      foreach ($invoice_items as $item) {
        $name_item = Item::find($item->item_id)->name;
        $name_package = Item_package::find($item->item_package_id)->name;
        $item->item_name = $name_item;
        $item->item_package = $name_package;
      }
      return response()->json($invoice_items);
    }
}
