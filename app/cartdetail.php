<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cartdetail extends Model
{
    //
    protected $table = "cart_detail";

    public function product(){
    	return $this->belongsTo('App\products','id_product','id_product');
    }
     public function cart(){
    	return $this->belongsTo('App\carts','id_cart','id');
    }
}
