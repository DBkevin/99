<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title' ) - 人气</title>
    <link rel="stylesheet" href="{{ mix('css/user.css') }}">
    <script src="{{mix('js/user.js')}}"></script>
  </head>
  <body>
    @include('layouts.userhead')
    <div class="Index-width-box clearfix">
      <div class="fl">
       <div class="left-column index index-color1" style="height: 638px;">
           <div class="position index-Bg-color">
               <ul class="title">
                   <li class="pointer index">
                       <i class="iconfont mr15 icon-shouye"></i>
                       <span class="fs16">会员中心</span>
                   </li>
               </ul>
            </div>
       </div>
      </div>
    </div>
  </body>
</html>