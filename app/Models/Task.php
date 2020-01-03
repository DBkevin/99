<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    const PENDING = 'pending';
    const SUCCESS = 'success';
    public static $PAYStatusMap = [
        self::PENDING    => '进行中', 
        self::SUCCESS    => '已完成',  
    ];

    protected $fillable=[
        'plant',
        'task',
        'type',
        'pro_url',
        'pro_title',
        'keyword',
        'show',
        'start_time',
        'custom_1',
        'custom_2',
        'custom_3',
        'custom_4',
        'remark',
        'task_status',
        'status',
    ];

    protected $dates = [
        'start_time',
    ];
    /**
     * 关联User表
    */
      public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * 生成当前年月日
     */
    

}
