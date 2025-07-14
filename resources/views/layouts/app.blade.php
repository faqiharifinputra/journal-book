<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Kegiatan</title>

    <!-- Bootstrap Offline -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
    @media print {
        body * {
            visibility: hidden;
        }
        .container, .container * {
            visibility: visible;
        }
        .container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .btn, form, input, select, .alert, .navbar {
            display: none !important;
        }
    }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">IndiBooks</a>
        </div>
    </nav>

    {{-- Konten halaman --}}
    @yield('content')

    <!-- Bootstrap Offline JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
