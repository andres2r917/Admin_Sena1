<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #2cb039; border-bottom: 3px solid #39a900;">
  <div class="container-fluid">

    <a class="navbar-brand d-flex align-items-center me-3" href="{{ route('home') }}">
      <span class="bg-white rounded p-1 d-inline-block">
        <img src="https://pautonoticias.com/sites/default/files/Article/sena-colombia-logo-green39a900png-20250120.png"
             alt="Logo SENA" width="40" height="40" class="img-fluid">
      </span>
      <span class="ms-2 fw-bold text-white fs-5">AdminSENA</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">

        <!-- Inicio y Nosotros -->
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center gap-1" href="{{ route('home') }}">
            <i class="bi bi-house-door-fill"></i> Inicio
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center gap-1" href="{{ route('about.nosotros') }}">
            <i class="bi bi-info-circle-fill"></i> Nosotros
          </a>
        </li>

        <!-- Desplegable Registrar -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-1" href="#" id="registrarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-pencil-square"></i> Registrar
          </a>
          <ul class="dropdown-menu border-0 shadow" aria-labelledby="registrarDropdown">
            <li><h6 class="dropdown-header text-uppercase small fw-bold" style="color:#39a900;">Académico</h6></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('areas.create') }}"><i class="bi bi-diagram-3"></i> Área</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('trainingcenters.create') }}"><i class="bi bi-building"></i> Centro de Formación</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('course.create') }}"><i class="bi bi-journal-bookmark-fill"></i> Curso</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('programs.create') }}"><i class="bi bi-mortarboard-fill"></i> Programa</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('apprentice.create') }}"><i class="bi bi-people-fill"></i> Aprendiz</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('teacher.create') }}"><i class="bi bi-person-badge-fill"></i> Instructor</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('environments.create') }}"><i class="bi bi-door-open-fill"></i> Ambiente</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('computer.create') }}"><i class="bi bi-pc-display"></i> Computador</a></li>
                    
            <li><hr class="dropdown-divider my-1"></li>

            <li><h6 class="dropdown-header text-uppercase small fw-bold" style="color:#39a900;">Gestión y comunicación</h6></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('offers.create') }}"><i class="bi bi-briefcase-fill"></i> Oferta</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('cohorts.create') }}"><i class="bi bi-people-fill"></i> Cohorte</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('announcements.create') }}"><i class="bi bi-megaphone-fill"></i> Anuncio</a></li>
          </ul>
        </li>

        <!-- Desplegable Listas (Ver Registros) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-1" href="#" id="listasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-list-ul"></i> Ver Listas
          </a>
          <ul class="dropdown-menu border-0 shadow" aria-labelledby="listasDropdown">
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('areas.index') }}"><i class="bi bi-diagram-3"></i> Áreas</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('trainingcenters.index') }}"><i class="bi bi-building"></i> Centros</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('course.index') }}"><i class="bi bi-journal-bookmark-fill"></i> Cursos</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('programs.index') }}"><i class="bi bi-mortarboard-fill"></i> Programas</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('teacher.index') }}"><i class="bi bi-person-badge-fill"></i> Instructores</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('apprentice.index') }}"><i class="bi bi-people-fill"></i> Aprendices</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('environments.index') }}"><i class="bi bi-door-open-fill"></i> Ambientes</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('computer.index') }}"><i class="bi bi-pc-display"></i> Computadores</a></li>

            <li><hr class="dropdown-divider my-1"></li>

            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('offers.index') }}"><i class="bi bi-briefcase-fill"></i> Ofertas</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('cohorts.index') }}"><i class="bi bi-people-fill"></i> Cohortes</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('announcements.index') }}"><i class="bi bi-megaphone-fill"></i> Anuncios</a></li>
          </ul>
        </li>
      </ul>

      <!-- Formulario de Búsqueda -->
      <form action="{{ route('search') }}" method="GET" class="d-flex me-2 mb-2 mb-lg-0" role="search">
        <div class="input-group">
          <input
            type="text"
            name="query"
            class="form-control rounded-start-pill border-0"
            placeholder="Buscar..."
            value="{{ request('query') }}"
            required
          >
          <button class="btn btn-light rounded-end-pill px-3" style="color:#0c8316;" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>

      <!-- Botón Acceder / Login -->
      <div class="d-flex align-items-center">
        <a href="{{ route('login') }}" class="btn btn-light fw-bold px-3 rounded-pill shadow-sm d-flex align-items-center gap-1" style="color:#0c8316;">
          <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
        </a>
      </div>

    </div>
  </div>
</nav>