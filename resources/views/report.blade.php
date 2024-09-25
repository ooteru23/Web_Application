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
            </ul>
        </div>
    </div>
</nav>
<!-- Form Section -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">Laporan Bonus</h3>
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
    <div class="form-group col-md-6 mt-1">
        <label for="year"> Tahun </label>
        <input type="number" id="year" name="bonus_year" class="form-control"  min="1900" max="2100" step="1" value="2024">
    </div>
    <div class="col-lg-12 mt-3">
        <button class="btn btn-success" id="report_submit" type="submit">Look Report</button>
    </div>
    <br>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered border border-secondary" id="reportTable">
                <tr>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Pengurang(Hitungan Gaji)</th>
                    <th rowspan="2">Bulan Late </th>
                    <th rowspan="2">Bulan OnTime</th>
                    <th rowspan="2">Bonus Komponen</th>
                    <th colspan="2">Persentase</th>
                    <th colspan="2">Kalkulasi Bonus</th>
                    <th colspan="2">Bonus</th>
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    <th>OnTime</th>
                    <th>Late</th>
                    <th>OnTime</th>
                    <th>Late</th>
                    <th>OnTime</th>
                    <th>Late</th>
                </tr>
            </table>
        </div>
    </div>

    {{-- Project Bonus Table --}}
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered border border-secondary d-none" id="bonusTable">
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Month OnTime</th>
                    <th>Month Late</th>
                    <th>Total Net Value</th>
                    <th>Deduction (Salary Calculation)</th>
                    <th>Component Bonus(Calculation)</th>
                    <th>Percent OnTime</th>
                    <th>Total OnTime</th>
                    <th>Percent Late</th>
                    <th>Total Late</th>
                    <th>Percent Bonus OnTime</th>
                    <th>Bonus OnTime</th>
                    <th>Percent Bonus Late</th>
                    <th>Bonus Late</th>
                    
                </tr>
                @foreach ($bonuses as $bonus)
                <tr>
                    <td>{{ $bonus->name }}</td>
                    <td>{{ $bonus->year }}</td>
                    <td>{{ $bonus->month }}</td>
                    <td>{{ $bonus->ontime }}</td>
                    <td>{{ $bonus->late }}</td>
                    <td>{{ $bonus->total_value }}</td>
                    <td>{{ $bonus->salary_deduction }}</td>
                    <td>{{ $bonus->component_bonus }}</td>
                    <td>{{ $bonus->percent_ontime }}</td>
                    <td>{{ $bonus->total_ontime }}</td>
                    <td>{{ $bonus->percent_late }}</td>
                    <td>{{ $bonus->total_late }}</td>
                    <td>{{ $bonus->percent_bonus_ontime }}</td>
                    <td>{{ $bonus->total_bonus_ontime }}</td>
                    <td>{{ $bonus->percent_bonus_late }}</td>
                    <td>{{ $bonus->total_bonus_late }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection