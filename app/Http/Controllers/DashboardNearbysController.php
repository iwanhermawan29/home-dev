<?php

namespace App\Http\Controllers;

use App\Models\NearbyProperty;
use App\Models\HomeProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardNearbysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nearby = NearbyProperty::with('homeProperties')->get();
        return view('dashboard.nearby.index', compact('nearby'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.nearby.create', [
            'homes' => HomeProperty::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'home_property_id' =>  'required',
            'type' => 'required',
            'name' => 'required',
            'distance' => 'required',
            'rating' => 'required'
        ]);

        NearbyProperty::create($validatedData);

        return redirect('/dashboard/nearbys')->with('success', 'New nearbys has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(NearbyProperty $nearbyProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NearbyProperty $nearbyProperty, string $id)
    {
        //

        return view('dashboard.nearby.edit', [

            'ne' => NearbyProperty::findOrFail($id),
            'homes' => HomeProperty::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NearbyProperty $nearbyProperty, string $id)
    {
        //
        $rules = [
            'home_property_id' =>  'required',
            'type' => 'required',
            'name' => 'required',
            'distance' => 'required',
            'rating' => 'required'

        ];


        $validatedData = $request->validate($rules);

        NearbyProperty::where('id', $id)->update($validatedData);

        return redirect('/dashboard/nearbys')->with('success', 'Nearbys has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NearbyProperty $nearbyProperty, string $id)
    {
        //
        $nearbys = NearbyProperty::findOrFail($id);
        $nearbys->delete();

        return redirect('/dashboard/nearbys')->with('success', 'Nearbys has been deleted!!');
    }
}
