@extends('layouts.default')
@section('title', '登陆')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>登陆</h5>
    </div>
    @include('shared._errors')
    <div class="card-body">
      <form method="POST" action="{{ route('users.login') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="email">手机号码</label>
            <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
          </div>
          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>
          <button type="submit" class="btn btn-primary">登陆</button>
      </form>
    </div>
  </div>
</div>
@stop