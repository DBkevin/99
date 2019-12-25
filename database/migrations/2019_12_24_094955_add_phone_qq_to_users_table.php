<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneQqToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone',11)->after('name')->unique()->comment("用户手机，不能为空,唯一");
            $table->string("qq",20)->nullable()->after('phone')->comment("QQ,可以为空");
            $table->Integer('level')->unsigned()->default(0)->after('remember_token')->comment("用户级别，默认0，0普通，1VIP，2xxx自行定义");
            $table->decimal('price')->index()->after('level')->comment('当前金额');
            $table->decimal('total_price')->after('price')->comment('累计充值金额');
            $table->decimal('payment')->after('total_price')->comment('累计消费金额');
            $table->decimal('tixian_price')->after('payment')->comment('累计提现金额');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('qq');
            $table->dropColumn('level');
            $table->dropColumn('price');
            $table->dropColumn('total_price');
            $table->dropColumn('payment');
            $table->dropColumn('tixian_price');

        });
    }
}
