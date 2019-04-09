<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campus extends Model
{
    protected $primaryKey = 'campus_id';
    protected $fillable=['campus_name'];
}
