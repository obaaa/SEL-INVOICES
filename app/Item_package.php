<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_package extends Model
{

  protected $fillable = ['name', 'item_id', 'quantity', 'discount'];
  //
  public function item(){
    return $this->belongsTo('App\Item');
  }
  public function invoice_item(){
    return $this->hasMany('App\Invoice_item');
  }
  public function bill_item(){
    return $this->hasMany('App\Bill_item');
  }
}
