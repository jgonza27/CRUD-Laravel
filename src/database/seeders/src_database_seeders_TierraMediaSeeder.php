<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Realm;
use App\Models\Hero;
use App\Models\Creature;
use App\Models\Artifact;

class TierraMediaSeeder extends Seeder
{
    public function run(): void
    {
        // Regiones
        $eriador = Region::create(['name' => 'Eriador']);
        $gondor = Region::create(['name' => 'Gondor']);
        $rohan = Region::create(['name' => 'Rohan']);
        $mordor = Region::create(['name' => 'Mordor']);

        // Reinos
        $laComarca = Realm::create([
            'name' => 'La Comarca',
            'ruler' => 'Alcalde de Cavada Grande',
            'alignment' => 'Bien',
            'region_id' => $eriador->id
        ]);

        $minasTirith = Realm::create([
            'name' => 'Minas Tirith',
            'ruler' => 'Aragorn',
            'alignment' => 'Bien',
            'region_id' => $gondor->id
        ]);

        $edoras = Realm::create([
            'name' => 'Edoras',
            'ruler' => 'Éomer',
            'alignment' => 'Bien',
            'region_id' => $rohan->id
        ]);

        $baradDur = Realm::create([
            'name' => 'Barad-dûr',
            'ruler' => 'Sauron',
            'alignment' => 'Mal',
            'region_id' => $mordor->id
        ]);

        // Héroes
        $aragorn = Hero::create([
            'name' => 'Aragorn',
            'race' => 'Humano',
            'rank' => 'Rey',
            'alive' => true,
            'realm_id' => $minasTirith->id
        ]);

        $frodo = Hero::create([
            'name' => 'Frodo Bolsón',
            'race' => 'Hobbit',
            'rank' => 'Portador del Anillo',
            'alive' => true,
            'realm_id' => $laComarca->id
        ]);

        $legolas = Hero::create([
            'name' => 'Legolas',
            'race' => 'Elfo',
            'rank' => 'Príncipe',
            'alive' => true,
            'realm_id' => $edoras->id
        ]);

        // Criaturas
        Creature::create([
            'name' => 'Shelob',
            'species' => 'Araña Gigante',
            'threat_level' => 8,
            'region_id' => $mordor->id
        ]);

        Creature::create([
            'name' => 'Balrog de Morgoth',
            'species' => 'Maia corrompido',
            'threat_level' => 10,
            'region_id' => $eriador->id
        ]);

        // Artefactos
        $anduril = Artifact::create([
            'name' => 'Andúril',
            'type' => 'Espada',
            'power_level' => 95,
            'description' => 'La Llama del Oeste, forjada de los fragmentos de Narsil',
            'origin_realm_id' => $minasTirith->id
        ]);
        $anduril->heroes()->attach($aragorn->id);

        $dardo = Artifact::create([
            'name' => 'Dardo',
            'type' => 'Espada',
            'power_level' => 60,
            'description' => 'Espada élfica que brilla cuando hay orcos cerca',
            'origin_realm_id' => $laComarca->id
        ]);
        $dardo->heroes()->attach($frodo->id);
    }
}