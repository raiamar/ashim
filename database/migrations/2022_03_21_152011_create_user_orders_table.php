<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('buyer_name');
            $table->string('contact');
            $table->string('email');
            $table->string('address');
            $table->string('specefics');
            $table->string('total');
            $table->string('order_id');
            $table->string('status')->default('unpaid');
            $table->string('payment')->default('payment on delevery');
            $table->string('details');
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
        Schema::dropIfExists('user_orders');
    }
}
