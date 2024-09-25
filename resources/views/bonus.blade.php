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
<!-- Form Section -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">Kalkulasi Bonus</h3>
    <div class="form-group col-md-6 mt-1">
        <label for="employee_name"> Nama Karyawan </label>
        <select id="employeeName" name="employee_name" class="form-select" required>
            <option value="">--Please Choose Options--</option>
            <hr/>
            @foreach ($persons as $person)
                <option>{{ $person->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="year"> Tahun </label>
        <input type="number" id="year" name="bonus_year" class="form-control"  min="1900" max="2100" step="1" value="2024">
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="month"> Bulan </label>
        <select id="month" class="form-select" required>
            <option value="">--Please Choose Options--</option>
            <hr/>
            <option>January</option>
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
        </select>
    </div>
    <div class="col-lg-12 mt-3">
        <button class="btn btn-success" id="bonus_submit" type="submit">Calculate</button>
    </div>
    <br>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered border border-secondary" id="bonusTable">
                <h6>Bonus Table</h6>
                <tr>
                    <th>Nama Klien</th>
                    <th>Bulan</th>
                    <th>Status</th>
                    <th>Net Value</th>
                    <th>Status Pencairan Bonus</th>
                </tr>
            </table>
        </div>
    </div>
    <form action="/bonus-calculation" method="POST" class="bonus">
        @csrf
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="name"> Nama : </label>
        <input type="text" name="name" id="name_bonus" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="month"> Bulan : </label>
        <input type="text" name="month" id="month_bonus" readonly>
    </div>
    <div class="form-group col-md-6 mt-1" hidden>
        <label for="month"> Tahun : </label>
        <input type="text" name="year" id="year_bonus" readonly>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="ontime"> Bulan On Time : </label>
        <input type="text" name="ontime" id="ontime" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="late"> Bulan Late : </label>
        <input type="text" name="late" id="late" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="total_value"> Total Net Value : </label>
        <input type="text" name="total_value" id="total_value" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="salary_deduction"> Pengurang (Hitungan Gaji) : </label>
        <input type="text" name="salary_deduction" id="salary_deduction" value="0">
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="Debt_Recipient"> Hutang Penerimaan : </label>
        <input type="text" id="debt_recipient" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="component_bonus"> Bonus Komponen : </label>
        <input type="text" name="component_bonus" id="component_bonus" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label>Total OnTime : </label>
        <input type="text" name="percent_ontime" id="percent_ontime" value="0%" readonly><input type="text" name="total_ontime" id="total_ontime" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label> Total Late : </label>
        <input type="text" name="percent_late" id="percent_late" value="0%" readonly><input type="text" name="total_late" id="total_late" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label> Bonus OnTime : </label>
        <input type="text" name="percent_bonus_ontime" id="percent_bonus_ontime" value="15%" readonly><input type="text" name="total_bonus_ontime" id="total_bonus_ontime" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label> Bonus Late : </label>
        <input type="text" name="percent_bonus_late" id="percent_bonus_late" value="10%" readonly><input type="text" name="total_bonus_late" id="total_bonus_late" value="0" readonly>
    </div>
    <div class="col-lg-12 mt-3">
        <button class="btn btn-success" id="bonus_save" type="submit" onclick="confirm('Are You Sure')">Save</button>
    </div>
    </form>
    
    {{-- Project Control Table --}}
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered border border-secondary d-none" id="calculateTable">
                <tr>
                    <th>Client Name</th>
                    <th>Year</th>
                    <th>Employee 1</th>
                    <th>Net Value 1</th>
                    <th>Employee 2</th>
                    <th>Net Value 2</th>
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
                    <td>{{ $projcon->year }}</td>
                    <td>{{ $projcon->employee1 }}</td>
                    <td>{{ $projcon->net_value1 }}</td>
                    <td>{{ $projcon->employee2 }}</td>
                    <td>{{ $projcon->net_value2 }}</td>
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
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection