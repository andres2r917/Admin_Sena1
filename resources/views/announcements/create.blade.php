@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Anuncio</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Título del Anuncio
                            </label>
                            <input type="text" name="title" class="form-control"
                                placeholder="Ingrese el título del anuncio" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Contenido
                            </label>
                            <textarea name="content" class="form-control" rows="4" placeholder="Ingrese el contenido del anuncio" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Fecha de Publicación
                            </label>
                            <input type="date" name="publish_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="training_center_id" class="form-label fw-bold">
                                Centro de Formación
                            </label>

                            <select name="training_center_id" id="training_center_id" class="form-select" required>
                                <option value="">Seleccione un centro de formación</option>

                                @foreach ($training_centers as $training_center)
                                    <option value="{{ $training_center->id }}">
                                        {{ $training_center->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Adjuntar FOTO
                            </label>
                            <input 
                                type="file" 
                                name="urlFoto" 
                                class="form-control" 
                                accept="image/*"
                                required>
                        </div> 
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('announcements.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Anuncio
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection