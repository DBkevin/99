<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPriceInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_price_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id')->comment('用户ID,外键，关联users_id,级联删除');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('type')->default(0)->comment('类型，1消费，2提现，0充值');
            $table->decimal('price')->comment('本次消费金额');
            $table->string('remark')->comment('消费说明');
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
        Schema::dropIfExists('users_price_info');
    }
}
