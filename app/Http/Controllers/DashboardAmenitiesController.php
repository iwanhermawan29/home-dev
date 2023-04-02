<?php

namespace App\Http\Controllers;

use App\Models\AmenitiesProperty;
use App\Models\HomeProperty;
use Illuminate\Http\Request;

class DashboardAmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $am = AmenitiesProperty::with('home')->get();
        $amenities = AmenitiesProperty::with('homeProperties')->get();
        return view('dashboard.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.amenities.create', [
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
            'name' => 'required'
        ]);

        AmenitiesProperty::create($validatedData);

        return redirect('/dashboard/amenities')->with('success', 'New amenities has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AmenitiesProperty $amenitiesProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AmenitiesProperty $amenitiesProperty, string $id)
    {
        //
        return view('dashboard.amenities.edit', [

            'am' => AmenitiesProperty::findOrFail($id),
            'homes' => HomeProperty::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AmenitiesProperty $amenities, string $id)
    {
        //
        $rules = [
            'home_property_id' =>  'required',
            'type' => 'required',
            'name' => 'required'

        ];


        $validatedData = $request->validate($rules);

        AmenitiesProperty::where('id', $id)->update($validatedData);

        return redirect('/dashboard/amenities')->with('success', 'Amenities has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AmenitiesProperty $amenitiesProperty, string $id)
    {
        //

        $amenities = AmenitiesProperty::findOrFail($id);
        $amenities->delete();

        return redirect('/dashboard/amenities')->with('success', 'Amenities has been deleted!!');
    }
}
