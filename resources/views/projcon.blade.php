@extends('layouts.main')
@section('body')
    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="rounded-circle"
                src="https://static.vecteezy.com/system/resources/previews/009/749/751/original/avatar-man-icon-cartoon-male-profile-mascot-illustration-head-face-business-user-logo-free-vector.jpg"
                width="30" alt="avatar logo">
        </a>
        <h3>SNI Consulting</h3>
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
    <h3 class="text-center mt-3 mb-5">Project Control</h3>
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
        <select name="year" id="year" class="form-select" required>
            <option value="">--Select Year--</option>
            <hr/>
            <option>2024</option>
            <option>2025</option>
            <option>2026</option>
            <option>2027</option>
            <option>2028</option>
            <option>2029</option>
            <option>2030</option>
        </select>
    </div>
    <div class="col-lg-12 mt-3">
        <button class="btn btn-success" id="submit" type="submit" onclick="confirm('Are You Sure?');">Check Data</button>
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
                </tr>
                @foreach ($projcons as $projcon)
                <tr>
                    <td>{{ $projcon->client_candidate }}</td>
                    <td id="january">
                        <button class="btn btn-danger" type="submit" id="jan-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="jan-late">LATE</button>
                    </td>
                    <td id="february">
                        <button class="btn btn-danger" type="submit" id="feb-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="feb-late">LATE</button>
                    </td>
                    <td id="march">
                        <button class="btn btn-danger" type="submit" id="mar-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="mar-late">LATE</button>
                    </td>
                    <td id="april">
                        <button class="btn btn-danger" type="submit" id="apr-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="apr-late">LATE</button>
                    </td>
                    <td id="may">
                        <button class="btn btn-danger" type="submit" id="may-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="may-late">LATE</button>
                    </td>
                    <td id="june">
                        <button class="btn btn-danger" type="submit" id="jun-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="jun-late">LATE</button>
                    </td>
                    <td id="july">
                        <button class="btn btn-danger" type="submit" id="jul-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="jul-late">LATE</button>
                    </td>
                    <td id="august">
                        <button class="btn btn-danger" type="submit" id="aug-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="aug-late">LATE</button>
                    </td>
                    <td id="september">
                        <button class="btn btn-danger" type="submit" id="sep-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="sep-late">LATE</button>
                    </td>
                    <td id="october">
                        <button class="btn btn-danger" type="submit" id="oct-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="oct-late">LATE</button>
                    </td>
                    <td id="november">
                        <button class="btn btn-danger" type="submit" id="nov-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="nov-late">LATE</button>
                    </td>
                    <td id="december">
                        <button class="btn btn-danger" type="submit" id="dec-on-time">ON TIME</button>
                        <button class="btn btn-warning" type="submit" id="dec-late">LATE</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection