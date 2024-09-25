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
    <h3 class="text-center mt-3 mb-5">Edit Tabel Kontrol Project</h3>
        <form class="row g-3" action="/project-control/update/{{ $projcon->id }}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $projcon->id }}">
        <div class="form-group col-md-6 mt-1">
            <label for="jan"> January </label>
            <select name="jan" id="jan" class="form-select" required>
                <option>{{ $projcon->jan }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="feb"> February </label>
            <select name="feb" id="feb" class="form-select" required>
                <option>{{ $projcon->feb }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="mar"> March </label>
            <select name="mar" id="mar" class="form-select" required>
                <option>{{ $projcon->mar }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="apr"> April </label>
            <select name="apr" id="apr" class="form-select" required>
                <option>{{ $projcon->apr }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="may"> May </label>
            <select name="may" id="may" class="form-select" required>
                <option>{{ $projcon->may }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="jun"> June </label>
            <select name="jun" id="jun" class="form-select" required>
                <option>{{ $projcon->jun }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="jul"> July </label>
            <select name="jul" id="jul" class="form-select" required>
                <option>{{ $projcon->jul }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="aug"> August </label>
            <select name="aug" id="aug" class="form-select" required>
                <option>{{ $projcon->aug }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="sep"> September </label>
            <select name="sep" id="sep" class="form-select" required>
                <option>{{ $projcon->sep }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="oct"> October </label>
            <select name="oct" id="oct" class="form-select" required>
                <option>{{ $projcon->oct }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="nov"> November </label>
            <select name="nov" id="nov" class="form-select" required>
                <option>{{ $projcon->nov }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="dec"> December </label>
            <select name="dec" id="dec" class="form-select" required>
                <option>{{ $projcon->dec }}</option>
                <hr/>
                <option>ON PROCESS</option>
                <option>ON TIME</option>
                <option>LATE</option>
            </select>
        </div>
        <div class="col-lg-12 mt-3">
            <button class="btn btn-success" type="submit" onclick="confirm('Are You Sure');">Edit Data</button>
        </div>
    </form>
@endsection
