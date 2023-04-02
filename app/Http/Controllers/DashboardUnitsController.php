<?php

namespace App\Http\Controllers;

use App\Models\MasterUnit;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('dashboard.units.index', [
            'units' => MasterUnit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //



        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('unit-images');
        }

        MasterUnit::create($validatedData);

        return redirect('/dashboard/units')->with('success', 'New unit has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterUnit $unit)
    {

        return view('dashboard.units.edit', [
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterUnit $unit)
    {
        //
        $rules = [
            'name' =>  'required|max:255',
            'type' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:1024'
        ];




        if ($request->slug != $unit->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('unit-images');
        }

        MasterUnit::where('id', $unit->id)->update($validatedData);

        return redirect('/dashboard/units')->with('success', 'Unit has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterUnit $unites, string $id)
    {
        //
        if ($unites->image) {
            Storage::delete($unites->image);
        }
        $unit = MasterUnit::findOrFail($id);
        $unit->delete();
        return redirect('/dashboard/units')->with('success', 'Unit has been deleted!!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(MasterUnit::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
