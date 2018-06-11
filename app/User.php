<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ="users";
    protected $fillable = [
        'name', 'email', 'password','user_level','user_trangthai',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function bacsy()
    {
        return $this->hasMany('App\BacSy','user_id','id');
    }
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates =['user_ngaysinh'];
}
