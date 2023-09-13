<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resturant_id');
            $table->foreign('resturant_id')->references('id')->on('resturants');
            $table->string('address');
            $table->string('customer_email');
            $table->string('customer_name');
            $table->string('customer_surname');
            $table->time('delivery_time');
            $table->float('total_price', 6,2);
            $table->text('note');
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
        Schema::dropIfExists('orders');
    }
};
