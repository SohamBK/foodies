<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rest_id');
            $table->integer('star_couont');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rest_id');
            $table->string('comment');
            $table->smallInteger('status')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

        Schema::create('addtofavorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rest_id');
            $table->integer('user_id');
            $table->smallInteger('status')->nullable();
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
        Schema::dropIfExists('stars');
    }
}
