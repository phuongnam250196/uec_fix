<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use App\Models\danhmuckhac\AreaModel;
use App\Models\EnterprisesModel;
use App\Models\UserModel;
use App\Models\baiviet\IntroUecModel;
use Auth;
use Validator;
use DB;


class LoginController extends Controller
{
    // Đăng nhập
	public function getLogin() {
		return view('frontend.pub.pub_login');
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
		    	'user_level'=>2,
		    ];
		    $arr3 = [
	    		'user_name'=>$request->user_name, 
		    	'password'=>$request->user_password, 
		    	'user_level'=>3,
		    ];
		    $arr4 = [
	    		'user_name'=>$request->user_name, 
		    	'password'=>$request->user_password, 
		    	'user_level'=>4,
		    ];
		    $arr5 = [
	    		'user_name'=>$request->user_name, 
		    	'password'=>$request->user_password, 
		    	'user_level'=>5,
		    ];
		    if($request->remember = 'nho') {
		    	$remember = true;
		    } else {
		    	$remember = false;
		    }
		    if(Auth::attempt($arr, $remember)) {
		    	return redirect()->intended('enterprise');
		    }
		    if(Auth::attempt($arr3, $remember)) {
		    	return redirect()->intended('school');
		    }
		    if(Auth::attempt($arr4, $remember)) {
		    	return redirect()->intended('teacher');
		    }
		    if(Auth::attempt($arr5, $remember)) {
		    	return redirect()->intended('student');
		    } 
		    else {
		    	return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ!!!!');
		    }
	    } else {
	    	return view('frontend.pub.pub_login', ['errors'=>$validator->errors()->all()]);
	    }
    	
    	
    }
    public function getLogoutx() {
    	Auth::logout();
		return redirect()->intended('/dangnhap');
    }
}
