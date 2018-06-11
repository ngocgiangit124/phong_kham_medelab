<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomBenh extends Model
{
    //
    protected $table ="nhombenh";
    public function chuyenkhoa()
    {
        return $this->belongsTo('App\ChuyenKhoa','khoa_id','id');
    }
    public function hinhanh()
    {
        return $this->hasMany('App\HinhAnh','nhombenh_id','id');
    }
    public function chuandoan()
    {
        return $this->hasMany('App\ChuanDoan','nhombenh_id','id');
    }

}
