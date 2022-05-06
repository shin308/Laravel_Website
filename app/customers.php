<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = "customers";

    public function cart(){
    	return $this->hasMany('App\carts','id_customer','id');
    }
}
