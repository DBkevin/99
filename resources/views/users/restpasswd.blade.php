@extends('layouts.default')
@section('title', '注册')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>重置密码</h5>
    </div>
    @include('shared._errors')
    <div class="card-body">
      <form method="POST" action="{{ route('patchrestpasswd') }}">
        @method('PATCH')
        {{ csrf_field() }}
          <div class="form-group">
            <label for="email">手机号码</label>
            <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
          </div>
          <div class="form-group ">
              <label for="captcha">短信验证</label>
               <input type="text" name="verification_key"  class="form-control col-md-6" value="verificationCode_IWBTh9gteG5HcoT" >
                <input type="number" name="verification_code"  class="form-control col-md-6" value="{{old('verification_code')}}" >
          </div>
          <div class="form-grop">
                <input id="captcha" class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" required>
                <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                @if ($errors->has('captcha'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('captcha') }}</strong>
                  </span>
                @endif
            </div>
          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>
          <div class="form-group">
            <label for="password_confirmation">确认密码：</label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          </div>
          <button type="submit" class="btn btn-primary">重置密码</button>
      </form>
    </div>
  </div>
</div>
@stop