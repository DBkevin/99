@extends('layouts.user')
@section('title', '任务查询')
@section('styles')
<link rel="stylesheet" href="/css/task.css">
<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
@stop
@section('content')
<form action="{{ route('task.list') }}" class="search-form">
    <div class="form-row">
        @csrf
        <div class="col-md-9">
            <div class="form-row">
                <p class="clo-auto">任务类型</p>
                <div id="typeSelect3" class="col-md-3">
                    <select name="plant" class="form-control form-control-sm">
                        <option value="">全部</option>
                        <option value="拼多多任务">拼多多</option>
                        <option value="京东任务">京东</option>
                        <option value="淘宝任务">淘宝</option>
                    </select>
                </div>
                <div id="typeSelect2" class="col-md-3">
                    <select name="type" class="form-control form-control-sm">
                        <option value="">全部</option>
                        <option value="APP流量">App流量</option>
                        <option value="搜索收藏">搜索收藏</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-control form-control-sm">
                        <option value="">全部</option>
                        <option value="pending">进行中</option>
                        <option value="success">已完成</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-sm">搜索</button>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>任务ID</th>
                <th>任务类型</th>
                <th>关键词</th>
                <th>状态</th>
                <th>发布时间</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $item)
                <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->type}}</th>
                        <th>{{$item->keyword}}</th>
                        <th>@if ($item->status=='pending')
                            进行中
                            @else
                            已完成
                        @endif
                        </th>
                        <th>{{$item->start_time}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">{{ $tasks->appends($filters)->render() }}</div>
    </div>
</form>
<div id="typeSelect"></div>
@stop
@section('scripts')
<script src="/js/bootstrap.min.js"></script>
<script>
    var filters = {!! json_encode($filters) !!};
    $(document).ready(function () {
      $('.form-row select[name=plant]').val(filters.plant);
      $('.form-row select[name=type]').val(filters.type);
      $('.form-row select[name=status]').val(filters.status);
    })
</script>
@stop