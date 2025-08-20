<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIJADWAL - Penjadwalan Berbasis Genetika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f9f9f9; }
        .navbar { background-color: #00611d; }
        .navbar-brand, .nav-link, .navbar-text { color: #ffd900 !important; }
        .btn-primary { background-color: #00611d; border-color: #00611d; }
        .btn-warning { background-color: #ffd900; color: #00611d; border-color: #ffd900; }
        .form-control:focus { border-color: #00611d; box-shadow: 0 0 0 0.2rem rgba(0,97,29,.25); }
        .table thead { background-color: #00611d; color: #ffd900; }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">SIJADWAL</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('schedules.index') }}">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Mata Kuliah</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Prodi</a></li>
                    @if(auth()->check())
                        <li class="nav-item"><span class="navbar-text">Hai, {{ auth()->user()->name }}!</span></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-warning ms-2">Logout</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>