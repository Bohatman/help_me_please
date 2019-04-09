<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillable=['category_name' ,'category_color'];
    public function getSubCategory(){
        return $this->hasMany(sub_category::class,'category_id','category_id');
    }
    public function getPosition(){
        return $this->hasMany(position::class,'category_id','category_id');
    }
}
