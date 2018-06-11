<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuanDoan extends Model
{
    //
    protected $table="chuandoan";
    public function bacsy()
    {
        return $this->belongsTo('App\BacSy','bacsy_id','id');
    }
    public function benhnhan()
    {
        return $this->belongsTo('App\BenhNhan','benhnhan_id','id');
    }
    public function nhombenh()
    {
        return $this->belongsTo('App\NhomBenh','nhombenh_id','id');
    }

}
