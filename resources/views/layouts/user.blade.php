<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title' ) - 人气</title>
    <link rel="stylesheet" type="text/css" href="/css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/css/header_silder.css">
    <script  type="text/javascript" src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    @yield('styles')
  </head>
  <body>
    @include('layouts.userhead')
    <div class="content-wrap">
      @yield('content')
    </div>
  </body>
    <script  type="text/javascript" src="/js/commen.js"></script>
   @yield('scripts')
</html>