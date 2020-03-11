@extends('layouts.user')
@section('title', '个人中心')
@section('styles')
    <link rel="stylesheet" href="/css/usershow.css">
@endsection
@section('content')
  <div class="content">
            <ul class="personnel-container">
                <!-- 第一行：我的任务 & 网站公告 -->
                <li class="personnel-item flex">
                    <!-- 左侧三个平台的任务 -->
                    <div class="myTask">
                        <p class="myTask-title title">我的任务</p>
                        <ul class="plantTask flex">
                            <li class="tb-task plantTask-item flex">
                                <div class="tasking flex">
                                    <span class="iconfont icon-task">&#xe604;</span>
                                    <div class="tasking-title">
                                        <p><span>淘宝任务</span>（进行中）</p>
                                        <span class="tasking-num">{{$tb}}</span>单
                                    </div>
                                </div>
                                <div class="check-task flex">
                                    <span>查看任务</span>
                                    <span class="iconfont">&#xe649;</span>
                                </div>
                            </li>
                            <li class="jd-task plantTask-item flex">
                                <div class="tasking flex">
                                    <span class="iconfont icon-task">&#xe604;</span>
                                    <div class="tasking-title">
                                        <p><span>京东任务</span>（进行中）</p>
                                        <span class="tasking-num">{{$jd}}</span>单
                                    </div>
                                </div>
                                <div class="check-task flex">
                                    <span>查看任务</span>
                                    <span class="iconfont">&#xe649;</span>
                                </div>
                            </li>
                            <li class="pdd-task plantTask-item flex">
                                <div class="tasking flex">
                                    <span class="iconfont icon-task">&#xe604;</span>
                                    <div class="tasking-title">
                                        <p><span>拼多多任务</span>（进行中）</p>
                                    <span class="tasking-num">{{$pdd}}</span>单
                                    </div>
                                </div>
                                <div class="check-task flex">
                                    <span>查看任务</span>
                                    <span class="iconfont">&#xe649;</span>
                                </div>
                            </li>
                            <li class="finished-task plantTask-item flex">
                                <div class="tasking flex">
                                    <span class="iconfont icon-task">&#xe604;</span>
                                    <div class="tasking-title">
                                        <p><span>已完成任务</span>（进行中）</p>
                                        <span class="tasking-num">0</span>单
                                    </div>
                                </div>
                                <div class="check-task flex">
                                    <span>查看任务</span>
                                    <span class="iconfont">&#xe649;</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- 右侧公告栏 -->
                    <div class="notice">
                        <p class="notice-title title">网站公告</p>
                        <ul class="notice-list">
                            <li class="notice-list-item">
                                <a href="###" class="list-item-link" title="【通知】为了防止封号，紧急联系微信">
                                    1、【通知】为了防止封号，紧急联系微信
                                </a>
                            </li>
                            <li class="notice-list-item" title="【通知】双12淘宝任务价格回调">
                                <a href="###" class="list-item-link">
                                    2、【通知】双12淘宝任务价格回调
                                </a>
                            </li>
                            <li class="notice-list-item">
                                <a href="###" class="list-item-link" title="【通知】关于佣金提现">
                                    3、【通知】关于佣金提现
                                </a>
                            </li>
                            <li class="notice-list-item">
                                <a href="###" class="list-item-link" title="【通知】任务数据保留时间：1个月">
                                    4、【通知】任务数据保留时间：1个月
                                </a>
                            </li>
                            <li class="notice-list-item">
                                <a href="###" class="list-item-link" title="【注意】国庆7天长假，平台正常发布任务，客服会一直在线">
                                    5、【注意】国庆7天长假，平台正常发布任务，客服会一直在线
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- 第二行：账户信息 & 常见问题 -->
                <li class="personnel-item flex">
                    <div class="count">
                        <p class="count-title title">账户信息</p>
                        <div class="count-info flex">
                            <ul class="user-info">
                                <li class="user-info-item">
                                    <div class="head"></div>
                                </li>
                                <li class="phonenum user-info-item">
                                    {{$user->phone}}
                                </li>
                                <li class="user-level user-info-item flex">
                                    <span class="level">
                                    @if ($user->level ==0)
                                        普通
                                    @else
                                        VIP
                                    @endif    
                                    </span>会员
                                </li>
                            </ul>
                            <div class="marketing-info flex">
                                <ul class="marketing-info-item flex">
                                    <li class="marketing-info-title">
                                        可用流量币
                                    </li>
                                    <li class="useable-coin marketing-info-data">
                                        {{$user->tokens}}
                                    </li>
                                    <li class="charge marketing-btn">充值</li>
                                </ul>
                                <ul class="marketing-info-item flex">
                                    <li class="marketing-info-title">
                                        推广佣金
                                    </li>
                                    <li class="commission marketing-info-data">
                                      {{$user->commission}}
                                    </li>
                                    <li class="getPay marketing-btn">提现</li>
                                </ul>
                                <ul class="marketing-info-item flex">
                                   <li class="marketing-info-title">
                                        推广链接
                                    </li>
                                    <li class="marketingURL marketing-info-data">
                                       {{route('signup')}}?pid={{$user->id}}
                                    </li>
                                    <li class="copyURL marketing-btn">复制</li>
                               
                                </ul>
                                <ul class="marketing-info-item flex">
                                    <li class="marketing-info-title">
                                        QQ号码
                                    </li>
                                    <li class="qqnum marketing-info-data">
                                      {{$user->qq}}
                                    </li>
                                    <li class="modify marketing-btn">修改</li>
                                </ul>
                            </div>
                        </div>
                      <div class="marketing flex">
                            <p>超给力的推广好友系统永久获取高佣金提成</p>
                            <p>别人通过推广链接注册的自动成为您的推广的好友！</p>
                            <p>好友每次充值您将获得高达10%佣金
                                （<a href="#" class="marketing-prize">详情推广奖励点击查看</a>）
                            </p>
                        </div>
                  
                    </div>
                    <div class="ad">
                        <p class="title"></p>
                        <div class="ad-container">
                            <ul class="ad-wrap">
                                <li class="ad-item">
                                    <a href="javascript:;">
                                        <img src="./img/newUser.jpg" alt="">
                                    </a>
                                </li>
                                <li class="ad-item">
                                    <a href="javascript:;">
                                        <img src="./img/VIP.jpg" alt="">
                                    </a>
                                </li>
                            </ul>
                            <ul class="ad-dots flex">
                                <li class="dot"></li>
                                <li class="dot"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="usual">
                        <p class="title">常见问题</p>
                        <ul class="qs-container">
                            <li class="qs-item">
                                <a href="javascript:;" title="双十一结束就算结束吗？老运营如何扫尾？">
                                    1、双十一结束就算结束吗？老运营如何扫尾？
                                </a>
                            </li>
                            <li class="qs-item">
                                <a href="javascript:;" title="【有料】宝贝点赞来袭，要人气不">
                                    2、【有料】宝贝点赞来袭，要人气不
                                </a>
                            </li>
                            <li class="qs-item">
                                <a href="javascript:;" title="提升流量安全吗？会不会降权？">
                                    3、提升流量安全吗？会不会降权？
                                </a>
                            </li>
                            <li class="qs-item">
                                <a href="javascript:;" title="手机流量24小时细分和天数介绍">
                                    4、手机流量24小时细分和天数介绍
                                </a>
                            </li>
                            <li class="qs-item">
                                <a href="javascript:;" title="【教程】微淘直播链接如何获取">
                                    5、【教程】微淘直播链接如何获取
                                </a>
                            </li>
                            <li class="qs-item">
                                <a href="javascript:;" title="淘宝刷展现有什么用?">
                                    6、淘宝刷展现有什么用?
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- 第三行：视频教学 -->
                <li class="personnel-item flex">
                    <div class="video-teach">
                        <p class="video-title title">视频教学</p>
                        <a href="http://player.youku.com/embed/XNDM2ODg4MzAzMg" target="_blank">
                            <img src="/images/video.png" class="video-img" alt="" />
                        </a>
                        <p style="margin-top: 16px; font-size: 14px; color: #333;">人气久久平台新手任务发布教程</p>
                    </div>

                    <div class="news">
                        <p class="news-title title">资讯干货</p>
                        <ul class="news-container">
                            <li class="news-item">
                                <a href="javascript:;" title="新手运营：淘宝流量的5大关键权重">
                                    1、新手运营：淘宝流量的5大关键权重
                                </a>
                            </li>
                            <li class="news-item">
                                <a href="javascript:;" title="双十一淘宝收藏加购（小技巧）">
                                    2、双十一淘宝收藏加购（小技巧）
                                </a>
                            </li>
                            <li class="news-item">
                                <a href="javascript:;" title="【营销】如何玩转中秋营销活动？">
                                    3、【营销】如何玩转中秋营销活动？
                                </a>
                            </li>
                            <li class="news-item">
                                <a href="javascript:;" title="2019淘宝双十一店铺新品该怎么做流量储备？ ">
                                    4、2019淘宝双十一店铺新品该怎么做流量储备？ 
                                </a>
                            </li>
                            <li class="news-item">
                                <a href="javascript:;" title="惊爆！史上最全的钻展干货经验分享">
                                    5、惊爆！史上最全的钻展干货经验分享
                                </a>
                            </li>
                            <li class="news-item">
                                <a href="javascript:;" title="如何增加店铺权重获取自然搜索流量">
                                    6、如何增加店铺权重获取自然搜索流量
                                </a>
                            </li>
                            <li class="news-item">
                                <a href="javascript:;" title="“千人千面”是什么？产生了什么影响？">
                                    7、“千人千面”是什么？产生了什么影响？
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <div class="footer">
                xxxx版权所有 | 粤ICP备99999999号
            </div>
        </div>
@stop
@section('scripts')
    <script src="/js/usershow.js"></script>
@endsection