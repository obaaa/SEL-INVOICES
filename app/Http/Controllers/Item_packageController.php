<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Item_package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Item_packageController extends Controller
{
    use Authorizable;

    public function index()
    {
      // $result = Item_package::latest()->paginate();
      // return view('inventory.item_package.index', compact('result'));
    }


    public function create()
    {
      // return view('inventory.item_package.new');
    }

    //
    public function store(Request $request)
    {
      // $this->validate($request, [
      //     'name' => 'required|min:3',
      //     'color' => 'required'
      // ]);
      $item_package = Item_package::create($request->all());

      // flash('Item_package has been added');

      return redirect()->back();
    }

    //
    public function show(Item_package $item_packages)
    {
        return redirect()->back();
    }

    //
    public function edit($id)
    {
      $item_package = Item_package::findOrFail($id);
      return view('inventory.item.package_edit', compact('item_package'));
    }

    //
    public function update(Request $request, $id)
    {
      // $this->validate($request, [
      //     'name' => 'required|min:3',
      //     'color' => 'required'
      // ]);

      $item_package = Item_package::findOrFail($id);

      $item_package->update($request->all());

      // flash()->success('Item categorie has been updated.');

      return redirect()->route('items.show',[$item_package->item->id]);
    }


    public function destroy($id)
    {
      $item_package = Item_package::findOrFail($id);


      $item_package->delete();

      // flash()->success('Item_package has been deleted.');

      return redirect()->back();
    }
}
