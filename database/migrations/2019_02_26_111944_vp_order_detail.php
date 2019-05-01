<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_order_detail', function (Blueprint $table) {
            $table->increments('orde_id');
            $table->integer('orde_ord_id')->unsigned();
            $table->integer('orde_pro_id')->unsigned();
            $table->integer('orde_quantity');
            $table->integer('orde_price');
            $table->integer('order_total');

            $table->foreign('orde_ord_id')
                  ->references('ord_id')
                  ->on('vp_orders')
                  ->onDelete('cascade');

            $table->foreign('orde_pro_id')
                  ->references('prod_id')
                  ->on('vp_products')
                  ->onDelete('cascade');
            

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
        Schema::dropIfExists('vp_order_detail');
    }
}
