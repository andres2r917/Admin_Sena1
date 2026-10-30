@extends('layouts.app')

@section('content')
<div class="sena-page">
    <div class="sena-form-card overflow-hidden">
        <div class="card-header bg-success text-white py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <span class="badge bg-white text-success mb-2">Detalle</span>
                    <h3 class="mb-0">Profesor: {{ $teachers['name'] }}</h3>
                </div>
            </div>
        </div>

        <div class="card-body p-4 p-md-5">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="sena-label">ID</label>
                    <div class="form-control bg-light">{{ $teachers['id'] }}</div>
                </div>

                <div class="col-md-6">
                    <label class="sena-label">Nombre completo</label>
                    <div class="form-control">{{ $teachers['name'] }}</div>
                </div>

                <div class="col-12">
                    <label class="sena-label">Correo electrónico</label>
                    <div class="form-control">{{ $teachers['email'] }}</div>
                </div>

                <div class="col-md-6">
                    <label class="sena-label">ID de área</label>
                    <div class="form-control">{{ $teachers['area_id'] }}</div>
                </div>

                <div class="col-md-6">
                    <label class="sena-label">ID del centro de formación</label>
                    <div class="form-control">{{ $teachers['training_center_id'] }}</div>
                </div>

                <div class="col-md-6">
                    <label class="sena-label">Fecha de registro</label>
                    <div class="form-control bg-light text-muted">{{ \Carbon\Carbon::parse($teachers['created_at'])->format('d/m/Y H:i') }}</div>
                </div>

                <div class="col-md-6">
                    <label class="sena-label">Última actualización</label>
                    <div class="form-control bg-light text-muted">{{ \Carbon\Carbon::parse($teachers['updated_at'])->format('d/m/Y H:i') }}</div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ url()->previous() }}" class="btn sena-btn sena-btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection