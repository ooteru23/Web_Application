<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Offer;
use App\Models\Projcon;
use App\Models\Employee;
use App\Models\Calculate;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    public function index(Request $request)
    {
        $projcons = Calculate::oldest()->get();
        $persons = Employee::oldest()->get();
        return view('bonus', compact('persons', 'projcons'));
    }

    public function store(Request $request)
    {
        Bonus::create($request->all());
        return redirect('/bonus-calculation')->with('success', 'Data has been saved');
    }
}