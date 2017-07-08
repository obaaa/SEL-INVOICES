<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

  protected $fillable = ['supplier_id', 'user_id', 'total_cost', 'amount_remain', 'amount_recipient', 'entry_date', 'note', 'invoice_no'];

  public function supplier(){
    return $this->belongsTo('App\Supplier');
  }
  public function user()
  {
      return $this->belongsTo(User::class);
  }
  //
  public function bill_items(){
    return $this->hasMany('App\Bill_item');
  }
  //
  public function expenses(){
    return $this->hasMany('App\Expense');
  }
}
