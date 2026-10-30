<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminSENA</title>

    <!-- Bootstrap CSS y FontAwesome / Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Se oculta el NAVBAR en 'vista', 'login' y 'registro' -->
    @if (!request()->routeIs('vista', 'login', 'registro'))
        @include('includes.navbar')
    @endif

    <!-- Contenido principal -->
    <main class="w-100 p-0 m-0 flex-grow-1">
        @yield('content')
    </main>

    <!-- Se oculta el FOOTER en 'vista', 'login' y 'registro' -->
    @if (!request()->routeIs('vista', 'login', 'registro'))
        @include('includes.footer')
    @endif

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>