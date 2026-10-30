<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\TrainingCenterController;
use App\Http\Controllers\Api\ComputerController;
use App\Http\Controllers\Api\EnvironmentController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\ApprenticeController;
use App\Http\Controllers\Api\CohortController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas API de Áreas
Route::get('areas', [AreaController::class, 'index']);
Route::post('areas', [AreaController::class, 'store']);
Route::get('areas/{id}', [AreaController::class, 'show']);
Route::put('areas/{id}', [AreaController::class, 'update']);
Route::delete('areas/{id}', [AreaController::class, 'destroy']);

// Rutas API de Centros de formación (el endpoint lleva guion)
Route::get('training-centers', [TrainingCenterController::class, 'index']);
Route::post('training-centers', [TrainingCenterController::class, 'store']);
Route::get('training-centers/{id}', [TrainingCenterController::class, 'show']);
Route::put('training-centers/{id}', [TrainingCenterController::class, 'update']);
Route::delete('training-centers/{id}', [TrainingCenterController::class, 'destroy']);

// Rutas API de Computadores
Route::get('computers', [ComputerController::class, 'index']);
Route::post('computers', [ComputerController::class, 'store']);
Route::get('computers/{id}', [ComputerController::class, 'show']);
Route::put('computers/{id}', [ComputerController::class, 'update']);
Route::delete('computers/{id}', [ComputerController::class, 'destroy']);


// Rutas API de Ambientes
Route::get('environments', [EnvironmentController::class, 'index']);
Route::post('environments', [EnvironmentController::class, 'store']);
Route::get('environments/{id}', [EnvironmentController::class, 'show']);
Route::put('environments/{id}', [EnvironmentController::class, 'update']);
Route::delete('environments/{id}', [EnvironmentController::class, 'destroy']);

// Rutas API de Anuncios
Route::get('announcements', [AnnouncementController::class, 'index']);
Route::post('announcements', [AnnouncementController::class, 'store']);
Route::get('announcements/{id}', [AnnouncementController::class, 'show']);
Route::put('announcements/{id}', [AnnouncementController::class, 'update']);
Route::delete('announcements/{id}', [AnnouncementController::class, 'destroy']);

// Rutas API de Aprendices
Route::get('apprentices', [ApprenticeController::class, 'index']);
Route::post('apprentices', [ApprenticeController::class, 'store']);
Route::get('apprentices/{id}', [ApprenticeController::class, 'show']);
Route::put('apprentices/{id}', [ApprenticeController::class, 'update']);
Route::delete('apprentices/{id}', [ApprenticeController::class, 'destroy']);

// Rutas API de Cohortes
Route::get('cohorts', [CohortController::class, 'index']);
Route::post('cohorts', [CohortController::class, 'store']);
Route::get('cohorts/{id}', [CohortController::class, 'show']);
Route::put('cohorts/{id}', [CohortController::class, 'update']);
Route::delete('cohorts/{id}', [CohortController::class, 'destroy']);

// Rutas API de Cursos
Route::get('courses', [CourseController::class, 'index']);
Route::post('courses', [CourseController::class, 'store']);
Route::get('courses/{id}', [CourseController::class, 'show']);
Route::put('courses/{id}', [CourseController::class, 'update']);
Route::delete('courses/{id}', [CourseController::class, 'destroy']);

// Rutas API de Ofertas
Route::get('offers', [OfferController::class, 'index']);
Route::post('offers', [OfferController::class, 'store']);
Route::get('offers/{id}', [OfferController::class, 'show']);
Route::put('offers/{id}', [OfferController::class, 'update']);
Route::delete('offers/{id}', [OfferController::class, 'destroy']);

// Rutas API de Programas
Route::get('programs', [ProgramController::class, 'index']);
Route::post('programs', [ProgramController::class, 'store']);
Route::get('programs/{id}', [ProgramController::class, 'show']);
Route::put('programs/{id}', [ProgramController::class, 'update']);
Route::delete('programs/{id}', [ProgramController::class, 'destroy']);

// Rutas API de Docentes
Route::get('teachers', [TeacherController::class, 'index']);
Route::post('teachers', [TeacherController::class, 'store']);
Route::get('teachers/{id}', [TeacherController::class, 'show']);
Route::put('teachers/{id}', [TeacherController::class, 'update']);
Route::delete('teachers/{id}', [TeacherController::class, 'destroy']);

// Rutas API de Usuarios
Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);