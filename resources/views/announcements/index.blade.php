@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Anuncios</h1>

            <a href="{{ route('announcements.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nuevo Anuncio
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Anuncios Registrados</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="idAnnouncement" class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Contenido</th>
                                <th>Fecha de Publicación</th>
                                <th>Centro de Formación</th>
                                <th>Imagen</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($announcements as $announcement)

                                <tr>

                                    <td>{{ $announcement->id }}</td>

                                    <td class="fw-semibold">
                                        {{ $announcement->title }}
                                    </td>

                                    <td class="small text-muted" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $announcement->content }}
                                    </td>

                                    <!-- Campo Fecha de Publicación Resaltado -->
                                    <td>
                                        <span class="badge bg-light text-dark border shadow-sm px-2 py-1 fs-6 fw-normal">
                                            <i class="bi bi-calendar-event text-success me-1"></i>{{ $announcement->publish_date }}
                                        </span>
                                    </td>

                                    <td>{{ $announcement->training_center?->name ?? 'N/A' }}</td>

                                    <td>
                                        @if($announcement->urlFoto)
                                            <img src="{{ asset('storage/images/' . $announcement->urlFoto) }}"
                                                 alt="Imagen del anuncio"
                                                 width="50"
                                                 height="50"
                                                 style="object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="text-muted small">Sin foto</span>
                                        @endif
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('announcements.show', $announcement->id) }}" class="btn btn-info btn-sm me-1 text-white">
                                            Mostrar
                                        </a>

                                        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-warning btn-sm me-1 text-white">
                                            Editar
                                        </a>

                                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este anuncio?')">
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