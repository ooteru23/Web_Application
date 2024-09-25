@extends('layouts.main')
@section('body')
<!-- nav section start -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/employee">Halaman Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/offer">Halaman Penawaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/client">Halaman Klien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/project-setup">Halaman Setup Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/project-control">Halaman Kontrol Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/bonus-calculation">Halaman Kalkulasi Bonus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/bonus-report">Halaman Laporan Bonus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/commission-report">Halaman Komisi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="text-center">
            <h3 class="">Home</h3>
        </div>
    </div>
    <!-- nav section end -->
@endsection