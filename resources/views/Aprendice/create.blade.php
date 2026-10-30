@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white py-3 rounded-top-4">
                    <h4 class="mb-0 fw-bold text-center">Registrar Aprendiz</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('apprentice.admin') }}" method="POST">
                        @csrf

                        <!-- Nombre Completo -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-secondary">Nombre Completo</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre completo" required>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold text-secondary">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" required>
                        </div>

                        <!-- Número de Celular -->
                        <div class="mb-3">
                            <label for="cell_number" class="form-label fw-bold text-secondary">Número de Celular</label>
                            <input type="text" name="cell_number" id="cell_number" class="form-control" placeholder="3000000000" required>
                        </div>

                        <!-- Selección de Curso -->
                        <div class="mb-3">
                            <label for="course_id" class="form-label fw-bold text-secondary">Curso / Ficha</label>
                            <select name="course_id" id="course_id" class="form-select" required>
                                <option value="" disabled selected>Seleccione un curso</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Selección de Computador -->
                        <div class="mb-4">
                            <label for="computer_id" class="form-label fw-bold text-secondary">Computador Asignado</label>
                            <select name="computer_id" id="computer_id" class="form-select">
                                <option value="" disabled selected>Seleccione un computador</option>
                                @foreach($computers as $computer)
                                    <option value="{{ $computer->id }}">Equipo #{{ $computer->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg fw-bold shadow-sm">
                                Registrar Aprendiz
                            </button>
                            <a href="{{ route('apprentice.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection