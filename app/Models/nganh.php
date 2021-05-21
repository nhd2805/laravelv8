<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nganh extends Model
{
    use HasFactory;
    protected $table ="nganh";
    public $timestamps=false;

    public function SinhVien(){
   	return $this->belongsTo('App\Models\sinhvien','id_nganh','id');
   }
}
