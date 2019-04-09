<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class queue extends Model
{
    protected $primaryKey = 'queue_id';
    protected $fillable=['date','available_id','UID','PIC_ID','servicetype_id'];
}
