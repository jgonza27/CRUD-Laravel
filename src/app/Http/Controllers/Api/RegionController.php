<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        return response()->json(Region::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $region = Region::create($request->all());

        return response()->json($region, 201);
    }

    public function show(string $id)
    {
        $region = Region::with(['realms', 'creatures'])->find($id);

        if (!$region) {
            return response()->json(['message' => 'Región no encontrada'], 404);
        }

        return response()->json($region);
    }

    public function update(Request $request, string $id)
    {
        $region = Region::find($id);

        if (!$region) {
            return response()->json(['message' => 'Región no encontrada'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $region->update($request->all());

        return response()->json($region);
    }

    public function destroy(string $id)
    {
        $region = Region::find($id);

        if (!$region) {
            return response()->json(['message' => 'Región no encontrada'], 404);
        }

        $region->delete();

        return response()->json(['message' => 'Región eliminada']);
    }
}