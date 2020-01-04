<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plant')->index()->comment('平台名称');
            $table->string("type_name")->comment('项目名称,');
            $table->unsignedBigInteger('price')->comment('价格');
            $table->unsignedBigInteger('VIPprie')->comment("Vip的价格");
            $table->string('show_1')->comment("充值200每个任务的价格");
            $table->string('show_2')->comment("充值200每个任务的价格");
            $table->string('show_3')->comment("充值200每个任务的价格");
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
        Schema::dropIfExists('rates');
    }
}
