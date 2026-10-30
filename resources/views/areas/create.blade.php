@extends('layouts.app')

@section('content')
<style>
    .sena-page .badge-sena {
        background-color: #E8F5E9;
        color: #2D8300;
        border: 1px solid #39A900;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        display: inline-block;
    }
    .sena-page .sena-title {
        color: #1F5E00;
        font-weight: 800;
    }
    .sena-page .sena-subtitle {
        color: #65676B;
        font-size: 14px;
    }
    .sena-page .sena-label {
        color: #1F5E00;
        font-weight: 700;
        font-size: 13px;
        margin-bottom: 6px;
        display: block;
    }
    .sena-page .sena-form-card {
        background: #FFFFFF;
        border: 1px solid #E0E0E0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }
    .sena-page .sena-btn {
        border-radius: 20px;
        font-weight: 700;
        padding: 10px 24px;
        border: none;
    }
    .sena-page .sena-btn-primary {
        background-color: #39A900;
        color: #FFFFFF;
    }
    .sena-page .sena-btn-primary:hover {
        background-color: #2D8300;
        color: #FFFFFF;
    }
    .sena-page .sena-btn-secondary {
        background-color: #E8F5E9;
        color: #2D8300;
        border: 1px solid #39A900;
    }
    .sena-page .sena-btn-secondary:hover {
        background-color: #D9F7C4;
        color: #237804;
    }
</style>

<div class="sena-page">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <div class="sena-form-card p-4 p-md-5">
                <div class="mb-4">
                    <span class="badge-sena mb-2">Registrar</span>
                    <h2 class="sena-title mb-1">Nueva Área</h2>
                    <p class="sena-subtitle">Registra una nueva área del sistema.</p>
                </div>

                <form action="{{ route('areas.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="sena-label" for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del área" value="{{ old('name') }}" required>
                    </div>

                    <div class="d-flex justify-content-between gap-3 flex-wrap">
                        <a href="{{ route('areas.index') }}" class="btn sena-btn sena-btn-secondary">Cancelar</a>
                        <button type="submit" class="btn sena-btn sena-btn-primary">Registrar Área</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection