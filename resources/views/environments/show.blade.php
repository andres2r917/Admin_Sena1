@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                {{ $environments['name'] }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $environments['id'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nombre del environmentsa</label>
                    <div class="form-control">
                        {{ $environments['name'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Ubicación</label>
                    <div class="form-control">
                        {{ $environments['location'] }}
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Área</label>
                    <div class="form-control">
                        {{ $environments->training_center->name ?? ($environments['training_center']['name'] ?? 'N/A') }}
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="fw-bold d-block">Foto del ambiente</label>
                    @if(!empty($environments['urlFoto']))
                        <img 
                            src="{{ asset('storage/images/' . $environments['urlFoto']) }}" 
                            alt="Foto del environmentsa" 
                            class="img-thumbnail mt-2"
                            style="max-width: 200px; height: auto;"
                        >
                    @else
                        <div class="form-control text-muted">Sin foto asignada</div>
                    @endif
                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de creación</label>
                    <div class="form-control text-muted">
                        {{ \Carbon\Carbon::parse($environments['created_at'])->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted">
                        {{ \Carbon\Carbon::parse($environments['updated_at'])->format('d/m/Y H:i') }}
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