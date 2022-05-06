<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    //
    protected $table = "carts";

    public function cartdetail(){
    	return $this->hasMany('App\cartdetail','id_cart','id_cart');
    }
    public function customer(){
    	return $this->hasMany('App\customers','id_customer','id_cart');
    }
}
