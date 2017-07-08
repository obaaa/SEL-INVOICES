<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Item_attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Item_attributeController extends Controller
{
    use Authorizable;
    //
    public function index()
    {
      $result = Item_attribute::latest()->paginate();
      return view('inventory.item_attribute.index', compact('result'));
    }

    //
    public function create()
    {
      return view('inventory.item_attribute.new');
    }

    //
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|min:3',
      ]);
      $item_attribute = Item_attribute::create($request->all());

      // flash('Item attribute has been added');

      return redirect()->route('item_attributes.index');
    }

    //
    public function show(Item_attribute $item_attributes)
    {
        return redirect()->back();
    }

    //
    public function edit($id)
    {
      $item_attribute = Item_attribute::findOrFail($id);
      return view('inventory.item_attribute.edit', compact('item_attribute'));
    }

    //
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'name' => 'required|min:3',
      ]);

      $item_attribute = Item_attribute::findOrFail($id);

      $item_attribute->update($request->all());

      // flash()->success('Item attribute has been updated.');

      return redirect()->route('item_attributes.index');
    }


    public function destroy($id)
    {
      $item_attribute = Item_attribute::findOrFail($id);


      $item_attribute->delete();

      // flash()->success('Item attribute has been deleted.');

      return redirect()->route('item_attributes.index');
    }
}
