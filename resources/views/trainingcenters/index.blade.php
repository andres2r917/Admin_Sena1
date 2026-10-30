@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4 text-success fw-bold">LISTA DE CENTROS DE FORMACIÓN</h1>

        <!-- Botón para crear nuevo centro -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('trainingcenters.create') }}" class="btn btn-success rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Centro
            </a>
        </div>

        <div class="table-responsive bg-white p-3 rounded shadow-sm">
            <table id="idTrainingCenter" class="table table-striped table-hover table-bordered align-middle mb-0" style="width:100%">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Training_centers as $Training_center)
                        <tr>
                            <td>{{ $Training_center->id }}</td>
                            <td class="fw-semibold">{{ $Training_center->name }}</td>
                            <td>{{ $Training_center->location }}</td>

                            <td class="text-center">
                                <!-- Mostrar -->
                                <a href="{{ route('trainingcenters.show', $Training_center->id) }}" class="btn btn-info btn-sm text-white me-1">
                                    <i class="bi bi-eye"></i> Mostrar
                                </a>

                                <!-- Editar -->
                                <a href="{{ route('trainingcenters.edit', $Training_center->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <!-- Eliminar -->
                                <form action="{{ route('trainingcenters.destroy', $Training_center->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este centro de formación?')">
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