<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpInputbillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_inputbill_detail', function (Blueprint $table) {
            $table->increments('ipBD_id');
            $table->integer('ipBD_ipB_id')->unsigned();
            $table->integer('ipBD_pro_id')->unsigned();
            $table->integer('ipBD_quantity');
            $table->integer('ipBD_price');
            $table->integer('ipBD_total');

            $table->foreign('ipBD_ipB_id')
                  ->references('ipB_id')
                  ->on('vp_inputbill')
                  ->onDelete('cascade');

            $table->foreign('ipBD_pro_id')
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
        Schema::dropIfExists('vp_inputbill_detail');
    }
}
