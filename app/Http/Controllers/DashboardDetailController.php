<?php

namespace App\Http\Controllers;

use App\Models\DetailProperty;
use App\Models\HomeProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $details = DetailProperty::with('homeProperties')->get();
        return view('dashboard.details.index',  compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.details.create', [
            'homes' => HomeProperty::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //

        $validatedData = $request->validate([
            'home_property_id' =>  'required',
            'type' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'garage' => 'required',
            'area' => 'required',
            'price' => 'required',
            'status' => 'required',
            'video' => 'file',
            'map' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'year' => 'required',
            'roof' => 'required',
            'floor' => 'required',
            'heating' => 'required',
            'image_plan' => 'image|file|max:1024',
            'land_area' => 'required',
            'building_area' => 'required'
        ]);


        if ($request->file('video')) {
            $validatedData['video'] = $request->file('video')->store('detail-videos');
        }

        if ($request->file('image_plan')) {
            $validatedData['image_plan'] = $request->file('image_plan')->store('detail-images');
        }

        DetailProperty::create($validatedData);

        return redirect('/dashboard/details')->with('success', 'New details has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailProperty $detailProperty, string $id)
    {
        //
        return view('dashboard.details.show', [

            'detail' => DetailProperty::findOrFail($id),
            'homes' => HomeProperty::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailProperty $detailProperty, string $id)
    {
        //
        return view('dashboard.details.edit', [

            'detail' => DetailProperty::findOrFail($id),
            'homes' => HomeProperty::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailProperty $detailProperty, string $id)
    {
        //
        $rules = [
            'home_property_id' =>  'required',
            'type' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'garage' => 'required',
            'area' => 'required',
            'price' => 'required',
            'status' => 'required',
            'video' => 'file',
            'map' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'year' => 'required',
            'roof' => 'required',
            'floor' => 'required',
            'heating' => 'required',
            'image_plan' => 'image|file|max:1024',
            'land_area' => 'required',
            'building_area' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('video')) {
            if ($request->oldVideo) {
                Storage::delete($request->oldVideo);
            }
            $validatedData['video'] = $request->file('video')->store('detail-videos');
        }


        if ($request->file('image_plan')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image_plan'] = $request->file('image_plan')->store('detail-images');
        }

        DetailProperty::where('id', $id)->update($validatedData);

        return redirect('/dashboard/details')->with('success', 'Details has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailProperty $detailProperty, string $id)
    {
        //
        if ($detailProperty->video) {
            Storage::delete($detailProperty->video);
        }
        if ($detailProperty->image_plan) {
            Storage::delete($detailProperty->image);
        }
        $detail = DetailProperty::findOrFail($id);
        $detail->delete();
        return redirect('/dashboard/details')->with('success', 'Details has been deleted!!');
    }
}
