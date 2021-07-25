<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnInOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->smallInteger('discount_type')->after('name');
            $table->string('description')->after('name');
            $table->integer('coupon_limit')->nullable()->after('value');
            $table->timestamp('valid_from')->after('coupon_limit');
            $table->timestamp('valid_upto')->after('valid_from');
            $table->integer('minimum_order')->nullable()->after('valid_upto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            //
        });
    }
}
