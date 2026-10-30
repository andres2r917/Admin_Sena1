<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //


     public function index(){

        $areas=Area::all();

        return view('areas.index',compact('areas'));


    }

    public function create(){
        return view('areas.create');
    }
    public function salida(Request $request){

        Area::create($request->all());

    }



    public function show ($id){

     $areas=Area::find($id);
       return view('areas.show',compact('areas'));


    }

    
    public function edit(Area $areas)
    { //Encuentro el Curso

        return view('areas.edit', compact('areas'));
    }

     public function update(Request $request, Area $areas){

        $areas->name = $request->name;
      
        $areas->save();

        return redirect()->route('areas.index');

      }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Area $areas)
    {
        $areas->delete();
        return redirect()->route('areas.index');
    }
}