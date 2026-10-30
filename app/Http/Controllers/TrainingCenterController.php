<?php

namespace App\Http\Controllers;

use App\Models\Training_center;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    //

    public function index(){

        $Training_centers=Training_center::all();

        return view('trainingcenters.index',compact('Training_centers'));


    }
    public function registro(){
        return view('trainingcenters.create');
    }
    
    public function dato(Request $request){
        Training_center::create($request->all());
    }
    public function show ($id){

     $Training_centers=Training_center::find($id);
       return view('trainingcenters.show',compact('Training_centers'));


    }
    public function edit(Training_center $Training_centers)
    { //Encuentro el Curso

        return view('trainingcenters.edit', compact('Training_centers'));
    }
    public function update(Request $request, Training_center $Training_centers){

        $Training_centers->name = $request->name;
       $Training_centers->location = $request->location;
        $Training_centers->save();

        return redirect()->route('trainingcenters.index');

      }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Training_center $Training_centers)
    {
        $Training_centers->delete();
        return redirect()->route('trainingcenters.index');
    }



    
}
