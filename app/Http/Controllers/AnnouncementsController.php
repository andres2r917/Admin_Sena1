<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Training_center;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function registro()
    {
        $training_centers = Training_center::all();
        
        return view('announcements.create', compact('training_centers'));
    }

    public function index()
    {
        $announcements = Announcements::all();

        return view('announcements.index', compact('announcements'));
    }

    public function dato(Request $request)
{
    $announcements = Announcements::create($request->all());

    if ($request->hasFile('urlFoto')) {
        $file = $request->file('urlFoto');
        $nombreArchivo = "foto_" . time() . "." . $file->guessExtension();
        $file->storeAs('public/images', $nombreArchivo);

        // Cambiamos urlFoto por la columna 'image' de la base de datos
        $announcements->image = $nombreArchivo;
        $announcements->save();
    }

    return redirect()->route('announcements.index');

    }

    public function show($id)
    {
        $announcements = Announcements::findOrFail($id);

        return view('announcements.show', compact('announcements'));
    }

    public function edit(Announcements $announcements)
    {
        $training_centers = Training_center::all();

        return view('announcements.edit', compact('announcements', 'training_centers'));
    }

    public function update(Request $request, Announcements $announcements)
    {
        $announcements->update($request->all());

        if ($request->hasFile('urlFoto')) {
            $file = $request->file('urlFoto');
            $nombreArchivo = "foto_" . time() . "." . $file->guessExtension();
            $file->storeAs('public/images', $nombreArchivo);

            $announcements->urlFoto = $nombreArchivo;
            $announcements->save();
        }

        return redirect()->route('announcements.index');
    }

    public function destroy(Announcements $announcements)
    {
        $announcements->delete();

        return redirect()->route('announcements.index');
    }
}