<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\EmployeeType;


class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeetypes = EmployeeType::all();
        return view('employeetypes.index')->with('employeetypes', $employeetypes);
    }

    
    public function searchemployeetype(Request $request)
    {
        $search = $request->search;
        $employeetypes = Employeetype::where(function($query) use ($search){
            $query->where('TypeName','like',"%$search%");
        })
        ->get();

        return view('employeetypes.index', compact('employeetypes','search'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        EmployeeType::create($input);
        return redirect('employeetype')->with('flash_message', 'Employee Type Added!');
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
        $employeetype = EmployeeType::find($id);
        return response()->json([
            'status'=>200,
            'employeetype'=> $employeetype,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $employeetype = EmployeeType::find($id);
        $employeetype->TypeName = $request->input('TypeName');
        $employeetype->TypeDescription = $request->input('TypeDescription');
        $employeetype->update();
        return redirect('employeetype')->with('flash_message', 'Employee Type Updated!');  

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EmployeeType::destroy($id);
        return redirect('employeetype')->with('flash_message', 'Employee Type deleted!');
    }
}
