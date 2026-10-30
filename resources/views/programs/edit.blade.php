@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header text-white" style="background-color: #39A900;">
                    <h3 class="mb-0">Actualizar Programa</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('programs.update', $program) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">
                                Nombre del Programa
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" name="name" 
                                value="{{ old('name', $program->name) }}" 
                                placeholder="Ingrese el nombre del programa">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">
                                Descripción
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" 
                                rows="3" placeholder="Ingrese la descripción del programa">{{ old('description', $program->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label fw-bold">
                                Tipo de Programa
                            </label>
                            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                                <option value="">Seleccione el tipo</option>
                                <option value="Tecnólogo" {{ old('type', $program->type) == 'Tecnólogo' ? 'selected' : '' }}>Tecnólogo</option>
                                <option value="Técnico" {{ old('type', $program->type) == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                                <option value="Especialización Tecnológica" {{ old('type', $program->type) == 'Especialización Tecnológica' ? 'selected' : '' }}>Especialización Tecnológica</option>
                                <option value="Curso Especial" {{ old('type', $program->type) == 'Curso Especial' ? 'selected' : '' }}>Curso Especial</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label fw-bold">
                                Duración
                            </label>
                            <input type="text" class="form-control @error('duration') is-invalid @enderror" 
                                id="duration" name="duration" 
                                value="{{ old('duration', $program->duration) }}" 
                                placeholder="Ingrese la duración">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="modality" class="form-label fw-bold">
                                Modalidad
                            </label>
                            <select name="modality" id="modality" class="form-select @error('modality') is-invalid @enderror">
                                <option value="">Seleccione la modalidad</option>
                                <option value="Presencial" {{ old('modality', $program->modality) == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                <option value="Virtual" {{ old('modality', $program->modality) == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                                <option value="Presencial / Virtual" {{ old('modality', $program->modality) == 'Presencial / Virtual' ? 'selected' : '' }}>Presencial / Virtual</option>
                            </select>
                            @error('modality')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="area_id" class="form-label fw-bold">
                                Área
                            </label>
                            <select name="area_id" id="area_id" class="form-select @error('area_id') is-invalid @enderror">
                                <option value="">Seleccione un área</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" {{ old('area_id', $program->area_id) == $area->id ? 'selected' : '' }}>
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('area_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold d-block">
                                Foto del Programa
                            </label>

                            <div class="p-3 bg-light rounded border">
                                <div class="row align-items-center">
                                    <div class="col-md-3 text-center mb-3 mb-md-0">
                                        <span class="d-block small text-muted mb-2 fw-semibold">Imagen actual:</span>
                                        @if(!empty($program->urlFoto))
                                            <img src="{{ asset('storage/images/' . $program->urlFoto) }}" 
                                                 alt="Foto del programa" 
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
                                        <input type="file" class="form-control @error('urlFoto') is-invalid @enderror" 
                                            id="urlFoto" name="urlFoto" accept="image/*">
                                        @error('urlFoto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted d-block mt-1">
                                            Si no selecciona ningún archivo, se mantendrá la imagen actual.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                                Volver
                            </a>
                                <button type="submit" class="btn text-white" style="background-color: #143084;">
                                Actualizar Programa
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection