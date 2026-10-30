<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return response()->json(Teacher::all());
    }

    public function show($id)
    {
        return response()->json(Teacher::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|string|max:255',
            'area_id'            => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        return response()->json(Teacher::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $instructor = Teacher::findOrFail($id);
        $instructor->update($request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|string|max:255',
            'area_id'            => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]));
        return response()->json($instructor);
    }

    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
