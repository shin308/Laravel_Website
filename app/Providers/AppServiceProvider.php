<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\producttype;
use App\cart;
use App\products;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header',function($view){
            $loaisanpham = producttype::all();
            $view->with('loaisanpham',$loaisanpham);
        });
        view()->composer('header',function($view){
            if (Session('cart')) {
                # code...
                $oldCart = Session::get('cart');
                $cart = new cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer('page.giohang',function($view){
            if (Session('cart')) {
                # code...
                $oldCart = Session::get('cart');
                $cart = new cart($oldCart);
                 $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer('page.dathang',function($view){
            if (Session('cart')) {
                # code...
                $oldCart = Session::get('cart');
                $cart = new cart($oldCart);
                 $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });
    }
}
