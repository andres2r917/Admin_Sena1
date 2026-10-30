@extends('layouts.app') 

@section('content') 
<div class="container mt-5 mb-5"> 
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 

            <div class="card shadow border-0 rounded-4"> 
                <div class="card-header bg-success text-white"> 
                    <h4 class="mb-0">Registrar Ambiente</h4> 
                </div> 

                <div class="card-body"> 
        
                    <form action="{{ route('environments.store') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf 

                        <div class="mb-3"> 
                            <label class="form-label fw-bold"> 
                                Nombre del Ambiente 
                            </label> 

                            <input  
                                type="text"  
                                name="name"  
                                class="form-control"  
                                placeholder="Ingrese el nombre del ambiente" 
                                value="{{ old('name') }}"
                                required> 
                        </div> 

                        <div class="mb-3"> 
                            <label class="form-label fw-bold"> 
                                Ubicación 
                            </label> 

                            <input  
                                type="text"  
                                name="location"  
                                class="form-control"  
                                placeholder="Ingrese la ubicación del ambiente" 
                                value="{{ old('location') }}"
                                required> 
                        </div> 

                        <div class="mb-3"> 
                            <label for="training_center_id" class="form-label fw-bold"> 
                                Centro de Formación 
                            </label> 

                            <select  
                                name="training_center_id"  
                                id="training_center_id"  
                                class="form-select"  
                                required> 

                                <option value="">Seleccione un centro de formación</option> 

                                @foreach ($training_centers as $training_center) 
                                    <option value="{{ $training_center->id }}" {{ old('training_center_id') == $training_center->id ? 'selected' : '' }}> 
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

                            <a href="{{ route('environments.index') }}" class="btn btn-secondary"> 
                                Cancelar 
                            </a> 

                            <button type="submit" class="btn btn-success"> 
                                Guardar Ambiente 
                            </button> 

                        </div> 

                    </form> 
                </div> 

            </div> 

        </div> 
    </div> 
</div> 
@endsection