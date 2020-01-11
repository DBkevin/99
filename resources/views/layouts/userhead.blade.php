<!-- header -->
<header class="header flex" style="z-index:1;">
    <div class="header-left flex">
        <!-- logo -->
        <a href="/" class="logo  flex">
            <img src="/images/logo.png" alt="" class="logo-img" />
        </a>
        <div class="member-message flex">
            <div class="member-level">
                @if(Auth::user()->level==0)
                普通
                @else
                VIP
                @endif
            </div>
            <div class="member-info flex">
                会员
                <span class="member-count">{{Auth::User()->phone}}</span>
            </div>
        </div>
        <div class="balance flex">
            <span class="balance-name">流量币：</span>
            <span class="balance-left">{{Auth::user()->tokens}}</span>
            <div class="recharge"><a href="{{route('post.show')}}" style="color:#fff;">充值</a></div>
        </div>
    </div>

    <div class="header-right flex">
        <div class="charging">
            <a href="{{route('rates.index')}}">
                <div class="charge-illustration">
                    任务扣费标准
                </div>
            </a>
        </div>
        <div class="weChat">
            <i class="iconfont iconfont-weChat">&#xe617;</i>
            <div class="weChat-counselling">
                微信客服咨询
            </div>
        </div>
        <div class="reset">
            <i class="iconfont iconfont-lock">&#xe60d;</i>
            <a href="{{route('modify-password')}}">
                <div class="reset-pwd">
                    修改密码
                </div>
            </a>
        </div>
        <div class="exit">
            <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <i class="iconfont iconfont-exit">&#xe6b2;</i>
                <button type="submit">
                    退出
                </button>
            </form>
        </div>
    </div>

</header>
<!-- slider -->
<div class="slider">
    <style>
        .slider-wrap a {
            color: #fff;
        }
    </style>

    <ul class="slider-wrap">
        <a href="{{route('users.show')}}" target="_self">
            <li class="slider-item ">
                <i class="iconfont">&#xe626;</i>
                <span>会员中心</span>
            </li>
            <a href="{{route('tb.index')}}" target="_self">
                <li class="slider-item">
                    <i class="iconfont">&#xe633;</i>
                    <span>淘宝任务</span>
                </li>
            </a>
            <a href="{{route('jd.index')}}" target="_self">
                <li class="slider-item">
                    <i class="iconfont">&#xe812;</i>
                    <span>京东任务</span>
                </li>
            </a>
            <a href="{{route('pdd.index')}}" target="_self">
                <li class="slider-item">
                    <i class="iconfont">&#xe6a4;</i>
                    <span>拼多多任务</span>
                </li>
            </a>

            <a href="{{route('task.list')}}" target="_self">
                <li class="slider-item">
                    <i class="iconfont">&#xe604;</i>
                    <span>任务查询</span>
                </li>
            </a>
            <a href="{{route('users.spread')}}" target="_self">
                <li class="slider-item">
                    <i class="iconfont">&#xe604;</i>
                    <span>推广查询</span>
                </li>
            </a>
            <a href="{{route('post.show')}}" target="_self">
                <li class="slider-item ">
                    <i class="iconfont">&#xe68c;</i>
                    <span>账户充值</span>
                </li>
            </a>
            <li class="slider-item">
                <i class="iconfont">&#xe667;</i>
                <span>视频教学</span>
            </li>
    </ul>
</div>
<div class="QRcode-wrap">
    <div class="code-container">
        <div class="QRcode-title flex">
            <span class="code-title">微信客服咨询</span>
            <span class="close">×</span>
        </div>
        <div class="QR-code flex">
            <img src="/images/qrcode.jpg" alt="">
        </div>
        <p class="flex">客服微信号:renqi99-10</p>
    </div>

</div>