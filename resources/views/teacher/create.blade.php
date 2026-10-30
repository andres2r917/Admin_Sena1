@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Instructor</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('teacher.admin') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Ingrese el nombre del instructor">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Correo Electrónico
                            </label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Ingrese el correo electrónico">
                        </div>

                        <div class="mb-3">
                            <label for="area_id" class="form-label fw-bold">
                                Área
                            </label>

                            <select name="area_id" id="area_id" class="form-select">
                                <option value="">Seleccione un área</option>

                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="training_center_id" class="form-label fw-bold">
                                Centro de Formación
                            </label>

                            <select name="training_center_id" id="training_center_id" class="form-select">
                                <option value="">Seleccione un centro de formación</option>

                                @foreach ($training_centers as $training)
                                    <option value="{{ $training->id }}">
                                        {{ $training->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Instructor
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection