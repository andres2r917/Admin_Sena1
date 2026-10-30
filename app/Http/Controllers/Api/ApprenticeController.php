<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apprentice;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index()
    {
        return response()->json(Apprentice::all());
    }

    public function show($id)
    {
        return response()->json(Apprentice::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id'   => 'required|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        return response()->json(Apprentice::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $aprendiz = Apprentice::findOrFail($id);
        $aprendiz->update($request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id'   => 'required|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]));
        return response()->json($aprendiz);
    }

    public function destroy($id)
    {
        Apprentice::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
