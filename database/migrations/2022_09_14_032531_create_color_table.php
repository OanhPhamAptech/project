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
        Schema::create('color', function (Blueprint $table) {
            $table->id('id');
            // $table->string('ColorID');
            $table->string('ColorName');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('size')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('Quantity');
            // $table->string('Status');
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
        Schema::dropIfExists('color');
    }
};
