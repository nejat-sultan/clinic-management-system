<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Labhistory;
use App\Models\Lab;


class LabHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       
        $labhistories = Labhistory::all();
        return view('LabHistories.index')->with('labhistories', $labhistories);


        // $appointments = Appointment::all();
        // $patients = Patient::pluck('CardNumber', 'id');
        // $persons = Person::pluck('FirstName', 'id');
        // return view('appointments.index', compact('patients', 'persons'))->with('appointments', $appointments);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // $patients = Patient::pluck('CardNumber', 'id');
        // return view('appointments.index', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        // Appointment::create($input);
        // return redirect('appointment')->with('flash_message', 'Appointment Added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $labhistory = Labhistory::find($id);
        return response()->json([
            'status'=>200,
            'labhistory'=> $labhistory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      
        $id = $request->input('id');
        $labhistory = Labhistory::find($id);
        $labhistory->LabResult = $request->input('LabResult');

        $labhistory->update();
        session()->flash('message', 'Result Updated Successfully!');
        return redirect('labhistory');  

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Appointment::destroy($id);
        // return redirect('appointment')->with('flash_message', 'Appointment deleted!');
    }
}
