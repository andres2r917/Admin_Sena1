<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Programs; // Tu modelo en plural
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function registro()
    {
        $areas = Area::all();
        $programs = Programs::all();

        return view('programs.create', compact('areas', 'programs'));
    }

    public function index()
    {
        $programs = Programs::all();

        return view('programs.index', compact('programs'));
    }

    public function dato(Request $request)
    {
        // Guardamos los datos base del formulario
        $program = Programs::create($request->all());
        
        // Verificamos si se adjunto una foto desde el input name="urlFoto"
        if ($request->hasFile('urlFoto')) {
            $file = $request->file('urlFoto');
            $nombreArchivo = "foto_" . time() . "." . $file->guessExtension();
            $file->storeAs('public/images', $nombreArchivo);

            // Asignamos el nombre del archivo a la columna 'image' de tu migración
            $program->image = $nombreArchivo;
            $program->save();
        }

        return redirect()->route('programs.index');
    }

    public function show($id)
    {
        $program = Programs::findOrFail($id);

        return view('programs.show', compact('program'));
    }

    public function edit(Programs $program)
    {
        $areas = Area::all();

        return view('programs.edit', compact('program', 'areas'));
    }

    public function update(Request $request, Programs $program)
    {
        $program->update($request->all());

        // Manejo de actualización de foto si la envían en el formulario de edición
        if ($request->hasFile('urlFoto')) {
            $file = $request->file('urlFoto');
            $nombreArchivo = "foto_" . time() . "." . $file->guessExtension();
            $file->storeAs('public/images', $nombreArchivo);

            $program->image = $nombreArchivo;
            $program->save();
        }

        return redirect()->route('programs.index');
    }

    public function destroy(Programs $program)
    {
        $program->delete();

        return redirect()->route('programs.index');
    }
}