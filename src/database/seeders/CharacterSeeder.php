<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character; 

class CharacterSeeder extends Seeder
{
    
    public function run(): void
    {
        Character::create([
            'name' => 'Gandalf',
            'race' => 'Maia',
            'kingdom' => 'Orden de los Istari',
            'weapon' => 'Vara y Glamdring',
            'description' => 'El Mago Gris, guía de la Comunidad del Anillo y enemigo de Sauron.'
        ]);

        Character::create([
            'name' => 'Aragorn',
            'race' => 'Humano',
            'kingdom' => 'Gondor',
            'weapon' => 'Andúril',
            'description' => 'Heredero de Isildur y legítimo Rey de Gondor.'
        ]);

        Character::create([
            'name' => 'Legolas',
            'race' => 'Elfo',
            'kingdom' => 'Bosque Negro',
            'weapon' => 'Arco de los Galadhrim',
            'description' => 'Príncipe del Reino del Bosque y miembro de la Comunidad.'
        ]);
        
    }
}