<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    //
    public function store(Request $request)
    {
        //接收参数并生成任务
        $user  = \Auth::id();
        $plant = $request->plant; // 平台名称
        $task = $request->task; //任务类型，流量/收藏
        $type = $request->type; //任务类别，如App流量，搜索收藏
        $pro_url = $request->pro_url; //商品链接，
        $pro_title = $request->pro_title; //商品标题,
        $keyword = $request->keyword; //关键词，收藏任务不需要
        $show = $request->show; //展现量，Pdd全系不需要，保持默认即可
        $custom1 = $request->custom1;
        $custom2 = $request->custom2;
        $custom3 = $request->custom3;
        $custom4 = $request->custom4;
        $remark=$request->remark;
        $start_time = $request->start_time; //任务开始时间，
        $tasknum = $request->Tasknum; //本次任务数
        $taskDay = $request->taskDay; //任务有几天，
        //获取每个时间段有几个任务
        $times = $request->times;
        $infos = array();
        $today = Carbon::now()->toDateString();
        if ($today == $start_time) {
            //当天开启获取当前小时数
            $nowH = getdate()['hours'];
            $nowM = getdate()['minutes'];
            if ($nowM >= 50) {
                $nowH + 1;
            }
            //拼接当天当前小时之后的任务数
            $today_num=0;
            for ($i=$nowH; $i <=23 ; $i++) { 
                $today_num[$i]=$times[$i];
            }
            for ($j=$nowH ; $j < $today_num; $j++) {
                # code...
                for ($k=0; $k <$times[$j]; $k++){
                    $infos[] = ['user_id' => $user, "plant" => $plant, 'task' => $task, 'type' => $task, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => $show, 'start_time' =>getdate()['year']."-".getdate()['mon']."-".getdate()['day'],'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                }
            }
        }
        /*$tempNum=0;//用于记录数量
        for ($i=0; $i <=23 ; $i++) { 
            # code...
            $tempNum+=$times[$i];
        }
        //判断任务数量是否一致
        if($tasknum!=$tempNum){
            //假设不一样，退出
            return false;
        }*/

        //判断任务是否当天开启
        if ($today == $start_time) {
            //当天开启获取当前小时数
            $nowH = getdate()['hours'];
            $nowM = getdate()['minutes'];
            if ($nowM >= 50) {
                $nowH + 1;
            }
            //获取到开始时间为当天，并且有任务开始时间超过现在，吧超过的部分拼接到明天


        }
    }
}
