@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4 text-success fw-bold">LISTA DE CURSOS</h1>

        <!-- Botón para crear nuevo curso -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('course.create') }}" class="btn btn-success rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Curso
            </a>
        </div>

        <div class="table-responsive bg-white p-3 rounded shadow-sm">
            <table id="idCourse" class="table table-striped table-hover table-bordered align-middle mb-0" style="width:100%">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Número de Curso</th>
                        <th>Fecha / Día</th>
                        <th>Área</th>
                        <th>Centro de Formación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td class="fw-semibold">{{ $course->course_number }}</td>
                            <td>{{ $course->day }}</td>
                            <td>{{ $course->area_id }}</td>
                            <td>{{ $course->training_center_id }}</td>

                            <td class="text-center">
                                <!-- Mostrar -->
                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-info btn-sm text-white me-1">
                                    <i class="bi bi-eye"></i> Mostrar
                                </a>

                                <!-- Editar -->
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <!-- Eliminar -->
                                <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este curso?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection