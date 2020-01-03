<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->commetn("外键，关联用户表");
            $table->string('plant')->index()->comment("平台名称");
            $table->string('task')->comment("任务类型，流量任务/收藏任务");
            $table->string('type')->comment('任务类型，如APP流量,搜索收藏');
            $table->string('pro_url')->comment("商品链接");
            $table->string('pro_title')->comment('商品标题');
            $table->string('keyword')->nullable()->comment("关键词，允许为空");
            $table->unsignedBigInteger('show')->default(1)->comment('展现比例默认1');
            $table->dateTime('start_time')->comment('任务开始时间');
            $table->string('custom_1')->comment('自定义要求1');
            $table->string('custom_2')->comment('自定义要求2');
            $table->string('custom_3')->comment('自定义要求3');
            $table->string('custom_4')->comment('自定义要求4');
            $table->text('remark')->comment("任务备注");
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
        Schema::dropIfExists('tasks');
    }
}
