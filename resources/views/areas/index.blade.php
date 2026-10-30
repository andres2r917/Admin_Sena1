@extends('layouts.app')

@section('content')
    <div class="sena-page">
        <div class="sena-header">
            <div>
                <span class="badge-sena mb-2">Gestión institucional</span>
                <h1 class="sena-title">Áreas registradas</h1>
                <p class="sena-subtitle">Administra las áreas académicas y operativas del centro de formación.</p>
            </div>

            <a href="{{ route('areas.create') }}" class="btn sena-btn sena-btn-primary">
                <i class="bi bi-plus-circle me-2"></i> Nueva Área
            </a>
        </div>

        <div class="sena-table-card">
            <div class="table-responsive">
                <table id="idArea" class="table table-hover align-middle mb-0" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <td>{{ $area->id }}</td>
                                <td class="fw-semibold">{{ $area->name }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        <a href="{{ route('areas.show', $area->id) }}" class="btn btn-info btn-sm action-btn">
                                            <i class="bi bi-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning btn-sm action-btn">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <form action="{{ route('areas.destroy', $area->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm action-btn" onclick="return confirm('¿Deseas eliminar esta área?')">
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