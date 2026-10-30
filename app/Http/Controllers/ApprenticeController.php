<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Area;
use App\Models\Computer;
use App\Models\Course;
use App\Models\Training_center;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    //
    public function index(){

        $apprentices=Apprentice::all();

        return view('Aprendice\index',compact('apprentices'));


    }

    public function registro(){

     $courses=Course::all();
     $computers=Computer::all();
        return view('Aprendice\create',compact('courses','computers'));
    }
    
    public function dato(Request $request){
        Apprentice::create($request->all());
    }
    
    public function show ($id){

     $apprentices=Apprentice::find($id);
       return view('Aprendice.show',compact('apprentices'));


    }
    public function edit(Apprentice $apprentices)
    {
        // Traemos todos los registros de las tablas foráneas
        $courses = Course::all();
        $computers = Computer::all();

        //  Enviamos todo a la vista con compact
        return view('Aprendice.edit', compact('apprentices', 'courses', 'computers'));
    }

    public function update(Request $request, Apprentice $apprentices)
    {
        $request->validate([
   
        ]);
        $apprentices->update($request->all());
     
        return redirect()->route('apprentice.index')->with('success', 'Aprendiz actualizado correctamente');
    }

    public function destroy(Apprentice $apprentices)
    {
        $apprentices->delete();

      
        return redirect()->route('apprentice.index')->with('success', 'Aprendiz eliminado correctamente');
    }
    
}