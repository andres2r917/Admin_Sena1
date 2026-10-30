<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Training_center;
use Illuminate\Http\Request;

class EnvironmentsController extends Controller
{
    //
    public function registro()
    {
        $training_centers = Training_center::all();
        
        return view('environments.create', compact('training_centers'));
    }

    public function index()
    {
        $environments = Environment::all();

        return view('environments.index', compact('environments'));
    }

   public function dato(Request $request)
{
    // 1. Validar los datos y la foto
    $request->validate([
        'name'               => 'required|string|max:255',
        'location'           => 'required|string|max:255',
        'training_center_id' => 'required|exists:training_centers,id',
        'urlFoto'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);


    $environment = Environment::create($request->only(['name', 'location', 'training_center_id']));


    if ($request->hasFile('urlFoto')) {
        $file = $request->file('urlFoto');
        $nombreArchivo = "foto_" . time() . "." . $file->guessExtension();
        $file->storeAs('public/images', $nombreArchivo);
        $environment->urlFoto = $nombreArchivo;
        $environment->save();
    }

    return redirect()->route('environments.index');
}

    public function show($id)
    {
       $environments = Environment::find($id);

        return view('environments.show', compact('environments'));
    }

    public function edit(Environment $environments)
    {
        $training_centers = Training_center::all();

        return view('environments.edit', compact('environments', 'training_centers'));
    }
    

    public function update(Request $request, Environment $environments)
    {
        $environments->update($request->all());

        return redirect()->route('environments.index');
    }

    public function destroy(Environment $environment)
    {
        $environment->delete();

        return redirect()->route('environments.index');
    }
    
}