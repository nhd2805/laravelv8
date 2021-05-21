<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('myroute', function(){
	return '<h1>Hello myself<h1>';
});
//Đặt tên route và tham chiếu
Route::get('Hoc/laravel', function(){
	echo "<h2>Cách đặt tên route tham chiếu 1 nội dung</h2>";
});
//nhập tên
Route::get('hoten/{ten}',function($ten){
	echo "<h1>Xin Chào! Tôi là: ".$ten."</h1>";
});
//nhập ngày
Route::get('ngay/{ngay}',function($ngay){
	echo "<h1>Hôm nay là ngày: ".$ngay."</h1>";
});
//ràng buộc nhập chữ
Route::get('myroute1/{ten}',function($ten){
	return "Chào bạn: ".$ten;
})->where(['ten'=>'[a-zA-Z]+']);
//ràng buộc nhập số đt
Route::get('myroute2/{so}',function($so){
	return "Số điện thoại vừa nhập: ".$so;
})->where(['so'=>'[0-9]{10,10}+']);
//Định danh
Route::get('myroute3',function(){
	return "Hello myself";
})->name('newname');
//Gọi định danh
Route::get('myroute4',function(){
	return redirect()->route('newname');
});
//route group C1
Route::group(['prefix'=>'GioiTinh'],function(){
	//Gọi route Nam: domain/GioiTinh/Nam
	Route::get('Nam',function(){
		return '<h2>Nam</h2>';
	});
    //Gọi route Nam: domain/GioiTinh/Nu
	Route::get('Nu',function(){
		return '<h2>Nữ<h2>';
	});
});
//route group C2
Route::prefix('Sex')->group(function(){
	Route::get('GioiTinh1',function(){
		echo '<h2>Nam</h2>';
	});
	Route::get('GioiTinh2',function(){
		echo '<h2>Nữ</h2>';
	});
});
//Controller
Route::get('test','App\Http\Controllers\MyController@index');
//gọi sang controller khác thông qua định danh rout
Route::get('CallController/{name}','App\Http\Controllers\MyController@languages');
//
Route::get('MyRequest','App\Http\Controllers\MyController@GetURL2');
//
// Route::get('post','App\Http\Controllers\MyController@Post');
// //
// Route::post('post_form',['as' =>'post_form','user'=>'App\Http\Controllers\MyController@Post_form']);

//nhập 1 string và nhận dữ liệu trả về
Route::get('post','App\Http\Controllers\MyController@Post');
//
Route::post('post_form','App\Http\Controllers\MyController@Post_form');

