@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                Oferta #{{ $offers->id }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $offers->id }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Jornada</label>
                    <div class="form-control">
                        {{ $offers->shift }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de Inscripción</label>
                    <div class="form-control">
                        {{ \Carbon\Carbon::parse($offers->registration_date)->format('d/m/Y') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Capacidad / Cupos</label>
                    <div class="form-control">
                        {{ $offers->capacity }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Programa de Formación</label>
                    <div class="form-control">
                        {{ $offers->program?->name }}
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de creación</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($offers->created_at)->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($offers->updated_at)->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

            <div class="mt-4 text-end">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
            </div>

        </div>

    </div>

</div>
@endsection