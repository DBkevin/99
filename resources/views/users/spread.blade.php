@extends('layouts.user')
@section('title', '推广查询')
@section('styles')
<link rel="stylesheet" href="/css/task.css">
<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
@stop
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>注册时间</th>
                <th>会员手机</th>
                <th>会员等级</th>
                <th>累计充值</th>
                <th>累计提现</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                        <th>{{$item->created_at}}</th>
                        <th>{{$item->phone}}</th>
                        <th>@if ($item->level ==0)
                            普通
                            @else
                            VIP
                        @endif
                        </th>
                        <th>{{$item->total_price}}</th>
                        <th>{{$item->total_price * config('spadedPrice')}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">{{ $users->render() }}</div>
    </div>
<div id="typeSelect"></div>
@stop
@section('scripts')
<script src="/js/bootstrap.min.js"></script>
@stop