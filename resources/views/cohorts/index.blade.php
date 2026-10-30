@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Fichas</h1>

            <a href="{{ route('cohorts.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nueva Ficha
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Fichas Registradas</h5>
            </div>

            <div class="card-body">

                <table id="idcohort" class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Código / Ficha</th>
                            <th>Fecha de Inicio</th>
                            <th>Horario</th>
                            <th>Oferta</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($cohorts as $cohort)

                            <tr>

                                <td>{{ $cohort->id }}</td>

                                <td class="fw-semibold">
                                    {{ $cohort->code }}
                                </td>

                                <td>{{ $cohort->start_date }}</td>

                                <td>{{ $cohort->schedule }}</td>

                                <td>Oferta #{{ $cohort->offer?->id }} - {{ $cohort->offer?->shift }}</td>

                                <td class="text-center">

                                    <a href="{{ route('cohorts.show', $cohort->id) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>

                                    <a href="{{ route('cohorts.edit', $cohort->id) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('cohorts.destroy', $cohort->id) }}" method="POST" class="d-inline">
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