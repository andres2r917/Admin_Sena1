@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Ofertas</h1>
            <a href="{{ route('offers.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nueva Oferta
            </a>
        </div>
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Ofertas Registradas</h5>
            </div>
            <div class="card-body">
                <table id="idOffer" class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Jornada</th>
                            <th>Fecha de Inscripción</th>
                            <th>Capacidad</th>
                            <th>Programa de Formación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td class="fw-semibold">
                                    {{ $offer->shift }}
                                </td>
                                <td>{{ $offer->registration_date }}</td>
                                <td>{{ $offer->capacity }}</td>
                                <td>{{ $offer->programs?->name ?? 'Sin programa' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('offers.show', $offer->id) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>
                                    <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" class="d-inline">
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
@endsection