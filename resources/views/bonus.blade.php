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
<!-- Form Section -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">Bonus Calculation</h3>
    <div class="form-group col-md-6 mt-1">
        <label for="employee_name"> Employee Name </label>
        <select id="employeeName" name="employee_name" class="form-select" required>
            <option value="">--Please Choose Options--</option>
            <hr/>
            @foreach ($persons as $person)
                <option>{{ $person->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="year"> Year </label>
        <input type="number" id="year" name="bonus_year" class="form-control"  min="1900" max="2100" step="1" value="2024">
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="month"> Month </label>
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
                <tr>
                    <th>Client Name</th>
                    <th>Month</th>
                    <th>Status</th>
                    <th>Net Value</th>
                </tr>
                <tr>
                </tr>
            </table>
        </div>
    </div>
    <div class="form-group col-md-6 mt-1">
        <label for="ontime"> Month On Time : </label>
        <input type="text" id="ontime" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="late"> Month Late : </label>
        <input type="text" id="late" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="total_value"> Total Net Value : </label>
        <input type="text" id="total_value" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="salary_deduction"> Deduction (Salary Calculation) : </label>
        <input type="text" id="salary_deduction" value="9000000" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="component_bonus"> Component Bonus(Calculation) : </label>
        <input type="text" id="component_bonus" value="2000000" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="total_ontime">Total OnTime : </label>
        <input type="text" id="percent_ontime" value="0%" readonly><input type="text" id="total_ontime" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="total_late"> Total Late : </label>
        <input type="text" id="percent_late" value="0%" readonly><input type="text" id="total_late" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="total_bonus_ontime"> Bonus OnTime : </label>
        <input type="text" id="percent_bonus_ontime" value="15%" readonly><input type="text" id="total_bonus_ontime" value="0" readonly>
    </div>
    <div class="form-group col-md-6 mt-3">
        <label for="total_bonus_late"> Bonus Late : </label>
        <input type="text" id="percent_bonus_late" value="10%" readonly><input type="text" id="total_bonus_late" value="0" readonly>
    </div>
    
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