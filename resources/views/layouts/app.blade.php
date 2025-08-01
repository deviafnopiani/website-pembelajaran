<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Platform Edukasi Kesehatan</title>
     <link rel="icon" href="{{ asset('favicon.ico') }}?v=2" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #3db2ff, #007bff);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        {{-- Brand: Logo +  --}}
        <a class="navbar-brand text-white fw-bold fs-3 d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/edu1.png') }}" alt="Logo EduKes" style="height: 53px; width: auto; margin-right: 10px;">
            SmartHealth
        </a>

        {{-- Profil & Logout --}}
        @auth
            @php
                $role = Auth::user()->role;
                $profileRoute = $role === 'admin' 
                    ? route('admin.profile.edit')
                    : route('user.profile.edit');
            @endphp

            <div class="d-flex align-items-center gap-2">
                <a href="{{ $profileRoute }}" class="btn btn-outline-light btn-sm">Profil</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            </div>
        @endauth
    </div>
</nav>

    {{-- Main Content --}}
    <div class="container pb-5">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
