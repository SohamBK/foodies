<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('delivery_staffs', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('restaurent_name');
        //     $table->string('first_name');
        //     $table->string('last_name');
        //     $table->string('email')->unique();
        //     $table->string('mobile');
        //     $table->string('password');
        //     $table->smallInteger('status');
        //     $table->timestamps();
        //     $table->integer('created_by')->nullable();
        //     $table->integer('updated_by')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_staffs');
    }
}
