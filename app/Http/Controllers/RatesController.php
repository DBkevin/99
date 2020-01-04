<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
class RatesController extends Controller
{
    //
    public function index(){
        $tbs=Rate::where('plant','淘宝任务')->first();
        $jds=Rate::where('plant','京东任务')->first();
        $pdds=Rate::where('plant','拼多多任务')->first();
        return view('rates.index',compact('tbs','jds','pdds'));
    }
}
