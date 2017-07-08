<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Customer;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result = Customer::latest()->paginate();
      return view('customer.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('customer.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|min:10',
          // 'phone' => 'required|min:20'
      ]);
      $customer = Customer::create($request->all());

      // $request->suppliers()->create($request->all());

      // flash('Supplier has been added');

      return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $invoice_finishs = Invoice::where('status', '=', '0')->where('customer_id', '=', $id)->latest()->paginate();
      $invoice_not_finishs = Invoice::where('status', '=', '1')->where('customer_id', '=', $id)->latest()->paginate();
      $customer = Customer::findOrFail($id);
      return view('customer.show', compact('customer','invoice_finishs','invoice_not_finishs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $customer = Customer::findOrFail($id);
      return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
      $this->validate($request, [
          'name' => 'required|min:10',
      ]);

      $customer = Customer::findOrFail($customer->id);

      $customer->update($request->all());

      // flash()->success('Supplier has been updated.');
      // return view('customer.index', compact('customer'));
      return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customer = Customer::findOrFail($id);


      $customer->delete();

      // flash()->success('Supplier has been deleted.');

      return redirect()->route('customers.index');
    }
}
