<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    //
    protected $table='hinhanh';
    public function benhnhan()
    {
        return $this->belongsTo('App\BenhNhan','benhnhan_id','id');
    }
    public function nhombenh()
    {
        return $this->belongsTo('App\NhomBenh','benhnhan_id','id');
    }
}
