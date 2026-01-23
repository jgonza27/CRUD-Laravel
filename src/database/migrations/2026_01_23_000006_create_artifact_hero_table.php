<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabla pivote para la relación muchos a muchos entre artifacts y heroes
        Schema::create('artifact_hero', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artifact_id')->constrained()->onDelete('cascade');
            $table->foreignId('hero_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['artifact_id', 'hero_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artifact_hero');
    }
};