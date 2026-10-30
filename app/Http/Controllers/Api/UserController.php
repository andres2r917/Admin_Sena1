<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show($id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        return response()->json(User::create($datos), 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update($request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]));
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
