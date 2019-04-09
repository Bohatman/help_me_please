<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements CanResetPasswordContract
{
    use Notifiable;
    protected $primaryKey = 'UID';
    protected $fillable = [
        'usertype', 'identify', 'password', 'fname' , 'lname' , 'email', 'position_id','phone','picture'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function getPosition(){
        return $this->hasOne(position::class,'position_id','position_id');
    }
}
