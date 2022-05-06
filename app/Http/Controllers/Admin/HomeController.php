<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\products;
use App\User;
use App\producttype;
use App\carts;
use App\cartdetail;
use DB;
class HomeController extends Controller
{
    //
    public function getHome(){
    	$product = products::all();
    	$user = User::where('level',0)->get();
    	$type = producttype::all();
    	return view('backend.index', compact('product','user','type'));
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect()->intended('login');
    }
    public function getUser(){
    	$khachhang = User::where('level',0)->get();
    	return view('backend.user', compact('khachhang'));
    }
    public function getDeleteUser($id){
    	User::where('id',$id)->delete();
    	return back();
    }

    public function getBills(){
        $data['cart'] = DB::table('carts')->join('customers','carts.id_customer','=','customers.id')->orderBy('id_carts','desc')->get();
        //$data['cart'] = carts::all();
        return view('backend.bills',$data);
    }

    public function getBillsDetail($id){
        //$detail = cartdetail::where('id_cart',$id)->get();
        $data['detail'] = DB::table('cart_detail')->join('carts','cart_detail.id_cart','=','carts.id_carts')->join('products','cart_detail.id_products','=','products.id_product')->orderBy('id','desc')->where('id_cart',$id)->get();
        return view('backend.billsdetail',$data);
    }
}
