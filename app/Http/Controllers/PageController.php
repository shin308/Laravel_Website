<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\products;
use App\producttype;
use App\cart;
use App\customers;
use App\carts;
use App\cartdetail;
use App\lr_user;
use Session;
use Hash;
use Auth;
class PageController extends Controller
{
    //
    public function getIndex(){
    	$slide = slide::all();
    	//print_r($slide);
    	//exit();
    	$new_product = products::where('new',1)->paginate(4);

    	$sanpham_khuyenmai = products::where('promotion_price','<>',0)->paginate(2);
    	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSP($type){
    	$sp_theoloai = products::where('id_type',$type)->get();
    	$sp_khac = products::where('id_type','<>',$type)->paginate(2);
    	$loai = producttype::all();
    	$loai_sanpham= producttype::where('id',$type)->first();
    	return view('page.loaisanpham',compact('sp_theoloai','sp_khac','loai','loai_sanpham'));
    }
    public function getChiTietSP(Request $request){
    	$sanpham = products::where('id_product',$request->id_product)->first();
    	$sanpham_tuongtu = products::where('id_type',$sanpham->id_type)->paginate(3); 
    	return view('page.chitietsp',compact('sanpham','sanpham_tuongtu'));
    }
    public function getLienHe(){
    	return view('page.lienhe');
    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
    }
    public function getDangNhap(){
        return view('page.dangnhap');
    }
    public function getDangKy(){
        return view('page.dangky');
    }
    public function postDangKy(Request $request){
        $this->validate($request,
            [
            'email'=>'required|email|unique:lr_user,email',
            'password'=>'required|min:8|max:20',
            'name'=>'required',
            're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn phải nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất có 6 ký tự'

            ]);
        $user = new lr_user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Bạn đã tạo tài khoản thành công');
    }
    public function postDangNhap(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:8|max:20'
            ],
            [
                'email.required'=>'Bạn đã nhập sai email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Sai mật khẩu',
                'password.max'=>'Sai mật khẩu'
        ]);
            //$login = array('email'=>$request->email,'password'=>$request->password);
            //if (Auth::attempt($login)) {
                # code...
              //  return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            //}
            if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            # code...
                return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại']);
            }
    }

    public function getGioHang(){
    	if (Session('cart')) {
                # code...
                $oldCart = Session::get('cart');
                $cart = new cart($oldCart);
                return view('page.giohang',['cart'=>Session::get('cart'),'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
    }
    public function getAddCart(Request $request,$id){
    	$product = products::where('id_product',$id)->first();
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart  = new cart($oldCart);
    	$cart->add($product,$id);
    	$request->session()->put('cart',$cart);
    	return redirect()->back();
    }

    public function getRemove($id){
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new cart($oldCart);
    	$cart->removeItem($id);
    	Session::put('cart',$cart);
    	return redirect()->back();
    }

    public function getCheck(){
    	if (Session('cart')) {
                # code...
                $oldCart = Session::get('cart');
                $cart = new cart($oldCart);
                return view('page.dathang',['cart'=>Session::get('cart'),'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
    }

    public function postCheck(Request $request){
    	$cart = Session::get('cart');
    	$customer = new customers;
    	$customer->name = $request->name;
    	$customer->gender = $request->gender;
    	$customer->email = $request->email;
    	$customer->address = $request->address;
    	$customer->phone = $request->phone;
    	$customer->note = $request->notes;
    	$customer->save();

    	$carts = new carts;
    	$carts->id_customer = $customer->id;
    	$carts->date_order = date('Y-m-d'); 
    	$carts->total = $cart->totalPrice;
    	$carts->payment = $request->payment_method;
    	$carts->note = $request->notes;
    	$carts->save();

    	foreach ($cart->items as $key => $value) {
    		# code...
    		$cartdetail = new cartdetail;
    		$cartdetail->id_cart = $carts->id;
    		$cartdetail->id_products = $key;
    		$cartdetail->quantity = $value['qty'];
    		$cartdetail->price = ($value['price']/$value['qty']);
    		$cartdetail->save();
    	}
    	return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function getSearch(Request $request){
        $search = products::where('name','like','%'.$request->key.'%')
                                ->orWhere('price',$request->key)
                                ->get();
        return view('page.search', compact('search'));
    }
}
