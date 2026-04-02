<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Reservasi Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Klinik Reservasi</a>
        <div>
            @if(auth()->check())
                <span class="text-white me-3">{{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
            @endif
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>