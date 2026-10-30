@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden w-100" style="max-width: 900px;">
        <div class="row g-0">
            
            <!-- Panel Lateral Informativo (Izquierda) -->
            <div class="col-lg-5 text-white p-4 p-md-5 d-flex flex-column justify-content-between" 
                 style="background: linear-gradient(135deg, #0b4619 0%, #198754 100%);">
                
                <div>
                    <!-- Logo / Marca -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-shield-lock-fill fs-2 text-warning me-2"></i>
                        <span class="fs-4 fw-bold tracking-wide">AdminSENA</span>
                    </div>

                    <!-- Mensaje de Bienvenida -->
                    <h3 class="fw-bold mb-3">Gestión Educativa Integral</h3>
                    <p class="text-white-50 small leading-relaxed">
                        Accede al portal administrativo para gestionar ambientes, aprendices y recursos de formación de manera eficiente.
                    </p>
                </div>

                <!-- Pie del Lateral -->
                <div class="pt-4 border-top border-white border-opacity-25 mt-4">
                    <small class="text-white-50 d-block mb-1">
                        <i class="bi bi-geo-alt-fill me-1"></i> Regional Cauca
                    </small>
                    <small class="text-white-50 fw-semibold">Programa ADSO</small>
                </div>
            </div>

            <!-- Formulario de Inicio de Sesión (Derecha) -->
            <div class="col-lg-7 bg-white p-4 p-md-5 d-flex flex-column justify-content-center">
                
                <div class="mb-4">
                    <h4 class="fw-bold text-dark mb-1">Iniciar Sesión</h4>
                    <p class="text-muted small">Ingresa tu correo institucional y contraseña para continuar.</p>
                </div>

                <!-- Alert de Errores -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 py-2 px-3 mb-3" role="alert">
                        <small class="fw-semibold">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i>
                            {{ $errors->first() }}
                        </small>
                        <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-secondary small">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-success">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="form-control bg-light border-start-0 ps-0 @error('email') is-invalid @enderror" 
                                placeholder="ejemplo@soy.sena.edu.co" 
                                value="{{ old('email') }}"
                                required
                                autofocus>
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold text-secondary small">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-success">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-control bg-light border-start-0 ps-0 @error('password') is-invalid @enderror" 
                                placeholder="••••••••" 
                                required>
                        </div>
                    </div>

                    <!-- Botón Ingresar -->
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-success btn-lg fw-bold rounded-3 shadow-sm py-2 fs-6">
                            Ingresar al Sistema <i class="bi bi-arrow-right-short ms-1"></i>
                        </button>
                    </div>

                    <!-- Accesos Secundarios -->
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2">
                        <a href="{{ route('home') }}" class="text-secondary text-decoration-none small">
                            <i class="bi bi-house-door me-1"></i> Inicio
                        </a>
                        <small class="text-muted">
                            ¿Sin cuenta? 
                            <a href="{{ route('registro') }}" class="text-success text-decoration-none fw-bold">Regístrate</a>
                        </small>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection