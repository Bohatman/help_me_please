<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    protected $primaryKey = 'issues_id';
    protected $fillable = [
     'category_id', 'sub_category_id', 'detail','campus_id', 'picture' ,'building','room'
    ];
    function getSubCategory(){
        return $this->hasOne(sub_category::class,'sub_category_id','sub_category_id');
    }
    function getCategory(){
        return $this->hasOne(category::class,'category_id','category_id');
    }
    function getCampus(){
        return $this->hasOne(campus::class,'campus_id','campus_id');
    }
}
