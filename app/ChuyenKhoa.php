<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenKhoa extends Model
{
    protected $table = "chuyenkhoa";
    public function bacsy()
    {
        return $this->hasMany('App\BacSy','khoa_id','id');
    }
    public function lichkham()
    {
        return $this->hasManyThrough('App\LichKham','App\BacSy','khoa_id','bacsy_id','id');
    }
    public function nhombenh()
    {
        return $this->hasMany('App\NhomBenh','khoa_id','id');
    }
    public function chuandoan()
    {
        return $this->hasManyThrough('App\ChuanDoan','App\BacSy','khoa_id','bacsy_id','id');
    }

}
