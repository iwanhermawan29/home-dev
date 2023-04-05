<?php

namespace App\Http\Controllers;

use App\Models\contactus;
use Illuminate\Http\Request;

class DashboardContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.contactus.index', [
            'contactus' => contactus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.contactus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'hours' => 'required',
            'email' => 'required'
        ]);








        contactus::create($validatedData);

        return redirect('/dashboard/contactus')->with('success', 'New contacus has been added!!');
    }



    /**
     * Display the specified resource.
     */
    public function show(contactus $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contactus $contactus, string $id)
    {
        //
        return view('dashboard.contactus.edit', [

            'contact' => contactus::findOrFail($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contactus $contactus, string $id)
    {
        //

        $rules = [
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'hours' => 'required',
            'email' => 'required'

        ];





        $validatedData = $request->validate($rules);



        contactus::where('id', $id)->update($validatedData);

        return redirect('/dashboard/contactus')->with('success', 'Contact us has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contactus $contactus, string $id)
    {
        //
        $contact = contactus::findOrFail($id);
        $contact->delete();
        return redirect('/dashboard/contactus')->with('success', 'Contact us has been deleted!!');
    }
}
