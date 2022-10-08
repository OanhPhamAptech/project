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
        Schema::create('comment', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('id')->on('product')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('cusID');
            $table->foreign('cusID')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Content');
            $table->float('Vote',1,1);
            $table->boolean('Status');
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
        Schema::dropIfExists('_comment');
    }
};
