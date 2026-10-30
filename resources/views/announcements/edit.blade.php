@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0 rounded-5">

        <div class="card-header text-white" style="background-color: #39A900;">
            <h3 class="mb-0">Actualizar Anuncio</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('announcements.update', $announcements) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">
                        Título del Anuncio
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value="{{ old('title', $announcements->title) }}"
                        placeholder="Ingrese el título del anuncio">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">
                        Contenido
                    </label>

                    <textarea
                        class="form-control"
                        id="content"
                        name="content"
                        rows="4"
                        placeholder="Ingrese el contenido del anuncio">{{ old('content', $announcements->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="publish_date" class="form-label fw-bold">
                        Fecha de Publicación
                    </label>

                    <input
                        type="date"
                        class="form-control"
                        id="publish_date"
                        name="publish_date"
                        value="{{ old('publish_date', $announcements->publish_date) }}">
                </div>


                <div class="mb-3">
                    <label for="training_center_id" class="form-label fw-bold">
                        Centro de Formación
                    </label>

                    <select name="training_center_id" id="training_center_id" class="form-select">
                        <option value="">Seleccione un centro de formación</option>
                        @foreach ($training_centers as $training_center)
                            <option value="{{ $training_center->id }}" {{ old('training_center_id', $announcements->training_center_id) == $training_center->id ? 'selected' : '' }}>
                                {{ $training_center->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Muestra la imagen actual y permite subir una nueva -->
                <div class="mb-3">
                    <label class="form-label fw-bold d-block">
                        Foto del Anuncio
                    </label>

                    <div class="p-3 bg-light rounded border">
                        <div class="row align-items-center">
                            
                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                <span class="d-block small text-muted mb-2 fw-semibold">Imagen actual:</span>
                                @if(!empty($announcements->urlFoto))
                                    <img src="{{ asset('storage/images/' . $announcements->urlFoto) }}" 
                                         alt="Foto del anuncio" 
                                         class="img-thumbnail rounded shadow-sm" 
                                         style="max-height: 110px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary">Sin imagen cargada</span>
                                @endif
                            </div>

                            <div class="col-md-9">
                                <label for="urlFoto" class="form-label fw-bold text-secondary small">
                                    Cambiar Imagen (opcional)
                                </label>
                                <input
                                    type="file"
                                    class="form-control"
                                    id="urlFoto"
                                    name="urlFoto"
                                    accept="image/*">
                                <small class="text-muted d-block mt-1">
                                    Si no selecciona ningún archivo, se mantendrá la imagen que está guardada actualmente.
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        Volver
                    </a>

                        <button type="submit" class="btn text-white" style="background-color: #143084;">
                        Actualizar Anuncio
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection