<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Lab;


class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = Lab::all();
        return view('labs.index')->with('labs', $labs);
    }

    public function searchlab(Request $request)
    {
        $search = $request->search;
        $labs = Lab::where(function($query) use ($search){
            $query->where('LabType','like',"%$search%");
        })
        ->get();

        return view('labs.index', compact('labs','search'));   
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
        $request->validate([
            'LabType'=> 'required',
            'LabDescription'=> 'required'
        ]);
        
        $input = $request->all();
        Lab::create($input);
        return redirect('lab')->with('flash_message', 'Lab Added!');
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
        $lab = Lab::find($id);
        return response()->json([
            'status'=>200,
            'lab'=> $lab,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $lab = Lab::find($id);
        $lab->LabType = $request->input('LabType');
        $lab->LabDescription = $request->input('LabDescription');
        $lab->update();
        return redirect('lab')->with('flash_message', 'Employee Updated!');  

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lab::destroy($id);
        return redirect('lab')->with('flash_message', 'Lab deleted!');
    }
}
