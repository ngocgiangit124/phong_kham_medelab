<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BacSy extends Model
{
    //
    protected $table ="bacsy";
    public function chuyenkhoa()
    {
        return $this->belongsTo('App\ChuyenKhoa','khoa_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function lichkham()
    {
        return $this->hasMany('App\LichKham','bacsy_id','id');
    }
    public function chuandoan()
    {
        return $this->hasMany('App\ChuanDoan','bacsy_id','id');
    }
//    public function benhnhan()
//    {
//        return $this->belongsToMany('App\BenhNhan','chuandoan_id','benhnhan_id','id');
//    }
}
