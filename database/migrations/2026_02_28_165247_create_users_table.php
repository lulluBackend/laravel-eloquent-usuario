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
            $table->string('nome');
            $table->string('email')->unique(); // email único
            $table->string('senha');

            // Chave estrangeira 1:1 para Profile
            $table->foreignId('id_perfil')
                  ->unique() // garante 1:1
                  ->constrained('profiles') // tabela relacionada
                  ->onDelete('cascade'); // se o perfil for deletado, usuário também

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};