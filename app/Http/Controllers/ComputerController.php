<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // Asegúrate de tener el facade importado si usas el paquete oficial

class ComputerController extends Controller
{
    public function index()
    {
        $computer = Computer::all();
        return view('computer.index', compact('computer'));
    }

    public function marca()
    {
        return view('computer.create');
    }

    public function model(Request $request)
    {
        // Validar los datos incluyendo la imagen
        $request->validate([
            'number' => 'required|string|max:255',
            'brand'  => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->except('imagen');

        // Subir la imagen a Cloudinary en la carpeta 'computers'
        if ($request->hasFile('imagen')) {
            $uploadedFile = Cloudinary::upload($request->file('imagen')->getRealPath(), [
                'folder' => 'computers'
            ]);

            $data['imagen_url'] = $uploadedFile->getSecureUrl();
            $data['imagen_public_id'] = $uploadedFile->getPublicId();
        }

        Computer::create($data);

        return redirect()->route('computer.index');
    }

    public function show($id)
    {
        $computer = Computer::find($id);
        return view('computer.show', compact('computer'));
    }

    public function edit(Computer $computer)
    {
        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, Computer $computer)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand'  => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $computer->number = $request->number;
        $computer->brand = $request->brand;

        // Si se sube una nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior de Cloudinary si existe
            if ($computer->imagen_public_id) {
                Cloudinary::destroy($computer->imagen_public_id);
            }

            // Subir la nueva imagen a la carpeta 'computers'
            $uploadedFile = Cloudinary::upload($request->file('imagen')->getRealPath(), [
                'folder' => 'computers'
            ]);

            $computer->imagen_url = $uploadedFile->getSecureUrl();
            $computer->imagen_public_id = $uploadedFile->getPublicId();
        }

        $computer->save();

        return redirect()->route('computer.index');
    }

    public function destroy(Computer $computer)
    {
        // Eliminar la imagen de Cloudinary antes de borrar el registro de la base de datos
        if ($computer->imagen_public_id) {
            Cloudinary::destroy($computer->imagen_public_id);
        }

        $computer->delete();
        return redirect()->route('computer.index');
    }
}