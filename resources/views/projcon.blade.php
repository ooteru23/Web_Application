@extends('layouts.main')
@section('body')
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
                    <a class="nav-link active" href="/project-setup">Project Setup Page</a>
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
    <h3 class="text-center mt-3 mb-5">Project Control Table</h3>
    <form class="row g-3" id="control_form" action="/project-control" method="get">
    @csrf
    <div class="form-group col-md-6 mt-1">
        <label for="employee_name"> Employee Name </label>
        <select name="employee_name" id="employee_name" class="form-select" required>
            <option value="">--Please Choose Options--</option>
            <hr/>
            @foreach ($persons as $person)
                <option>{{ $person->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="year"> Year </label>
        <input type="number" id="projcon_year" name="projcon_year" class="form-control" min="2024" max="2100" step="1" value="2024">
    </div>
    <div class="col-lg-12 mt-3">
        <button class="btn btn-success" id="checkdata" type="submit" onclick="confirm('Are You Sure?');">Check Data</button>
    </div>
    </form>
    <br>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered border border-secondary" id="controlTable">
                <tr>
                    <th>Client Name</th>
                    <th>January</th>
                    <th>February</th>
                    <th>March</th>
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                    <th>July</th>
                    <th>August</th>
                    <th>September</th>
                    <th>October</th>
                    <th>November</th>
                    <th>December</th>
                    <th>Actions</th>
                </tr>
                @foreach ($projcons as $projcon)
                <tr>
                    <td>{{ $projcon->client_candidate }}</td>
                    <td>{{ $projcon->jan }}</td>
                    <td>{{ $projcon->feb }}</td>
                    <td>{{ $projcon->mar }}</td>
                    <td>{{ $projcon->apr }}</td>
                    <td>{{ $projcon->may }}</td>
                    <td>{{ $projcon->jun }}</td>
                    <td>{{ $projcon->jul }}</td>
                    <td>{{ $projcon->aug }}</td>
                    <td>{{ $projcon->sep }}</td>
                    <td>{{ $projcon->oct }}</td>
                    <td>{{ $projcon->nov }}</td>
                    <td>{{ $projcon->dec }}</td>
                    <td>
                        <a class="btn btn-warning" href="/project-control/edit/{{ $projcon->id }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection