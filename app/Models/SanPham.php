<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table ="sanpham";
    public $timestamps=false;

    public function loaiSanPham(){
   	return $this->belongsTo('App\Models\LoaiSanPham','id_loaisanpham','id');
   }
}
