@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Computador</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('computer.model') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Número
                            </label>
                            <input
                                type="number"
                                name="number"
                                class="form-control"
                                placeholder="Ingrese el número del computador">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Marca
                            </label>
                            <input
                                type="text"
                                name="brand"
                                class="form-control"
                                placeholder="Ingrese la marca del computador">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Computador
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection