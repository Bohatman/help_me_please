<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class priorityjob extends Model
{
    protected $primaryKey = 'issues_id';
    protected $fillable =['issues_id'];
    public $incrementing = false;
}
