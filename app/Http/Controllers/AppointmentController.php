<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Person;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $appointments = Appointment::all();
        // return view('appointments.index')->with('appointments', $appointments);

        $appointments = Appointment::all();
        $patients = Patient::pluck('CardNumber', 'id');
        $persons = Person::pluck('FirstName', 'id');
        return view('appointments.index', compact('patients', 'persons'))->with('appointments', $appointments);

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
        $input = $request->all();
        Appointment::create($input);
        return redirect('appointment')->with('flash_message', 'Appointment Added!');

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
        $appointment = Appointment::find($id);
        return response()->json([
            'status'=>200,
            'appointment'=> $appointment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $appointment = Appointment::find($id);
        $appointment->AssignedToID = $request->input('AssignedToID');
        $appointment->PatientID = $request->input('PatientID');
        $appointment->AppointmentDate = $request->input('AppointmentDate');
        $appointment->Status = $request->input('Status');
        $appointment->update();
        return redirect('appointment')->with('flash_message', 'Appointment Updated!');  

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appointment::destroy($id);
        return redirect('appointment')->with('flash_message', 'Appointment deleted!');
    }
}
