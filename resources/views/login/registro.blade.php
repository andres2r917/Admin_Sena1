@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden w-100" style="max-width: 950px;">
        <div class="row g-0">
            
            <!-- Panel Lateral Informativo (Izquierda) -->
            <div class="col-lg-5 text-white p-4 p-md-5 d-flex flex-column justify-content-between" 
                 style="background: linear-gradient(135deg, #0b4619 0%, #198754 100%);">
                
                <div>
                    <!-- Logo / Marca -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-person-plus-fill fs-2 text-warning me-2"></i>
                        <span class="fs-4 fw-bold tracking-wide">AdminSENA</span>
                    </div>

                    <!-- Mensaje Promocional -->
                    <h3 class="fw-bold mb-3">Únete a la Plataforma</h3>
                    <p class="text-white-50 small leading-relaxed">
                        Crea tu usuario institucional para acceder al sistema de gestión académica, control de ambientes y asignación de recursos.
                    </p>
                </div>

                <!-- Puntos Clave / Beneficios -->
                <div class="my-3">
                    <div class="d-flex align-items-center mb-2 text-white-50 small">
                        <i class="bi bi-check-circle-fill text-warning me-2"></i> Acceso personalizado por rol
                    </div>
                    <div class="d-flex align-items-center mb-2 text-white-50 small">
                        <i class="bi bi-check-circle-fill text-warning me-2"></i> Control de fichas e instructores
                    </div>
                    <div class="d-flex align-items-center text-white-50 small">
                        <i class="bi bi-check-circle-fill text-warning me-2"></i> Gestión segura e institucional
                    </div>
                </div>

                <!-- Pie del Panel Lateral -->
                <div class="pt-4 border-top border-white border-opacity-25 mt-2">
                    <small class="text-white-50 d-block mb-1">
                        <i class="bi bi-geo-alt-fill me-1"></i> Regional Cauca
                    </small>
                    <small class="text-white-50 fw-semibold">Programa ADSO</small>
                </div>
            </div>

            <!-- Formulario de Registro (Derecha) -->
            <div class="col-lg-7 bg-white p-4 p-md-5 d-flex flex-column justify-content-center">
                
                <div class="mb-4">
                    <h4 class="fw-bold text-dark mb-1">Crear Cuenta</h4>
                    <p class="text-muted small">Diligencia el formulario para completar tu registro en el sistema.</p>
                </div>

                <form action="{{ route('registro.store') }}" method="POST">
                    @csrf

                    <!-- Nombre Completo -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-secondary small">Nombre Completo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-success">
                                <i class="bi bi-person"></i>
                            </span>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror" 
                                placeholder="Nombre y apellido" 
                                value="{{ old('name') }}"
                                required 
                                autofocus>
                        </div>
                        @error('name')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Tipo y Número de Documento (2 Columnas) -->
                    <div class="row g-2 mb-3">
                        <!-- Tipo de Documento -->
                        <div class="col-md-5">
                            <label for="document_type" class="form-label fw-semibold text-secondary small">Tipo Doc.</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-success">
                                    <i class="bi bi-card-text"></i>
                                </span>
                                <select name="document_type" id="document_type" class="form-select bg-light border-start-0 ps-0 @error('document_type') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('document_type') ? '' : 'selected' }}>Tipo...</option>
                                    <option value="CC" {{ old('document_type') == 'CC' ? 'selected' : '' }}>C.C.</option>
                                    <option value="TI" {{ old('document_type') == 'TI' ? 'selected' : '' }}>T.I.</option>
                                    <option value="CE" {{ old('document_type') == 'CE' ? 'selected' : '' }}>C.E.</option>
                                    <option value="PEP" {{ old('document_type') == 'PEP' ? 'selected' : '' }}>P.E.P.</option>
                                    <option value="PP" {{ old('document_type') == 'PP' ? 'selected' : '' }}>Pasaporte</option>
                                </select>
                            </div>
                            @error('document_type')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Número de Documento -->
                        <div class="col-md-7">
                            <label for="document" class="form-label fw-semibold text-secondary small">Número de Documento</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-success">
                                    <i class="bi bi-card-heading"></i>
                                </span>
                                <input 
                                    type="text" 
                                    name="document" 
                                    id="document" 
                                    class="form-control bg-light border-start-0 ps-0 @error('document') is-invalid @enderror" 
                                    placeholder="Ej: 1061700123" 
                                    value="{{ old('document') }}"
                                    required>
                            </div>
                            @error('document')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

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
                                placeholder="usuario@sena.edu.co" 
                                value="{{ old('email') }}"
                                required>
                        </div>
                        @error('email')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Tipo de Rol -->
                    <div class="mb-3">
                        <label for="role" class="form-label fw-semibold text-secondary small">Tipo de Cuenta</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-success">
                                <i class="bi bi-shield-check"></i>
                            </span>
                            <select name="role" id="role" class="form-select bg-light border-start-0 ps-0 @error('role') is-invalid @enderror" required>
                                <option value="" disabled {{ old('role') ? '' : 'selected' }}>Seleccionar rol...</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario / Aprendiz</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>
                        @error('role')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Contraseña y Confirmación (2 Columnas) -->
                    <div class="row g-2 mb-4">
                        <div class="col-md-6">
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
                            @error('password')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-semibold text-secondary small">Confirmar Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-success">
                                    <i class="bi bi-check-circle"></i>
                                </span>
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="password_confirmation" 
                                    class="form-control bg-light border-start-0 ps-0" 
                                    placeholder="••••••••" 
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de Registro -->
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-success btn-lg fw-bold rounded-3 shadow-sm py-2 fs-6">
                            Registrarse <i class="bi bi-arrow-right-short ms-1"></i>
                        </button>
                    </div>

                    <!-- Accesos Secundarios -->
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2">
                        <a href="{{ route('home') }}" class="text-secondary text-decoration-none small">
                            <i class="bi bi-house-door me-1"></i> Inicio
                        </a>
                        <small class="text-muted">
                            ¿Ya tienes una cuenta? 
                            <a href="{{ route('login') }}" class="text-success text-decoration-none fw-bold">Inicia sesión aquí</a>
                        </small>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection