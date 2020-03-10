<?php 
 
namespace App\Providers;

use Monolog\Logger;
use Yansongda\Pay\Pay;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       // 往服务容器中注入一个名为 alipay 的单例对象
        $this->app->singleton('alipay',function(){
            $config=config('pay.alipay');
            $config['notify_url']="http://requestbin.net/r/z4vknyz4";//测试用需要去http://requestbin.net/ 申请
            //$config['notify_url'] = route('payment.alipay.notify'); //后端回调地址
            $config['return_url'] = route('payment.alipay.return');//前端回调地址
            //判断当前项目是否上线
            if(app()->environment() !=='production'){
                $config['mode']='dev';
                $config['log']['level']=Logger::DEBUG;
            }else{
                $config['log']['level']=Logger::WARNING;
           }
           return Pay::alipay($config);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
