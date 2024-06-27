<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Offer;
use Illuminate\Http\Request;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('offer', [
            'offers' =>  Offer::oldest()->filter(request(['search']))->get(),
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
        Offer::create($request->all());
        return redirect('/offer')->with('success', 'Table has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Offer::find($id);
        return view('edit.offer', [
            'title' => 'Edit Offer',
            'offer' => $data,
            'persons' => Employee::oldest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $offer->update($request->all());
        return redirect('/offer')->with('success', 'Table updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect('/offer')->with('success', 'Table deleted successfully');
    }
}
