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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price')->nullable();
            $table->string('bank')->nullable();
            $table->string('bankTranNo')->nullable(); //mã giao dịch tại ngân hàng
            $table->string('cardType')->nullable();
            $table->string('date')->nullable();
            $table->string('transactionNo')->nullable(); // mã ghi nhận tại hệ thống
            $table->string('responseCode')->nullable();
            $table->string('transactionStatus')->nullable();
            $table->string('txnRef')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
