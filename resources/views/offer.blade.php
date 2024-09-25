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
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@else
    {{ session('failed') }}
@endif
<!-- Form Section -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">Tabel Penawaran</h3>
        <form class="row g-3" action="/offer" method="post">
        @csrf
        <div class="form-group col-md-6 mt-1">
            <label for="creator_name"> Nama Kreator </label>
            <select name="creator_name" id="creator_name" class="form-select" required>
                <option value="">--Please Choose Options--</option>
                <hr/>
                @foreach ($persons as $person)
                    <option>{{ $person->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="client_candidate"> Kandidat Klien</label>
            <input type="text" name="client_candidate" id="client_candidate" class="form-control" placeholder="Insert Client Candidate" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="marketing_name"> Nama Marketing</label>
            <input type="text" id="marketing_name" class="form-control" placeholder="Insert Client Candidate" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="address"> Alamat </label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Insert Address" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="date"> Tanggal Penawaran</label>
            <input type="date" name="date" id="date" class="form-control" min="2024-01-01" placeholder="Insert Date" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="valid_date"> Batas Tanggal </label>
            <input type="date" name="valid_date" id="valid_date" class="form-control" min="2024-01-01" placeholder="Insert Valid Date" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="pic"> PIC </label>
            <input type="text" name="pic" id="pic" class="form-control" placeholder="Insert PIC" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="telephone"> NomorTelepon </label>
            <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Insert HP/Tel Number" pattern="[0-9]{5,12}" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="service"> Jasa </label>
            <input type="text" name="service" id="service" class="form-control" placeholder="Insert Service" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="period_time"> Periode </label>
            <input type="month" name="period_time" id="period_time" class="form-control" min="2024-01" placeholder="Insert Period Time" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="price"> Harga </label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Insert Price" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="information"> Informasi Tambahan </label>
            <input type="text" name="information" id="information" class="form-control" placeholder="Insert Information" required>
        </div>
        <div class="col-lg-12 mt-3">
            <button class="btn btn-success" type="submit" onclick="confirm('Are You Sure?');">Add Data</button>
        </div>
    </form>
    <br>
        <!-- Search Keyword -->
        <form action="/offer">
            <input type="text" name="search" autofocus placeholder="Search..." autocomplete="off" value="{{ request('search') }}">
            <button class="btn btn-success" type="submit">Find!</button>
        </form>
    <!-- Table Section -->
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-bordered border border-secondary">
                    <tr>
                        <th>Nama Kreator</th>
                        <th>Kandidat Klien</th>
                        <th>Alamat</th>
                        <th>Tanggal Mulai</th>
                        <th>Batas Tanggal</th>
                        <th>PIC</th>
                        <th>Nomor Telepon</th>
                        <th>Jasa</th>
                        <th>Periode</th>
                        <th>Harga</th>
                        <th>Informasi</th>
                        <th>Status Penawaran</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($offers as $offer)
                        <tr>
                            <td>{{ $offer->creator_name }}</td>
                            <td>{{ $offer->client_candidate }}</td>
                            <td>{{ $offer->address }}</td>
                            <td>{{ $offer->date }}</td>
                            <td>{{ $offer->valid_date }}</td>
                            <td>{{ $offer->pic }}</td>
                            <td>{{ $offer->telephone }}</td>
                            <td>{{ $offer->service }}</td>
                            <td>{{ $offer->period_time }}</td>
                            <td>{{ $offer->price }}</td>
                            <td>{{ $offer->information }}</td>
                            <td>{{ $offer->offer_status }}</td>
                            <td>
                                <a class="btn btn-danger" href="/offer/delete/{{ $offer->id }}" onclick="return confirm('Are You Sure?');">Delete</a>
                                <a class="btn btn-warning" href="/offer/edit/{{ $offer->id }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
@endsection
