<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{

  use SoftDeletes;
    protected $fillable = ['name', 'address', 'phone', 'email', 'account', 'note'];

  public function invoices(){
    return $this->hasMany('App\Invoice');
  }

  public function income(){
    return $this->hasMany('App\Income', 'account_no', 'account');
  }
}
