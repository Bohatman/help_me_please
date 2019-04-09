<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    protected $primaryKey = 'issues_id';
    public $incrementing = false;
    protected $fillable=[
                        'issues_id',
                        'usertype',
                        'UID',
                        'category_id',
                        'guest_id',
                        'PIC_ID',
                        'RH_ID',
                        'status',
                        'IPv4'];
    function getList(){
        return $this->hasOne(issue::class,'issues_id','issues_id');
    }
    function getGuest(){
        return $this->hasOne(guest::class,'guest_id','guest_id');
    }
    function getUser(){
        return $this->hasOne(User::class,'UID','UID');
    }
    function getPIC(){
        return $this->hasOne(User::class,'UID','PIC_ID');
    }
    function getRH(){
        return $this->hasOne(User::class,'UID','RH_ID');
    }
    function getReport(){
        return $this->hasOne(workreport::class,'issues_id','issues_id');
    }
}
