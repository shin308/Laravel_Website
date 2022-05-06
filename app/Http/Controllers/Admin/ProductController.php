<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\products;
use App\Http\Requests\AddProductRequest;
use App\producttype;
use DB;
class ProductController extends Controller
{
    //
    public function getProduct(){
    	$data['product'] = DB::table('products')->join('type_products','products.id_type','=','type_products.id')->orderBy('id','desc')->get();
        //$data['product'] = products::all();
    	return view('backend.product',$data);
    }

    public function getAddProduct(){
    	$data['protype'] = producttype::all();
    	return view('backend.addproduct',$data);   

    } 
    public function postAddProduct(AddProductRequest $request){
    	$filename = $request->img->getClientOriginalName();
    	$product = new products;
    	$product->name = $request->name;
    	$product->price = $request->price;
    	$product->promotion_price = $request->promotion_price;
    	$product->image = $filename;
    	$product->unit = $request->accessories;
    	$product->warranty = $request->warranty;
    	$product->status = $request->status;
    	$product->description = $request->description;
    	$product->id_type = $request->cate;
    	$product->featured = $request->featured;
    	$product->new = $request->new;
    	$product->save();
    	$request->img->storeAs('source/image/product',$filename);
    	return back();
		    	
    } 

    public function getEditProduct($id){
        $editproduct = products::where('id_product',$id)->first();
        $listtype = producttype::all();
        return view('backend.editproduct',compact('editproduct','listtype'));
    } 
    public function postEditProduct(Request $request,$id){
        $product = new products();

        $array['name']  = $request->name;
        $array['price'] = $request->price;
        $array['promotion_price'] = $request->promotion_price;
        $array['unit'] = $request->accessories;
        $array['warranty'] = $request->warranty;
        $array['status'] = $request->status;
        $array['description'] = $request->description;
        $array['id_type'] = $request->cate;
        $array['featured'] = $request->featured;
        $array['new'] = $request->new;
        if ($request->hasFile('img')) {
            # code...
            $img = $request->img->getClientOriginalName();
            $array['image'] = $img;
            $request->img->storeAs('source/image/product',$img); 
        }
        $product::where('id_product',$id)->update($array);
        return redirect()->intended('admin/product');;
    }

    public function getDeleteProduct($id){
        products::where('id_product',$id)->delete();
        return back();
    }
}
