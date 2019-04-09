<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicetime extends Model
{
    protected $primaryKey = 'available_id';
    protected $fillable=['time_start','time_end'];
}
