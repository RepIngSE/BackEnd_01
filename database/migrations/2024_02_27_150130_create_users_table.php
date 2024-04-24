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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('role_id')->default(3)->constrained('roles')->onDelete('cascade');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

        //Insertar usuario predeterminado
        DB::table('users')->insert([
            'name' => 'Sara Gabriela Cruz',
            'role_id' => 3, //asigna el ID del rol correspondiente 
            'phone_number' => '3206362195', 
            'email' => 'saragabrielacruz2603@gmail.com', //Correo estandar
            'password' => Hash::make('123456789'), //Contraseña estandar
            'created_at' => now(),
            'updated_at' =>now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
