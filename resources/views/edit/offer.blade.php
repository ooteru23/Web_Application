@extends('layouts.main')
@section('body')
<!-- nav section start -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
    <h3 class="text-center mt-3 mb-5">Edit Tabel Penawaran</h3>
    <form class="row g-3" action="/offer/update/{{ $offer->id }}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $offer->id }}">
        <div class="form-group col-md-6 mt-1">
            <label for="creator_name"> Nama Kreator </label>
            <select name="creator_name" id="creator_name" class="form-select" required>
                <option>{{ $offer->creator_name }}</option>
                <hr/>
                @foreach ($persons as $person)
                    <option>{{ $person->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="client_candidate"> Kandidat Klien </label>
            <input type="text" name="client_candidate" id="client_candidate" class="form-control" required value="{{ $offer->client_candidate }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="address"> Alamat </label>
            <input type="text" name="address" id="address" class="form-control" required value="{{ $offer->address }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="date"> Tanggal Penawaran </label>
            <input type="date" name="date" id="date" class="form-control" required value="{{ $offer->date }}" disabled>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="valid_date"> Batas Tanggal</label>
            <input type="date" name="valid_date" id="valid_date" class="form-control" min="2024-01-01" value="{{ $offer->valid_date }}" disabled>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="pic"> PIC </label>
            <input type="text" name="pic" id="pic" class="form-control" required value="{{ $offer->pic }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="telephone"> Nomor Telepon </label>
            <input type="tel" name="telephone" id="telephone" class="form-control" pattern="[0-9]{5,12}" required value="{{ $offer->telephone }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="service"> Jasa </label>
            <input type="text" name="service" id="service" class="form-control" required value="{{ $offer->service }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="period_time"> Periode </label>
            <input type="month" name="period_time" id="period_time" class="form-control" required value="{{ $offer->period_time }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="price"> Harga </label>
            <input type="text" name="price" id="price" class="form-control" required value="{{ $offer->price }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="information"> Informasi Tambahan </label>
            <input type="text" name="information" id="information" class="form-control" required value="{{ $offer->information }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="offer_status"> Status Penawaran </label>
            <select name="offer_status" id="offer_status" class="form-select">
                <option>{{ $offer->offer_status }}</option>
                <hr/>
                <option>Accepted</option>
                <option>Rejected</option>
                <option>Nothing</option>
            </select>
        </div>
        <div class="col-lg-12 mt-3">
            <button class="btn btn-success" type="submit" onclick="confirm('Are you Sure');">Edit Data</button>
        </div>
    </form>
@endsection