@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-success text-white py-5 mb-5 shadow-sm">
    <div class="container text-center py-4">
        <h1 class="display-4 fw-bold mb-3">Sobre Nosotros</h1>
        <p class="lead col-md-8 mx-auto opacity-90">
            En el sistema <strong>AdminSENA</strong> gestionamos el talento, la formación y los recursos tecnológicos de nuestro centro de aprendizaje para impulsar el desarrollo profesional.
        </p>
    </div>
</div>

<div class="container mb-5">
    <!-- Misión y Visión -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 border-start border-5 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle p-3 me-3">
                            <i class="bi bi-flag-fill fs-3"></i>
                        </div>
                        <h3 class="card-title fw-bold text-dark mb-0">Nuestra Misión</h3>
                    </div>
                    <p class="card-text text-muted fs-6">
                        Ofrecer formación profesional integral para la incorporación de las personas en actividades productivas que contribuyan al desarrollo social, económico y tecnológico del país.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 border-start border-5 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle p-3 me-3">
                            <i class="bi bi-eye-fill fs-3"></i>
                        </div>
                        <h3 class="card-title fw-bold text-dark mb-0">Nuestra Visión</h3>
                    </div>
                    <p class="card-text text-muted fs-6">
                        Consolidarnos como una entidad referente en formación técnica y tecnológica, reconocida por la innovación de sus procesos educativos y la excelencia de sus aprendices e instructores.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas Institucionales -->
    <div class="card bg-light border-0 rounded-4 shadow-sm p-4 mb-5">
        <div class="card-body">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="p-2">
                        <i class="bi bi-people-fill text-success fs-1"></i>
                        <h2 class="fw-bold text-dark mt-2 mb-0">+500</h2>
                        <span class="text-muted small">Aprendices</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-2">
                        <i class="bi bi-person-badge-fill text-success fs-1"></i>
                        <h2 class="fw-bold text-dark mt-2 mb-0">+30</h2>
                        <span class="text-muted small">Instructores</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-2">
                        <i class="bi bi-journal-bookmark-fill text-success fs-1"></i>
                        <h2 class="fw-bold text-dark mt-2 mb-0">+15</h2>
                        <span class="text-muted small">Cursos / Fichas</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-2">
                        <i class="bi bi-pc-display text-success fs-1"></i>
                        <h2 class="fw-bold text-dark mt-2 mb-0">+100</h2>
                        <span class="text-muted small">Equipos Asignados</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Valores Institucionales -->
    <div class="text-center mb-4">
        <h3 class="fw-bold text-dark">Valores Institucionales</h3>
        <p class="text-muted">Principios que orientan nuestro trabajo diario</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-3">
                <div class="card-body">
                    <i class="bi bi-award text-success fs-1 mb-3"></i>
                    <h5 class="fw-bold">Respeto y Rigor</h5>
                    <p class="text-muted small mb-0">Promovemos un ambiente de aprendizaje basado en la ética, el respeto mutuo y el compromiso con la calidad académica.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-3">
                <div class="card-body">
                    <i class="bi bi-cpu text-success fs-1 mb-3"></i>
                    <h5 class="fw-bold">Innovación</h5>
                    <p class="text-muted small mb-0">Implementamos herramientas tecnológicas de vanguardia para la gestión eficiente de la información educativa.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-3">
                <div class="card-body">
                    <i class="bi bi-hand-thumbs-up text-success fs-1 mb-3"></i>
                    <h5 class="fw-bold">Liderazgo</h5>
                    <p class="text-muted small mb-0">Fomentamos el desarrollo de habilidades integrales para que nuestros egresados destaquen en el sector productivo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection