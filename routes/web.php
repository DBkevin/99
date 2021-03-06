<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});
Route::get('signup', 'UsersController@create')->name('signup');//显示注册
Route::post('users','UsersController@store')->name('users.store');//注册
Route::patch('users/uppasswd','UsersController@uppasswd')->name('patchrestpasswd');//重置密码
Route::get('restpasswd', 'UsersController@restpasswd')->name('restpasswd');//重置页面
Route::get('login','UsersController@showLoginForm')->name('login');//显示登陆
Route::post('login','UsersController@login')->name('users.login');//登陆
Route::post('logout','UsersController@logout')->name('uses.logout');//退出登陆
Route::group(['middleware'=>['auth']],function(){
    Route::get('users','UsersController@show')->name('users.show');
    Route::get('payment','PostController@show')->name('post.show');
    Route::post('order','OrderController@store')->name('order.store');
    Route::get('payment/{order}/alipay', 'OrderController@payByAlipay')->name('payment.alipay'); //支付路由
    Route::get('payment/alipay/return', 'OrderController@alipayReturn')->name('payment.alipay.return');//支付前端回调
    Route::post('task','TaskController@store')->name('task.store');//新建任务
    Route::get('pdd/create','TaskController@pddindex')->name('pdd.index');//PDD新建
    Route::get('pdd/shouchang-create','TaskController@pddshouchang')->name('pdd.shouchang');//PDD收藏
    Route::get('JD/create','TaskController@jdindex')->name('jd.index');//jd新建
    Route::get('JD/shouchang-create','TaskController@jdshouchang')->name('jd.shouchang');//jd收藏
    Route::get('tb/create','TaskController@tbindex')->name('tb.index');//PDD新建
    Route::get('tb/shouchang-create','TaskController@tbshouchang')->name('tb.shouchang');//PDD新建
    Route::get('rates','RatesController@index')->name('rates.index');//
    Route::get("modify-password","UsersController@modifyPassword")->name('modify-password');
    Route::get("mission-search",'TaskController@index')->name('task.list');
    Route::get('spread','UsersController@spread')->name('users.spread');
    Route::delete('logout', 'UsersController@destroy')->name('logout');
});
   Route::post('payment/alipay/notify', 'OrderController@alipayNotify')->name('payment.alipay.notify');//支付后端回调

Route::get('alipay', function() {
    return app('alipay')->web([
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject' => 'test subject - 测试',
    ]);
});