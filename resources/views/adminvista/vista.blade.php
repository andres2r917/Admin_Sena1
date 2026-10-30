@extends('layouts.app')

@section('content')

<!-- Estilos CSS personalizados para afinar el acabado UI/UX -->
<style>
    :root {
        --sena-green: #39a900;
        --sena-dark-green: #0b4619;
    }
    
    .bg-gradient-sena {
        background: linear-gradient(135deg, var(--sena-green) 0%, var(--sena-dark-green) 100%);
    }

    .kpi-card {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: 1px solid rgba(0,0,0,0.05) !important;
    }

    .kpi-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08) !important;
    }

    .btn-action-hover {
        transition: all 0.2s ease;
    }

    .btn-action-hover:hover {
        background-color: rgba(57, 169, 0, 0.08);
        border-color: var(--sena-green);
        color: var(--sena-green) !important;
    }

    .sidebar-link {
        transition: all 0.2s ease;
        border-left: 3px solid transparent;
    }

    .sidebar-link:hover, .sidebar-link.active {
        background-color: rgba(57, 169, 0, 0.1) !important;
        color: var(--sena-green) !important;
        border-left-color: var(--sena-green);
    }

    .avatar-status-badge {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid white;
    }
</style>

<!-- Menú Lateral (Sidebar Offcanvas) -->
<div class="offcanvas offcanvas-start border-0 shadow-lg" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel" style="width: 290px;">
  
  <!-- Encabezado del Menú Lateral -->
  <div class="offcanvas-header bg-light border-bottom py-3 px-4">
    <div class="d-flex align-items-center gap-2">
      <div class="bg-white rounded-3 p-1 shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
        <img src="https://pautonoticias.com/sites/default/files/Article/sena-colombia-logo-green39a900png-20250120.png" alt="Logo SENA" width="30" height="30">
      </div>
      <div>
        <h6 class="offcanvas-title fw-bold text-dark mb-0" id="adminSidebarLabel">AdminSENA</h6>
        <span class="badge bg-success bg-opacity-10 text-success fs-8 fw-semibold">Regional Cauca</span>
      </div>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <!-- Cuerpo del Menú -->
  <div class="offcanvas-body d-flex flex-column justify-content-between p-3">
    <ul class="nav nav-pills flex-column gap-1">
      
      <li class="nav-item">
        <a href="{{ route('vista') }}" class="nav-link sidebar-link text-dark fw-bold d-flex align-items-center py-2 px-3 rounded-3 active">
          <i class="bi bi-grid-1x2-fill me-3 fs-5"></i> Panel Principal
        </a>
      </li>

      <!-- Sección Registro -->
      <li class="nav-item mt-3">
        <span class="text-uppercase fs-8 text-muted fw-bold px-3 tracking-wider">Módulos de Registro</span>
      </li>
      <li class="nav-item">
        <a href="{{ route('areas.create') }}" class="nav-link sidebar-link text-secondary fw-semibold d-flex align-items-center py-2 px-3 rounded-3">
          <i class="bi bi-geo-alt me-3 fs-5 text-success"></i> Áreas
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('trainingcenters.create') }}" class="nav-link sidebar-link text-secondary fw-semibold d-flex align-items-center py-2 px-3 rounded-3">
          <i class="bi bi-building me-3 fs-5 text-success"></i> Centros de Formación
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('computer.create') }}" class="nav-link sidebar-link text-secondary fw-semibold d-flex align-items-center py-2 px-3 rounded-3">
          <i class="bi bi-pc-display-horizontal me-3 fs-5 text-success"></i> Equipos / Cómputo
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('teacher.create') }}" class="nav-link sidebar-link text-secondary fw-semibold d-flex align-items-center py-2 px-3 rounded-3">
          <i class="bi bi-person-badge me-3 fs-5 text-success"></i> Instructores
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('course.create') }}" class="nav-link sidebar-link text-secondary fw-semibold d-flex align-items-center py-2 px-3 rounded-3">
          <i class="bi bi-journal-code me-3 fs-5 text-success"></i> Cursos / Programas
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('apprentice.create') }}" class="nav-link sidebar-link text-secondary fw-semibold d-flex align-items-center py-2 px-3 rounded-3">
          <i class="bi bi-people me-3 fs-5 text-success"></i> Aprendices
        </a>
      </li>

      <!-- Sección Listados -->
      <li class="nav-item mt-3">
        <span class="text-uppercase fs-8 text-muted fw-bold px-3 tracking-wider">Consultas</span>
      </li>
      <li class="nav-item">
        <a href="{{ route('apprentice.index') }}" class="nav-link sidebar-link text-secondary fw-semibold d-flex align-items-center py-2 px-3 rounded-3">
          <i class="bi bi-table me-3 fs-5 text-success"></i> Ver Aprendices
        </a>
      </li>
    </ul>

    <!-- Footer del Sidebar con perfil -->
    <div class="border-top pt-3 bg-light rounded-4 p-3 mt-3">
      <div class="d-flex align-items-center mb-3">
        <div class="position-relative me-2">
          <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? 'Administrador') . '&background=39a900&color=fff' }}" 
               class="rounded-circle shadow-sm" width="38" height="38" alt="Perfil">
          <span class="avatar-status-badge bg-success"></span>
        </div>
        <div class="overflow-hidden">
          <h6 class="mb-0 fw-bold text-dark text-truncate small">{{ Auth::user()->name ?? 'Administrador' }}</h6>
          <small class="text-muted d-block fs-8">Administrador Activo</small>
        </div>
      </div>

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm w-100 fw-bold d-flex align-items-center justify-content-center py-2 rounded-3">
          <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
        </button>
      </form>
    </div>

  </div>
