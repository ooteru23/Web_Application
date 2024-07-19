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
    public function index()
    {
        return view('bonus', [
            'persons' => Employee::oldest()->get(),
            'projcons' => Calculate::oldest()->get(),
            'bonuses' => Bonus::oldest()->get()
        ]);
    }

    public function store(Request $request)
    {
        Bonus::create($request->all());
        return redirect('/bonus-calculation')->with('success', 'Table has been added');
    }

    public function destroy($id)
    {
        $bonus = Bonus::find($id);
        $bonus->delete();
        return redirect('/bonus-calculation')->with('success', 'Table has deleted successfully');
    }
}
