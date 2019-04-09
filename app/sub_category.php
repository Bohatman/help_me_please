<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    protected $primaryKey = 'sub_category_id';
    protected $fillable=['category_id','sub_category_name'];

    public function tb_category(){
        return $this->belongsTo(tb_category::class,'category_id','category_id');
    }
}
