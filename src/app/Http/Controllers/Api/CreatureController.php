<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Creature;
use Illuminate\Http\Request;

class CreatureController extends Controller
{
    public function index()
    {
        return response()->json(Creature::with('region')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'threat_level' => 'required|integer|min:1|max:10',
            'region_id' => 'required|exists:regions,id',
        ]);

        $creature = Creature::create($request->all());

        return response()->json($creature, 201);
    }

    public function show(string $id)
    {
        $creature = Creature::with('region')->find($id);

        if (!$creature) {
            return response()->json(['message' => 'Criatura no encontrada'], 404);
        }

        return response()->json($creature);
    }

    public function update(Request $request, string $id)
    {
        $creature = Creature::find($id);

        if (!$creature) {
            return response()->json(['message' => 'Criatura no encontrada'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'species' => 'sometimes|required|string|max:255',
            'threat_level' => 'sometimes|required|integer|min:1|max:10',
            'region_id' => 'sometimes|required|exists:regions,id',
        ]);

        $creature->update($request->all());

        return response()->json($creature);
    }

    public function destroy(string $id)
    {
        $creature = Creature::find($id);

        if (!$creature) {
            return response()->json(['message' => 'Criatura no encontrada'], 404);
        }

        $creature->delete();

        return response()->json(['message' => 'Criatura eliminada']);
    }

    public function getDangerous(Request $request)
    {
        $level = $request->query('level', 8); 
        return response()->json(Creature::where('threat_level', '>=', $level)->get());
    }
}