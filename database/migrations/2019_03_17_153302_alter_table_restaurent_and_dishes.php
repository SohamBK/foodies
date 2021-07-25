<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRestaurentAndDishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurents', function (Blueprint $table) {
            $table->string('food_type')->nullabel()->default(5)->after('type');
            $table->string('timing')->nullabel()->timestamp()->after('food_type');
            $table->string('weekly_off')->nullabel()->integer(5)->after('timing');
            $table->string('special_holiday')->nullabel()->timestamp()->after('weekly_off');
            $table->string('payment_method')->nullabel()->integer()->after('special_holiday');
        });

        Schema::table('dishes', function (Blueprint $table) {
            $table->string('restaurent_id')->integer()->after('dish_for');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