//tải file lên
Route::get('upload_file',function(){
	return view('upload_file');
});
//
Route::post('upload_file','App\Http\Controllers\MyController@Upload_file');
//route gọi trực tiếp view
Route::get('user/{name_route}', function($name){
	//$name nhan gia tri cua nam_route
	return view('view_parameter', ['name_view'=>$name]);
});
//route chuyen sang Controller, Controller goi view
Route::get('user1/{name_route}', 'App\Http\Controllers\MyController@getName');
//
Route::get('templater', function(){
	return view ('pages.laravel');
});
//
Route::get('templater1', function(){
	return view ('pages.laravel2');
});
//tạo bảng trên csdl
Route::get('tb_loaisanpham',function(){
	Schema::create('loaisanpham',function($table){
		$table->increments('id');
		$table->string('ten',200);
	});
	echo("Đã tạo bảng loaisanpham");
});
//
Route::get('tb_sanpham',function(){
	Schema::create('sanpham',function($table){
		$table->increments('id');
		$table->string('ten',50);
		$table->float('gia');
		$table->integer('soluong')->default(0);
		$table->integer('id_loaisanpham')->unsigned();
		$table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
	});
	echo("Đã tạo bảng sanpham có liên kết khóa ngoại đến table loaisanpham");
});
//
Route::get('query/get',function(){
	$data=DB::table('users')->get();
	foreach ($data as $row) {
		foreach($row as $key=>$value){
		echo $key." ".$value."<br>";
	}
		echo "<hr>";
	}
});
//
Route::get('qb/where',function(){
	$data=DB::table('users')->select(['id','name'])->where('id','=',1)->get();
	foreach ($data as $row) {
		foreach($row as $key=>$value){
		echo $key." ".$value."<br>";
	}
		echo "<hr>";
	}
});
// Route::get('qb/oderby',function(){
// 	$data=DB::table('users')->select(DB::raw('id',name as hoten))->where('id','>',1)->oderby()->get();
// 	foreach ($data as $row) {
// 		foreach($row as $key=>$value){
// 		echo $key." ".$value."<br>";
// 	}
// 		echo "<hr>";
// 	}
// });
Route::get('qb/update',function(){
	DB::table('users')->where('id',1)->update(['name'=>'Tomy']);
		echo "Update xong";
});
//
Route::get('model/save',function(){
	$user = new App\Models\User();
	$user->name="Jery";
	$user->email="jerry@gmail.com";
	$user->password = bcrypt('123456');

	$user->save();
	echo "Ok";
});
//tim ten user
Route::get('model/query',function(){
	$user=App\Models\User::find(2);
	echo "Ten: ".$user->name.'<br>'."Mk: ".$user->password;
});
//
Route::get('model/sanpham/save',function(){
	$sanpham = new App\Models\SanPham();
	$sanpham->ten="Galaxy S7";
	$sanpham->gia=100;
	$sanpham->soluong=100;
	$sanpham->id_loaisanpham=1;
	$sanpham->save();

	echo "Ok";
});
//
Route::get('model/sanpham/save/{ten}',function($ten){
	$sanpham = new App\Models\SanPham();
	$sanpham ->ten=$ten;
	$sanpham ->gia=100;
	$sanpham->soluong=100;
	$sanpham ->id_loaisanpham=1;
	$sanpham ->save();

	echo "Ok";
});
//
Route::get('model/sanpham/all',function(){
	$sanpham = App\Models\SanPham::all()->toJson();
	// $sanpham = App\Models\SanPham::all()->toArray();
	echo $sanpham;
	// var_dump($sanpham);
});
//
Route::get('lienket',function(){
	$data = App\Models\SanPham::find(2)->loaiSanPham->toArray();
	var_dump($data);
});
//
Route::get('lienket1',function(){
	$data = App\Models\LoaiSanPham::find(1)->sanPham->toArray();
	var_dump($data);
});
//----------------------------------------------\\
Route::get('dssp',function(){
	return view('admin.sanpham.dssp');
});

//
Route::get('dsuser','App\Http\Controllers\sanphamcontroller@getDanhSachUser',function(){
	return view('admin.sanpham.dsuser');
});
//
Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'sanpham'], function(){
		//
		Route::get('dssp1','App\Http\Controllers\sanphamcontroller@getDanhSach',function(){
		    return view('admin.sanpham.dssp');
		});
		//
		Route::get('them','App\Http\Controllers\sanphamcontroller@getThem',function(){
			return view('admin.sanpham.themsp');
		});
	    //
	    Route::post('themsanpham','App\Http\Controllers\sanphamcontroller@postThem');
		//
		Route::get('xoa/{id}','App\Http\Controllers\sanphamcontroller@getXoa');
		//
		Route::get('sua/{id}','App\Http\Controllers\sanphamcontroller@getSua');
		//
		Route::post('sua/{id}','App\Http\Controllers\sanphamcontroller@postSua');
	});
});
//
Route::get('admin/layout/dangnhap','App\Http\Controllers\UserController@getDangNhapAdmin');
Route::post('admin/layout/dangnhap1','App\Http\Controllers\UserController@postDangNhapAdmin');
//
Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'sinhvien'], function(){
		//
		Route::get('dssp1','App\Http\Controllers\KiemTra@getDanhSach',function(){
		    return view('admin.sinhvien.danhsach');
		});
		//
		Route::get('them','App\Http\Controllers\KiemTra@getThem',function(){
			return view('admin.sinhvien.themsv');
		});
	    //
	    Route::post('themsinhvien','App\Http\Controllers\KiemTra@postThem');
		//
		Route::get('xoa/{id}','App\Http\Controllers\KiemTra@getXoa');
		//
		Route::get('sua/{id}','App\Http\Controllers\KiemTra@getSua');
		//
		Route::post('sua/{id}','App\Http\Controllers\KiemTra@postSua');
	});
});
