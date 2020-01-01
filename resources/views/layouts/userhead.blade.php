    <!-- header -->
    <header class="header flex">
        <div class="header-left flex">
            <!-- logo -->
            <a href="/" class="logo  flex">
                <img src="/images/logo.png" alt=""
                    class="logo-img" />
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
                <div class="recharge">充值</div>
            </div>
        </div>

        <div class="header-right flex">
            <div class="charging">
                <div class="charge-illustration">
                    任务扣费标准
                </div>
            </div>
            <div class="weChat">
                <i class="iconfont iconfont-weChat">&#xe617;</i>
                <div class="weChat-counselling">
                    微信客服咨询
                </div>
            </div>
            <div class="reset">
                <i class="iconfont iconfont-lock">&#xe60d;</i>
                <div class="reset-pwd">
                    修改密码
                </div>
            </div>
            <div class="exit">
                <i class="iconfont iconfont-exit">&#xe6b2;</i>
                <div class="exit-btn">
                    退出
                </div>
            </div>
        </div>

    </header>

    <!-- slider -->
    <div class="slider">
        <ul class="slider-wrap">
            <li class="slider-item">
                <i class="iconfont">&#xe626;</i>
                <span>会员中心</span>
            </li>
            <li class="slider-item">
                <i class="iconfont">&#xe633;</i>
                <span>淘宝任务</span>
            </li>
            <li class="slider-item">
                <i class="iconfont">&#xe812;</i>
                <span>京东任务</span>
            </li>
            <li class="slider-item">
                <i class="iconfont">&#xe6a4;</i>
                <span>拼多多任务</span>
            </li>
            <li class="slider-item">
                <i class="iconfont">&#xe604;</i>
                <span>任务查询</span>
            </li>
            <li class="slider-item">
                <i class="iconfont">&#xe61d;</i>
                <span>推广中心</span>
            </li>
            <li class="slider-item slider-item-active">
                <i class="iconfont">&#xe68c;</i>
                <span>账户充值</span>
            </li>
            <li class="slider-item">
                <i class="iconfont">&#xe667;</i>
                <span>视频教学</span>
            </li>
        </ul>
    </div>