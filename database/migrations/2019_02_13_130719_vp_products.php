<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_products', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->string('prod_code');
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_origin_price');// gia goc
            $table->integer('prod_sell_price')->nullable();// gia km
            $table->integer('prod_quantity');// so luong sp 
            $table->string('prod_img')->nullable();
            $table->string('prod_more_img')->nullable();
            $table->string('prod_descriptions')->nullable();
            $table->tinyInteger('prod_status');
            $table->tinyInteger('prod_hot');
            $table->tinyInteger('prod_new');
            $table->integer('prod_cate')->unsigned();
            $table->foreign('prod_cate')
                  ->references('cate_id')
                  ->on('vp_categories')
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
        Schema::dropIfExists('vp_products');
    }
}
