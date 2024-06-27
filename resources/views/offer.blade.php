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
    <h3 class="text-center mt-3 mb-5">Offer Tables</h3>
        <form class="row g-3" action="/offer" method="post">
        @csrf
        <div class="form-group col-md-6 mt-1">
            <label for="creator_name"> Creator Name </label>
            <select name="creator_name" id="creator_name" class="form-select" required>
                <option value="">--Please Choose Options--</option>
                <hr/>
                @foreach ($persons as $person)
                    <option>{{ $person->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="client_candidate"> Client Candidate</label>
            <input type="text" name="client_candidate" id="client_candidate" class="form-control" placeholder="Insert Client Candidate" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="address"> Address </label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Insert Address" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="date"> Date  </label>
            <input type="date" name="date" id="date" class="form-control" min="2024-01-01" placeholder="Insert Date" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="valid_date"> Valid Date  </label>
            <input type="date" name="valid_date" id="valid_date" class="form-control" min="2024-01-01" placeholder="Insert Valid Date" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="pic"> PIC </label>
            <input type="text" name="pic" id="pic" class="form-control" placeholder="Insert PIC" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="telephone"> Phone Number </label>
            <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Insert HP/Tel Number" pattern="[0-9]{5,12}" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="service"> Service </label>
            <input type="text" name="service" id="service" class="form-control" placeholder="Insert Service" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="period_time"> Period Time </label>
            <input type="month" name="period_time" id="period_time" class="form-control" min="2024-01" placeholder="Insert Period Time" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="price"> Price </label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Insert Price" required>
        </div>
        <div class="form-group col-md-6 mt-1">
            <label for="information"> Information </label>
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
                        <th>Creator Name</th>
                        <th>Client Candidate</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Valid Date</th>
                        <th>PIC</th>
                        <th>Phone Number</th>
                        <th>Service</th>
                        <th>Period Time</th>
                        <th>Price</th>
                        <th>Information</th>
                        <th>Offer Status</th>
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
