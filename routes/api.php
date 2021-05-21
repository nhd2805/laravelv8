<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Lấy danh sách sản phẩm
Route::get('products', 'App\Http\Controllers\Api\ProductController@index')->name('products.index');
//Route::apiResource('products', 'App\Http\Controllers\Api\ProductController');

// Lấy thông tin sản phẩm theo id
Route::get('products/{product}', 'App\Http\Controllers\Api\ProductController@show')->name('products.show');

// Thêm sản phẩm mới
Route::post('products', 'App\Http\Controllers\Api\ProductController@store')->name('products.store');

// Cập nhật thông tin sản phẩm theo id
# Sử dụng put nếu cập nhật toàn bộ các trường
Route::put('products/{product}', 'App\Http\Controllers\App\Http\Controllers\App\Http\Controllers\Api\ProductController@update')->name('products.update');
# Sử dụng patch nếu cập nhật 1 vài trường
Route::patch('products/{product}', 'App\Http\Controllers\App\Http\Controllers\Api\ProductController@update')->name('products.update');

// Xóa sản phẩm theo id
Route::delete('products/{product}', 'App\Http\Controllers\Api\ProductController@destroy')->name('products.destroy');
