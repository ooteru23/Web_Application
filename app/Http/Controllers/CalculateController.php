<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Calculate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('calculate', [
            'calculates' => Calculate::oldest()->filter(request(['search']))->get(),
            'clients' => Offer::oldest()->get(),
            'persons' => Employee::oldest()->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Calculate::create($request->all());
        return redirect('/project-setup')->with('success', 'Table has been added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Calculate::find($id);
        return view('edit.calculate', [
            'title' => 'Project Setup',
            'calculate' => $data,
            'clients' => Offer::latest()->get(),
            'persons' => Employee::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $calculate = Calculate::find($id);
        $calculate->update($request->all());
        return redirect('/project-setup')->with('success', 'Table has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $calculate = Calculate::find($id);
        $calculate->delete();
        return redirect('/project-setup')->with('success', 'Table has deleted successfully');
    }
}
