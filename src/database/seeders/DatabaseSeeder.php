<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call([
            RegionSeeder::class,
            RealmSeeder::class,
            HeroeSeeder::class,
            CreatureSeeder::class,
            ArtifactSeeder::class,
            ArtifactHeroSeeder::class,
        ]);
    }
}