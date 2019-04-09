<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookIT extends Model
{
    protected $primaryKey = 'book_id';
    protected $fillable=['UID','available_id','servicetype_id','PIC_ID','date','detail','status'];
    function getTime(){
        return $this->hasOne(servicetime::class,'available_id','available_id');
    }
    function getType(){
        return $this->hasOne(servicetype::class,'servicetype_id','servicetype_id');
    }
    function getUser(){
        return $this->hasOne(User::class,'UID','UID');
    }
    function getPIC(){
        return $this->hasOne(User::class,'UID','PIC_ID');
    }
}
