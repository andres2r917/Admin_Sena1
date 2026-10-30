<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
  
    public function index()
    {
        $areas = Area::with(['teachers', 'courses'])->get();

        return response()->json($areas, 200);
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Area::create($request->all());

        return response()->json($area, 201);
    }

    public function show($id)
    {
        $area = Area::with(['teachers', 'courses'])->find($id);

        if (!$area) {
            return response()->json(['message' => 'Área no encontrada'], 404);
        }

        return response()->json($area, 200);
    }
    
    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->update($request->validate(['name' => 'required|string|max:255']));
        return response()->json($area);
    }

    public function destroy($id)
    {
        Area::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}