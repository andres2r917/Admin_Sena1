@extends('layouts.app')

@section('content')

{{-- ESTILOS DE LOS CARRUSELES (solo afectan a esta vista) --}}
<style>
    /* Altura fija y recorte de la imagen para que todas se vean iguales */
    .carrusel-sena .carousel-item img {
        height: 420px;
        object-fit: cover;
        background-color: #116B09; /* si la imagen no carga, se ve el verde institucional */
    }
    /* Degradado oscuro abajo para que el texto blanco se lea sobre cualquier foto */
    .carrusel-sena .carousel-item::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, .65) 0%, rgba(0, 0, 0, 0) 60%);
        pointer-events: none;
    }
    /* El caption va por encima del degradado */
    .carrusel-sena .carousel-caption {
        z-index: 2;
        text-align: left;
        left: 5%;
        right: 5%;
        bottom: 1.75rem;
    }
    /* Indicadores en forma de barra, en blanco */
    .carrusel-sena .carousel-indicators [data-bs-target] {
        width: 32px;
        height: 4px;
        border: 0;
        border-radius: 2px;
    }
    /* Carrusel de sedes: más bajo que el principal */
    .carrusel-sedes .carousel-item img {
        height: 340px;
        object-fit: cover;
        background-color: #116B09;
    }
    /* En celular las imágenes se hacen más bajas */
    @media (max-width: 767.98px) {
        .carrusel-sena .carousel-item img { height: 260px; }
        .carrusel-sedes .carousel-item img { height: 240px; }
    }
</style>

