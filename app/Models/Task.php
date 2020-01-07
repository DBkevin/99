<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rate;
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
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'start_time',
        'created_at',
        'updated_at',

    ];
     public $timestamps = true;
    /**
     * 关联User表
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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
    static public function getAfterTaskNum($tasks_info, $nowH)
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

    /**
     * 结算任务总金额，以及是否超过可支付的
     *
     * @param [type] $plant
     * @param [type] $type
     * @param [type] $taskNum
     * @param [type] $userID
     * @param boolean $custom1_key
     * @return void
     */
    static public function getPrice($plant,$type,$taskNum,$userID,$custom1_key){
        $rate=Rate::where('plant',$plant)->where('type_name',$type)->first();
        $user=User::where('id',$userID)->first();
        //判断是否是VIP会员
        if($user->level===0){
            //不是vip
            $price=$rate->price;
        }else{
            $price=$rate->VIPprice;
        }
        $price+=$custom1_key;
        //计算总价
        $total_tokens=$taskNum*$price;
        //判断总价是否超过了当前有的金额
        if($total_tokens<=$user->tokens){
            return  $total_tokens;
        }else{
            return false;
        }
    }
}
