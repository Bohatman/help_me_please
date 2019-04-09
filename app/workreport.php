<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workreport extends Model
{
    protected $primaryKey = 'issues_id';
    public $incrementing = false;
    protected $fillable=['issues_id','report','RP_ID'];
    function getRP(){
        return $this->hasOne(User::class,'UID','RP_ID');
    }
}
