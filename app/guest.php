<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guest extends Model
{
    protected $primaryKey = 'guest_id';
    protected $fillable=[
        'guest_id', 'fname', 'lname' , 'email'];
}
