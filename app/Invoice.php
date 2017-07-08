<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

  protected $fillable = ['customer_id', 'user_id', 'total_cost', 'amount_remain', 'amount_recipient', 'status', 'entry_date', 'note'];

  public function customer(){
    return $this->belongsTo('App\Customer');
  }
  public function user()
  {
      return $this->belongsTo(User::class);
  }
  public function supplier(){
    return $this->belongsTo('App\Supplier');
  }

  //
  public function invoice_items(){
    return $this->hasMany('App\Invoice_item');
  }
  //
  public function incomes(){
    return $this->hasMany('App\Income');
  }
}
