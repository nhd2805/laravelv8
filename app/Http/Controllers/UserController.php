<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDangNhapAdmin(){
    	return view('admin.layout.login');
    }
    public function postDangNhapAdmin(Request $request){
    	$email=$request->email;
    	$password=$request->password;
    	 if(Auth::attempt(['email'=>$email,'password'=>$password])){
    	 	return redirect('admin/sanpham/dssp1');
    	 }
    	 else{
    	 	return redirect('admin/layout/dangnhap')->with('thongbao','Đăng nhập không thành công');
    	 }
    }
}
