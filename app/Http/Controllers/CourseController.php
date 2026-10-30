<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cohorts;
use App\Models\Course;
use App\Models\Environment;
use App\Models\Training_center;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        // Consultamos todos los modelos necesarios para los dropdowns
        $areas = Area::all();
        $training_centers = Training_center::all();
        $cohorts = Cohorts::all();
        $environments = Environment::all();

        // Retornamos la vista ubicada en resources/views/course/create.blade.php
        return view('course.create', compact('areas', 'training_centers', 'cohorts', 'environments'));
    }

    public function dato(Request $request)
    {
        Course::create($request->all());

        return redirect()->route('course.index');
    }

    public function show($id)
    {
        $courses = Course::findOrFail($id);

        return view('course.show', compact('courses'));
    }

    public function edit(Course $course)
    {
        $areas = Area::all();
        $training_centers = Training_center::all();
        $cohorts = Cohorts::all();
        $environments = Environment::all();

        return view('course.edit', compact('course', 'areas', 'training_centers', 'cohorts', 'environments'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('course.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index');
    }
}