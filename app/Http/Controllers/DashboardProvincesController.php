<?php

namespace App\Http\Controllers;

use App\Models\MasterProvince;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.provinces.index', [
            'provinces' => MasterProvince::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.provinces.create');
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
        ]);

        MasterProvince::create($validatedData);

        return redirect('/dashboard/provinces')->with('success', 'New province has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterProvince $masterProvince)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterProvince $province)
    {
        //
        return view('dashboard.provinces.edit', [
            'provinces' => $province
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterProvince $province)
    {
        //
        $rules = [
            'name' =>  'required|max:255'

        ];

        if ($request->slug != $province->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        MasterProvince::where('id', $province->id)->update($validatedData);

        return redirect('/dashboard/provinces')->with('success', 'Province has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterProvince $masterProvince, string $id)
    {
        //

        $province = MasterProvince::findOrFail($id);
        $province->delete();

        return redirect('/dashboard/provinces')->with('success', 'Province has been deleted!!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(MasterProvince::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
