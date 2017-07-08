<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

  protected $fillable = ['USK', 'barcode', 'name', 'image', 'quantity', 'price', 'note', 'active', 'supplier_id', 'item_categorie_id', 'item_attribute_id', 'critical_quantity'];
    //
    public function supplier(){
      return $this->belongsTo('App\Supplier')->withTrashed();
    }
    //
    public function item_categorie(){
      return $this->belongsTo('App\Item_categorie');
    }
    //
    public function item_attribute(){
      return $this->belongsTo('App\Item_attribute');
    }
    //
    public function item_packages(){
      return $this->hasMany('App\Item_package');
    }
    //
    public function bill_items(){
      return $this->hasMany('App\Bill_item');
    }
}
