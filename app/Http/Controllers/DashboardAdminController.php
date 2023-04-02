<?php

namespace App\Http\Controllers;

use App\Models\AdminsProperty;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        return view('dashboard.admins.index', [
            'admins' => AdminsProperty::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'phone_number' => 'required'
        ]);



        AdminsProperty::create($validatedData);

        return redirect('/dashboard/admins')->with('success', 'New admin has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminsProperty $adminsProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminsProperty $admin)
    {
        //
        return view('dashboard.admins.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminsProperty $admin)
    {
        //

        $rules = [
            'name' =>  'required|max:255',
            'phone_number' => 'required'

        ];





        $validatedData = $request->validate($rules);



        AdminsProperty::where('id', $admin->id)->update($validatedData);

        return redirect('/dashboard/admins')->with('success', 'Admin has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminsProperty $adminsProperty, string $id)
    {
        //

        //

        $admin = AdminsProperty::findOrFail($id);
        $admin->delete();
        return redirect('/dashboard/admins')->with('success', 'Admin has been deleted!!');
    }
}
