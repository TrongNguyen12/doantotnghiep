<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_name');
            $table->string('customer_code');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('customer_addr')->nullable();
            $table->string('customer_nodes')->nullable();
            $table->date('customer_birthday')->nullable();
            $table->tinyInteger('customer_gender');
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
        Schema::dropIfExists('vp_customers');
    }
}
