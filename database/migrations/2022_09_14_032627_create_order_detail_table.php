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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id('id');
            // $table->string('Order_detail_ID');
            $table->unsignedBigInteger('OrderID');
            $table->foreign('OrderID')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('id')->on('product')->onUpdate('cascade')->onDelete('cascade');

            $table->string('ProductName');
            $table->unsignedBigInteger('SizeID');
            $table->foreign('SizeID')->references('id')->on('size')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('ColorID');
            $table->foreign('ColorID')->references('id')->on('color')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('Price');
            $table->integer('TotalPrice'); 
                   
            
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
        Schema::dropIfExists('order_detail');
    }
};
