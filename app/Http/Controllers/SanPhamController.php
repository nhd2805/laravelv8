<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
class SanPhamController extends Controller
{
    public function getDanhSach(){
    	$sp = SanPham::with('loaiSanPham')->get();
    	return view('admin.sanpham.dssp',['sp'=>$sp]);
    }
    public function getDanhSachUser(){
    	$user = App\Models\User::all();
    	return view('admin.sanpham.dsuser',['sp'=>$user]);
    }
    public function getThem(){
    	$lsp = LoaiSanPham::all();
    	return view('admin.sanpham.themsp',['lsp'=>$lsp]);
    }
    public function postThem(Request $request){
    	$this->validate($request, [
            'ten'=>'required|min:3|max:20',
            'gia'=>'required|alpha_num',
    		'soluong'=>'required|alpha_num'
        ],
    		 ['ten.required'=>'Bạn chưa nhập tên sản phẩm',
    		'ten.min'=>'Độ dài từ 3 đến 20 kí tự',
    		'ten.max'=>'Độ dài từ 3 đến 20 kí tự',
    		'gia.required'=>'Bạn chưa nhập giá sản phẩm',
    		'gia.alpha_num'=>'Giá sản phẩm phải là giá trị dương',
    		'soluong.required'=>'Bạn chưa nhập số lượng sản phẩm',
    		'soluong.min'=>'Số lượng phải là giá trị dương']);

        $sp = new SanPham();
        $sp->ten = $request->ten;
        $sp->gia=$request->gia;
        $sp->soluong=$request->soluong;
        $sp->id_loaisanpham=$request->id_loaisanpham;
        $sp->save();
            return redirect()->back()->with('thongbao','Thêm thành công');
    }
    public function getXoa($id){
        $sp = SanPham::find($id);
        $sp->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
    public function getSua($id){
        $sp = SanPham::find($id);
        $lsp = LoaiSanPham::all();
        return view('admin.sanpham.suasp',['sp'=>$sp,'lsp'=>$lsp]);
    }
    public function postSua(Request $request, $id){
        $this->validate($request, 
            ['ten'=>'required|min:3|max:20'],
            ['ten.required'=>'Bạn chưa nhập tên sản phẩm',
            'ten.min'=>'Độ dài từ 3 đến 20 ký tự',
            'ten.max'=>'Độ dài từ 3 đến 20 ký tự',
            'gia.required'=>'Bạn chưa nhập giá sản phẩm',
            'gia.alpha_num'=>'Giá sản phẩm phải là giá trị dương',
            'soluong.required'=>'Bạn chưa nhập số lượng sản phẩm',
            'soluong.min'=>'Số lượng phải là giá trị dương']);

        $sp = SanPham::find($id);
        $sp->ten = $request->ten;
        $sp->gia=$request->gia;
        $sp->soluong=$request->soluong;
        $sp->id_loaisanpham=$request->id_loaisanpham;
        $sp->save();
            return redirect()->back()->with('thongbao','Sửa thành công');
    }
}
