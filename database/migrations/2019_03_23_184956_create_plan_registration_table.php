<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_registration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile_no');
            $table->text('address');
            $table->tinyInteger('status')->default(0);
            $table->integer('fee');
            $table->string('order_id');
            $table->string('transaction_id')->default(0);
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_registration');
    }
}
