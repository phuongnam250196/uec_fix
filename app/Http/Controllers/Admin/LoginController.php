<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DB;

class LoginController extends Controller
{
    public function getLogin() {
    	return view('backend.adm_login');
    }

    public function postLogin(LoginRequest $request) {

    	$validator = Validator::make($request->all(), [
    		'user_name'=>'required|min:6|max:20',
            'user_password'=>'required|min:6|max:20'
    	]);

	    if ($validator->passes()) {
	        $arr = [
	    		'user_name'=>$request->user_name, 
		    	'password'=>$request->user_password, 
		    	'user_level'=>1,
		    ];
		    if($request->remember = 'nho') {
		    	$remember = true;
		    } else {
		    	$remember = false;
		    }
		    if(Auth::attempt($arr, $remember)) {
		    	return redirect()->intended('admin/home');
		    } else {
		    	return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ!!!!');
		    }
	    } else {
	    	return view('backend.adm_login', ['errors'=>$validator->errors()->all()]);
	    }
    	
    	
    }
}
