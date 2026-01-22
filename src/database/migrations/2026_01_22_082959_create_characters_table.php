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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del personaje
            $table->string('race'); // Raza (Humano, Elfo, Enano...)
            $table->string('kingdom')->nullable(); // Reino o facción
            $table->string('weapon')->nullable(); // Arma principal
            $table->text('description')->nullable(); // Descripción
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
