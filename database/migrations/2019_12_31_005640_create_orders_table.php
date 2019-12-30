<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no')->unique();
            $table->unsignedBigInteger('user_id')->commetn("外键，级联User");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('price',10,2)->comment('本次充值金额');
            $table->decimal('give_price',10,2)->comment('赠送金额');
            $table->decimal('total_amount', 10, 2)->commetn("总金额，包含赠送金额");
            $table->string('payment_method')->default('alipay')->comment('支付方式，默认支付宝');
            $table->string('pay_status')->default(\App\Models\Order::PAY_STATUS_PENDING)->comment('订单状态');
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
