<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_item extends Model
{
protected $fillable = ['bill_id', 'item_id', 'item_package_id', 'quantity', 'amount', 'quantity_remain', 'expir_date', 'status'];
//
public function bill(){
  return $this->belongsTo('App\Bill');
}
//
public function item(){
  return $this->belongsTo('App\Item');
}
//
public function item_package(){
  return $this->belongsTo('App\Item_package');
}
}
