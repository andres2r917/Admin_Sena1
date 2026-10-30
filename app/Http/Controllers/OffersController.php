<?php

namespace App\Http\Controllers;

use App\Models\Offers;   
use App\Models\Programs;  
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        // Carga ansiosa (eager loading) de la relación 'programs'
        $offers = Offers::with('programs')->get();
        return view('offers.index', compact('offers'));
    }

    public function registro()
    {
        $programs = Programs::all();
        return view('offers.create', compact('programs'));
    }
    
    public function dato(Request $request)
    {
        Offers::create($request->all());
        return redirect()->route('offers.index');
    }
    
    public function show($id)
    {
        $offers = Offers::with('programs')->findOrFail($id);
        return view('offers.show', compact('offers'));
    }

    public function edit(Offers $offers)
    {
        $programs = Programs::all();
        return view('offers.edit', compact('offers', 'programs'));
    }

    public function update(Request $request, Offers $offers)
    {
        $offers->update($request->all());
        return redirect()->route('offers.index');
    }

    public function destroy(Offers $offers)
    {
        $offers->delete();
        return redirect()->route('offers.index');
    }
}