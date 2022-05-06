<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSP'
]);
Route::get('chi-tiet-san-pham/{id_product}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChiTietSP'
]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);
Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'LoginUserController@getDangNhap'
]);
Route::post('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'LoginUserController@postDangNhap'
]);

Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'LoginUserController@getDangXuat'
]);

Route::get('dang-ky',[
	'as'=>'dangky',
	'uses'=>'LoginUserController@getDangKy'
]);
Route::post('dang-ky',[
	'as'=>'dangky',
	'uses'=>'LoginUserController@postDangKy'
]);
Route::get('gio-hang',[
	'as'=>'giohang',
	'uses'=>'PageController@getGioHang'
]);
Route::get('them-gio-hang/{id_product}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddCart'
]);
Route::get('xoa-san-pham/{id_product}',[
	'as'=>'xoasanpham',
	'uses'=>'PageController@getRemove'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheck'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheck'
]);

Route::get('tim-kiem',[
	'as'=>'timkiem',
	'uses'=>'PageController@getSearch'	
]);
Route::group(['namespace'=>'Admin'], function(){
	Route::group(['prefix'=>'login', 'middleware'=>'CheckLogedIn'], function(){
		Route::get('/','LoginController@getLogin');
			Route::post('/','LoginController@postLogin');
	});
	Route::get('loguot','HomeController@getLogout');

	Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogedOut'],function(){
		Route::get('home','HomeController@getHome');

		Route::group(['prefix'=>'category'], function(){
			Route::get('/','CategoryController@getCategory');
			Route::post('/','CategoryController@postCategory');

			Route::get('edit/{id}','CategoryController@getEditCategory');
			Route::post('edit/{id}','CategoryController@postEditCategory');

			Route::get('delete/{id}','CategoryController@getDeleteCategory');
			//Route::post('delete/{id}','CategoryController@postDeleteCategory')
		});
		Route::group(['prefix'=>'product'], function(){
			Route::get('/','ProductController@getProduct');

			Route::get('add','ProductController@getAddProduct');
			Route::post('add','ProductController@postAddProduct');

			Route::get('edit/{id}','ProductController@getEditProduct');
			Route::post('edit/{id}','ProductController@postEditProduct');

			Route::get('delete/{id}','ProductController@getDeleteProduct');

		});

		Route::group(['prefix'=>'user'], function(){
			Route::get('/','HomeController@getUser');
			Route::get('delete/{id}','HomeController@getDeleteUser');

		});

		Route::group(['prefix'=>'bills'], function(){
			Route::get('/','HomeController@getBills');
			Route::get('detail/{id}','HomeController@getBillsDetail');

		});
	});
});
