<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class TinTuc extends Model
{
    //
    protected $table ="TinTuc";

    public function comment()
    {
        return $this->hasMany('App\Commnet','tintuc_id','id');
    }
}
