<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

  protected $fillable = ['entry_date', 'user_id', 'amount', 'expense_categorie_id', 'bill_id', 'account_no', 'note'];
  //
  public function expense_category(){
    return $this->belongsTo('App\Expense_category');
  }
  // account_no
  public function supplier(){
    return $this->belongsTo('App\Supplier', 'account', 'account_no');
  }
  public function user()
  {
      return $this->belongsTo(User::class);
  }
  public function bill()
  {
      return $this->belongsTo('App\Bill');
  }
}
