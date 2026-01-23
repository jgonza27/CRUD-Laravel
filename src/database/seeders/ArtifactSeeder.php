<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtifactSeeder extends Seeder {
    public function run() {
        // Realm IDs: Gondor=1, Rohan=2, Mordor=3, Erebor=4
        DB::table('artifacts')->insert([
            ['name' => 'Anillo Único', 'type' => 'Anillo', 'origin_realm_id' => 3, 'power_level' => 100, 'description' => 'Poder absoluto de Sauron'],
            ['name' => 'Andúril', 'type' => 'Espada', 'origin_realm_id' => 1, 'power_level' => 85, 'description' => 'Espada de Aragorn'],
            ['name' => 'Arco de Legolas', 'type' => 'Arco', 'origin_realm_id' => 2, 'power_level' => 70, 'description' => 'Arco del príncipe elfo'],
        ]);
    }
}
