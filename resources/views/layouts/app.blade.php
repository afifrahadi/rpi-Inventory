<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventory App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Navbar Style --}}
    <link href="{{ asset('assets/css/navbar-style.css') }}" rel="stylesheet">
    {{-- Icon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    {{-- Scanner Style --}}
    <link href="{{ asset('assets/css/scanner-style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <style>
        body {
            background-color: #F8F8FF;
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .modal img {
            width: 100%;
            max-width: 500px;
        }
        footer {
            margin-top: auto;
            color: black;
            font-weight: 600;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    @include('partials.navbar')

    <div class="container mt-4">
        <!-- Main Content -->
        @yield('content')
    </div>

    <!-- Include Footer -->
    @include('partials.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.print-to-pdf');
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const url = `/inventory/pdf/qr/${id}`;
                    window.open(url, '_blank'); // Membuka PDF di tab baru
                });
            });
        });
    </script>
</body>
</html>
