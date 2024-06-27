@extends('layouts.main')

@section('body')
<!-- nav section start -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="rounded-circle" src="https://static.vecteezy.com/system/resources/previews/009/749/751/original/avatar-man-icon-cartoon-male-profile-mascot-illustration-head-face-business-user-logo-free-vector.jpg" width="30" alt="avatar logo">
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
    <div class="container mt-3">
        <div class="text-center">
            <h3 class="">Home</h3>
        </div>
    </div>
    <!-- nav section end -->
@endsection