<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Item;
use App\Supplier;
use App\Item_categorie;
use App\Item_attribute;
use App\Item_package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Traits\FileUploadTrait;

class ItemController extends Controller
{
    use Authorizable;
    //
    public function index()
    {
      $item_categories = Item_categorie::get()->pluck('name','id')->prepend('Please Select', '');
      $item_attributes = Item_attribute::get()->pluck('name','id')->prepend('Please Select', '');
      $suppliers = Supplier::get()->pluck('name','id')->prepend('Please Select', '');

      $result = Item::latest()->paginate();
      // echo "$result";
      return view('inventory.item.index', compact('result','item_categories','item_attributes', 'suppliers'));
    }

    //
    public function create()
    {
      $suppliers = Supplier::get()->pluck('name','id')->prepend('Please Select', '');
      $item_categories = Item_categorie::get()->pluck('name','id')->prepend('Please Select', '');
      $item_attributes = Item_attribute::get()->pluck('name','id')->prepend('Please Select', '');

      return view('inventory.item.new', compact('suppliers','item_categories','item_attributes'));
    }
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|min:3',
      ]);
      $input = Input::all();
      $image = $input['image'];

      $filename = time() . '-' . $image->getClientOriginalName();

      $path = public_path('uploads/'.$filename);

      \Image::make($image->getRealPath())->save($path);

      $item = Item::create($request->all());
      $item->image = $filename;
      $item->save();

      $item_package = new Item_package;
      $item_package->name =  'One item';
      $item_package->item_id =  $item->id;
      $item_package->quantity = 1;
      $item_package->discount = 0;
      $item_package->note = 'by system';
      $item_package->save();

      // flash()->success('Item has been added');

      return redirect()->route('items.index');
    }

    //
    public function show(Item $items, $id)
    {
      $item = Item::findOrFail($id);
      $item_packages = $item->item_packages;
      return view('inventory.item.show',compact('item', 'item_packages'));
    }

    //
    public function edit($id)
    {
      $suppliers = Supplier::get()->pluck('name','id')->prepend('Please Select', '');
      $item_categories = Item_categorie::get()->pluck('name','id')->prepend('Please Select', '');
      $item_attributes = Item_attribute::get()->pluck('name','id')->prepend('Please Select', '');
      $item = Item::findOrFail($id);
      return view('inventory.item.edit', compact('item','suppliers','item_categories','item_attributes'));
    }

    //
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'name' => 'required|min:3',
      ]);

      $item = Item::findOrFail($id);

      $item->update($request->all());

      // flash()->success('Item has been updated.');
      return view('inventory.item.show',compact('item'));
    }


    public function destroy($id)
    {
      $item = Item::findOrFail($id);
      $item->delete();

      // flash()->success('Item has been deleted.');

      return redirect()->route('items.index');
    }
}
