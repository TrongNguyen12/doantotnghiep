<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_orders', function (Blueprint $table) {
            $table->increments('ord_id');
            $table->string('ord_code');
            $table->integer('ord_user_init');
            $table->integer('ord_customer_id');
            $table->integer('ord_store_id');
            $table->string('ord_nodes')->nullable();;
            $table->tinyInteger('ord_payment_method');
            $table->integer('ord_total_price');
            $table->integer('ord_total_origin_price');
            $table->integer('ord_coupon')->nullable();
            $table->integer('ord_total_money');
            $table->integer('ord_customer_pay');
            $table->integer('ord_lake')->nullable();
            $table->integer('ord_total_quantity');
            $table->tinyInteger('ord_status');
            $table->tinyInteger('ord_source');
            $table->tinyInteger('ord_deleted')->nullable();
            $table->integer('ord_user_deleted')->nullable();
            $table->timestamp('ord_created')->nullable();
            $table->timestamp('ord_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_orders');
    }
}
