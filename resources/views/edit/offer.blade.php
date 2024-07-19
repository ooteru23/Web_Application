@extends('layouts.main')
@section('body')
<!-- nav section start -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="rounded-circle" src="https://static.vecteezy.com/system/resources/previews/009/749/751/original/avatar-man-icon-cartoon-male-profile-mascot-illustration-head-face-business-user-logo-free-vector.jpg" width="30" alt="avatar logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
<!-- Form Section -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">Edit Offer Table</h3>
    <form class="row g-3" action="/offer/update/{{ $offer->id }}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $offer->id }}">
        <div class="form-group col-md-6 mt-1">
            <label for="creator_name"> Creator Name </label>
            <select name="creator_name" id="creator_name" class="form-select" required>
                <option>{{ $offer->creator_name }}</option>
                <hr/>
                @foreach ($persons as $person)
                    <option>{{ $person->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="client_candidate"> Client Candidate </label>
            <input type="text" name="client_candidate" id="client_candidate" class="form-control" required value="{{ $offer->client_candidate }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="address"> Address </label>
            <input type="text" name="address" id="address" class="form-control" required value="{{ $offer->address }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="date"> Date </label>
            <input type="date" name="date" id="date" class="form-control" required value="{{ $offer->date }}" disabled>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="valid_date"> Valid Date</label>
            <input type="date" name="valid_date" id="valid_date" class="form-control" min="2024-01-01" value="{{ $offer->valid_date }}" disabled>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="pic"> PIC </label>
            <input type="text" name="pic" id="pic" class="form-control" required value="{{ $offer->pic }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="telephone"> Phone Number </label>
            <input type="tel" name="telephone" id="telephone" class="form-control" pattern="[0-9]{5,12}" required value="{{ $offer->telephone }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="service"> Service </label>
            <input type="text" name="service" id="service" class="form-control" required value="{{ $offer->service }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="period_time"> Period Time </label>
            <input type="month" name="period_time" id="period_time" class="form-control" required value="{{ $offer->period_time }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="price"> Price </label>
            <input type="text" name="price" id="price" class="form-control" required value="{{ $offer->price }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="information"> Additional Information </label>
            <input type="text" name="information" id="information" class="form-control" required value="{{ $offer->information }}">
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="offer_status"> Offer Status </label>
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