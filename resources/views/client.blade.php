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
<!-- Nav End Section -->
<!-- Form Section -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">Tabel Klien</h3>
    <!-- Search Keyword -->
    <form action="/client">
        <input type="text" name="search" autofocus placeholder="Search..." autocomplete="off" value="{{ request('search') }}">
        <button class="btn btn-success" type="submit">Find!</button>
    </form>
<!-- Table Section -->
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered border border-secondary">
                <tr>
                    <th>Nama Klien</th>
                    <th>Alamat</th>
                    <th>PIC</th>
                    <th>Nomor Telepon</th>
                    <th>Jasa</th>
                    <th>Nilai Kontrak</th>
                    <th>Mulai Jasa</th>
                </tr>
                @foreach ($clients as $client)
                <tr>
                    @if ($client->offer_status === 'Accepted')
                        <td>{{ $client->client_candidate }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->pic }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>{{ $client->service }}</td>
                        <td>{{ $client->price }}</td>
                        <td>{{ $client->valid_date }}</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection