<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class ComputerController extends Controller
{
    public function index()
    {
        return response()->json(Computer::all());
    }

    public function show($id)
    {
        return response()->json(Computer::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number'         => 'required|string|max:255',
            'brand'          => 'required|string|max:255',
            'environment_id' => 'nullable|exists:environments,id',
            'imagen'         => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $file = $request->file('imagen');

        // Configuración de Cloudinary directa
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        // Subir imagen a la carpeta 'computers'
        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder'        => 'computers',
                'resource_type' => 'image',
            ]
        );

        $computer = Computer::create([
            'number'           => $request->number,
            'brand'            => $request->brand,
            'environment_id'   => $request->environment_id,
            'imagen_url'       => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json($computer, 201);
    }

    public function update(Request $request, $id)
    {
        $computer = Computer::findOrFail($id);

        $request->validate([
            'number'         => 'required|string|max:255',
            'brand'          => 'required|string|max:255',
            'environment_id' => 'nullable|exists:environments,id',
            'imagen'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'number'         => $request->number,
            'brand'          => $request->brand,
            'environment_id' => $request->environment_id,
        ];

        // Si el usuario sube una nueva imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('services.cloudinary.cloud_name'),
                    'api_key'    => config('services.cloudinary.api_key'),
                    'api_secret' => config('services.cloudinary.api_secret'),
                ],
                'url' => ['secure' => true],
            ]);

            // Borrar la imagen anterior de Cloudinary si existe
            if ($computer->imagen_public_id) {
                try {
                    $cloudinary->uploadApi()->destroy($computer->imagen_public_id);
                } catch (\Exception $e) {
                    // Manejar si falla el borrado anterior
                }
            }

            // Subir la nueva a la carpeta 'computers'
            $resultado = $cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                [
                    'folder'        => 'computers',
                    'resource_type' => 'image',
                ]
            );

            $data['imagen_url'] = $resultado['secure_url'];
            $data['imagen_public_id'] = $resultado['public_id'];
        }

        $computer->update($data);

        return response()->json($computer);
    }

    // DELETE /api/computers/{id}
    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);

        // Borrar la imagen de Cloudinary antes de eliminar el registro de la base de datos
        if ($computer->imagen_public_id) {
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => config('services.cloudinary.cloud_name'),
                        'api_key'    => config('services.cloudinary.api_key'),
                        'api_secret' => config('services.cloudinary.api_secret'),
                    ],
                    'url' => ['secure' => true],
                ]);

                $cloudinary->uploadApi()->destroy($computer->imagen_public_id);
            } catch (\Exception $e) {
                // Manejar excepción si es necesario
            }
        }

        $computer->delete();

        return response()->json(null, 204);
    }
}