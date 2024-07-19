@extends('layouts.main')
@section('body')
<!-- nav section start -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="rounded-circle"
                src="https://static.vecteezy.com/system/resources/previews/009/749/751/original/avatar-man-icon-cartoon-male-profile-mascot-illustration-head-face-business-user-logo-free-vector.jpg"
                width="30" alt="avatar logo">
        </a>
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
                    <a class="nav-link active" aria-current="page" href="/employee">Employee Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/client">Client Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/offer">Offer Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/project-setup">Project Setup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/project-control">Project Control Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/bonus-calculation">Bonus Calculation Page</a>
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
    <h3 class="text-center mt-3 mb-5">Employee Table</h3>
        <form class="row g-3" action="/employee" method="post">
        @csrf
        <div class="form-group col-md-6 mt-1">
            <label for="name"> Name </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Insert Name" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="job_title"> Job Title </label>
            <input type="text" name="job_title" id="job_title" class="form-control" placeholder="Insert Job Title" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="status"> Status </label>
            <select name="status" id="status" class="form-select" required>
                <option value="">--Please Choose Option--</option>
                <hr/>
                <option>Full Time</option>
                <option>Contract</option>
                <option>Internship</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="salary"> Salary </label>
            <input type="text" name="salary" id="salary" class="form-control" placeholder="Insert Salary" required>
        </div>
        <div class="col-lg-12 mt-3">
            <button class="btn btn-success" type="submit" onclick="confirm('Are You Sure?');">Add Data</button>
        </div>
    </form>
    <br>
        <!-- Search Keyword -->
        <form action="/employee">
            <input type="text" name="search" autofocus placeholder="Search..." autocomplete="off" value ="{{ request('search') }}">
            <button class="btn btn-success" type="submit">Find</button>
        </form>
    <!-- Table Section -->
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-bordered border border-secondary">
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Job Title</th>
                        <th>Status</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->job_title }}</td>
                        <td>{{ $employee->status }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>
                            <a class="btn btn-danger" href="/employee/delete/{{ $employee->id }}" onclick="return confirm('Are You Sure?');">Delete</a>
                            <a class="btn btn-warning" href="/employee/edit/{{ $employee->id }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
@endsection
