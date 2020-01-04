@extends('layouts.user')
@section('title', '充值')
@section('styles')
<link rel="stylesheet" href="/css/boot.css">
<style>
.nav-tabs .active{
    color:#1799ea;
    border-bottom:5px solid #1799ea;
}
.content .nav-tabs>li.active>a{
    color:#1799ea;
    border:0;
}
.nav-tabs li a{
   color:#666;

}
</style>
@stop
@section('content')
<div class="content">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">淘宝任务</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">京东任务</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">拼多多任务</a></li>
    </ul>
    <!-- Tab panes 选项卡窗格-->
    <div class="tab-content">
        <!-- 此处的id对应标签中的a的href链接 -->
        <div role="tabpanel" class="tab-pane  in active" id="home">
            1
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            2
        </div>
        <div role="tabpanel" class="tab-pane" id="messages">
            3
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="/js/boot.js"></script>
@stop