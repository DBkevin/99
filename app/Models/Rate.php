<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
    protected $fillable=[
        'plant',
        'type_name',
        'price',
        'VIPprice',
        'show_1',
        'show_2',
        'show_3',
    ];
}
