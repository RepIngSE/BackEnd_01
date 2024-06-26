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
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('website')->nullable(); 
            $table->string('company_name'); 
            $table->string('product_name');
            $table->string('product_url')->nullable();
            $table->string('callback_url');
            $table->string('qrcode_path')->nullable(); 
            $table->float('amount',10, 4);
            $table->tinyInteger('status')->default(1)->nullable(); 
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcodes');
    }
};
