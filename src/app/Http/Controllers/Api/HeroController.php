<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        return response()->json(Hero::with('realm')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'alive' => 'required|boolean',
            'realm_id' => 'required|exists:realms,id',
        ]);

        $hero = Hero::create($request->all());

        return response()->json($hero, 201);
    }

    public function show(string $id)
    {
        $hero = Hero::with(['realm', 'artifacts'])->find($id);

        if (!$hero) {
            return response()->json(['message' => 'Héroe no encontrado'], 404);
        }

        return response()->json($hero);
    }

    public function update(Request $request, string $id)
    {
        $hero = Hero::find($id);

        if (!$hero) {
            return response()->json(['message' => 'Héroe no encontrado'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'race' => 'sometimes|required|string|max:255',
            'rank' => 'sometimes|required|string|max:255',
            'alive' => 'sometimes|required|boolean',
            'realm_id' => 'sometimes|required|exists:realms,id',
        ]);

        $hero->update($request->all());

        return response()->json($hero);
    }

    public function destroy(string $id)
    {
        $hero = Hero::find($id);

        if (!$hero) {
            return response()->json(['message' => 'Héroe no encontrado'], 404);
        }

        $hero->delete();

        return response()->json(['message' => 'Héroe eliminado']);
    }
}