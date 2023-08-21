<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Person;
use App\Models\Region;
use App\Models\Patient;
use App\Models\Address;
use App\Models\Email;
use App\Models\Phone;

use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $patients = Person::all();
        $patients = Person::where('PersonTypeID','=','3')->get();
        return view('patients.index')->with('patients', $patients);

        // $employees = Person::latest()->paginate(2);
        // return view('employees.index', compact('employees'))->with('i', (request()->input('page', 1) -1) * 2);

    }

    public function searchpatient(Request $request)
    {
        $search = $request->search;
        $patients = Person::where(function($query) use ($search){
            $query->where('FirstName','like',"%$search%");
        })
        ->get();

        return view('patients.index', compact('patients','search'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $regions = Region::pluck('RegionName', 'id');
        return view('patients.create', compact('regions'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'FirstName'=> 'required',
        //     'LastName'=> 'required',
        // ]);
        
            $person = new person();
            $patient = new patient();
			$address = new address();
            $email = new email();
			$phone = new phone();

            // $person->PersonTypeID = 3;
            $input['PersonTypeID'] = "3";
            $input['Title'] = $request->input('Title');
			$input['FirstName'] = $request->input('FirstName');
			$input['FatherName'] = $request->input('FatherName');
			$input['LastName'] = $request->input('LastName');
			$input['DOB'] = $request->input('DOB');
            $fileName = time() . '.' . request()->PhotoURL->getClientOriginalExtension();
            request()->PhotoURL->move(public_path('images'), $fileName);
            $input['PhotoURL'] = $fileName;
            $input['Gender'] = $request->input('Gender');
            
            $patient->CardNumber = rand(0,99999);
	
			$address->RegionID = $request->get('RegionID');
            $address->ZoneOrSubcity = $request->get('ZoneOrSubcity');
            $address->Woreda = $request->get('Woreda');
			$address->Town = $request->get('Town');
            $address->Kebele = $request->get('Kebele');	
			$address->HouseNumber = $request->get('HouseNumber');

            $email->Email = $request->get('Email');

            $phone->PhoneNumber = $request->get('PhoneNumber');

					
			$person = Person::create($input);
			$patient->PersonID = $person->id;
			$address->PersonID = $person->id;
            $email->PersonID = $person->id;
			$phone->PersonID = $person->id;

            $patient->save();
			$address->save();
            $email->save();
			$phone->save();

            session()->flash('message', 'patient successfully added!');
            return redirect('patient');
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $patient = Person::find($id);
        return view('patients.show')->with('patients', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $patient = Person::find($id);
        return view('patients.edit')->with('patients', $patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // $person = $request->input('PersonID');
		// $person = Person::find($person);
		
        // $employee = $person->employee;
        // $address = $person->address;
        // $email = $person->email;
        // $phone = $person->phone;

        // if($person) {
        //     $person->PersonTypeID = $request->get('PersonTypeID');
        //     $person->Title = $request->get('Title');
        //     $person->FirstName = $request->get('FirstName');
        //     $person->FatherName = $request->get('FatherName');
        //     $person->LastName = $request->get('LastName');
        //     $person->DOB = $request->get('DOB');
        //     $person = time() . '.' . request()->PhotoURL->getClientOriginalExtension();
        //     request()->PhotoURL->move(public_path('images'), $fileName);
        //     $input['PhotoURL'] = $person;
        //     $person->Gender = $request->get('Gender');

        //     $person->save();
						
		// 	$employee->Username = $request->get('Username');
        //     $employee->Password = bcrypt("123456");

        //     $employee->save();
	
		// 	$address->RegionID = $request->get('RegionID');
        //     $address->ZoneOrSubcity = $request->get('ZoneOrSubcity');
        //     $address->Woreda = $request->get('Woreda');
		// 	$address->Town = $request->get('Town');
        //     $address->Kebele = $request->get('Kebele');	
		// 	$address->HouseNumber = $request->get('HouseNumber');

        //     $address->save();

        //     $email->Email = $request->get('Email');

        //     $email->save();

        //     $phone->PhoneNumber = $request->get('PhoneNumber');

        //     $phone->save();

            
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
    
        $data =DB::table('person')
        ->leftJoin('person_phone','person.id', '=','person_phone.PersonID')
        ->leftJoin('person_email','person.id', '=','person_email.PersonID')
        ->leftJoin('patient','person.id', '=','patient.PersonID')
        ->leftJoin('person_address','person.id', '=','person_address.PersonID')
        ->where('person.id', $id); 
        DB::table('person_phone')->where('PersonID', $id)->delete(); 
        DB::table('person_email')->where('PersonID', $id)->delete();  
        DB::table('patient')->where('PersonID', $id)->delete(); 
        DB::table('person_address')->where('PersonID', $id)->delete();                           
        $data->delete();
        return redirect('patient')->with('flash_message', 'Patient deleted!');
    
           
    }
}
