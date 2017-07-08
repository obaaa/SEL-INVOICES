<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{

  use SoftDeletes;
    protected $fillable = ['name', 'address', 'phone', 'email', 'account', 'note'];

    public function items(){
      return $this->hasMany('App\Item');
    }
    public function bills(){
      return $this->hasMany('App\Bill');
    }
    public function expenses(){
      return $this->hasMany('App\Expense', 'account_no', 'account');
    }
}
