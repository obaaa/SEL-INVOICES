<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{

  protected $fillable = ['entry_date', 'amount', 'income_category_id', 'invoice_id', 'account_no', 'user_id', 'note'];
  //
  public function income_category(){
    return $this->belongsTo('App\Income_category');
  }

  // account_no
  public function customer(){
    return $this->belongsTo('App\Customer', 'account', 'account_no');
  }
  public function user()
  {
      return $this->belongsTo(User::class);
  }
  public function invoice()
  {
      return $this->belongsTo('App\Invoice');
  }
}
