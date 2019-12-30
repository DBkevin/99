<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable=[
        'interval_price',
        'give_price',
        'base',
    ];
}
