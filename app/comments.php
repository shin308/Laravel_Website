<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
    protected $table = "comments";

    public function customer(){
    	return $this->belongsTo('App\customers','id','id_comment');
    }
    public function product(){
    	return $this->belongsTo('App\products','id_prod', 'id_product');
    }
}
