<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'txtEmail'=>'required',
            'password'=>'required|min:6|max:32',
        ],[
            'txtEmail.required'=>'Chưa  nhập email',
            'password.required'=>' Chưa nhập password',
            'password.min'=>'Mật khẩu không ít hơn 6 ký tự',
            'password.max'=>'Mật khẩu không nhiều hơn 32 ký tự'
        ]);
        if(Auth::attempt(['email'=>$request->txtEmail,'password'=>$request->password,'user_level'=>0,'user_trangthai'=>1]))
        {
            return redirect('admin');
        }
        elseif(Auth::attempt(['email'=>$request->txtEmail,'password'=>$request->password,'user_level'=>1,'user_trangthai'=>1]))
        {
            return redirect('admin');
        }
        elseif(Auth::attempt(['email'=>$request->txtEmail,'password'=>$request->password,'user_level'=>2,'user_trangthai'=>1]))
        {
            return redirect('bacsy/');
        }
        else
        {
            return redirect()->back()->with('mess', 'Đăng nhập thất bại!');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

}
