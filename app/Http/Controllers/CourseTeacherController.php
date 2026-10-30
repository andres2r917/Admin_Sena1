<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    // URL base de tu backend API Admin_sena
    private $apiUrl = 'http://127.0.0.1:8000/api/courses';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $courses = $response->json(); // Se convierte la respuesta a arreglo asociativo

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        // Peticiones a la API para obtener las áreas y centros de formación
        $areasResponse = Http::get('http://127.0.0.1:8000/api/areas');
        $trainingsResponse = Http::get('http://127.0.0.1:8000/api/training-centers');

        $areas = $areasResponse->json();
        $trainings = $trainingsResponse->json();

        return view('course.create', compact('areas', 'trainings'));
    }

    public function store(Request $request)
    {
        Http::post($this->apiUrl, $request->all());

        return redirect()->route('courses.index');
    }

    public function show($id)
    {
        $response = Http::get($this->apiUrl . '/' . $id);
        $courses = $response->json(); // Mantiene la variable $courses para alinearse con la vista show.blade.php

        return view('course.show', compact('courses'));
    }

    public function edit($id)
    {
        $courseResponse = Http::get($this->apiUrl . '/' . $id);
        $areasResponse = Http::get('http://127.0.0.1:8000/api/areas');
        $trainingsResponse = Http::get('http://127.0.0.1:8000/api/training-centers');

        $course = $courseResponse->json();
        $areas = $areasResponse->json();
        $trainings = $trainingsResponse->json();

        return view('course.edit', compact('course', 'areas', 'trainings'));
    }

    public function update(Request $request, $id)
    {
        Http::put($this->apiUrl . '/' . $id, $request->all());

        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        Http::delete($this->apiUrl . '/' . $id);

        return redirect()->route('courses.index');
    }
}