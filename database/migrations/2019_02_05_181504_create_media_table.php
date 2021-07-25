<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('media', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('alt');
        //     $table->string('file_name');
        //     $table->string('file_type');
        //     $table->integer('file_size');
        //     $table->string('type')->nullable();
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
        Schema::dropIfExists('media');
    }
}
