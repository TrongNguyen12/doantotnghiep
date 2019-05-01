<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class LoginController extends Controller
{
    //
    public function getLogin()
    {
    	return view('pages.login');
    }
    public function postLogin(Request $request)
    {
    	$data = ['email' => $request->email, 'password' => $request->password];
    	if($request->remember = 'Remember Me'){
    		$remember = true;
    	}else {
    		$remember = false;
    	}
    	if(Auth::attempt($data , $remember)){
    		return redirect()->intended('admin');
    	}else {
    		return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng !');
    	}
    }
}
