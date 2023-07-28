<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description');
            $table->boolean('status')->default(0);
            $table->integer('hotel_id')->unsigned();
            $table->integer('roomtype_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('roomtype_id')->references('id')->on('roomtypes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
