<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = "loaisanpham";
    public $timestamps=false;
    
    public function sanPham(){
   	return $this->hasMany('App\Models\SanPham','id_loaisanpham','id');
    
}
}
