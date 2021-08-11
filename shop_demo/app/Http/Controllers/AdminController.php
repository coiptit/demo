<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public  function login(){
        return view('admin.login');
    }

    public function loginConfirm(Request $request){
        $credentials=$request->only('email','password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('admin.login')->with('err','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public  function index(){
        return view('admin.index');
    }
    public  function category(){
        return view('admin.category');
    }
    public  function product(){
        return view('admin.product');
    }
    public  function customer(){
        return view('admin.customer');
    }
    public  function order(){
        return view('admin.order');
    }
    public  function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
