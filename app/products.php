<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";

    public function producttype(){
    	return $this->belongsTo('App\producttype','id_type','id');
    }
    public function cartdetail(){
    	return $this->hasMany('App\cartdetail','id_product','id');
    }
}
