<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Appointment;
use App\Models\Lab;
use App\Models\Labhistory;
use App\Models\Patienthistory;
use App\Models\Prescriptionhistory;
use App\Models\Patient;

use Auth;


class DoctorAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user_id = Auth::user()->id;
       

        $doctorappointments = Appointment::where('Status','=','active')->where('AssignedToID','=',$user_id)->get();
        $labs = Lab::pluck('LabType', 'id');
        return view('doctorsappointments.index', compact('labs'), compact('user_id'))->with('doctorappointments', $doctorappointments);

    }

    public function orderedlab(): View
    {
        $orderedlabs = Labhistory::all();
        return view('doctorsappointments.vieworder')->with('orderedlabs', $orderedlabs);
    } 

    // public function patienthistory(): View
    // {
    //     $patienthistories = Patienthistory::all();
    //     return view('doctorsappointments.viewhistory')->with('patienthistories', $patienthistories);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       
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
    public function show(string $PatientID)
    {
        $user_id = Auth::user()->id;

        
        $orderedlabs = Labhistory::where('PatientID','=',$PatientID)->where('LabDoneByID','=',$user_id)->get();
        $patienthistories = Patienthistory::where('PatientID','=',$PatientID)->get();

        return view('doctorsappointments.show', [
            'orderedlabs' => $orderedlabs,
            'patienthistories' => $patienthistories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $labhistory = Appointment::find($id);
        return response()->json([
            'status'=>200,
            'labhistory'=> $labhistory,
        ]);
    }

    public function edithistory(string $id)
    {
        $patienthistory = Appointment::find($id);
        return response()->json([
            'status'=>200,
            'patienthistory'=> $patienthistory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $input = $request->all();
        Labhistory::create($input);
        session()->flash('message', 'Lab Ordered Successfully!');
        return redirect('doctorappointment');  

    }

    public function updatehistory(Request $request)
    {
        $validator = $request->validate([
            'findings' => ['required'],
            'medicine' => ['required']
            
        ]);
     
        $patient = new patient();
        $patienthistory = new patienthistory();
        $prescriptionhistory = new prescriptionhistory();


        $patient->id = $request->get('PatientID');
        $patienthistory->findings = $request->get('findings');
        $prescriptionhistory->medicine = $request->get('medicine');

    
        $patienthistory->PatientID = $patient->id;
        $prescriptionhistory->PatientID = $patient->id;

      
        $patienthistory->save();
        $prescriptionhistory->save();
      
        
        session()->flash('message', 'Patient History Added Successfully!');
        return redirect('doctorappointment'); 
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
