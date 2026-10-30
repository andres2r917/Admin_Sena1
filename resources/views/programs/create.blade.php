@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow border-0 rounded-4">
                    <div class="card-header text-white" style="background-color: #39A900;">
                        <h4 class="mb-0">Registrar Programa</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">
                                    Nombre del Programa
                                </label>
                                <input type="text" name="name" id="name" 
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" 
                                    placeholder="Ingrese el nombre del programa" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">
                                    Descripción
                                </label>
                                <textarea name="description" id="description" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    rows="3" placeholder="Ingrese la descripción del programa" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label fw-bold">
                                    Tipo de Programa
                                </label>
                                <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="">Seleccione el tipo</option>
                                    <option value="Tecnólogo" {{ old('type') == 'Tecnólogo' ? 'selected' : '' }}>Tecnólogo</option>
                                    <option value="Técnico" {{ old('type') == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                                    <option value="Especialización Tecnológica" {{ old('type') == 'Especialización Tecnológica' ? 'selected' : '' }}>Especialización Tecnológica</option>
                                    <option value="Curso Especial" {{ old('type') == 'Curso Especial' ? 'selected' : '' }}>Curso Especial</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label fw-bold">
                                    Duración
                                </label>
                                <input type="text" name="duration" id="duration" 
                                    class="form-control @error('duration') is-invalid @enderror" 
                                    value="{{ old('duration') }}" 
                                    placeholder="Ej. 27 Meses" required>
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="modality" class="form-label fw-bold">
                                    Modalidad
                                </label>
                                <select name="modality" id="modality" class="form-select @error('modality') is-invalid @enderror" required>
                                    <option value="">Seleccione la modalidad</option>
                                    <option value="Presencial" {{ old('modality') == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                    <option value="Virtual" {{ old('modality') == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                                    <option value="Presencial / Virtual" {{ old('modality') == 'Presencial / Virtual' ? 'selected' : '' }}>Presencial / Virtual</option>
                                </select>
                                @error('modality')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="area_id" class="form-label fw-bold">
                                    Área
                                </label>
                                <select name="area_id" id="area_id" class="form-select @error('area_id') is-invalid @enderror" required>
                                    <option value="">Seleccione un área</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                            {{ $area->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="urlFoto" class="form-label fw-bold">
                                    Adjuntar FOTO
                                </label>
                                <input type="file" name="urlFoto" id="urlFoto" 
                                    class="form-control @error('urlFoto') is-invalid @enderror" accept="image/*">
                                @error('urlFoto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn text-white" style="background-color: #39A900;">
                                    Guardar Programa
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection