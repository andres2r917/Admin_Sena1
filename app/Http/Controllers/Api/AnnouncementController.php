<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcements;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        return response()->json(Announcements::all());
    }

    public function show($id)
    {
        return response()->json(Announcements::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'title'              => 'required|string|max:255',
            'content'            => 'required|string',
            'publish_date'       => 'required|date',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        return response()->json(Announcements::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $anuncio = Announcements::findOrFail($id);
        $anuncio->update($request->validate([
            'title'              => 'required|string|max:255',
            'content'            => 'required|string',
            'publish_date'       => 'required|date',
            'training_center_id' => 'required|exists:training_centers,id',
        ]));
        return response()->json($anuncio);
    }

    public function destroy($id)
    {
        Announcements::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
