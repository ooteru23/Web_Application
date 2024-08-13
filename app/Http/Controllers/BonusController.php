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
        // $query = Calculate::query();
        // if($request->filled('employee_name') && $request->filled('bonus_year')) {
        //     $employeeName = $request->input('employee_name');
        //     $year = $request->input('bonus_year');

        //     $query->where(function($query) use($employeeName, $year) {
        //         $query->where('employee1', $employeeName)
        //                 ->where('year', $year)
        //                 ->orWhere(function($query) use($employeeName, $year) {
        //                     $query->where('employee2', $employeeName)
        //                             ->where('year', $year);
        //                 });
        //     });
        // }
        
        // $bonuses = $query->get();
        $projcons = Calculate::oldest()->get();
        $persons = Employee::oldest()->get();
        return view('bonus', compact('persons', 'projcons'));
    }

    public function store(Request $request)
    {
        
    }

    public function destroy($id)
    {
        
    }
}