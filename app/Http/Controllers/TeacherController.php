<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_center;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()
    {

        $teachers = Teacher::all();

        return view('teacher.index', compact('teachers'));
    }
    public function registro()
    {

        $areas = Area::all();
        $training_centers = Training_center::all();
        return view('teacher\create', compact('areas', 'training_centers'));
    }

    public function dato(Request $request)
    {
        Teacher::create($request->all());
    }

    public function show($id)
    {

        $teachers = Teacher::find($id);
        return view('teacher.show', compact('teachers'));
    }

    public function edit(Teacher $teachers)
    {
        //  Traemos todos los registros de las tablas foráneas
        $areas = Area::all();
        $training_centers = Training_center::all();

        //  Enviamos todo a la vista con compact
        return view('teacher.edit', compact('teachers', 'areas', 'training_centers'));
    }

    public function update(Request $request, Teacher $teachers)
    {
        $teachers->name = $request->name;
        $teachers->email = $request->email;
        $teachers->area_id = $request->area_id;
        $teachers->training_center_id = $request->training_center_id;
        $teachers->save();

        return redirect()->route('teacher.index');
    }
    //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Teacher $teachers)
    {
        $teachers->delete();
        return redirect()->route('teacher.index');
    }
}