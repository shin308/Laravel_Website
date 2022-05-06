<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\producttype;
use App\products;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
class CategoryController extends Controller
{
    //
    public function getCategory(){
    	$data['cate_list'] = producttype::all();
    	return view('backend.category',$data);
    }
    public function postCategory(AddCategoryRequest $request){
    	$producttype = new producttype;
    	$producttype->name_type = $request->name;
    	$producttype->save();
    	return back();
    }
    public function getEditCategory($id){
    	$data['type'] = producttype::find($id); 
    	return view('backend.editcategory',$data);
    }
    public function postEditCategory(EditCategoryRequest $request,$id){
    	$producttype = producttype::find($id);
    	$producttype->name_type = $request->name;
    	$producttype->save();
    	return redirect()->intended('admin/category');
    }

    public function getDeleteCategory($id){
    	producttype::destroy($id);
    	return back();
    }
}
