@extends('layouts.app')

@section('content')
    <div class="sena-page">
        <div class="sena-header">
            <div>
                <span class="badge-sena mb-2">Talento humano</span>
                <h1 class="sena-title">Profesores</h1>
                <p class="sena-subtitle">Consulta y administra el personal instructor del centro de formación.</p>
            </div>

            <a href="{{ route('teacher.create') }}" class="btn sena-btn sena-btn-primary">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Profesor
            </a>
        </div>

        <div class="sena-table-card">
            <div class="table-responsive">
                <table id="idTeacher" class="table table-hover align-middle mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Área</th>
                            <th>Centro de Formación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->id }}</td>
                                <td class="fw-semibold">{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->area_id }}</td>
                                <td>{{ $teacher->training_center_id }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-info btn-sm action-btn">
                                            <i class="bi bi-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm action-btn">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm action-btn" onclick="return confirm('¿Deseas eliminar este profesor?')">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection