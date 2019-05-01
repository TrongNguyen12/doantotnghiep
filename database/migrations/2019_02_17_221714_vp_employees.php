<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_employees', function (Blueprint $table) {
            $table->increments('em_id');
            $table->string('em_name');
            $table->tinyInteger('em_sex');
            $table->date('em_birthday');
            $table->string('em_phone');
            $table->string('em_address');
            $table->string('em_email');
            $table->string('em_title');
            $table->string('em_img')->nullable();
            $table->tinyInteger('em_status');
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
        Schema::dropIfExists('vp_employees');
    }
}
