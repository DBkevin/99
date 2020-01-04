<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userpriceinfo extends Model
{
    //修改表名
    protected $table='users_price_info';
    //允许写入字段
    protected $fillable = [
        'users_id',
        'type',
        'price',
        'remark',
    ];
    /**
     * 反向关联用户表，多对1
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
