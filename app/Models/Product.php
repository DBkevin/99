<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //


    public function getIntPrice($value){
        return intval($value);
    }
    public function getIntGivePrice($value){
        return intval($value);
    }


}
