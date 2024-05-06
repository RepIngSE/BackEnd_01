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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id');
            $table->integer('qrcode_owner_id')->nullable(); 
            $table->unsignedInteger('qrcode_id');
            $table->foreign('qrcode_id')->references('id')->on('qrcodes')->onDelete('cascade'); 
            $table->string('payment_method')->nullable(); 
            $table->longText('message')->nullable(); 
            $table->float('amount',10, 4);
            $table->string('status')->default('initiated'); 
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
