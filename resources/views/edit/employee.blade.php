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
    <h3 class="text-center mt-3 mb-5">Edit Tabel Karyawan</h3>
        <form class="row g-3" action="/employee/update/{{ $employee->id }}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $employee->id }}">
        <div class="form-group col-md-6 mt-1">
            <label for="name"> Nama </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Insert Your Name" required value="{{ $employee->name }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="job_title"> Nama Job </label>
            <input type="text" name="job_title" id="job_title" class="form-control" placeholder="Insert Your Job Title" required value="{{ $employee->job_title }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="status"> Status </label>
            <select name="status" id="status" class="form-select" required>
                <option>{{ $employee->status }}</option>
                <hr/>
                <option>FullTime</option>
                <option>Contract</option>
                <option>Internship</option>
                <option>Inactive</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="salary"> Gaji </label>
            <input type="text" name="salary" id="salary" class="form-control" placeholder="Insert Your Salary" required value="{{ $employee->salary }}">
        </div>
        <div class="col-lg-12 mt-3">
            <button class="btn btn-success" type="submit" onclick="confirm('Are You Sure');">Edit Data</button>
        </div>
    </form>
@endsection
