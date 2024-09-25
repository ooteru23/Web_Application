@extends('layouts.main')
@section('body')
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
    <h3 class="text-center mt-3 mb-5">Edit Tabel Setup Project </h3>
    <form class="row g-3" action="/project-setup/update/{{ $calculate->id }}" method="post">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $calculate->id }}">
    <div class="form-group col-md-6 mt-1">
        <label for="client_candidate"> Nama Klien </label>
        <select name="client_candidate" id="client_candidate" class="form-select" required>
            <option value="">{{ $calculate->client_candidate }}</option>
            <hr/>
            @foreach ($clients as $client)
                <option>{{ $client->client_candidate }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="contract_value">Nilai Kontrak</label>
        <input type="text" name="contract_value" id="contract_value" class="form-control" placeholder="Insert Contract Value" required value="{{ $calculate->contract_value }}" disabled>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="commission_price"> Biaya Komisi </label>
        <input type="text" name="commission_price" id="commission_price" class="form-control" placeholder="Insert Commission Price" required value="{{ $calculate->commission_price }}">
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="software_price"> Harga Software </label>
        <input type="text" name="software_price" id="software_price" class="form-control" placeholder="Insert Software Price" required value="{{ $calculate->software_price }}">
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="employee1">Karyawan 1</label>
        <select name="employee1" id="employee1" class="form-select" required>
            <option value="">{{ $calculate->employee1 }}</option>
            <hr/>
            @foreach ($persons as $person)
                <option>{{ $person->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="percent1">PerSentase 1</label>
        <input type="text" name="percent1" id="percent1" class="form-control" placeholder="Insert Percent 1" required value="{{ $calculate->percent1 }}" value="%">
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="employee2">Karyawan 2</label>
        <select name="employee2" id="employee2" class="form-select" required>
            <option value="">{{ $calculate->employee2 }}</option>
            <hr/>
            @foreach ($persons as $person)
                <option>{{ $person->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="percent2">Persentase 2</label>
        <input type="text" name="percent2" id="percent2" class="form-control" placeholder="Insert Percent 2" required value="{{ $calculate->percent2 }}" value="%">
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="net_value1">Net Value 1</label>
        <input type="text" name="net_value1" id="net_value1" class="form-control" placeholder="Insert Net Value 1" required value="{{ $calculate->net_value1 }}" readonly>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="net_value2">Net Value 2</label>
        <input type="text" name="net_value2" id="net_value2" class="form-control" placeholder="Insert Net Value 2" required value="{{ $calculate->net_value2 }}" readonly>
    </div>
    <div class="col-lg-12 mt-3">
        <button class="btn btn-success" type="submit" id="submit" onclick="confirm('Are You Sure?');">Edit Data</button>
    </div>
    </form>
    
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
@endsection