</div>

<!-- Contenido Principal -->
<div class="container-fluid py-4 px-3 px-md-4 min-vh-100 d-flex flex-column justify-content-between bg-light">

    <div>
        <!-- Navbar / Banner Principal -->
        <div class="bg-gradient-sena p-4 rounded-4 shadow-sm text-white mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center">
                <button class="btn btn-light btn-lg text-success me-3 rounded-3 shadow-sm d-flex align-items-center justify-content-center" 
                        style="width: 45px; height: 45px;"
                        type="button" 
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#adminSidebar">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <div>
                    <h3 class="fw-bold mb-0 text-white">Panel de Administración</h3>
                    <p class="text-white-50 mb-0 small">SENA Regional Cauca • Centro de Formación</p>
                </div>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <div class="d-none d-sm-flex align-items-center bg-white bg-opacity-15 px-3 py-2 rounded-pill border border-white border-opacity-25 shadow-sm">
                    <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? 'Administrador') . '&background=39a900&color=fff' }}" 
                         alt="Foto de perfil" 
                         class="rounded-circle me-2 border border-2 border-white" 
                         style="width: 32px; height: 32px; object-fit: cover;">
                    <div class="lh-1">
                      <span class="fw-bold text-white small d-block">{{ Auth::user()->name ?? 'Administrador' }}</span>
                      <small class="text-white-50 fs-8">ADSO SENA</small>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-light text-danger fw-bold rounded-3 shadow-sm px-3 py-2 btn-sm">
                        <i class="bi bi-power me-1"></i> Salir
                    </button>
                </form>
            </div>
        </div>

        <!-- Tarjetas Metricas (KPIs) -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white kpi-card">
                    <div class="card-body p-3 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted fw-bold text-uppercase fs-8 d-block mb-1">Aprendices</span>
                            <h3 class="fw-bolder text-dark mb-0">1,240</h3>
                            <small class="text-success fw-semibold fs-8"><i class="bi bi-arrow-up-short"></i> +12% este mes</small>
                        </div>
                        <div class="rounded-4 bg-success bg-opacity-10 text-success p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white kpi-card">
                    <div class="card-body p-3 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted fw-bold text-uppercase fs-8 d-block mb-1">Fichas / Cursos</span>
                            <h3 class="fw-bolder text-dark mb-0">48</h3>
                            <small class="text-primary fw-semibold fs-8"><i class="bi bi-check2-circle"></i> Activas</small>
                        </div>
                        <div class="rounded-4 bg-primary bg-opacity-10 text-primary p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="bi bi-journal-check fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white kpi-card">
                    <div class="card-body p-3 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted fw-bold text-uppercase fs-8 d-block mb-1">Instructores</span>
                            <h3 class="fw-bolder text-dark mb-0">32</h3>
                            <small class="text-muted fw-semibold fs-8">Asignados</small>
                        </div>
                        <div class="rounded-4 bg-warning bg-opacity-10 text-warning p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="bi bi-person-badge-fill fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white kpi-card">
                    <div class="card-body p-3 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted fw-bold text-uppercase fs-8 d-block mb-1">Equipos</span>
                            <h3 class="fw-bolder text-dark mb-0">180</h3>
                            <small class="text-info fw-semibold fs-8"><i class="bi bi-laptop"></i> En Inventario</small>
                        </div>
                        <div class="rounded-4 bg-info bg-opacity-10 text-info p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="bi bi-pc-display fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Central -->
        <div class="row g-4 mb-4">
            
            <!-- Tabla de Usuarios Recientes -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 bg-white">
                    <div class="card-header bg-transparent py-3 px-4 d-flex justify-content-between align-items-center border-bottom border-light">
                        <div>
                          <h6 class="fw-bold text-dark mb-0">Usuarios Registrados Recientemente</h6>
                          <small class="text-muted">Gestión de aprendices e instructores</small>
                        </div>
                        <a href="{{ route('apprentice.create') }}" class="btn btn-success btn-sm fw-bold rounded-3 shadow-sm">
                            <i class="bi bi-plus-lg me-1"></i> Nuevo Usuario
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="text-uppercase fs-8 text-muted fw-bold">
                                        <th class="ps-4">Usuario</th>
                                        <th>Documento</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th class="text-end pe-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-success text-white rounded-circle text-center me-3 d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 38px; height: 38px;">
                                                    CP
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark">Carlos Pérez</div>
                                                    <small class="text-muted">carlos@sena.edu.co</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light text-dark border font-monospace">CC 1061700123</span></td>
                                        <td><span class="badge bg-primary bg-opacity-10 text-primary fw-semibold">Aprendiz</span></td>
                                        <td><span class="badge bg-success bg-opacity-10 text-success fw-bold"><i class="bi bi-dot"></i> Activo</span></td>
                                        <td class="text-end pe-4">
                                            <button class="btn btn-sm btn-light text-primary rounded-2 me-1"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-sm btn-light text-danger rounded-2"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-warning text-dark rounded-circle text-center me-3 d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 38px; height: 38px;">
                                                    MG
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark">María Gómez</div>
                                                    <small class="text-muted">maria@sena.edu.co</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light text-dark border font-monospace">TI 1023456789</span></td>
                                        <td><span class="badge bg-warning bg-opacity-10 text-warning-emphasis fw-semibold">Instructor</span></td>
                                        <td><span class="badge bg-success bg-opacity-10 text-success fw-bold"><i class="bi bi-dot"></i> Activo</span></td>
                                        <td class="text-end pe-4">
                                            <button class="btn btn-sm btn-light text-primary rounded-2 me-1"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-sm btn-light text-danger rounded-2"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accesos Rápidos y Modulos -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-white mb-4">
                    <div class="card-header bg-transparent py-3 px-4 border-bottom border-light">
                        <h6 class="fw-bold text-dark mb-0">Accesos Rápidos</h6>
                    </div>
                    <div class="card-body p-3 d-grid gap-2">
                        <a href="{{ route('areas.create') }}" class="btn btn-light text-dark text-start fw-semibold py-2 px-3 rounded-3 btn-action-hover d-flex align-items-center justify-content-between">
                            <span><i class="bi bi-building me-2 text-success"></i> Centros y Áreas</span>
                            <i class="bi bi-chevron-right text-muted fs-8"></i>
                        </a>
                        <a href="{{ route('course.create') }}" class="btn btn-light text-dark text-start fw-semibold py-2 px-3 rounded-3 btn-action-hover d-flex align-items-center justify-content-between">
                            <span><i class="bi bi-journal-bookmark me-2 text-success"></i> Administrar Cursos</span>
                            <i class="bi bi-chevron-right text-muted fs-8"></i>
                        </a>
                        <a href="{{ route('computer.create') }}" class="btn btn-light text-dark text-start fw-semibold py-2 px-3 rounded-3 btn-action-hover d-flex align-items-center justify-content-between">
                            <span><i class="bi bi-laptop me-2 text-success"></i> Inventario de Equipos</span>
                            <i class="bi bi-chevron-right text-muted fs-8"></i>
                        </a>
                        <a href="{{ route('apprentice.index') }}" class="btn btn-light text-dark text-start fw-semibold py-2 px-3 rounded-3 btn-action-hover d-flex align-items-center justify-content-between">
                            <span><i class="bi bi-file-earmark-bar-graph me-2 text-success"></i> Generar Reportes</span>
                            <i class="bi bi-chevron-right text-muted fs-8"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Moderno y Minimalista -->
    <footer class="mt-4 pt-3 border-top text-center text-md-start">
        <div class="row align-items-center text-muted small">
            <div class="col-md-6 mb-2 mb-md-0">
                <p class="mb-0">&copy; {{ date('Y') }} <strong class="text-success">AdminSENA</strong> • Todos los derechos reservados.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <span>Servicio Nacional de Aprendizaje - SENA Regional Cauca</span>
            </div>
        </div>
    </footer>

</div>
@endsection