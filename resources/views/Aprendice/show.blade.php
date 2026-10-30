@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">
                Aprendiz: {{ $apprentices['name'] }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $apprentices['id'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nombre Completo</label>
                    <div class="form-control">
                        {{ $apprentices['name'] }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Correo Electronico </label>
                    <div class="form-control">
                        {{ $apprentices['email'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Numero de Celular</label>
                    <div class="form-control">
                        {{ $apprentices['cell_number'] }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID de Curso </label>
                    <div class="form-control">
                        {{ $apprentices['course_id'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID de Computador</label>
                    <div class="form-control">
                        {{ $apprentices['computer_id'] }}
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de registro</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($apprentices['created_at'])->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($apprentices['updated_at'])->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

            <div class="mt-4 text-end">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
            </div>

        </div>

    </div>

</div>
@endsection