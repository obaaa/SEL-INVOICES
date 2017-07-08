<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Supplier;
use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    use Authorizable;

    public function index()
    {
      $result = Supplier::latest()->paginate();
      return view('supplier.supplier.index', compact('result'));
    }

    public function create()
    {
      return view('supplier.supplier.new');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|min:5',
          'phone' => 'required|min:10',
          'account' => 'required'
      ]);
      $supplier = Supplier::create($request->all());

      // flash('Supplier has been added');

      return redirect()->route('suppliers.index');
    }

    public function show(Supplier $supplier)
    {
      $bill_finishs = Bill::where('status', '=', 2)->where('supplier_id', '=', $supplier->id)->latest()->paginate();
      $bill_not_finishs = Bill::where('status', '=', 1)->where('supplier_id', '=', $supplier->id)->latest()->paginate();
      $supplier = Supplier::findOrFail($supplier->id);
      return view('supplier.supplier.show', compact('supplier','bill_finishs','bill_not_finishs'));
    }

    public function edit(Supplier $supplier)
    {
      $supplier = Supplier::findOrFail($supplier->id);
      return view('supplier.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
      $this->validate($request, [
        'name' => 'required|min:5',
        'phone' => 'required|min:10',
        'account' => 'required'
      ]);

      $supplier = Supplier::findOrFail($supplier->id);
      $supplier->update($request->all());

      // flash()->success('Supplier has been updated.');
      return view('supplier.supplier.show', compact('supplier'));
    }

    public function destroy(Supplier $supplier)
    {
      $supplier = Supplier::findOrFail($supplier->id);
      $supplier->delete();
      // flash()->success('Supplier has been deleted.');
      return redirect()->route('suppliers.index');
    }
}
