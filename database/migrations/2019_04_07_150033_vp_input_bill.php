<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpInputBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_inputbill', function (Blueprint $table) {
            $table->increments('ipB_id');
            $table->string('ipB_code');
            $table->integer('ipB_user_init');
            $table->integer('ipB_supplier_id');
            $table->string('ipB_nodes')->nullable();;
            $table->tinyInteger('ipB_payment_method');
            $table->integer('ipB_coupon')->nullable();
            $table->integer('ipB_total_money');
            $table->integer('ipB_shop_pay');
            $table->integer('ipB_lake')->nullable();
            $table->integer('ipB_total_quantity');
            $table->tinyInteger('ipB_status');
            $table->tinyInteger('ipB_deleted')->nullable();
            $table->integer('ipB_user_deleted')->nullable();
            $table->timestamp('ipB_created')->nullable();
            $table->timestamp('ipB_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_inputbill');
    }
}
