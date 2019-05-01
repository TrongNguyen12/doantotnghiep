<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_supplier', function (Blueprint $table) {
            $table->increments('supplier_id');
            $table->string('supplier_code');
            $table->string('supplier_name');
            $table->string('supplier_phone');
            $table->string('supplier_email');
            $table->string('supplier_addr');
            $table->string('supplier_notes')->nullable();
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
        Schema::dropIfExists('vp_supplier');
    }
}
