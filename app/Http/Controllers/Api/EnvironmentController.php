<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Environment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnvironmentController extends Controller
{
    private function rules(): array
    {
        return [
            'name'               => 'required|string|max:255',
            'location'           => 'required|string|max:255',
            'foto'               => 'nullable|image|max:2048', 
            'training_center_id' => 'required|exists:training_centers,id',
        ];
    }

    private function guardarFoto(Request $request): ?string
    {
        if (!$request->hasFile('foto')) {
            return null;
        }

        $archivo = $request->file('foto');
        $nombre  = 'foto_' . time() . '.' . $archivo->getClientOriginalExtension();
        $archivo->storeAs('environments', $nombre, 'public');

        return $nombre;
    }

    // GET /api/environments
    public function index()
    {
        return response()->json(Environment::all(), 200);
    }

    // POST /api/environments
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        unset($data['foto']); // 'foto' es el archivo, la columna se llama urlFoto

        if ($nombre = $this->guardarFoto($request)) {
            $data['urlFoto'] = $nombre;
        }

        $environment = Environment::create($data);

        return response()->json($environment, 201);
    }

    // GET /api/environments/{id}
    public function show(int $id)
    {
        $environment = Environment::find($id);

        if (!$environment) {
            return response()->json(['message' => 'Ambiente no encontrado'], 404);
        }

        return response()->json($environment, 200);
    }

    // PUT /api/environments/{id}  (el cliente lo envía como POST con _method=PUT)
    public function update(Request $request, int $id)
    {
        $environment = Environment::findOrFail($id);

        $data = $request->validate($this->rules());
        unset($data['foto']);

        // Si llega una foto nueva, borra la anterior y guarda la nueva
        if ($nombre = $this->guardarFoto($request)) {
            if ($environment->urlFoto) {
                Storage::disk('public')->delete('environments/' . $environment->urlFoto);
            }
            $data['urlFoto'] = $nombre;
        }

        $environment->update($data);

        return response()->json($environment);
    }

    // DELETE /api/environments/{id}
    public function destroy(int $id)
    {
        $environment = Environment::findOrFail($id);

        // Borra también el archivo de la foto
        if ($environment->urlFoto) {
            Storage::disk('public')->delete('environments/' . $environment->urlFoto);
        }

        $environment->delete();

        return response()->json(null, 204);
    }
}