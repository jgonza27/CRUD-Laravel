<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtifactHeroSeeder extends Seeder {
    public function run() {
        
        DB::table('artifact_hero')->insert([
            ['artifact_id' => 1, 'hero_id' => 4], 
            ['artifact_id' => 2, 'hero_id' => 1], 
            ['artifact_id' => 3, 'hero_id' => 2], 
        ]);
    }
}
