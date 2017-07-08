<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income_categorie extends Model
{

  protected $fillable = ['name'];
  //
  public function incomes(){
    return $this->hasMany('App\Income');
  }
}
