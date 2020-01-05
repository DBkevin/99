@extends('layouts.user')
@section('title', '充值')
@section('styles')
<link rel="stylesheet" href="/css/boot.css">
<style>
    .nav-tabs .active {
        color: #1799ea;
        border-bottom: 5px solid #1799ea;
    }

    .content .nav-tabs>li.active>a {
        color: #1799ea;
        border: 0;
    }

    .nav-tabs li a {
        color: #666;

    }
    .nav-tabs>li>a:hover{
        background-color: #fff;
        border: none;
    }

    .table{
        margin-top: 15px;
    }

    .table>thead>tr>th {
        color: #1799ea;
    }

    th,
    td {
        text-align: center;
    }

    /* .tab-content {
        margin-top: 15px;
    } */
</style>
@stop
@section('content')
<div class="content">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">淘宝任务</a></li>
        <li role="presentation">
            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">京东任务</a>
        </li>
        <li role="presentation">
            <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">拼多多任务</a>
        </li>
    </ul>
    <!-- Tab panes 选项卡窗格-->
    <div class="tab-content">
        <!-- 此处的id对应标签中的a的href链接 -->
        <div role="tabpanel" class="tab-pane  in active" id="home">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>流量币消耗</th>
                        <th>普通会员消耗</th>
                        <th>VIP会员消耗</th>
                        <th>充值200元</th>
                        <th>充值1000元</th>
                        <th>充值10000元</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tbs as $item)
                    <tr>
                        <th>{{$item->type_name}}</th>
                        <th>{{$item->price}}流量币</th>
                        <th>{{$item->VIPprie}}流量币</th>
                        <th>{{$item->show_1}}</th>
                        <th>{{$item->show_2}}</th>
                        <th>{{$item->show_3}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active">
                    <a href="#PC" aria-controls="PC" role="tab" data-toggle="tab">PC流量</a>
                </li>
                <li role="presentation">
                    <a href="#other" aria-controls="other" role="tab" data-toggle="tab">其他</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active" id="PC">
                    <table class="table" style="border:1px solid #ccc; width:800px;">
                        <thead>
                            <tr>
                                <th>停留时间</th>
                                <th>普通会员消耗</th>
                                <th>VIP会员消耗</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>50秒</th>
                                <th>0流量币</th>
                                <th>0流量币</th>
                            </tr>
                            <tr>
                                <th>80秒</th>
                                <th>1流量币</th>
                                <th>0流量币</th>
                            </tr>
                            <tr>
                                <th>120秒</th>
                                <th>2流量币</th>
                                <th>0流量币</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="other">
                    <table class="table" style="border:1px solid #ccc; width:800px;">
                        <thead>
                            <tr>
                                <th>停留时间</th>
                                <th>普通会员消耗</th>
                                <th>VIP会员消耗</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>100秒-180秒</th>
                                <th>0流量币</th>
                                <th>0流量币</th>
                            </tr>
                            <tr>
                                <th>180秒-280秒</th>
                                <th>1流量币</th>
                                <th>0流量币</th>
                            </tr>
                            <tr>
                                <th>280秒-380秒</th>
                                <th>2流量币</th>
                                <th>0流量币</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>流量币消耗</th>
                        <th>普通会员消耗</th>
                        <th>VIP会员消耗</th>
                        <th>充值200元</th>
                        <th>充值1000元</th>
                        <th>充值10000元</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jds as $item)
                    <tr>
                        <th>{{$item->type_name}}</th>
                        <th>{{$item->price}}流量币</th>
                        <th>{{$item->VIPprie}}流量币</th>
                        <th>{{$item->show_1}}</th>
                        <th>{{$item->show_2}}</th>
                        <th>{{$item->show_3}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table" style="border:1px solid #ccc; width:800px;">
                <thead>
                    <tr>
                        <th>停留时间</th>
                        <th>普通会员消耗</th>
                        <th>VIP会员消耗</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>100秒-180秒</th>
                        <th>0流量币</th>
                        <th>0流量币</th>
                    </tr>
                    <tr>
                        <th>180秒-280秒</th>
                        <th>1流量币</th>
                        <th>0流量币</th>
                    </tr>
                    <tr>
                        <th>280秒-380秒</th>
                        <th>2流量币</th>
                        <th>0流量币</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="messages">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>流量币消耗</th>
                        <th>普通会员消耗</th>
                        <th>VIP会员消耗</th>
                        <th>充值200元</th>
                        <th>充值1000元</th>
                        <th>充值10000元</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pdds as $item)
                    <tr>
                        <th>{{$item->type_name}}</th>
                        <th>{{$item->price}}流量币</th>
                        <th>{{$item->VIPprie}}流量币</th>
                        <th>{{$item->show_1}}</th>
                        <th>{{$item->show_2}}</th>
                        <th>{{$item->show_3}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table" style="border:1px solid #ccc; width:800px;">
                <thead>
                    <tr>
                        <th>停留时间</th>
                        <th>普通会员消耗</th>
                        <th>VIP会员消耗</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>100秒-180秒</th>
                        <th>0流量币</th>
                        <th>0流量币</th>
                    </tr>
                    <tr>
                        <th>180秒-280秒</th>
                        <th>1流量币</th>
                        <th>0流量币</th>
                    </tr>
                    <tr>
                        <th>280秒-380秒</th>
                        <th>2流量币</th>
                        <th>0流量币</th>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <p>流量币套餐说明：</p>
    <table class="table" style="border:1px solid #ccc; width:800px;">
        <tbody>
            <tr>
                <th>充值200元以下</th>
                <th>1元=100流量币</th>
            </tr>
            <tr>
                <th>充值200元送20元</th>
                <th>1元=110流量币</th>
            </tr>
            <tr>
                <th>充值500元送100元</th>
                <th>1元=120流量币</th>
            </tr>
            <tr>
                <th>充值1000元送200元</th>
                <th>1元=120流量币</th>
            </tr>
            <tr>
                <th>充值2000元送600元</th>
                <th>1元=130流量币</th>
            </tr>
            <tr>
                <th>充值5000元送1000元</th>
                <th>1元=120流量币</th>
            </tr>
            <tr>
                <th>充值10000元送2500元</th>
                <th>1元=125流量币</th>
            </tr>
        </tbody>
    </table>
    <p>充值1000元以上套餐自动升级vip会员 享受更优惠价格。</p>
</div>
@stop
@section('scripts')
<script src="/js/boot.js"></script>
@stop