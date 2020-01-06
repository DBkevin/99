@extends('layouts.user')
@section('title', '拼多多任务发布')
@section('styles')
<link rel="stylesheet" href="/css/task.css">
<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
@stop
@section('content')
<div class="content">
    @include('shared._messages')
    <ul class="tab-container flex">
        <li class="tab-item flex ">
            <a href="{{route('pdd.index')}}">
                流量任务
            </a>
        </li>
        <li class="tab-item flex  tab-item-active" >
            <a href="javascript:void(0)">
                收藏任务
           </a>
        </li>
    </ul>
    <div class="task">
        <form action="{{route('task.store')}}" method="post" id="">
            @csrf
            <input type="hidden" name="plant" value="拼多多任务" />
            <input type="hidden" name="task" value="" />
            <input type="hidden" name="type" value="" />
            <ul class="fn-container">
                <li class="fn-item flex">
                    <div class="fn-title">任务类型</div>
                    <ul class="fn-taskType-wrap flex">
                        <li class="fn-taskType choosen-taskType">
                            <a href="javascript:void(0);">
                               搜索收藏
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="fn-item flex">
                    <div class="fn-title">商品链接</div>
                    <div class="fn-fn">
                        <input type="text" name="pro_url" class="productURL" placeholder="请手动输入正确的请正淘宝/天猫/拼多多商品链接，输入错误链接会导致发布失败" />
                    </div>
                </li>
                <li class="fn-item flex">
                    <div class="fn-title">商品标题</div>
                    <div class="fn-fn">
                        <input type="text" name="pro_title" class="productTitle" placeholder="请手动填写宝贝链接的商品全标题，商品链接与标题不匹配将导致任务发布失败" />
                    </div>
                </li>
                <li class="add-keyword-wrap fn-item flex">
                    <div class="add-keyword-wrap-title fn-title flex">
                        <div class="add operateBtn">+</div>
                        <div class="reduce operateBtn">-</div>
                    </div>
                    <div class="keyword-box fn-fn">
                        <ul class="aboutProduct">
                            <li class="key product-info flex">
                                <div class="title">关键词1</div>
                                <input type="text" name="keyword" class="keyword" placeholder="关键词必须为标题内含有文字，且区分字母大小写" />
                            </li>
                            <li class="traffic product-info flex">
                                <div class="title">每天发布量</div>
                                <div class="day-traffic flex">
                                    <input type="text" name="day-traffic" class="dayTraffic-num traffic-input" value="100" />
                                    <span class="iconfont icon-des">&#xe616;</span>
                                    <div class="dayTraffic-des descript">
                                        访客（当天流量24小时细分如安排在开始时间之前的时间段将自动补量，请合理安排）
                                    </div>
                                </div>
                            <li class="time-dis product-info flex">
                                <div class="title">24小时细分</div>
                                <ul class="time-dis-container flex">
                                    <li class="time-dis-item flex">
                                        <span class="time">0点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">1点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">2点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">3点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">4点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">5点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">6点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">7点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">8点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">9点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">10点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">11点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">12点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">13点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">14点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">15点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">16点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">17点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">18点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">19点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">20点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">21点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">22点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                    <li class="time-dis-item flex">
                                        <span class="time">23点</span>
                                        <span class="dis">
                                            <input type="text" name="tasks_info[0][times][]" class="dis-num" value="0" />
                                        </span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="fn-item flex">
                    <div class="time-dis-btn fn-fn flex">
                        <button class="morningBtn">0点-7点不分配</button>
                        <button class="afternoonBtn">24小时分配</button>
                        <div>
                            (当天流量24小时细分如安排在开始时间之前的时间段将自动补量，请合理安排)
                        </div>
                    </div>
                </li>
                <li class="fn-item flex">
                    <div class="fn-title">自定义要求</div>
                    <div class="custom fn-fn flex">
                        <div class="custom-item flex">
                            <span class="custom-item-title">停留时间</span>
                            <div class="custom-dropdown dropdown flex">
                                <select name="custom_1[value]" id="stayTime">
                                    <option  custom_1[key]="0"  custom_1[value]="100-180" data-extra="0" selected>
                                        100秒-180秒（免费赠送）
                                    </option>
                                    <option  custom_1[key]="1"  custom_1[value]="180-280" data-extra="1">180秒-280秒(1流量币)
                                    </option>
                                    <option custom_1[key]="2"   custom_1[value]="280-380" data-extra="2">280秒-380秒(2流量币)
                                    </option>
                                </select>
                                <input type="hidden" name="custom_1[key]"  id="StayKeyTime"  value="">
                            </div>
                        </div>
                        <div class="custom-item flex">
                            <span class="custom-item-title">浏览副宝贝</span>
                            <div class="custom-dropdown dropdown flex">
                                <select name="custom_2" id="viceProduct">
                                    <option value="不要浏览">不要浏览</option>
                                    <option value="随机浏览" selected>随机浏览</option>
                                    <option value="深度浏览">深度浏览</option>
                                </select>
                            </div>
                        </div>
                        <div class="custom-item flex">
                            <span class="custom-item-title">4G比例</span>
                            <div class="custom-dropdown dropdown flex">
                                <select name="custom_3" id="4G">
                                    <option value="30%" selected>30%(全体免费赠送)</option>
                                    <option value="50%">50%(全体免费赠送)</option>
                                    <option value="80%">80%(全体免费赠送)</option>
                                    <option value="100%">100%(全体免费赠送)</option>
                                </select>
                            </div>
                        </div>
                        <div class="custom-item flex">
                            <span class="custom-item-title">查看评价</span>
                            <div class="custom-dropdown dropdown flex">
                                <select name="custom_4" id="checkEvalu">
                                    <option value="查看" selected>查看</option>
                                    <option value="不查看">不查看</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="fn-item flex">
                    <div class="fn-title">发布天数</div>
                    <div class="releaseday fn-fn flex">
                        <input type="text" name="taskDay" class="days" value="1" />天
                        <div class="seven fixed-days" data-day="7">7天</div>
                        <div class="half-month fixed-days" data-day="15">15天</div>
                        <div class="month fixed-days" data-day="30">30天</div>
                    </div>
                </li>
                <li class="fn-item flex">
                    <div class="fn-title">开始时间</div>
                    <div class="calendar fn-fn dropdown flex">
                        <div class="input-group date form_datetime col-md-5" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                            <input name="start_time" id="StartTime" class="form-control" size="16" type="text" readonly>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-remove"></span>
                            </span>
                        </div>
                        <span class="iconfont icon-calendar">&#xe627;</span>
                    </div>
                </li>
                <li class="fn-item flex">
                    <div class="fn-title">备注</div>
                    <div class="remarks-wrap fn-fn">
                        <input type="text" name="remark" class="remark" />
                    </div>
                </li>
                <li class="fn-item flex">
                    <div class="btn-wrap fn-fn">
                        <button type="submit" class="release">发布任务</button>
                        <button class="cancel">取消</button>
                    </div>
                </li>
                <li class="fn-item">
                    <div class="attentions fn-fn">
                        <p>
                            任务时长
                            <span class="task-days">1</span>
                            天, 共计发布
                            <span class="task-num">100</span>
                            个任务
                        </p>
                        <p>
                            单个任务消耗
                            <span class="single-task-cost">60</span>
                            流量币 合计消耗：
                            <span class="task-totalCost prize-unit">6000</span>
                            流量币
                        </p>
                        <p>
                            vip会员合计消费：
                            <span class="task-vipTotalCost prize-unit">4000</span>
                            流量币，升级vip会员优惠更多!
                        </p>
                    </div>
                </li>

            </ul>
        </form>
    </div>


    <!-- 页脚 -->
    <div class="footer flex">
        xxxx版权所有 | 粤ICP备99999999号
    </div>
