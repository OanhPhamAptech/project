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
            $table->id('id');
            // $table->string('OrderID');
            $table->integer('Total');
            $table->string('phone',11);
            $table->string('address');
            $table->string('email');
            $table->boolean('Status');
            $table->unsignedBigInteger('CustomerID');
            $table->foreign('CustomerID')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('order');
    }
};
