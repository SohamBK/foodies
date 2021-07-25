<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForAddressAndUserAddresAndRestaturent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('addresses', function (Blueprint $table) {
        //     $table->engine ='InnoDB';
        //     $table->increments('id');
        //     $table->string('address');
        //     $table->integer('city_id')->length(10)->unsigned();
        //     $table->integer('area_id')->length(10)->unsigned();
        //     $table->integer('zip_code');
        //     $table->string('alternate_phone_number')->nullable();
        //     $table->smallInteger('status');
        //     $table->timestamps();
        //     $table->integer('created_by')->nullable();
        //     $table->integer('updated_by')->nullable();
        // });
        
        // Schema::create('user_address', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     $table->integer('user_id')->length(10)->unsigned();
        //     $table->integer('address_id')->length(10)->unsigned();
        //     $table->smallInteger('type')->nullable();
        //     $table->smallInteger('status');
        //     $table->timestamps();
        //     $table->integer('created_by')->nullable();
        //     $table->integer('updated_by')->nullable();
        // });
        
        // Schema::create('restaurents', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     $table->integer('user_id')->length(10)->unsigned();
        //     $table->string('name');
        //     $table->integer('number_of_outlet')->nullable();
        //     $table->string('category');
        //     $table->string('website_address')->nullable();
        //     $table->smallInteger('type')->nullable();
        //     $table->string('shop_register_number');
        //     $table->string('gstn');
        //     $table->string('fssai');
        //     $table->string('subscription')->nullable();
        //     $table->timestamp('subscription_end_date')->nullable();
        //     $table->integer('facade_id')->nullable();
        //     $table->integer('kitchen_id')->nullable();
        //     $table->integer('dp_id')->nullable();
        //     $table->integer('locality_id')->nullable();
        //     $table->smallInteger('status');
        //     $table->timestamps();
        //     $table->integer('created_by')->nullable();
        //     $table->integer('updated_by')->nullable();
        // });

       // Schema::table('addresses', function (Blueprint $table) {
            // $table->foreign('city_id')
            //         ->references('id')->on('cities');
                    //->onDelete('SET NULL');
            // $table->foreign('area_id')
            //         ->references('id')->on('city_areas');
                    //->onDelete('set null');
       // });

        Schema::table('user_address', function (Blueprint $table) {
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            // $table->foreign('address_id')
            //         ->references('id')->on('addresses')
            //         ->onDelete('cascade');
        });

        Schema::table('restaurents', function (Blueprint $table) {
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_for_address_and_user_addres_and_restaturent');
    }
}
