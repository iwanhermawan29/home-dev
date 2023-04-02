<?php

namespace App\Http\Controllers;

use App\Models\HomeProperty;
use App\Models\MasterUnit;
use App\Models\MasterCity;
use App\Models\MasterProvince;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.homes.index', [
            'homes' => HomeProperty::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.homes.create', [
            'units' => MasterUnit::all(),
            'cities' => MasterCity::all(),
            'provinces' => MasterProvince::all()
        ]);
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
            'address' =>  'required|max:255',
            'unit_id' =>  'required',
            'city_id' =>  'required',
            'province_id' =>  'required',
            'zip' =>  'required',
            'country' =>  'required',
            'description' =>  'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        HomeProperty::create($validatedData);

        return redirect('/dashboard/homes')->with('success', 'New Home has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeProperty $home)
    {
        //
        return view('dashboard.homes.show', [
            'homes' => $home,
            'units' => MasterUnit::all(),
            'cities' => MasterCity::all(),
            'provinces' => MasterProvince::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeProperty $home)
    {
        //

        return view('dashboard.homes.edit', [
            'homes' => $home,
            'units' => MasterUnit::all(),
            'cities' => MasterCity::all(),
            'provinces' => MasterProvince::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeProperty $home)
    {
        //
        $rules = [
            'name' =>  'required|max:255',
            'address' =>  'required|max:255',
            'unit_id' =>  'required',
            'city_id' =>  'required',
            'province_id' =>  'required',
            'zip' =>  'required',
            'country' =>  'required',
            'description' =>  'required',

        ];

        if ($request->slug != $home->slug) {
            $rules['slug'] = 'required|unique:home_properties';
        }

        $validatedData = $request->validate($rules);

        HomeProperty::where('id', $home->id)->update($validatedData);

        return redirect('/dashboard/homes')->with('success', 'Home has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeProperty $homeProperty, string $id)
    {
        //
        $home = HomeProperty::findOrFail($id);
        $home->delete();

        return redirect('/dashboard/homes')->with('success', 'Home has been deleted!!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(HomeProperty::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
