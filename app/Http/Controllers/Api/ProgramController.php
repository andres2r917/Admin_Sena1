<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return response()->json(Programs::all());
    }

    public function show($id)
    {
        return response()->json(Programs::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'type'        => 'required|string|max:255',
            'duration'    => 'required|string|max:255',
            'modality'    => 'required|string|max:255',
            'image'       => 'nullable|string|max:255',
            'area_id'     => 'required|exists:areas,id',
        ]);

        return response()->json(Programs::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $programa = Programs::findOrFail($id);
        $programa->update($request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'type'        => 'required|string|max:255',
            'duration'    => 'required|string|max:255',
            'modality'    => 'required|string|max:255',
            'image'       => 'nullable|string|max:255',
            'area_id'     => 'required|exists:areas,id',
        ]));
        return response()->json($programa);
    }

    public function destroy($id)
    {
        Programs::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
