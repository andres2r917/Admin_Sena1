@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                Ficha #{{ $cohorts->code }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $cohorts->id }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Código de ficha</label>
                    <div class="form-control">
                        {{ $cohorts->code }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de Inicio</label>
                    <div class="form-control">
                        {{ \Carbon\Carbon::parse($cohorts->start_date)->format('d/m/Y') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Horario</label>
                    <div class="form-control">
                        {{ $cohorts->schedule }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Oferta Asociada</label>
                    <div class="form-control">
                        Oferta #{{ $cohorts->offer?->id }} - {{ $cohorts->offer?->shift }}
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de creación</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($cohorts->created_at)->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($cohorts->updated_at)->format('d/m/Y H:i') }}
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