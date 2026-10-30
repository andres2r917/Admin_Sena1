@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Ficha</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('cohorts.admin') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Código de la Ficha
                            </label>
                            <input
                                type="text"
                                name="code"
                                class="form-control"
                                placeholder="Ingrese el código o número de la ficha">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Fecha de Inicio
                            </label>
                            <input
                                type="date"
                                name="start_date"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Horario
                            </label>
                            <input
                                type="text"
                                name="schedule"
                                class="form-control"
                                placeholder="Ingrese el horario (Ej. 07:00 a 13:00)">
                        </div>

                        <div class="mb-3">
                            <label for="offer_id" class="form-label fw-bold">
                                Oferta
                            </label>

                            <select name="offer_id" id="offer_id" class="form-select">
                                <option value="">Seleccione una oferta</option>

                                @foreach ($offer as $offer)
                                    <option value="{{ $offer->id }}">
                                        Oferta #{{ $offer->id }} - {{ $offer->shift }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Ficha
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection