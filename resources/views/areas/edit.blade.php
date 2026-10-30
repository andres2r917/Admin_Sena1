@extends('layouts.app')

@section('content')
<div class="sena-page">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <div class="sena-form-card p-4 p-md-5">
                <div class="mb-4">
                    <span class="badge-sena mb-2">Actualizar</span>
                    <h2 class="sena-title mb-1">Editar área</h2>
                    <p class="sena-subtitle">Modifica la información de esta categoría.</p>
                </div>

                <form action="{{ route('areas.update', $areas) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="sena-label">Nombre del área</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $areas->name) }}" placeholder="Ingrese el nombre del área">
                    </div>

                    <div class="d-flex justify-content-between gap-3 flex-wrap">
                        <a href="{{ url()->previous() }}" class="btn sena-btn sena-btn-secondary">Volver</a>
                        <button type="submit" class="btn sena-btn sena-btn-primary">Actualizar Área</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