</div>
@stop
@section('scripts')
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script src="/js/task.js"></script>
<script type="text/javascript">
    $('#StartTime').datetimepicker({
        language: 'zh-CN',
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        initialDate: new Date(), //初始化当前日期
        startDate: new Date(),
        format: 'yyyy-mm-dd', //格式化想要显示的时间格式
        minView: 'month' //日期时间选择器所能够提供的最精确的时间选择视图。
    });
    $('#StartTime').val(dateFormat('YYYY-mm-dd', new Date()));

    function dateFormat(fmt, date) {
        let ret;
        let opt = {
            "Y+": date.getFullYear().toString(), // 年
            "m+": (date.getMonth() + 1).toString(), // 月
            "d+": date.getDate().toString(), // 日
            "H+": date.getHours().toString(), // 时
            "M+": date.getMinutes().toString(), // 分
            "S+": date.getSeconds().toString() // 秒
            // 有其他格式化字符需求可以继续添加，必须转化成字符串
        };
        for (let k in opt) {
            ret = new RegExp("(" + k + ")").exec(fmt);
            if (ret) {
                fmt = fmt.replace(ret[1], (ret[1].length == 1) ? (opt[k]) : (opt[k].padStart(ret[1].length, "0")))
            };
        };
        return fmt;
    }
</script>
@stop