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
