@extends('layouts.app')

@section('content')
    <div class="sena-page">
        <div class="sena-header">
            <div>
                <span class="badge-sena mb-2">Oferta formativa</span>
                <h1 class="sena-title">Programas</h1>
                <p class="sena-subtitle">Revisa y administra los programas académicos del SENA.</p>
            </div>

            <a href="{{ route('programs.create') }}" class="btn sena-btn sena-btn-primary">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Programa
            </a>
        </div>

        <div class="sena-table-card">
            <div class="table-responsive">
                <table id="idProgram" class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Duración</th>
                            <th>Modalidad</th>
                            <th>Área</th>
                            <th>Imagen</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $program->id }}</td>
                                <td class="fw-semibold">{{ $program->name }}</td>
                                <td class="small text-muted" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $program->description }}
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border shadow-sm px-2 py-1 fs-6 fw-normal">
                                        <i class="bi bi-award-fill text-primary me-1"></i>{{ $program->type }}
                                    </span>
                                </td>
                                <td>{{ $program->duration }}</td>
                                <td>{{ $program->modality }}</td>
                                <td>{{ $program->area->name ?? 'N/A' }}</td>
                                <td>
                                    @if($program->image)
                                        <img src="{{ asset('storage/images/' . $program->image) }}" alt="Imagen del programa" width="50" height="50" style="object-fit: cover; border-radius: 5px;">
                                    @else
                                        <span class="text-muted small">Sin foto</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        <a href="{{ route('programs.show', $program) }}" class="btn btn-info btn-sm action-btn">Mostrar</a>
                                        <a href="{{ route('programs.edit', $program) }}" class="btn btn-warning btn-sm action-btn">Editar</a>
                                        <form action="{{ route('programs.destroy', $program) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este programa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm action-btn">Eliminar</button>
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