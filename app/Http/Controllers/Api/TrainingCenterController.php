<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Training_center;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class TrainingCenterController extends Controller
{
    public function index()
    {
        return response()->json(Training_center::all());
    }
    public function show($id)
    {
        return response()->json(Training_center::findOrFail($id));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen'   => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $file = $request->file('imagen');
    
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);
        // Subir imagen a la carpeta 'trainingcenters'
        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder'        => 'trainingcenters',
                'resource_type' => 'image',
            ]
        );

        $trainingCenter = Training_center::create([
            'name'             => $request->name,
            'location'         => $request->location,
            'imagen_url'       => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json($trainingCenter, 201);
    }

    public function update(Request $request, $id)
    {
        $centro = Training_center::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'name'     => $request->name,
            'location' => $request->location,
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
            if ($centro->imagen_public_id) {
                try {
                    $cloudinary->uploadApi()->destroy($centro->imagen_public_id);
                } catch (\Exception $e) {
                    // Manejar si falla el borrado anterior
                }
            }
            // Subir la nueva
            $resultado = $cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                [
                    'folder'        => 'trainingcenters',
                    'resource_type' => 'image',
                ]
            );

            $data['imagen_url'] = $resultado['secure_url'];
            $data['imagen_public_id'] = $resultado['public_id'];
        }

        $centro->update($data);

        return response()->json($centro);
    }

    public function destroy($id)
    {
        $centro = Training_center::findOrFail($id);

        // Borrar la imagen de Cloudinary antes de eliminar el registro de la base de datos
        if ($centro->imagen_public_id) {
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => config('services.cloudinary.cloud_name'),
                        'api_key'    => config('services.cloudinary.api_key'),
                        'api_secret' => config('services.cloudinary.api_secret'),
                    ],
                    'url' => ['secure' => true],
                ]);

                $cloudinary->uploadApi()->destroy($centro->imagen_public_id);
            } catch (\Exception $e) {
                // Manejar excepción si es necesario
            }
        }

        $centro->delete();

        return response()->json(null, 204);
    }
}