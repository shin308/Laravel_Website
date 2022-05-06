<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
class LoginUserController extends Controller
{
    //
     public function getDangKy(){
        return view('page.dangky');
    }
    public function postDangKy(Request $request){
    	$lev = 0;
        $this->validate($request,
            [
            'email'=>'required|email|unique:lr_user,email',
            'password'=>'required|min:6|max:20',
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->save();
        return redirect()->back()->with('thanhcong','Bạn đã tao tài khoản thành công');
    }
    public function getDangNhap(){
    	return view('page.dangnhap');
    }
    public function postDangNhap(Request $request){
    	 $this->validate($request,
            [
                'email'=>'required|email',
            ],
            [
                'email.required'=>'Bạn đã nhập sai email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Sai mật khẩu',
                'password.max'=>'Sai mật khẩu'
        ]);
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    		# code...
    		 return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
    	}
    	else{
    		return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại']);
    	}
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect()->back();    
    }
}
