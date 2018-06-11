<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichKham extends Model
{
    //
    protected $table ="LichKham";
    public function bacsy()
    {
        return $this->belongsTo('App\BacSy','bacsy_id','id');
    }
}
