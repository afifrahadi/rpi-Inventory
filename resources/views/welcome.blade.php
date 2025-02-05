<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/welcome-style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>Inventory App</title>
</head>

<body id="home">
    {{-- NAVBAR --}}
    <header class="navbar sticky-top navbar-expand-lg navbar-dark welcome-nav">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset("assets/img/welcome/logo.png") }}" class="main-logo main-logo-putih">
                <img src="{{ asset("assets/img/welcome/logo-hitam.png") }}" class="main-logo main-logo-hitam">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto p-3">
                    <li class="nav-item">
                        <a class="nav-link active px-3" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#features">Features</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

        {{-- Section JUMBOTRON --}}
    <section class="main-biru" id="jumbotron">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 text-center align-self-center">
                    <div class="">
                        <h2>Melihat Data <span>Inventaris </span>Lengkap dalam Satu Scan <span>QR </span>Code.</h2>
                        <button type="button" class="btn btn-warning rounded-pill shadow-lg px-4 py-2 mt-2 btn-lg">
                            <a href="/inventories" class="text-white text-decoration-none">
                                <strong>Klik Di Sini!</strong>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="px-4 py-5">
                        <img src="{{ asset('assets/img/welcome/graph.svg') }}" class="px-3 py-2 ms-5 w-75">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- AKHIR JUMBOTRON --}}

    {{-- SECTION About --}}
    <section id="about" class="main-grey">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 px-2">
                    <p class="about-atas-judul">Solusi Cerdas untuk Pengelolaan Data</p>
                    <h2>Tentang Aplikasi</h2>
                    <p>Aplikasi ini dirancang untuk membantu Anda mengelola data inventaris secara efektif. Data barang akan disimpan dalam bentuk tabel yang terstruktur, dan setiap entri akan otomatis menghasilkan QR Code. QR Code ini dapat dipindai untuk menampilkan detail barang dengan mudah dan cepat.</p>
                    <p>Selain itu, aplikasi ini juga dilengkapi fitur visualisasi data dalam bentuk grafik interaktif. Dengan fitur ini, Anda dapat memantau data inventaris secara menyeluruh dan memahami tren atau pola dengan lebih menarik dan informatif.</p>
                </div>
                <div class="col-lg-6 px-5 text-center">
                    <img src="{{ asset("assets/img/welcome/barcode.svg") }}" class="w-50">
                </div>
            </div>
        </div>
    </section>
    {{-- Akhir Section About --}}

    {{-- Section Fitur --}}
    <section id="features" class="py-5" style="background-color:#F5F5F5;">
        <div class="container text-center">
            <h2 class="mb-4">Fitur Aplikasi</h2>
            <p class="mb-5">Aplikasi ini menyediakan berbagai fitur untuk mempermudah pengelolaan inventaris Anda.</p>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm p-4">
                        <img src="{{ asset('assets/img/welcome/inventory.svg') }}" class="w-50 mx-auto mb-3">
                        <h5>Tabel Data Inventory</h5>
                        <p>Melihat dan mengelola daftar inventaris dalam tampilan tabel.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm p-4">
                        <img src="{{ asset('assets/img/welcome/add.svg') }}" class="w-50 mx-auto mb-3">
                        <h5>Menambahkan Data</h5>
                        <p>Menambahkan item baru ke dalam daftar inventaris.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm p-4">
                        <img src="{{ asset('assets/img/welcome/scan.svg') }}" class="w-50 mx-auto mb-3">
                        <h5>Scan QR Code</h5>
                        <p>Scan QR Code untuk menemukan data inventaris secara instan.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm p-4">
                        <img src="{{ asset('assets/img/welcome/chart.svg') }}" class="w-50 mx-auto mb-3">
                        <h5>Melihat Grafik</h5>
                        <p>Analisis data inventaris dengan visualisasi grafik yang informatif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-link");

        function updateActiveNav() {
            let currentSection = "home"; // Default ke Home jika tidak ada section yang cocok
            let scrollPosition = window.scrollY + window.innerHeight; // Posisi scroll + tinggi viewport
            let documentHeight = document.documentElement.scrollHeight; // Tinggi total dokumen

            sections.forEach((section) => {
                const sectionTop = section.offsetTop - 80; // Sesuaikan offset dengan navbar
                if (window.scrollY >= sectionTop) {
                    currentSection = section.getAttribute("id");
                }
            });

            // Jika sudah di akhir halaman, pastikan fitur terakhir tetap aktif
            if (scrollPosition >= documentHeight - 10) {
                currentSection = "features";
            }

            // Update warna active pada navbar
            navLinks.forEach((link) => {
                link.classList.remove("active");
                if (link.getAttribute("href").includes(currentSection)) {
                    link.classList.add("active");
                }
            });
        }

        // Tambahkan event listener untuk mendeteksi scroll
        window.addEventListener("scroll", updateActiveNav);

        // Tambahkan event listener untuk klik langsung di navbar
        navLinks.forEach((link) => {
            link.addEventListener("click", function () {
                navLinks.forEach((el) => el.classList.remove("active")); // Hapus warna active dari semua link
                this.classList.add("active"); // Tambahkan active ke yang diklik
            });
        });

        // Panggil updateActiveNav() saat halaman pertama kali dimuat
        updateActiveNav();
    });

    </script>


</body>

</html>
