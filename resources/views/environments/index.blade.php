@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Ambientes</h1>

            <a href="{{ route('environments.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nuevo Ambiente
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Ambientes Registrados</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="idEnvironment" class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Ubicación</th>
                                <th>Centro de Formación</th>
                                <th>Imagen</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($environments as $environment)

                                <tr>

                                    <td>{{ $environment->id }}</td>

                                    <td class="fw-semibold">
                                        {{ $environment->name }}
                                    </td>

                                    <!-- Campo Ubicación Resaltado -->
                                    <td>
                                        <span class="badge bg-light text-dark border shadow-sm px-2 py-1 fs-6 fw-normal">
                                            <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $environment->location }}
                                        </span>
                                    </td>

                                    <td>{{ $environment->training_center?->name ?? 'N/A' }}</td>

                                    <td>
                                        @if($environment->urlFoto)
                                            <img src="{{ asset('storage/images/' . $environment->urlFoto) }}"
                                                 alt="Imagen del ambiente"
                                                 width="50"
                                                 height="50"
                                                 style="object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="text-muted small">Sin foto</span>
                                        @endif
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('environments.show', $environment->id) }}" class="btn btn-info btn-sm me-1 text-white">
                                            Mostrar
                                        </a>

                                        <a href="{{ route('environments.edit', $environment->id) }}" class="btn btn-warning btn-sm me-1 text-white">
                                            Editar
                                        </a>

                                        <form action="{{ route('environments.destroy', $environment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este ambiente?')">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>
@endsection