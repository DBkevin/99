@extends('layouts.user')
@section('title', '拼多多任务发布')
@section('styles')
<style>
    .fl{
        float: left;
    }
    .p115 {
        padding-left: 15px;
    }

    .pr15 {
        padding-right: 15px;
    }

    .pd20 {
        padding-bottom: 20px;
    }

    .modify-password {
        padding-top: 10px;
    }

    .title-box {
        padding:17px 0 17px 5px;
        border-bottom: 1px solid #ccc;
        margin-bottom: 25px;
    }

    .title {
        color: #1799ea;
        font-size:20px;
    }
    .modify-password .content-box div{
        height:35px;
        line-height:35px;
    }
    .modify-password .content-box div .title{
        font-size:16px;
        color:#666;
        margin-right:15px;
        width:93px;
        text-align:right;
    }
    .index-font-color{
        color:#1799ea;
    }
    .mt20{
        margin-top:20px;
    }
    .modify-password .content-box div input.code{
        width:230px;
    }
    .modify-password .content-box div input.inputStyle{
        box-sizing: border-box;
    }
    .inputStyle{
        border:1px solid #ccc;
        height:35px;
        background:#fff;
        border-radius:2px;
    }
    .modify-password .content-box div button.code-btn{
        background-color:#1799ea;
        font-size:16px;
        width:140px;
        padding:0 20px;
        border-radius: 5px;
        color:#fff;
        height: 35px;
        line-height:35px;
        cursor: pointer;
        border:none;
    }
    .modify-password .content-box div input.password{
        width:380px;
        box-sizing:border-box;
        border:1px solid #ccc;
        height:35px;
        background-color:#fff;
        border-radius:2px;
    }
    .modify-password .content-box div.button-box{
        height:50px;
        line-height:50px;
    }
    .mt25{
        margin-top:25px;
    }
    .modify-password .content-box div.button-box button{
        width:160px;
        font-size:20px;
        height:50px;
        background-color:#1799ea;
        padding:0 20px;
        border-radius:5px;
        color:#fff;
        line-height:35px;
        cursor:pointer;
        border:none;
    }
</style>
@stop
@section('content')
<div class="content">
    <div class="p115 pr15">
        <div class="pd20 modify-password">
            <div class="title-box">
                <p class="title">
                    修改密码
                </p>
            </div>
            <div class="content-box">
                <div class="clearfix">
                    <div class="title fl">手机号码</div>
                    <div class="mobile index-font-color">{{Auth::User()->phone}}</div>
                </div>
                <div  class="clearfix mt20">
                    <span  class="title fl">验证码</span> 
                    <input  type="text" autocomplete="new-password" placeholder="请输入验证码" class="inputStyle code fl mr10"> 
                    <button  class="fl code-btn">获取验证码</button>
                </div>
                <div  class="clearfix mt20">
                    <span  class="title fl">新密码</span> 
                    <input  type="password" autocomplete="new-password" placeholder="请输入密码" class="inputStyle password fl" aria-autocomplete="list">
                </div>
                <p  style="height: 24px; line-height: 24px; padding-left: 108px; margin-top: 5px; color: rgb(153, 153, 153);">长度8-20个字符，不含空格。</p>
                <div  class="clearfix mt20"><span  class="title fl">再次输入</span> <input  type="password" autocomplete="new-password" placeholder="请再次输入密码" class="inputStyle password fl"></div>
                <div  class="button-box mt25"><button  class="submit">确认</button></div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="/js/comment.js"></script>
<script type="text/javascript">
</script>
@stop