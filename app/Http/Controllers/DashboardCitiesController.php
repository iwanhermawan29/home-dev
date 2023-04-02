<?php

namespace App\Http\Controllers;

use App\Models\MasterCity;
use App\Models\MasterProvince;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.cities.index', [
            'cities' => MasterCity::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.cities.create', [
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
            'province_id' => 'required'
        ]);

        MasterCity::create($validatedData);

        return redirect('/dashboard/cities')->with('success', 'New cities has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterCity $masterCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterCity $city)
    {

        return view('dashboard.cities.edit', [
            'city' => $city,
            'provinces' => MasterProvince::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterCity $city)
    {
        //

        $rules = [
            'name' =>  'required|max:255',
            'province_id' => 'required'

        ];

        if ($request->slug != $city->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        MasterCity::where('id', $city->id)->update($validatedData);

        return redirect('/dashboard/cities')->with('success', 'Cities has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterCity $masterCity, string $id)
    {
        //
        $cities = MasterCity::findOrFail($id);
        $cities->delete();

        return redirect('/dashboard/cities')->with('success', 'Cities has been deleted!!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(MasterCity::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
