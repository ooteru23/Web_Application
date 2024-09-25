<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;


class ReportController extends Controller
{
    public function index() 
    {
        $bonuses = Bonus::Oldest()->get();
        return view('report', compact('bonuses'));
    }
}
