<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Region;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('regions.index')->with('regions', $regions);
    }

    public function searchregion(Request $request)
    {
        $search = $request->search;
        $regions = Region::where(function($query) use ($search){
            $query->where('RegionName','like',"%$search%");
        })
        ->get();

        return view('Regions.index', compact('regions','search'));   
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
        Region::create($input);
        return redirect('region')->with('flash_message', 'Region Added!');
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
        $region = Region::find($id);
        return response()->json([
            'status'=>200,
            'region'=> $region,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $region = Region::find($id);
        $region->RegionNumber = $request->input('RegionNumber');
        $region->RegionName = $request->input('RegionName');
        $region->update();
        return redirect('region')->with('flash_message', 'Region Updated!');  

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Region::destroy($id);
        return redirect('region')->with('flash_message', 'Region deleted!');
    }
}
