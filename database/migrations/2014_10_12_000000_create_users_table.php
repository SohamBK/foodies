<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     $table->string('username');
        //     $table->string('first_name')->nullable();
        //     $table->string('last_name')->nullable();
        //     $table->string('mobile');
        //     $table->integer('media_id')->nullable();
        //     $table->string('email')->unique();
        //     $table->string('role');
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
