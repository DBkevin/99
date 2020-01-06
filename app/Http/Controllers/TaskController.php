<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use App\models\User;

class TaskController extends Controller
{
    //TaskController
    public function pddindex()
    {
        return view('tasks.pdd');
    }
    public function pddshouchang()
    {
        return view('tasks.pdd-shouchang');
    }
    public function jdindex()
    {
        return view('tasks.jd');
    }
      public function jdshouchang()
    {
        return view('tasks.jd-shouchang');
    }
    public function tbindex(){
        return view('tasks.tb');
    }
      public function tbshouchang()
    {
        return view('tasks.tb-shouchang');
    }
    public function store(Request $request)
    {
        //接收参数并生成任务
        $user  = \Auth::id();
        $plant = $request->plant; // 平台名称
        $task = $request->task; //任务类型，流量/收藏
        $type = $request->type; //任务类别，如App流量，搜索收藏
        $pro_url = $request->pro_url;
        $pro_title = $request->pro_title;
        $keyword = $request->keyword;
        $custom1 = $request->custom_1["value"];
        $custom1_key = $request->costom_1['key'];
        $custom2 = $request->custom_2;
        $custom3 = $request->custom_3;
        $custom4 = $request->custom_4;
        $tasks_info = $request->tasks_info;
        $remark = $request->remark ? $request->remark : "无";
        //先判断任务有几天;
        $taskDay = $request->taskDay; //任务有几天
        //获取任务总数
        $task_Num = Task::getTaskNum($tasks_info);
        $total_tasks = $taskDay * $task_Num;
        $total_tasks_num = Task::getPrice($plant, $type, $total_tasks, $user, $custom1_key);
        if ($total_tasks_num == false) {
            return back()->withErrors('账户余额不足')->withInput();
        }
        //在判断任务开始时间
        $start_time = $request->start_time; //获取开始时间
        $today = Carbon::now()->toDateString(); //获取当前时间
        //判断任务开始时间是否是今天
        $infos = [];
        if ($today == $start_time && $taskDay == 1) {
            //开始时间是今天，并且任务只有一天。就吧当前时间之前的订单全部分配到剩下的时间内
            //获取任务总数
            $task_Num = Task::getTaskNum($tasks_info);
            //获取当前小时
            $nowH = getdate()['hours']; //
            //计算一下当前小时之后有多少个任务;
            $afterTask = Task::getAfterTaskNum($tasks_info, $nowH);
            $tepNum = $task_Num - $afterTask;
            if ($tepNum > 0) {
                //>0说明当前时间之前还有任务，要吧当前的任务给平分/随机给之后的时间
                //获取之前要先获取当前时间到23点的每个时间段的任务数
                $nowH_num = array_slice($tasks_info[0]['times'], $nowH); //从当前小时截取
                //获取$nowH_num共有几个;
                $nowH_num_count = count($nowH_num, 0);
                //假设$nowH=20;
                //生成SQL语句
                for ($i = $nowH; $i <= 23; $i++) {
                    for ($j = 0; $j < $tasks_info[0]['times'][$i]; $j++) {
                        $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::now()->toDateString() .  ' 0' . $i . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                    }
                }
                //计算一下当前时间之前有多少个任务，
                $leftTask = Task::getTaskNum($tasks_info, $nowH);
                //计算到今天结束还剩下几个小时
                //假设还剩余20个任务。时间还剩下3个小时。可以选择吧任务全部放在当前小时里面或者平分，居然看业务逻辑.这里全部放入当前小时
                for ($leftI = 0; $leftI < $leftTask; $leftI++) {
                    $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::now()->toDateString() . ' 0' . $nowH . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                }
            } else if ($tepNum == 0) {
                //等于0 说明全部任务都在当前时间之后，直接拼接即可
                for ($i = $nowH; $i <= 23; $i++) {
                    for ($j = 0; $j < $tasks_info[0]['times'][$i]; $j++) {
                        $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::now()->toDateString() . ' 0' . $i . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                    }
                }
            }
        } else if ($taskDay > 1 && $today == $start_time) {
            //任务天数大于1，并且今天开始
            //先获取当天的任务数，和上面一样，只不过多遍历一个日期变量即可
            //提前拼接时间
            for ($dayI = 0; $dayI < $taskDay; $dayI++) {
                if ($dayI == 0) {
                    //获取任务总数()
                    //获取当前小时
                    $nowH = getdate()['hours']; //
                    //计算一下当前小时之后有多少个任务;
                    $afterTask = Task::getAfterTaskNum($tasks_info, $nowH);
                    $tepNum = $task_Num - $afterTask;
                    if ($tepNum > 0) {
                        //>0说明当前时间之前还有任务，要吧当前的任务给平分/随机给之后的时间
                        //获取之前要先获取当前时间到23点的每个时间段的任务数
                        $nowH_num = array_slice($tasks_info[0]['times'], $nowH); //从当前小时截取
                        //获取$nowH_num共有几个;
                        $nowH_num_count = count($nowH_num, 0);
                        //假设$nowH=20;
                        //生成SQL语句
                        for ($i = $nowH; $i <= 23; $i++) {
                            for ($j = 0; $j < $tasks_info[0]['times'][$i]; $j++) {
                                $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::now()->addDays($dayI)->toDateString() . ' 0' . $i . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                            }
                        }
                        //计算一下当前时间之前有多少个任务，
                        $leftTask = Task::getTaskNum($tasks_info, $nowH);
                        //计算到今天结束还剩下几个小时
                        //假设还剩余20个任务。时间还剩下3个小时。可以选择吧任务全部放在当前小时里面或者平分，居然看业务逻辑.这里全部放入当前小时
                        for ($leftI = 0; $leftI < $leftTask; $leftI++) {
                            for ($j = 0; $j < $tasks_info[0]['times'][$leftI]; $j++) {
                                $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::now()->addDays($dayI)->toDateString() . ' 0' . $nowH . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                            }
                        }
                    } else if ($tepNum == 0) {
                        //等于0 说明全部任务都在当前时间之后，直接拼接即可
                        for ($i = $nowH; $i <= 23; $i++) {
                            for ($j = 0; $j < $tasks_info[0]['times'][$i]; $j++) {
                                $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::now()->addDays($dayI)->toDateString() . ' 0' . $i . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                            }
                        }
                    }
                } else {
                    //不是第一天，直接按时间遍历即可
                    for ($i = 0; $i <= 23; $i++) {
                        for ($j = 0; $j < $tasks_info[0]['times'][$i]; $j++) {
                            $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::now()->addDays($dayI)->toDateString() . ' 0' . $i . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                        }
                    }
                }
            }
        } else if ($today < $start_time) {
            //开始时间大于今天，直接遍历即可
            if ($taskDay > 1) {
                //任务天数超过一天，循环遍历即可
                for ($taskI = 0; $taskI < $taskDay; $taskI++) {
                    # code...
                    for ($i = 0; $i <= 23; $i++) {
                        for ($j = 0; $j < $tasks_info[0]['times'][$i]; $j++) {
                            $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::create($start_time)->addDays($taskI)->toDateString() . ' 0' . $i . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                        }
                    }
                }
            } else {
                for ($i = 0; $i <= 23; $i++) {
                    for ($j = 0; $j < $tasks_info[0]['times'][$i]; $j++) {
                        $infos[] = ["user_id" => $user, "plant" => $plant, 'task' => $task, 'type' => $type, 'pro_url' => $pro_url, 'pro_title' => $pro_title, 'keyword' => $keyword, 'show' => 1, 'start_time' => Carbon::create($start_time)->toDateString() . ' 0' . $i . ':00:00', 'custom_1' => $custom1, 'custom_2' => $custom2, 'custom_3' => $custom3, 'custom_4' => $custom4, 'remark' => $remark];
                    }
                }
            }
        }
        // 开启一个数据库事务,确保下单和扣款都成功；
        \DB::transaction(function () use ($user, $infos, $total_tasks_num, $total_tasks) {
            Task::insert($infos);
            $user = User::where('id', $user)->first();
            $user->update([
                'tokens' => $user->tokens - $total_tasks_num,
            ]);
            $user->save();
            $price_info = $user->prices()->make([
                'type' => 1,
                'price' => $total_tasks_num,
                'remark' => "发布任务" . $total_tasks . "个。扣除",
            ]);
            $price_info->users()->associate($user->id);
            $price_info->save();
        });
        session()->flash('success', '发布成功');
        return back();
    }
   
    public function index(Request $request)
    {

        //获取参数
        $plant = $request->input('plant');
        $type = $request->input('type');
        $status = $request->input('status');
        $tasks = Task::where('user_id', \Auth::id())
            ->when($plant,function($query,$plant){
                return $query->where('plant',$plant);
            })
            ->when($type,function ($query,$type){
                return $query->where('type',$type);
            })
            ->when($status,function ($query,$status){
                return $query->where('status',$status);
            })
            ->paginate(20);


        return view('tasks.list', ['tasks' => $tasks,
            'filters'  => [
                'plant' => $plant,
                'type'  => $type,
                'status'  => $status,
            ],
        ]);
    }
}
