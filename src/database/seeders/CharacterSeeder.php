<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character; // <--- ¡IMPORTANTE: No olvides esta línea!

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Personaje 1: Gandalf
        Character::create([
            'name' => 'Gandalf',
            'race' => 'Maia',
            'kingdom' => 'Orden de los Istari',
            'weapon' => 'Vara y Glamdring',
            'description' => 'El Mago Gris, guía de la Comunidad del Anillo y enemigo de Sauron.'
        ]);

        // Personaje 2: Aragorn
        Character::create([
            'name' => 'Aragorn',
            'race' => 'Humano',
            'kingdom' => 'Gondor',
            'weapon' => 'Andúril',
            'description' => 'Heredero de Isildur y legítimo Rey de Gondor.'
        ]);

        // Personaje 3: Legolas
        Character::create([
            'name' => 'Legolas',
            'race' => 'Elfo',
            'kingdom' => 'Bosque Negro',
            'weapon' => 'Arco de los Galadhrim',
            'description' => 'Príncipe del Reino del Bosque y miembro de la Comunidad.'
        ]);
        
        // Puedes añadir todos los que quieras copiando el bloque de arriba...
    }
}