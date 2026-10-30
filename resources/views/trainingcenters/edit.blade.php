@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Centro de Formación</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('trainingcenters.update', $Training_centers) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $Training_centers->name) }}"
                                placeholder="Ingrese el nombre del centro">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Ubicación
                            </label>
                            <input
                                type="text"
                                name="location"
                                class="form-control"
                                value="{{ old('location', $Training_centers->location) }}"
                                placeholder="Ingrese la ubicación">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Actualizar Centro
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection