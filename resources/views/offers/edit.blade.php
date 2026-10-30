@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Oferta</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('offers.update', $offers) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Jornada
                            </label>
                            <input
                                type="text"
                                name="shift"
                                class="form-control"
                                value="{{ old('shift', $offers->shift) }}"
                                placeholder="Ingrese la jornada (Ej. Mañana, Tarde, Noche)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Fecha de Inscripción
                            </label>
                            <input
                                type="date"
                                name="registration_date"
                                class="form-control"
                                value="{{ old('registration_date', $offers->registration_date) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Capacidad / Cupos
                            </label>
                            <input
                                type="number"
                                name="capacity"
                                class="form-control"
                                value="{{ old('capacity', $offers->capacity) }}"
                                placeholder="Ingrese la cantidad de cupos disponibles">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Programa de Formación
                            </label>

                            <select name="program_id" class="form-select">
                                <option value="">Seleccione un programa...</option>

                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}"
                                        {{ old('program_id', $offers->program_id) == $program->id ? 'selected' : '' }}>
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
                                Actualizar Oferta
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection