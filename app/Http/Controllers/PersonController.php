<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Person;
use App\Models\Employeetype; 
use App\Models\Region;
use App\Models\Employee;
use App\Models\Address;
use App\Models\Email;
use App\Models\Phone;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $employees = Person::all();

        $employees = Person::where('PersonTypeID','!=','3')->latest()->paginate(10);
        return view('employees.index')->with('employees', $employees);

    }

    public function search(Request $request)
    {
        $search = $request->search;
        $employees = Person::where(function($query) use ($search){
            $query->where('FirstName','like',"%$search%");
        })
        ->paginate(10);
        return view('employees.index', compact('employees','search')); 
        


    //     $search = $request->get('search');
    //     if($search != ''){
    //     $employees = Person::where('FirstName','like', '%' .$search. '%')->paginate(2);
    //     $employees->appends(array('search'=> input::get('search'),));
    //     if(count($employees )>0){
    //        return view('employees.index',['employees'=>$employees]);
    //     }
    //     return back()->with('error','No results Found');
    // }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $employeetypes = Employeetype::where('TypeName','!=','patient')->pluck('TypeName', 'id');
        $regions = Region::pluck('RegionName', 'id');
        return view('employees.create', compact('employeetypes','regions'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'PersonTypeID'=> 'required',
            'DOB'=> 'required',
            'FirstName'=> 'required',
            'FatherName'=> 'required',
            'LastName'=> 'required',
            'PhotoURL'=> 'required',
            'Gender'=> 'required',
            'ZoneOrSubcity'=> 'required',
            'Kebele'=> 'required',
            'Woreda'=> 'required',
            'Town'=> 'required',
            'HouseNumber'=> 'required',
            'Email'=> 'required',
            'PhoneNumber'=> 'required'
        ]);

        
            $person = new person();
            $employee = new employee();
			$address = new address();
            $email = new email();
			$phone = new phone();

			$input['PersonTypeID'] = $request->input('PersonTypeID');
			$input['Title'] = $request->input('Title');
			$input['FirstName'] = $request->input('FirstName');
			$input['FatherName'] = $request->input('FatherName');
			$input['LastName'] = $request->input('LastName');
			$input['DOB'] = $request->input('DOB');

            // $fileName = time() . '.' . $request->PhotoURL->extension();
            // $request->PhotoURL->storeAs('public/images', $fileName);
            // $input['PhotoURL'] = $fileName;
            $fileName = time() . '.' . request()->PhotoURL->getClientOriginalExtension();
            request()->PhotoURL->move(public_path('images'), $fileName);
            $input['PhotoURL'] = $fileName;
            $input['Gender'] = $request->input('Gender');
            
						
			$employee->Username = $request->get('Username');
            $employee->Password = bcrypt("123456");
	    
	
			$address->RegionID = $request->get('RegionID');
            $address->ZoneOrSubcity = $request->get('ZoneOrSubcity');
            $address->Woreda = $request->get('Woreda');
			$address->Town = $request->get('Town');
            $address->Kebele = $request->get('Kebele');	
			$address->HouseNumber = $request->get('HouseNumber');

            $email->Email = $request->get('Email');

            $phone->PhoneNumber = $request->get('PhoneNumber');

					
			$person = Person::create($input);
			$employee->CreatedByID = $person->id;
			$address->CreatedByID = $person->id;
			$email->CreatedByID = $person->id;
			$phone->CreatedByID = $person->id;
			$employee->PersonID = $person->id;
			$address->PersonID = $person->id;
            $email->PersonID = $person->id;
			$phone->PersonID = $person->id;

            $person->save();
            $employee->save();
			$address->save();
            $email->save();
			$phone->save();

            session()->flash('message', 'Employee Successfully Added!');
            return redirect('employee');
            // return redirect('employee')->with('flash_message', 'Employee Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $employee = Person::find($id);
        // return view('employees.show')->with('employees', $employee)->with('address', $employee->address);

       // $address = $employee->address;        
        return view('employees.show')->with('employees', $employee);//->with('address',$address);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $employee = Person::find($id);
        return view('employees.edit')->with('employees', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $person = $request->input('PersonID');
		$person = Person::find($person);
		
        $employee = $person->employee;
        $address = $person->address;
        $email = $person->email;
        $phone = $person->phone;

        if($person) {
            $person->PersonTypeID = $request->get('PersonTypeID');
            $person->Title = $request->get('Title');
            $person->FirstName = $request->get('FirstName');
            $person->FatherName = $request->get('FatherName');
            $person->LastName = $request->get('LastName');
            $person->DOB = $request->get('DOB');
            $person = time() . '.' . request()->PhotoURL->getClientOriginalExtension();
            request()->PhotoURL->move(public_path('images'), $fileName);
            $input['PhotoURL'] = $person;
            $person->Gender = $request->get('Gender');

            $person->save();
						
			$employee->Username = $request->get('Username');
            $employee->Password = bcrypt("123456");

            $employee->save();
	
			$address->RegionID = $request->get('RegionID');
            $address->ZoneOrSubcity = $request->get('ZoneOrSubcity');
            $address->Woreda = $request->get('Woreda');
			$address->Town = $request->get('Town');
            $address->Kebele = $request->get('Kebele');	
			$address->HouseNumber = $request->get('HouseNumber');

            $address->save();

            $email->Email = $request->get('Email');

            $email->save();

            $phone->PhoneNumber = $request->get('PhoneNumber');

            $phone->save();

            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
    
        $data =DB::table('person')
        ->leftJoin('person_phone','person.id', '=','person_phone.PersonID')
        ->leftJoin('person_email','person.id', '=','person_email.PersonID')
        ->leftJoin('employee','person.id', '=','employee.PersonID')
        ->leftJoin('person_address','person.id', '=','person_address.PersonID')
        ->where('person.id', $id); 
        DB::table('person_phone')->where('PersonID', $id)->delete(); 
        DB::table('person_email')->where('PersonID', $id)->delete();  
        DB::table('employee')->where('PersonID', $id)->delete(); 
        DB::table('person_address')->where('PersonID', $id)->delete();                           
        $data->delete();
        // return redirect('employee')->with('flash_message', 'Employee deleted!');
        session()->flash('message', 'Employee Successfully Deleted!');
        return redirect()->back();
        
 
    }
}
