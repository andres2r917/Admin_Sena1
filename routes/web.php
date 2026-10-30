<?php

use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\EnvironmentsController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CohortsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta principal (Home / Inicio)
Route::get('/', function () {
    return view('home');
})->name('home');

// Sobre Nosotros
Route::get('nosotros', function () {
    return view('about.nosotros');
})->name('about.nosotros');

// Autenticación (Login / Registro de usuarios)
Route::get('login', function () {
    return view('login.login');
})->name('login');

// Procesar el inicio de sesión y redirigir al panel
Route::post('login', function () {
    return redirect()->route('vista');
})->name('login.store');

// Mostrar la vista del formulario de registro
Route::get('registro', function () {
    return view('login.registro');
})->name('registro');

// Procesar el registro (se renombró a registro.store)
Route::post('registro', function () {
    return redirect()->route('vista');
})->name('registro.store');

// Panel de Administración
Route::get('vista', function () {
    return view('adminvista.vista'); 
})->name('vista');

// Actualizar Foto de Perfil / Avatar
//Route::put('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

// Salir / Logout
Route::post('logout', function () {
    return redirect()->route('login');
})->name('logout');

Route::get('/search', function () {
    return "Resultados de búsqueda: " . request('query');
})->name('search');

// Módulo: Áreas
Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::get('areas/list', [AreaController::class, 'index'])->name('areas.index');
Route::post('areas/store', [AreaController::class, 'salida'])->name('areas.store');
Route::get('areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::put('areas/{areas}', [AreaController::class, 'update'])->name('areas.update');
Route::get('areas/{areas}/editar', [AreaController::class, 'edit'])->name('areas.edit');
Route::delete('areas/{areas}', [AreaController::class, 'destroy'])->name('areas.destroy');

// Módulo: Centros de Formación
Route::get('trainingcenter/registrar', [TrainingCenterController::class, 'registro'])->name('trainingcenters.create');
Route::get('trainingcenter/list', [TrainingCenterController::class, 'index'])->name('trainingcenters.index');
Route::post('trainingcenter/dato', [TrainingCenterController::class, 'dato'])->name('trainingcenters.datos');
Route::get('trainingcenter/{id}', [TrainingCenterController::class, 'show'])->name('trainingcenters.show');
Route::put('trainingcenter/{Training_centers}', [TrainingCenterController::class, 'update'])->name('trainingcenters.update');
Route::get('trainingcenter/{Training_centers}/editar', [TrainingCenterController::class, 'edit'])->name('trainingcenters.edit');
Route::delete('trainingcenter/{Training_centers}', [TrainingCenterController::class, 'destroy'])->name('trainingcenters.destroy');

// Módulo: Computadores
Route::get('computer/computador', [ComputerController::class, 'marca'])->name('computer.create');
Route::get('computer/list', [ComputerController::class, 'index'])->name('computer.index');
Route::post('computer/model', [ComputerController::class, 'model'])->name('computer.model');
Route::get('computer/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::put('computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
Route::get('computer/{computer}/editar', [ComputerController::class, 'edit'])->name('computer.edit');
Route::delete('computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');

// Módulo: Instructores
Route::get('teacher/registro', [TeacherController::class, 'registro'])->name('teacher.create');
Route::get('teacher/list', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('teacher/admin', [TeacherController::class, 'dato'])->name('teacher.admin');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::put('teacher/{teachers}', [TeacherController::class, 'update'])->name('teacher.update');
Route::get('teacher/{teachers}/editar', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::delete('teacher/{teachers}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

// Módulo: Cursos
Route::get('course/registrar', [CourseController::class, 'create'])->name('course.create');
Route::get('course/list', [CourseController::class, 'index'])->name('course.index');
Route::post('course/dato', [CourseController::class, 'dato'])->name('course.datos');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('course/{course}/editar', [CourseController::class, 'edit'])->name('course.edit');
Route::put('course/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

// Módulo: Aprendices
Route::get('apprentice/registro', [ApprenticeController::class, 'registro'])->name('apprentice.create');
Route::get('apprentice/list', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::post('apprentice/admin', [ApprenticeController::class, 'dato'])->name('apprentice.admin');
Route::get('apprentice/{id}', [ApprenticeController::class, 'show'])->name('apprentice.show');
Route::put('apprentice/{apprentices}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::get('apprentice/{apprentices}/editar', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::delete('apprentice/{apprentices}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

// Módulo: Programas
Route::get('program/registro', [ProgramsController::class, 'registro'])->name('programs.create');
Route::get('program/list', [ProgramsController::class, 'index'])->name('programs.index');
Route::post('program/admin', [ProgramsController::class, 'dato'])->name('programs.store');
Route::get('program/{id}', [ProgramsController::class, 'show'])->name('programs.show');
Route::put('program/{program}', [ProgramsController::class, 'update'])->name('programs.update');
Route::get('program/{program}/editar', [ProgramsController::class, 'edit'])->name('programs.edit');
Route::delete('program/{program}', [ProgramsController::class, 'destroy'])->name('programs.destroy');

// Módulo: Ambientes
Route::get('environment/registro', [EnvironmentsController::class, 'registro'])->name('environments.create');
Route::get('environment/list', [EnvironmentsController::class, 'index'])->name('environments.index');
Route::post('environment/admin', [EnvironmentsController::class, 'dato'])->name('environments.store');
Route::get('environment/{id}', [EnvironmentsController::class, 'show'])->name('environments.show');
Route::put('environment/{environments}', [EnvironmentsController::class, 'update'])->name('environments.update');
Route::get('environment/{environments}/editar', [EnvironmentsController::class, 'edit'])->name('environments.edit');
Route::delete('environment/{environment}', [EnvironmentsController::class, 'destroy'])->name('environments.destroy');

// Módulo: Anuncios
Route::get('announcements/registro', [AnnouncementsController::class, 'registro'])->name('announcements.create');
Route::get('announcements/list', [AnnouncementsController::class, 'index'])->name('announcements.index');
Route::post('announcements/admin', [AnnouncementsController::class, 'dato'])->name('announcements.store');
Route::get('announcements/{id}', [AnnouncementsController::class, 'show'])->name('announcements.show');
Route::put('announcements/{announcements}', [AnnouncementsController::class, 'update'])->name('announcements.update');
Route::get('announcements/{announcements}/editar', [AnnouncementsController::class, 'edit'])->name('announcements.edit');
Route::delete('announcements/{announcement}', [AnnouncementsController::class, 'destroy'])->name('announcements.destroy');

// Módulo: Ofertas
Route::get('offer/registro', [OffersController::class, 'registro'])->name('offers.create');
Route::get('offer/list', [OffersController::class, 'index'])->name('offers.index');
Route::post('offer/admin', [OffersController::class, 'dato'])->name('offers.admin');
Route::get('offer/{id}', [OffersController::class, 'show'])->name('offers.show');
Route::put('offer/{offers}', [OffersController::class, 'update'])->name('offers.update');
Route::get('offer/{offers}/editar', [OffersController::class, 'edit'])->name('offers.edit');
Route::delete('offer/{offers}', [OffersController::class, 'destroy'])->name('offers.destroy');

// Módulo: Fichas / Cohorts
Route::get('cohorts/registro', [CohortsController::class, 'registro'])->name('cohorts.create');
Route::get('cohorts/list', [CohortsController::class, 'index'])->name('cohorts.index');
Route::post('cohorts/admin', [CohortsController::class, 'dato'])->name('cohorts.admin');
Route::get('cohorts/{id}', [CohortsController::class, 'show'])->name('cohorts.show');
Route::put('cohorts/{cohorts}', [CohortsController::class, 'update'])->name('cohorts.update');
Route::get('cohorts/{cohorts}/editar', [CohortsController::class, 'edit'])->name('cohorts.edit');
Route::delete('cohorts/{cohorts}', [CohortsController::class, 'destroy'])->name('cohorts.destroy');