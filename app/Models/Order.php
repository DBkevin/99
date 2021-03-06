<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    const PAY_STATUS_PENDING = 'pending';
    const PAY_STATUS_SUCCESS = 'success';
    const PAY_STATUS_CLOSED='closed';
    public static $PAYStatusMap = [
        self::PAY_STATUS_PENDING    => '未支付',
        self::PAY_STATUS_SUCCESS    => '支付成功',
        self::PAY_STATUS_CLOSED     =>"超时关闭",
    ];
    protected $fillable = [
        'no',
        'price',
        'give_price',
        'total_amount',
        'pay_status',
        'payment_method',
        'payment_no',
        'paid_at',
    ];
    protected $dates = [
        'paid_at',
    ];
    public function getIntTokens($value){
        return intval($value)* config('app.tokensPH');
    }

    protected static function boot()
    {
        parent::boot();
        // 监听模型创建事件，在写入数据库之前触发
        static::creating(function ($model) {
            // 如果模型的 no 字段为空
            if (!$model->no) {
                // 调用 findAvailableNo 生成订单流水号
                $model->no = static::findAvailableNo();
                // 如果生成失败，则终止创建订单
                if (!$model->no) {
                    return false;
                }
            }
        });
    }
    /**
     * 管理User
     *
     * @return void
     */
     public function user()
    {
        return $this->belongsTo(User::class);
    }
     public static function findAvailableNo()
    {
        // 订单流水号前缀
        $prefix = date('YmdHis');
        for ($i = 0; $i < 10; $i++) {
            // 随机生成 6 位的数字
            $no = $prefix.str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            // 判断是否已经存在
            if (!static::query()->where('no', $no)->exists()) {
                return $no;
            }
        }
        \Log::warning('find order no failed');

        return false;
    }
}
