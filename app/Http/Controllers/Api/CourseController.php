<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::all());
    }

    public function show($id)
    {
        return response()->json(Course::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'course_number'      => 'required|string|max:255',
            'day'                => 'required|string|max:255',
            'area_id'            => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        return response()->json(Course::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $curso = Course::findOrFail($id);
        $curso->update($request->validate([
            'course_number'      => 'required|string|max:255',
            'day'                => 'required|string|max:255',
            'area_id'            => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]));
        return response()->json($curso);
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
