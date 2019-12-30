<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('interval_price')->index()->comment("金额区间上限如0-50，填写50");
            $table->decimal('give_price')->default(0)->comment('总送金额，如200-500元赠送10元，默认零');
            $table->unsignedBigInteger('base')->default(1)->comment('基础倍数。1默认1，');
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
        Schema::dropIfExists('products');
    }
}
