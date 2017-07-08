<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Expense_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Expense_categorieController extends Controller
{
    use Authorizable;
    //
    public function index()
    {
      $result = Expense_categorie::where('id', '!=', 1)->latest()->paginate();
      return view('expense.expense_categorie.index', compact('result'));
    }

    //
    public function create()
    {
      return view('expense.expense_categorie.new');
    }

    //
    public function store(Request $request)
    {
      // $this->validate($request, [
      //     'name' => 'required|min:3',
      // ]);
      $expense_categorie = Expense_categorie::create($request->all());

      // flash('expense_categorie has been added');

      return redirect()->route('expense_categories.index');
    }

    //
    public function show(Expense_categorie $expense_categories)
    {
        return redirect()->back();
    }

    //
    public function edit($id)
    {
      $expense_categorie = Expense_categorie::findOrFail($id);
      return view('expense.expense_categorie.edit', compact('expense_categorie'));
    }

    //
    public function update(Request $request, $id)
    {
      // $this->validate($request, [
      //     'name' => 'required|min:3',
      // ]);

      $expense_categorie = Expense_categorie::findOrFail($id);

      $expense_categorie->update($request->all());

      // flash()->success('expense_categorie has been updated.');

      return redirect()->route('expense_categories.index');
    }


    public function destroy($id)
    {
      $expense_categorie = Expense_categorie::findOrFail($id);


      $expense_categorie->delete();

      // flash()->success('expense_categorie has been deleted.');

      return redirect()->route('expense_categories.index');
    }
}
