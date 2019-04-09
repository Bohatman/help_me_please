<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicetype extends Model
{
    protected $primaryKey = 'servicetype_id';
    protected $fillable=['servicetype_name','servicetype_price','usertype'];
}
