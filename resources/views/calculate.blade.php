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
    <h3 class="text-center mt-3 mb-5">Project Setup Table</h3>
    <form class="row g-3" action="/project-setup" method="post">
    @csrf
    <div class="form-group col-md-6 mt-1">
        <label for="client_candidate"> Client Name </label>
        <select name="client_candidate" id="client_candidate" class="form-select" required>
            <option value="">--Please Choose Option--</option>
            <hr/>
            @foreach ($clients as $client)
            @if ($client->offer_status === 'Accepted')
                <option>{{ $client->client_candidate }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="year"> Year </label>
        <input type="number" id="calculate_year" name="year" class="form-control" min="2024" max="2100" step="1" value="2024" readonly>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="contract_value">Contract Value</label>
        <input type="text" name="contract_value" id="contract_value" class="form-control" placeholder="Insert Contract Value" required readonly>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="commission_price"> Commission Fee </label>
        <input type="text" name="commission_price" id="commission_price" class="form-control" placeholder="Insert Commission Fee" required>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="software_price"> Software Price </label>
        <input type="text" name="software_price" id="software_price" class="form-control" placeholder="Insert Software Price" required>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="employee1">Employee 1</label>
        <select name="employee1" id="employee1" class="form-select">
            <option value="">--Please Choose Option--</option>
            <hr/>
            @foreach ($persons as $person)
                <option>{{ $person->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="percent1">Percent 1</label>
        <input type="text" name="percent1" id="percent1" class="form-control" placeholder="Insert Percent 1" required value="">
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="employee2">Employee 2</label>
        <select name="employee2" id="employee2" class="form-select">
            <option value="">--Please Choose Options--</option>
            <hr/>
            @foreach ($persons as $person)
                <option>{{ $person->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="percent2">Percent 2</label>
        <input type="text" name="percent2" id="percent2" class="form-control" placeholder="Insert Percent 2" required>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="net_value1">Net Value 1</label>
        <input type="text" name="net_value1" id="net_value1" class="form-control" value=0 readonly>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="net_value2">Net Value 2</label>
        <input type="text" name="net_value2" id="net_value2" class="form-control" value=0 readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="jan"> January </label>
        <input type="text" name="jan" id="jan" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="feb"> February </label>
        <input type="text" name="feb" id="feb" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="mar"> March </label>
        <input type="text" name="mar" id="mar" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="apr"> April </label>
        <input type="text" name="apr" id="apr" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="may"> May </label>
        <input type="text" name="may" id="may" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="jun"> June </label>
        <input type="text" name="jun" id="jun" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="jul"> July </label>
        <input type="text" name="jul" id="jul" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="aug"> August </label>
        <input type="text" name="aug" id="aug" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="sep"> September </label>
        <input type="text" name="sep" id="sep" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="oct"> October</label>
        <input type="text" name="oct" id="oct" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="nov"> November </label>
        <input type="text" name="nov" id="nov" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="dec"> December </label>
        <input type="text" name="dec" id="dec" class="form-control" value="ON PROCESS" readonly>
    </div>
    <div class="col-lg-12 mt-3">
        <button class="btn btn-success" type="submit" onclick="confirm('Are You Sure?');">Add Data</button>
    </div>
    </form>
<br>
<!-- Search Keyword -->
    <form action="/project-setup">
        <input type="text" name="search" autofocus placeholder="Search..." autocomplete="off" value ="{{ request('search') }}">
        <button class="btn btn-success" type="submit">Find</button>
    </form>
<!-- Table Section Calculate -->
    <div class="row mt-3">
        <div class="col 12">
            <table class="table table-bordered border border-secondary" id="calculateTable">
                <tr>
                    <th>Client Name</th>
                    <th hidden>Year</th>
                    <th>Contract Value</th>
                    <th>Commission Price</th>
                    <th>Software Price</th>
                    <th>Employee 1</th>
                    <th>Percent 1</th>
                    <th>Employee 2</th>
                    <th>Percent 2</th>
                    <th>Net Value 1</th>
                    <th>Net Value 2</th>
                    <th hidden>January</th>
                    <th hidden>February</th>
                    <th hidden>March</th>
                    <th hidden>April</th>
                    <th hidden>May</th>
                    <th hidden>June</th>
                    <th hidden>July</th>
                    <th hidden>August</th>
                    <th hidden>September</th>
                    <th hidden>October</th>
                    <th hidden>November</th>
                    <th hidden>December</th>
                    <th>Actions</th>
                </tr>
                @foreach ($calculates as $calculate)
                <tr>
                    <td>{{ $calculate->client_candidate }}</td>
                    <td hidden>{{ $calculate->year }}</td>
                    <td>{{ $calculate->contract_value }}</td>
                    <td>{{ $calculate->commission_price }}</td>
                    <td>{{ $calculate->software_price }}</td>
                    <td>{{ $calculate->employee1 }}</td>
                    <td>{{ $calculate->percent1 }}</td>
                    <td>{{ $calculate->employee2 }}</td>
                    <td>{{ $calculate->percent2 }}</td>
                    <td>{{ $calculate->net_value1 }}</td>
                    <td>{{ $calculate->net_value2 }}</td>
                    <td hidden>{{ $calculate->jan }}</td>
                    <td hidden>{{ $calculate->feb }}</td>
                    <td hidden>{{ $calculate->mar }}</td>
                    <td hidden>{{ $calculate->apr }}</td>
                    <td hidden>{{ $calculate->may }}</td>
                    <td hidden>{{ $calculate->jun }}</td>
                    <td hidden>{{ $calculate->jul }}</td>
                    <td hidden>{{ $calculate->aug }}</td>
                    <td hidden>{{ $calculate->sep }}</td>
                    <td hidden>{{ $calculate->oct }}</td>
                    <td hidden>{{ $calculate->nov }}</td>
                    <td hidden>{{ $calculate->dec }}</td>
                    <td>
                        <a class="btn btn-danger" href="/project-setup/delete/{{ $calculate->id }}" onclick="confirm('Are You Sure?');">Delete</a>
                        <a class="btn btn-warning" href="/project-setup/edit/{{ $calculate->id }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
<!-- Table Section Client -->
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered border border-secondary d-none" id="clientTable">
                <tr>
                    <th>Client Name</th>
                    <th>Address</th>
                    <th>PIC</th>
                    <th>Phone Number</th>
                    <th>Service</th>
                    <th>Contract Value</th>
                    <th>Service Started</th>
                </tr>
                @foreach ($clients as $client)
                <tr>
                    @if ($client->offer_status === 'Accepted')
                        <td>{{ $client->client_candidate }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->pic }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>{{ $client->service }}</td>
                        <td>{{ $client->price }}</td>
                        <td>{{ $client->valid_date }}</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection