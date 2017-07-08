<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_item extends Model
{
  protected $fillable = ['invoice_id', 'item_id', 'item_package_id', 'quantity', 'amount', 'expir_date', 'status'];

  public function invoice(){
    return $this->belongsTo('App\Invoice');
  }
  //
  public function item(){
    return $this->belongsTo('App\Item');
  }
  public function item_package(){
    return $this->belongsTo('App\Item_package');
  }
}
