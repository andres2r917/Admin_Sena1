<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cohorts;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    public function index()
    {
        return response()->json(Cohorts::all());
    }

    public function show($id)
    {
        return response()->json(Cohorts::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'code'       => 'required|string|max:255',
            'start_date' => 'required|date',
            'schedule'   => 'required|string|max:255',
            'offer_id'   => 'required|exists:offers,id',
        ]);

        return response()->json(Cohorts::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $ficha = Cohorts::findOrFail($id);
        $ficha->update($request->validate([
            'code'       => 'required|string|max:255',
            'start_date' => 'required|date',
            'schedule'   => 'required|string|max:255',
            'offer_id'   => 'required|exists:offers,id',
        ]));
        return response()->json($ficha);
    }

    public function destroy($id)
    {
        Cohorts::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
