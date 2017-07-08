<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Item_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Item_categorieController extends Controller
{
    use Authorizable;
    //
    public function index()
    {
      $result = Item_categorie::latest()->paginate();
      return view('inventory.item_categorie.index', compact('result'));
    }

    //
    public function create()
    {
      return view('inventory.item_categorie.new');
    }

    //
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|min:3',
          'color' => 'required'
      ]);
      $item_categorie = Item_categorie::create($request->all());

      // flash('Item_categorie has been added');

      return redirect()->route('item_categories.index');
    }

    //
    public function show(Item_categorie $item_categories)
    {
        return redirect()->back();
    }

    //
    public function edit(Item_categorie $item_categorie, $id)
    {
      $item_categorie = Item_categorie::findOrFail($id);
      return view('inventory.item_categorie.edit', compact('item_categorie'));
    }

    //
    public function update(Request $request, Item_categorie $item_categorie, $id)
    {
      $this->validate($request, [
          'name' => 'required|min:3',
          'color' => 'required'
      ]);

      $item_categorie = Item_categorie::findOrFail($id);

      $item_categorie->update($request->all());

      // flash()->success('Item categorie has been updated.');

      return redirect()->route('item_categories.index');
    }


    public function destroy(Item_categorie $item_categorie, $id)
    {
      $item_categorie = Item_categorie::findOrFail($id);


      $item_categorie->delete();

      // flash()->success('Item_categorie has been deleted.');

      return redirect()->route('item_categories.index');
    }
}
