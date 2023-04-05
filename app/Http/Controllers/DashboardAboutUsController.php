<?php

namespace App\Http\Controllers;

use App\Models\aboutus;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.aboutus.index', [
            'aboutus' => aboutus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'title' =>  'required',
            'description' => 'required',
            'image' => 'image|file|max:2048',
            'image2' => 'image|file|max:2048',
            'video' => 'required',
            'slug' => 'required',
            'status' => 'required'
        ]);




        // // Upload and resize image if exists
        // if ($request->file('image')) {
        //     $image = $request->file('image');


        //     // Resize image
        //     $img = Image::make($image);
        //     $img->resize(1000, 750, function ($constraint) {
        //         $constraint->aspectRatio();
        //     });

        //     // Save image to storage
        //     $path = $image->store('aboutus-images', 'public');

        //     // Save image path to database
        //     $validatedData['image'] = $path;
        // }

        // // // Upload image if exists
        // // if ($request->hasFile('image2')) {
        // //     $image2 = $request->file('image2');
        // //     $image2Name = time() . '-2.' . $image2->getClientOriginalExtension();

        // //     // Save image to storage
        // //     $path = $image2->storeAs('aboutus-images', $image2Name, 'public');

        // //     // Save image path to database
        // //     $validatedData['image2'] = $path;
        // // }


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('aboutus-images');
        }
        if ($request->file('image2')) {
            $validatedData['image2'] = $request->file('image2')->store('aboutus-images');
        }




        aboutus::create($validatedData);

        return redirect('/dashboard/aboutus')->with('success', 'New aboutus has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(aboutus $aboutus, string $id)
    {
        //
        return view('dashboard.aboutus.detail', [

            'about' => aboutus::findOrFail($id)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aboutus $aboutus, string $id)
    {
        //
        return view('dashboard.aboutus.edit', [

            'about' => aboutus::findOrFail($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, aboutus $aboutus, string $id)
    {
        //

        $rules = [
            'title' =>  'required',
            'description' => 'required',
            'image' => 'image|file|max:2048',
            'image2' => 'image|file|max:2048',
            'video' => 'required',
            'slug' => 'required',
            'status' => 'required'
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('aboutus-images');
        }
        if ($request->file('image2')) {
            if ($request->oldImage2) {
                Storage::delete($request->oldImage2);
            }
            $validatedData['image2'] = $request->file('image2')->store('aboutus-images');
        }

        aboutus::where('id', $id)->update($validatedData);

        return redirect('/dashboard/aboutus')->with('success', 'About us has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aboutus $about, string $id)
    {
        //
        if ($about->image) {
            Storage::delete($about->image);
        }
        if ($about->image2) {
            Storage::delete($about->image2);
        }
        $about = aboutus::findOrFail($id);
        $about->delete();
        return redirect('/dashboard/aboutus')->with('success', 'About us has been deleted!!');
    }
}
