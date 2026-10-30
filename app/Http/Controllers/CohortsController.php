<?php

namespace App\Http\Controllers;

use App\Models\Cohorts;
use App\Models\Offers;
use Illuminate\Http\Request;

class CohortsController extends Controller
{
    public function index()
    {
        $cohorts = Cohorts::all();

        return view('cohorts.index', compact('cohorts'));
    }

    public function registro()
    {
        // Traemos todas las ofertas para el formulario de creación
        $offer = Offers::all();

        return view('cohorts.create', compact('offer'));
    }

    public function dato(Request $request)
    {
        Cohorts::create($request->all());

        return redirect()->route('cohorts.index');
    }

    public function show($id)
    {
        $cohorts = Cohorts::findOrFail($id);

        return view('cohorts.show', compact('cohorts'));
    }

    public function edit(Cohorts $cohorts)
    {
        // Traemos las ofertas para editarlas en el formulario
        $offer = Offers::all();

        return view('cohorts.edit', compact('cohorts', 'offer'));
    }

    public function update(Request $request, Cohorts $cohorts)
    {
        $cohorts->update($request->all());

        return redirect()->route('cohorts.index');
    }

    public function destroy(Cohorts $cohorts)
    {
        $cohorts->delete();

        return redirect()->route('cohorts.index');
    }
}