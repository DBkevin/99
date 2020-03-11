@extends('layouts.user')
@section('title', '充值')
@section('styles')
  <link rel="stylesheet" type="text/css" href="css/charge.css">
@stop
@section('content')
  <div class="content">
            <ul class="tab-container flex">
                <li class="tab-item flex tab-item-active">流量币充值</li>
                <li class="tab-item flex">充值记录</li>
                <li class="tab-item flex">消费明细</li>
                <li class="tab-item flex">客服处理</li>
            </ul>

            <!-- 选项卡1：流量币充值 -->
            <div class="charge">
                <form method="POST" action="{{route('order.store')}}">
                  @csrf
                    <!-- 充值方式 -->
                    <div class="pay-mode flex">
                        <div class="pay-mode-title charge-title">
                            充值方式
                        </div>
                        <div class="pay-mode-item pay-mode-choosen">
                            <span class="invoice">个人</span>
                            <a href="javascript:void(0)">
                                <img src="/images/alipay.png" alt="" />
                            </a>
                            <div class="choosen-icon"></div>
                        </div>
                    </div>
                    <!-- 充值套餐 -->
                    <div class="charge-type flex">
                        <div class="charge-type-title charge-title">
                            充值套餐
                        </div>
                        <ul class="charge-type-container flex">
                          @foreach ($products as $index=>$item)
                             <li class="charge-type-item" data-pay="{{$item->getIntPrice($item->interval_price)}}">{{$item->getIntPrice($item->interval_price)}}元
                              @if ($item->give_price !=0.00)
                              （送{{$item->getIntGivePrice($item->give_price)}}）元
                              @endif
                            </li>
                          @endforeach
                        </ul>
                    </div>
                    <!-- 充值金额 -->
                    <div class="charge-value flex">
                        <div class="charge-value-title charge-title">充值金额</div>
                        <div class="charge-value-input">
                            <input id="chargeValue" name="price" type="text" value="200">元
                            <div class="charge-value-tip">
                                <b class="anytimeDelete">
                                    1元=<span class="coins">110</span>流量币，
                                </b>
                                总计<span class="total-coins">22000</span>流量币，
                                约发布<span class="search-traffic">367</span>个搜索流量
                                （<span class="single-search-traffic">60</span>流量币/个），
                                约<span class="collect">314</span>个收藏
                                （<span class="single-collect">70</span>流量币/个）
                            </div>
                        </div>
                    </div>
                    <!-- 温馨提示 -->
                    <div class="charge-tip">
                        <p class="tip-title">温馨提示：</p>
                        <ul class="tip-container">
                            <li class="tip-item">一次性充值1000元以上自动升级为VIP会员，发布任务可享受优惠及停留时间等附加项免费权限！</li>
                            <li class="tip-item">充值套餐越高，优惠越大！最高可享受1元=125流量币折扣！</li>
                        </ul>
                    </div>
                    <!-- 确认充值 -->
                    <div class="confirm">
                        <button type="submit" class="confirmBtn">确认充值</button>
                    </div>
                    <!-- 注意事项 -->
                    <div class="attentions">
                        <p class="attentions-title">注意事项</p>
                        <ul class="attentions-container">
                            <li class="attentions-item">1、流量币会在您支付成功后自动充值到您的账户中；</li>
                            <li class="attentions-item">2、付款过程中，请慢慢操作，不要随意刷新网页。如果支付失败，请重新下单支付；</li>
                            <li class="attentions-item">3、目前支持支付宝渠道支付！如需帮助，请联系客服；</li>
                            <li class="attentions-item">4、平台暂不支持提供发票；充值的流量币不支持提现！如有疑问，请在充值前联系客服咨询！</li>
                            <li class="attentions-item">5、如需代理流量业务或者有商家资源需合作的可向网站客服了解分站加盟和api合作！</li>
                        </ul>
                    </div>
                </form>
            </div>
            <!-- 选项卡2：充值记录 -->
            <div class="record">
                <ul class="record-tab flex">
                    <li class="record-tab-item flex">
                        <p class="record-tab-item-title">充值方式</p>
                        <div class="record-dropdown dropdown flex">
                            全部
                            <span class="iconfont">&#xe7a5;</span>
                        </div>
                    </li>
                    <li class="record-tab-item flex">
                        <p class="record-tab-item-title">支付方式</p>
                        <div class="record-dropdown dropdown flex">
                            全部
                            <span class="iconfont">&#xe7a5;</span>
                        </div>
                    </li>
                    <li class="record-tab-item flex">
                        <p class="record-tab-item-title">充值时间</p>
                        <div class="calendar record-dropdown dropdown flex">
                            <span class="iconfont">&#xe627;</span>
                            <span class="startTime">开始日期</span>
                            至
                            <span class="endTime">结束日期</span>
                        </div>
                    </li>
                    <li class="record-tab-item flex">
                        <button class="queryBtn recordBtn" id="recordBtn">查询</button>
                    </li>
                </ul>
                <div class="record-result  query-result">
                    <table cellpadding="0" rules="rows" cellspacing="0">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>充值时间</th>
                                <th>充值订单号</th>
                                <th>付款金额</th>
                                <th>充值方式</th>
                                <th>流量币</th>
                                <th>充值状态</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as  $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->no}}</td>
                                <td>{{$item->total_amount}}</td>
                                <td>{{$item->payment_method}}</td>
                                <td>{{$item->getIntTokens($item->total_amount)}}</td>
                                <td>
                                  @if ($item->paid_at)
                                    已支付
                                  @else
                                      @if ($item->pay_status=="closed")
                                            已关闭
                                      @else
                                          待支付
                                      @endif
                                  @endif
                                </td>
                            </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>

                <div class="statistics flex">
                    <div class="statistics-total flex">
                        <p>
                            共有
                            <span class="statistics-total-data">{{$orders->total()}}</span>
                            条数据
                        </p>
                        <p>
                            每页显示条数
                            <select name="" id="" class="visibleData">
                                <option value="20">20条</option>
                                <option value="30">30条</option>
                                <option value="50">50条</option>
                                <option value="100">100条</option>
                                <option value="200">200条</option>
                            </select>
                        </p>
                    </div>
                    <div class="statistics-page">
                      {{ $orders->links() }}
                        <!--<span class="prev">上一页</span>
                        <span class="page">1</span>
                        <span class="next">下一页</span>
                        共<span class="total-page">1</span>页
                        跳至
                        <input type="text" class="whichPage" value="1" />
                        <button class="go">GO</button>
                        -->
                    </div>
                </div>
            </div>

            <!-- 选项卡3:消费明细 -->
            <div class="spending-details">
                <ul class="spending-tab flex">
                    <li class="spending-tab-item flex">
                        <p class="spending-tab-title">收支类型</p>
                        <div class="spending-dropdown dropdown flex">
                            全部
                            <span class="iconfont">&#xe7a5;</span>
                        </div>
                    </li>
                    <li class="spending-tab-item flex">
                        <p class="spending-tab-title">消费时间</p>
                        <div class="calendar spending-dropdown dropdown flex">
                            <span class="iconfont">&#xe627;</span>
                            <span class="startTime">开始日期</span>
                            至
                            <span class="endTime">结束日期</span>
                        </div>
                    </li>
                    <li class="spending-tab-item flex">
                        <button class="queryBtn">查询</button>
                    </li>
                </ul>
                <div class="spending-result query-result">
                    <table cellpadding="0" rules="rows" cellspacing="0">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>消费时间</th>
                                <th>任务ID</th>
                                <th>收支类型</th>
                                <th>收支明细</th>
                                <th>流量币</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userPrices as  $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->id}}</td>
                                <td>
                                   @if ($item->type ==1)
                                       消费
                                   @elseif($item->type==2)
                                        提现
                                    @elseif($item->type==3)
                                        推广提成
                                   @endif 

                                </td>
                                <td>{{$item->remark}}</td>
                                <td>{{$item->price}}</td>
                            </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                  
                </div>
            </div>
            <!-- 选项卡4：客服处理 -->
            <div class="customer-servicr">
                <ul class="customer-tab flex">
                    <li class="customer-tab-item flex">
                        <p class="customer-tab-title">消费时间</p>
                        <div class="calendar customer-dropdown dropdown flex">
                            <span class="iconfont">&#xe627;</span>
                            <span class="startTime">开始日期</span>
                            至
                            <span class="endTime">结束日期</span>
                        </div>
                    </li>
                    <li class="customer-tab-item">
                        <button class="queryBtn">查询</button>
                    </li>
                </ul>
                <div class="customer-servicr-result query-result">
                    <table cellpadding="0" rules="rows" cellspacing="0">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>充值时间</th>
                                <th>收支类型</th>
                                <th>变更说明</th>
                                <th>流量币</th>
                                <th>账户剩余流量币</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="no-data">暂无数据</div>
                </div>
            </div>

        </div>


@stop
@section('scripts')
  <script type="text/javascript" src="{{ asset('js/payment.js') }}"></script>
@stop