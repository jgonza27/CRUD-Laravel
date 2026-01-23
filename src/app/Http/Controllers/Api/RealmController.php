<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Realm;
use Illuminate\Http\Request;

class RealmController extends Controller
{
    public function index()
    {
        return response()->json(Realm::with('region')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ruler' => 'required|string|max:255',
            'alignment' => 'required|in:Bien,Mal,Neutral',
            'region_id' => 'required|exists:regions,id',
        ]);

        $realm = Realm::create($request->all());

        return response()->json($realm, 201);
    }

    public function show(string $id)
    {
        $realm = Realm::with(['region', 'heroes'])->find($id);

        if (!$realm) {
            return response()->json(['message' => 'Reino no encontrado'], 404);
        }

        return response()->json($realm);
    }

    public function update(Request $request, string $id)
    {
        $realm = Realm::find($id);

        if (!$realm) {
            return response()->json(['message' => 'Reino no encontrado'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'ruler' => 'sometimes|required|string|max:255',
            'alignment' => 'sometimes|required|in:Bien,Mal,Neutral',
            'region_id' => 'sometimes|required|exists:regions,id',
        ]);

        $realm->update($request->all());

        return response()->json($realm);
    }

    public function destroy(string $id)
    {
        $realm = Realm::find($id);

        if (!$realm) {
            return response()->json(['message' => 'Reino no encontrado'], 404);
        }

        $realm->delete();

        return response()->json(['message' => 'Reino eliminado']);
    }

    public function stats(string $id)
    {
        $realm = Realm::with(['heroes', 'artifacts', 'region.creatures'])->find($id);

        if (!$realm) {
            return response()->json(['message' => 'Reino no encontrado'], 404);
        }

        $heroCount = $realm->heroes->where('alive', true)->count();
        $totalArtifactPower = $realm->artifacts->sum('power_level');
        
        // Calculate average threat in the region
        $avgThreat = 0;
        if ($realm->region && $realm->region->creatures->count() > 0) {
            $avgThreat = $realm->region->creatures->avg('threat_level');
        }

        return response()->json([
            'realm_name' => $realm->name,
            'stats' => [
                'living_heroes' => $heroCount,
                'total_artifact_power' => $totalArtifactPower,
                'regional_threat_avg' => round($avgThreat, 2)
            ]
        ]);
    }
}