<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Expense;
use App\Expense_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // use Authorizable;
    //
    public function index()
    {

      return view('report.index');
    }

    //
    public function create()
    {
      return view('expense.new');
    }

    //
    public function store(Request $request)
    {
      // $this->validate($request, [
      //     'name' => 'required|min:3',
      // ]);
      $expense = Expense::create($request->all());

      // flash('expense has been added');

      return redirect()->route('expenses.index');
    }

    //
    public function show(Expense $expenses)
    {
        return redirect()->back();
    }

    //
    public function edit($id)
    {
      $expense_categories = Expense_categorie::get()->pluck('name','id')->prepend('Please Select', '');
      $expense = Expense::findOrFail($id);
      return view('expense.edit', compact('expense', 'expense_categories'));
    }

    //
    public function update(Request $request, $id)
    {
      // $this->validate($request, [
      //     'name' => 'required|min:3',
      // ]);

      $expense = Expense::findOrFail($id);

      $expense->update($request->all());

      // flash()->success('expense has been updated.');

      return redirect()->route('expenses.index');
    }


    public function destroy($id)
    {
      $expense = Expense::findOrFail($id);


      $expense->delete();

      // flash()->success('expense has been deleted.');

      return redirect()->route('expenses.index');
    }
}
