<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\sinhvien;
use App\Models\nganh;
class KiemTra extends Controller
{
     public function getDanhSach(){
    	$sp = sinhvien::with('nganh')->get();
    	return view('admin.sinhvien.danhsach',['sp'=>$sp]);
    }
    public function getThem(){
    	$lsp = sinhvien::all();
    	$a = nganh::all();
    	return view('admin.sinhvien.themsv',['lsp'=>$lsp],['a'=>$a]);
    }
    public function postThem(Request $request){
    	$this->validate($request, [
    		'masv'=>'required|min:1|max:10',
            'hoten'=>'required|min:3|max:20',
            'ngaysinh',
    		'gioitinh'
        ],
    		 ['masv.required'=>'Bạn chưa nhập mã sinh viên',
    		 'masv.min'=>'Độ dài 1 kí tự',
    		 'masv.max'=>'Độ dài 10 kí tự',
    		 'hoten.required'=>'Bạn chưa nhập tên sinh viên',
    		'hoten.min'=>'Độ dài từ 3 đến 20 kí tự',
    		'hoten.max'=>'Độ dài từ 3 đến 20 kí tự',
    		]);

        $sp = new sinhvien();
        $sp->masv = $request->masv;
        $sp->hoten = $request->hoten;
        $sp->ngaysinh=$request->ngaysinh;
        $sp->gioitinh=$request->gioitinh;
        $sp->id_nganh=$request->id_nganh;
        $sp->save();
            return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $sp = sinhvien::find($id);
        $a = nganh::all();
        return view('admin.sinhvien.suasv',['sp'=>$sp,'a'=>$a]);
    }
    public function postSua(Request $request, $id){
        $this->validate($request, [
    		'masv'=>'required|min:1|max:10',
            'hoten'=>'required|min:3|max:20',
            'ngaysinh',
    		'gioitinh'
        ],
    		 ['masv.required'=>'Bạn chưa nhập mã sinh viên',
    		 'masv.min'=>'Độ dài 1 kí tự',
    		 'masv.max'=>'Độ dài 10 kí tự',
    		 'hoten.required'=>'Bạn chưa nhập tên sinh viên',
    		'hoten.min'=>'Độ dài từ 3 đến 20 kí tự',
    		'hoten.max'=>'Độ dài từ 3 đến 20 kí tự',
    		]);
        $sp = sinhvien::find($id);
        $sp->masv = $request->masv;
        $sp->hoten = $request->hoten;
        $sp->ngaysinh=$request->ngaysinh;
        $sp->gioitinh=$request->gioitinh;
        $sp->id_nganh=$request->id_nganh;
        $sp->save();
            return redirect()->back()->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
        $sp = sinhvien::find($id);
        $sp->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
    
}
