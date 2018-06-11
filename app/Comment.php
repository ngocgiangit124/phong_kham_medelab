<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TinTuc;

class Comment extends Model
{
    protected $table ="Comment";


    public function tintuc()
    {
        return $this->belongsTo('App\TinTuc','tintuc_id','id');
    }
}
