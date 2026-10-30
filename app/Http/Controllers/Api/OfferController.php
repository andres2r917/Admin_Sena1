<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offers;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return response()->json(Offers::all());
    }

    public function show($id)
    {
        return response()->json(Offers::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'shift'             => 'required|string|max:255',
            'registration_date' => 'required|date',
            'capacity'          => 'required|integer|min:1',
            'program_id'        => 'required|exists:programs,id',
        ]);

        return response()->json(Offers::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $oferta = Offers::findOrFail($id);
        $oferta->update($request->validate([
            'shift'             => 'required|string|max:255',
            'registration_date' => 'required|date',
            'capacity'          => 'required|integer|min:1',
            'program_id'        => 'required|exists:programs,id',
        ]));
        return response()->json($oferta);
    }

    public function destroy($id)
    {
        Offers::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