<div class="container-fluid px-0">

    <!-- HERO DIVIDIDO CON DEGRADADO VERDE INSTITUCIONAL -->
    <section class="py-5" style="background: linear-gradient(135deg, #39A900 0%, #39A900 100%);">
        <div class="container-fluid px-4 px-md-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-white">
                    <span class="badge bg-white px-3 py-2 rounded-pill mb-3 fw-semibold" style="color: #39A900;">
                        <i class="fas fa-shield-alt me-1"></i> Sistema Institucional SENA
                    </span>
                    <!-- Texto cambiado a blanco para legibilidad -->
                    <h1 class="display-4 fw-bold mb-3 text-white">Gestiona tu centro de formación sin complicaciones</h1>
                    <p class="fs-5 mb-4 text-white opacity-90">
                        Un solo panel para administrar aprendices, instructores, programas, ambientes y equipos del SENA.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('areas.create') }}" class="btn btn-light btn-lg rounded-pill px-4 fw-bold" style="color: #39A900;">
                            <i class="fas fa-play-circle me-1"></i> Comenzar
                        </a>
                        <a href="{{ route('computer.index') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-bold text-white">
                            <i class="fas fa-desktop me-1"></i> Ver Equipos
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-4 h-100">
                                <i class="fas fa-user-graduate fs-2 mb-2" style="color: #39A900;"></i>
                                <h3 class="fw-bold mb-0 text-dark">+1,200</h3>
                                <p class="text-muted small mb-0">Aprendices matriculados</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-4 h-100">
                                <i class="fas fa-chalkboard-teacher fs-2 mb-2" style="color: #39A900;"></i>
                                <h3 class="fw-bold mb-0 text-dark">+45</h3>
                                <p class="text-muted small mb-0">Instructores calificados</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-4 h-100">
                                <i class="fas fa-door-open fs-2 mb-2" style="color: #39A900;"></i>
                                <h3 class="fw-bold mb-0 text-dark">+18</h3>
                                <p class="text-muted small mb-0">Ambientes de formación</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-4 h-100">
                                <i class="fas fa-award fs-2 mb-2" style="color: #39A900;"></i>
                                <h3 class="fw-bold mb-0 text-dark">100%</h3>
                                <p class="text-muted small mb-0">Gratuito y con calidad SENA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NUEVO: CARRUSEL PRINCIPAL DE IMÁGENES (Bootstrap 5, cambia solo cada 5 s) -->
    <section class="py-5 bg-white">
        <div class="container-fluid px-4 px-md-5">
            <div id="carruselHome" class="carousel slide carousel-fade carrusel-sena rounded-4 overflow-hidden shadow-sm"
                 data-bs-ride="carousel" data-bs-interval="5000" aria-label="Galería del centro de formación">

                <!-- Indicadores (las barritas de abajo) -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carruselHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Imagen 1"></button>
                    <button type="button" data-bs-target="#carruselHome" data-bs-slide-to="1" aria-label="Imagen 2"></button>
                    <button type="button" data-bs-target="#carruselHome" data-bs-slide-to="2" aria-label="Imagen 3"></button>
                </div>

                <!-- Diapositivas: cambia la URL de src por tus propias imágenes -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1600&q=80"
                             class="d-block w-100" alt="Aprendices trabajando en grupo">
                        <div class="carousel-caption">
                            <h3 class="fw-bold text-white">Aprende haciendo</h3>
                            <p class="mb-0 text-white">Ambientes de formación con equipos listos para la práctica.</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1600&q=80"
                             class="d-block w-100" alt="Equipo de instructores reunido">
                        <div class="carousel-caption">
                            <h3 class="fw-bold text-white">Instructores que te acompañan</h3>
                            <p class="mb-0 text-white">Más de 45 instructores en programas de alta demanda laboral.</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1600&q=80"
                             class="d-block w-100" alt="Reunión de trabajo en equipo">
                        <div class="carousel-caption">
                            <h3 class="fw-bold text-white">Inscribe tu ficha hoy</h3>
                            <p class="mb-3 text-white">Formación gratuita con certificación SENA.</p>
                            <a href="{{ route('course.create') }}" class="btn btn-sm btn-light rounded-pill px-3 fw-semibold" style="color: #39A900;">
                                Inscribir Ficha
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Flechas anterior / siguiente -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carruselHome" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carruselHome" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </section>

    <!-- ACCESOS RÁPIDOS EN PILLS HORIZONTALES -->
    <section class="py-4 bg-white border-bottom border-top">
        <div class="container-fluid px-4 px-md-5">
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('course.index') }}" class="d-flex align-items-center gap-2 px-4 py-2 rounded-pill text-decoration-none fw-semibold" style="background-color: #E8F5E9; color: #116B09; border: 1px solid #39A900;">
                    <i class="fas fa-book" style="color: #39A900;"></i> Programas y Cursos
                </a>
                <a href="{{ route('teacher.index') }}" class="d-flex align-items-center gap-2 px-4 py-2 rounded-pill text-decoration-none fw-semibold" style="background-color: #E8F5E9; color: #116B09; border: 1px solid #39A900;">
                    <i class="fas fa-chalkboard-teacher" style="color: #39A900;"></i> Instructores
                </a>
                <a href="{{ route('computer.index') }}" class="d-flex align-items-center gap-2 px-4 py-2 rounded-pill text-decoration-none fw-semibold" style="background-color: #E8F5E9; color: #116B09; border: 1px solid #39A900;">
                    <i class="fas fa-laptop" style="color: #39A900;"></i> Ambientes y Equipos
                </a>
                <a href="{{ route('apprentice.index') }}" class="d-flex align-items-center gap-2 px-4 py-2 rounded-pill text-decoration-none fw-semibold" style="background-color: #E8F5E9; color: #116B09; border: 1px solid #39A900;">
                    <i class="fas fa-user-graduate" style="color: #39A900;"></i> Aprendices
                </a>
                <a href="{{ route('areas.index') }}" class="d-flex align-items-center gap-2 px-4 py-2 rounded-pill text-decoration-none fw-semibold" style="background-color: #E8F5E9; color: #116B09; border: 1px solid #39A900;">
                    <i class="fas fa-layer-group" style="color: #39A900;"></i> Áreas
                </a>
            </div>
        </div>
    </section>

    <!-- ANUNCIOS EN CARRUSEL HORIZONTAL (sin cambios: ya se desplaza con scroll) -->
    <section class="py-5" style="background-color: #FAFAFA;">
        <div class="container-fluid px-4 px-md-5">
            <h2 class="fw-bold mb-4 text-dark">
                <i class="fas fa-bullhorn me-2" style="color: #39A900;"></i>Anuncios de interés
            </h2>

            <div class="d-flex gap-3 overflow-auto pb-3" style="scroll-snap-type: x mandatory;">

                <div class="card border flex-shrink-0" style="width: 280px; scroll-snap-align: start; border-top: 4px solid #39A900 !important;">
                    <div class="card-body text-center p-4">
                        <span class="badge mb-3 text-white" style="background-color: #116B09;">Publicidad</span>
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=150&q=80" class="rounded-circle mb-3" style="width:70px; height:70px; object-fit:cover;" alt="">
                        <h6 class="fw-bold text-dark">Feria de Empleabilidad SENA</h6>
                        <p class="text-muted small">Vacantes activas en la Agencia Pública de Empleo.</p>
                        <a href="https://ape.sena.edu.co" target="_blank" class="btn btn-sm rounded-pill px-3 fw-semibold text-white" style="background-color: #39A900;">Más información</a>
                    </div>
                </div>

                <div class="card border flex-shrink-0" style="width: 280px; scroll-snap-align: start; border-top: 4px solid #39A900 !important;">
                    <div class="card-body text-center p-4">
                        <span class="badge mb-3 text-white" style="background-color: #116B09;">Publicidad</span>
                        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=150&q=80" class="rounded-circle mb-3" style="width:70px; height:70px; object-fit:cover;" alt="">
                        <h6 class="fw-bold text-dark">Noticias</h6>
                        <p class="text-muted small">Novedades y proyectos del centro de formación.</p>
                        <a href="#" class="btn btn-sm rounded-pill px-3 fw-semibold text-white" style="background-color: #39A900;">Más información</a>
                    </div>
                </div>

                <div class="card border flex-shrink-0" style="width: 280px; scroll-snap-align: start; border-top: 4px solid #39A900 !important;">
                    <div class="card-body text-center p-4">
                        <span class="badge mb-3 text-white" style="background-color: #116B09;">Publicidad</span>
                        <img src="https://images.unsplash.com/photo-1574375927938-d5a98e8ffe85?auto=format&fit=crop&w=150&q=80" class="rounded-circle mb-3" style="width:70px; height:70px; object-fit:cover;" alt="">
                        <h6 class="fw-bold text-dark">Convenios y Beneficios</h6>
                        <p class="text-muted small">Aprovecha descuentos y alianzas institucionales.</p>
                        <a href="#" class="btn btn-sm rounded-pill px-3 fw-semibold text-white" style="background-color: #39A900;">Más información</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- OFERTA ACADÉMICA EN FILAS (sin cambios) -->
    <section class="py-5" style="background-color: #F4F7F6;">
        <div class="container-fluid px-4 px-md-5">
            <div class="text-center mb-5">
                <span class="badge px-3 py-2 rounded-pill mb-2 fw-semibold" style="background-color: #E8F5E9; color: #39A900; border: 1px solid #39A900;">Formación Gratuita</span>
                <h2 class="display-6 fw-bold text-dark">Oferta Académica SENA</h2>
                <p class="text-muted fs-5">Explora los programas con mayor demanda laboral</p>
            </div>

            <div class="d-flex flex-column gap-3">

                <div class="card border">
                    <div class="card-body d-flex align-items-center gap-4 p-4 flex-wrap">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="width:60px; height:60px; background-color: #39A900;">
                            <i class="fas fa-code fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1 text-dark">Análisis y Desarrollo de Software (ADSO)</h5>
                            <p class="text-muted small mb-1">Construye aplicaciones web, móviles y bases de datos con Laravel, React y Java.</p>
                            <span class="text-muted small me-3"><i class="fas fa-clock me-1" style="color: #39A900;"></i>27 Meses</span>
                            <span class="text-muted small"><i class="fas fa-map-marker-alt me-1" style="color: #39A900;"></i>Mixta</span>
                        </div>
                        <a href="{{ route('course.create') }}" class="btn rounded-pill px-4 fw-semibold text-white flex-shrink-0" style="background-color: #39A900;">Inscribir Ficha</a>
                    </div>
                </div>

                <div class="card border">
                    <div class="card-body d-flex align-items-center gap-4 p-4 flex-wrap">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="width:60px; height:60px; background-color: #39A900;">
                            <i class="fas fa-palette fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1 text-dark">Desarrollo de Multimedia y Web</h5>
                            <p class="text-muted small mb-1">Diseño UX/UI, maquetación frontend y animación digital.</p>
                            <span class="text-muted small me-3"><i class="fas fa-clock me-1" style="color: #39A900;"></i>24 Meses</span>
                            <span class="text-muted small"><i class="fas fa-map-marker-alt me-1" style="color: #39A900;"></i>Presencial</span>
                        </div>
                        <a href="{{ route('course.create') }}" class="btn rounded-pill px-4 fw-semibold text-white flex-shrink-0" style="background-color: #39A900;">Inscribir Ficha</a>
                    </div>
                </div>

                <div class="card border">
                    <div class="card-body d-flex align-items-center gap-4 p-4 flex-wrap">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="width:60px; height:60px; background-color: #116B09;">
                            <i class="fas fa-tools fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1 text-dark">Sistemas y Mantenimiento de Equipos</h5>
                            <p class="text-muted small mb-1">Ensamble de hardware, redes LAN y soporte técnico preventivo.</p>
                            <span class="text-muted small me-3"><i class="fas fa-clock me-1" style="color: #39A900;"></i>12 Meses</span>
                            <span class="text-muted small"><i class="fas fa-map-marker-alt me-1" style="color: #39A900;"></i>Presencial</span>
                        </div>
                        <a href="{{ route('course.create') }}" class="btn rounded-pill px-4 fw-semibold text-white flex-shrink-0" style="background-color: #39A900;">Inscribir Ficha</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SEDES: CARRUSEL DE FOTOS + ACORDEÓN (el carrusel cambia según la sede que abras) -->
    <section class="py-5 bg-white">
        <div class="container-fluid px-4 px-md-5" style="max-width: 1200px;">
            <div class="text-center mb-5">
                <span class="badge px-3 py-2 rounded-pill mb-2 fw-semibold" style="background-color: #E8F5E9; color: #39A900; border: 1px solid #39A900;">Instalaciones</span>
                <h2 class="display-6 fw-bold text-dark">Conoce Nuestras Sedes</h2>
                <p class="text-muted fs-5">Espacios adaptados para la formación práctica</p>
            </div>

            <div class="row g-4 align-items-start">

                <!-- Columna izquierda: carrusel de fotos de las sedes -->
                <div class="col-lg-6">
                    <div id="carruselSedes" class="carousel slide carousel-fade carrusel-sena carrusel-sedes rounded-4 overflow-hidden shadow-sm"
                         data-bs-ride="carousel" data-bs-interval="6000" aria-label="Fotos de las sedes">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1200&q=80"
                                     class="d-block w-100" alt="Laboratorio de desarrollo de software">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80"
                                     class="d-block w-100" alt="Ambiente de investigación e innovación">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1200&q=80"
                                     class="d-block w-100" alt="Aula de gestión y multimedia">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carruselSedes" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carruselSedes" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>

                <!-- Columna derecha: acordeón de sedes (mismo contenido de antes) -->
                <div class="col-lg-6">
                    <div class="accordion" id="sedesAccordion">

                        <div class="accordion-item border mb-3 rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#sede1">
                                    <i class="fas fa-map-marker-alt me-2" style="color: #39A900;"></i> Centro Agropecuario y de Servicios — Sede Principal
                                </button>
                            </h2>
                            <div id="sede1" class="accordion-collapse collapse show" data-bs-parent="#sedesAccordion">
                                <div class="accordion-body text-muted">
                                    Cuenta con laboratorios de desarrollo de software, ambientes de aprendizaje dotados y áreas administrativas.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mb-3 rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#sede2">
                                    <i class="fas fa-map-marker-alt me-2" style="color: #39A900;"></i> Centro de Innovación Tecnológica — Sede Norte
                                </button>
                            </h2>
                            <div id="sede2" class="accordion-collapse collapse" data-bs-parent="#sedesAccordion">
                                <div class="accordion-body text-muted">
                                    Instalaciones enfocadas en investigación, automatización industrial y proyectos de desarrollo regional.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mb-3 rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#sede3">
                                    <i class="fas fa-map-marker-alt me-2" style="color: #39A900;"></i> Centro de Comercio y Servicios
                                </button>
                            </h2>
                            <div id="sede3" class="accordion-collapse collapse" data-bs-parent="#sedesAccordion">
                                <div class="accordion-body text-muted">
                                    Formación en gestión documental, multimedia, mercadeo y desarrollo administrativo.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- Sincroniza el acordeón con el carrusel de sedes: al abrir una sede, se muestra su foto --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carrusel = document.getElementById('carruselSedes');
        var sedes = ['sede1', 'sede2', 'sede3']; // el orden coincide con las diapositivas

        sedes.forEach(function (id, indice) {
            var panel = document.getElementById(id);
            if (!panel) return;
            // 'show.bs.collapse' se dispara cuando el panel empieza a abrirse
            panel.addEventListener('show.bs.collapse', function () {
                bootstrap.Carousel.getOrCreateInstance(carrusel).to(indice);
            });
        });
    });
</script>
@endsection