<?php

namespace App\Http\Controllers;

use App\Models\Projcon;
use App\Models\Employee;
use App\Models\Calculate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProjconRequest;

class ProjconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Calculate::query();
        if($request->filled('employee_name') && $request->filled('projcon_year')) {
            $employeeName = $request->input('employee_name');
            $year = $request->input('projcon_year');

            $query->where(function($query) use($employeeName, $year) {
                $query->where('employee1', $employeeName)
                        ->where('year', $year)
                        ->orWhere(function($query) use($employeeName, $year) {
                            $query->where('employee2', $employeeName)
                                    ->where('year', $year);
                        });
            });
        }
        
        $projcons = $query->get();
        $persons = Employee::oldest()->get();
        return view('projcon', compact('persons', 'projcons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Projcon $projcon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Calculate::find($id);
        return view('edit.projcon', [
            'title' => 'Edit Projcon',
            'projcon' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $projcon = Calculate::find($id);
        $projcon->update($request->all());
        return redirect('/project-control')->with('success', 'Table updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $projcon = Calculate::find($id);
        // $projcon->delete();
        // return redirect('/project-control')->with('success', 'Table has deleted successfully');
    }
}
