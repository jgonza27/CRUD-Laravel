<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    // Listar todos los personajes
    public function index(Request $request)
{
    $query = Character::query();

    // Si la URL trae ?race=Elf, filtramos
    if ($request->has('race')) {
        $query->where('race', $request->input('race'));
    }

    return response()->json($query->paginate(15));
}

    // Crear un nuevo personaje
    public function store(Request $request)
    {
        // Validamos que al menos tenga nombre y raza
        $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
        ]);

        $character = Character::create($request->all());

        return response()->json([
            'message' => '¡Personaje creado en la Tierra Media!',
            'data' => $character
        ], 201);
    }

    // Mostrar un personaje concreto
    public function show(string $id)
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Personaje no encontrado'], 404);
        }

        return response()->json($character);
    }

    // Actualizar un personaje
    public function update(Request $request, string $id)
{
    $character = Character::find($id);
    if (!$character) { ... } // Tu código 404

    // Validar antes de actualizar (usamos 'sometimes' para que no sea obligatorio enviar todo)
    $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'race' => 'sometimes|required|string|max:255',
    ]);

    $character->update($request->all());
    // ...
}

    // Eliminar un personaje
    public function destroy(string $id)
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Personaje no encontrado'], 404);
        }

        $character->delete();

        return response()->json(['message' => 'Personaje eliminado']);
    }
}