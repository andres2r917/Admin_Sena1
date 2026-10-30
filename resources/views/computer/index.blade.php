@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4 text-success fw-bold">LISTA DE COMPUTADORES</h1>

        <!-- Botón para crear nuevo computador -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('computer.create') }}" class="btn btn-success rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Computador
            </a>
        </div>

        <div class="table-responsive bg-white p-3 rounded shadow-sm">
            <table id="idcomputer" class="table table-striped table-hover table-bordered align-middle mb-0" style="width:100%">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Número</th>
                        <th>Marca</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($computer as $computer)
                        <tr>
                            <td>{{ $computer->id }}</td>
                            <td class="fw-semibold">{{ $computer->number }}</td>
                            <td>{{ $computer->brand }}</td>

                            <td class="text-center">
                                <!-- Mostrar -->
                                <a href="{{ route('computer.show', $computer->id) }}" class="btn btn-info btn-sm text-white me-1">
                                    <i class="bi bi-eye"></i> Mostrar
                                </a>

                                <!-- Editar -->
                                <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <!-- Eliminar -->
                                <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este computador?')">
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