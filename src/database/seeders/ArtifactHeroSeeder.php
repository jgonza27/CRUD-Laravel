<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtifactHeroSeeder extends Seeder {
    public function run() {
        // Artifact IDs: 1=Anillo, 2=Anduril, 3=Arco
        // Hero IDs: 1=Aragorn, 2=Legolas, 3=Gimli, 4=Frodo
        DB::table('artifact_hero')->insert([
            ['artifact_id' => 1, 'hero_id' => 4], // Frodo lleva el Anillo Único
            ['artifact_id' => 2, 'hero_id' => 1], // Aragorn lleva la espada Andúril
            ['artifact_id' => 3, 'hero_id' => 2], // Legolas lleva el "Arco de Legolas"
        ]);
    }
}
