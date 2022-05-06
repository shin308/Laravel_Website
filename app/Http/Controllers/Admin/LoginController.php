<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\admin;
use App\User;
use Auth;
class LoginController extends Controller
{
    //
    public function getLogin(){
        $level = User::where('level',1);
    	return view('backend.login',compact('level'));
    }
    public function postLogin(Request $request){
    	if ($request->remember = 'Remember Me') {
    		# code...
    		$remember = true;
    	}
    	else{
    		$remember = false;
    	}
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember)) {
    		# code...
    		return redirect()->intended('admin/home');
    	}
    	else{
    		return back()->withInput()->with('error','tài khoản hoặc mật khẩu chưa đúng');
    	}
    }
}
