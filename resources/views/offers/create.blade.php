@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Oferta</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('offers.admin') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Jornada
                            </label>
                            <input
                                type="text"
                                name="shift"
                                class="form-control"
                                placeholder="Ingrese la jornada (Ej. Mañana, Tarde, Noche)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Fecha de Inscripción
                            </label>
                            <input
                                type="date"
                                name="registration_date"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Capacidad / Cupos
                            </label>
                            <input
                                type="number"
                                name="capacity"
                                class="form-control"
                                placeholder="Ingrese la cantidad de cupos disponibles">
                        </div>

                        <div class="mb-3">
                            <label for="program_id" class="form-label fw-bold">
                                Programa de Formación
                            </label>

                            <select name="program_id" id="program_id" class="form-select">
                                <option value="">Seleccione un programa de formación</option>

                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">
                                        {{ $program->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Oferta
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection