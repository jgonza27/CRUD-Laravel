<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artifact;
use Illuminate\Http\Request;

class ArtifactController extends Controller
{
    public function index()
    {
        return response()->json(Artifact::with(['origin_realm', 'heroes'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'power_level' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string',
            'origin_realm_id' => 'required|exists:realms,id',
            'hero_ids' => 'nullable|array',
            'hero_ids.*' => 'exists:heroes,id',
        ]);

        $artifact = Artifact::create($request->except('hero_ids'));

        if ($request->has('hero_ids')) {
            $artifact->heroes()->sync($request->hero_ids);
        }

        return response()->json($artifact->load(['origin_realm', 'heroes']), 201);
    }

    public function show(string $id)
    {
        $artifact = Artifact::with(['origin_realm', 'heroes'])->find($id);

        if (!$artifact) {
            return response()->json(['message' => 'Artefacto no encontrado'], 404);
        }

        // Transformar para que coincida con el formato esperado por Postman
        $response = $artifact->toArray();
        $response['origin_realm'] = $response['origin_realm'] ?? null;
        unset($response['origin_realm_id']);

        return response()->json($response);
    }

    public function update(Request $request, string $id)
    {
        $artifact = Artifact::find($id);

        if (!$artifact) {
            return response()->json(['message' => 'Artefacto no encontrado'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'power_level' => 'sometimes|required|integer|min:1|max:100',
            'description' => 'nullable|string',
            'origin_realm_id' => 'sometimes|required|exists:realms,id',
            'hero_ids' => 'nullable|array',
            'hero_ids.*' => 'exists:heroes,id',
        ]);

        $artifact->update($request->except('hero_ids'));

        if ($request->has('hero_ids')) {
            $artifact->heroes()->sync($request->hero_ids);
        }

        return response()->json($artifact->load(['origin_realm', 'heroes']));
    }

    public function destroy(string $id)
    {
        $artifact = Artifact::find($id);

        if (!$artifact) {
            return response()->json(['message' => 'Artefacto no encontrado'], 404);
        }

        $artifact->delete();

        return response()->json(['message' => 'Artefacto eliminado']);
    }

    public function getTop()
    {
        return response()->json(Artifact::where('power_level', '>', 90)->get());
    }

    public function getHeroes(string $id)
    {
        $artifact = Artifact::find($id);
        if (!$artifact) return response()->json(['message' => 'Artefacto no encontrado'], 404);
        return response()->json($artifact->heroes);
    }

    public function attachHero(Request $request)
    {
        $request->validate([
            'artifact_id' => 'required|exists:artifacts,id',
            'hero_id' => 'required|exists:heroes,id'
        ]);

        $artifact = Artifact::find($request->artifact_id);
        $artifact->heroes()->syncWithoutDetaching([$request->hero_id]);

        return response()->json(['message' => 'Artefacto asignado al héroe']);
    }

    public function detachHero(Request $request)
    {
        $request->validate([
            'artifact_id' => 'required|exists:artifacts,id',
            'hero_id' => 'required|exists:heroes,id'
        ]);

        $artifact = Artifact::find($request->artifact_id);
        $artifact->heroes()->detach($request->hero_id);

        return response()->json(['message' => 'Artefacto retirado del héroe']);
    }
}