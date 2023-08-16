<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('line_no');
            $table->string('location')->nullable();
            $table->string('device_a_rack_type')->nullable();
            $table->string('device_a_rack')->nullable();
            $table->string('device_a_ru')->nullable();
            $table->string('device_a_model')->nullable();
            $table->string('device_a_description')->nullable();
            $table->string('device_a_host_name')->nullable();
            $table->string('device_a_port')->nullable();
            $table->string('device_b_rack_type')->nullable();
            $table->string('device_b_rack')->nullable();
            $table->string('device_b_ru')->nullable();
            $table->string('device_b_model');
            $table->string('device_b_description')->nullable();
            $table->string('device_b_host_name')->nullable();
            $table->string('device_b_port')->nullable();
            $table->string('detailed_cable_info')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
