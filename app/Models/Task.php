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
    protected $fillable = [
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
     * 获取全部任务数量
     *
     * @param [array] $tasks_info
     * @param ['int'] $nowH
     * @return void int;
     */
    static public function getTaskNum($tasks_info, $nowH = false)
    {
        $task_info_num = count($tasks_info, 0); //获取tasks_info一共有几个//10
        $taskNum = 0;
        $H = $nowH ? $nowH : 23;
        for ($i = 0; $i < $task_info_num; $i++) {
           $tasks_info[$i]['times'];
            for ($j =0; $j <= $H; $j++) {
                $tasks_info[$i]['times'][$j];
                $taskNum += $tasks_info[$i]['times'][$j];
            }
        }
        return $taskNum;
    }
    /**
     * 获取指定时间之后的全部任务数量
     *
     * @param [type] $tasks_info
     * @param [type] $nowH
     * @return void
     */
    /*假设数组为$tasks_info=[
    *     0=>['
            'pro_url',
            'pro_name',
            'times'=>[
                0=>1,
                1=>2,
                ],
            '],   
            1=>['
            'pro_url',
            'pro_name',
            'times'=>[
                0=>1,
                1=>2,
                ],
            '],   
    *   ];
    */
    static public function getRiftTaskNum($tasks_info, $nowH)
    {
        $task_info_num = count($tasks_info, 0); //获取tasks_info一共有几个//10
        $taskNum = 0;
        for ($i = 0; $i < $task_info_num; $i++) {
            //$tasks_info[0]==['pro_url','pro_name','times'=>['1,2,3']];
            $tasks_info[$i]['times'];
            for ($j = $nowH; $j <= 23; $j++) {
                $tasks_info[$i]['times'][$j];
                $taskNum += $tasks_info[$i]['times'][$j];
            }
       
        }
        return $taskNum;
    }
}
