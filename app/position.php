<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $primaryKey = 'position_id';
    protected $fillable = ['category_id','priority_level','position_name'];
    function getCategory(){
        return $this->hasOne(category::class,'category_id','category_id');
    }
}
