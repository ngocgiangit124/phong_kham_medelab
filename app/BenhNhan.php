<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenhNhan extends Model
{
    //
    protected $table ="benhnhan";
    public function chuandoan()
    {
        return $this->hasMany('App\ChuanDoan','benhnhan_id','id');
    }
    public function hinhanh()
    {
        return $this->hasMany('App\HinhAnh','benhnhan_id','id');
    }
}
