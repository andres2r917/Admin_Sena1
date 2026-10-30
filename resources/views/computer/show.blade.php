@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                {{ $computer['brand'] }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $computer['id'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Número</label>
                    <div class="form-control">
                        {{ $computer['number'] }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Marca</label>
                    <div class="form-control">
                        {{ $computer['brand'] }}
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de creación</label>
                    <div class="form-control text-muted">
                        {{ \Carbon\Carbon::parse($computer['created_at'])->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted">
                        {{ \Carbon\Carbon::parse($computer['updated_at'])->format('d/m/Y H:i') }}
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