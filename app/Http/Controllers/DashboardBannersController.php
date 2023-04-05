<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.banners.index', [
            'banners' => Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([

            'image' => 'image|file|max:2048',
            'title' => 'required'


        ]);




        // Upload and resize image if exists
        if ($request->file('image')) {
            $image = $request->file('image');

            // Resize image
            $img = Image::make($image);
            $img->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Save image to storage
            $path = $image->store('banners-images');

            // Save image path to database
            $validatedData['image'] = $path;
        }


        Banner::create($validatedData);

        return redirect('/dashboard/banners')->with('success', 'New banners has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banners, string $id)
    {
        //
        return view('dashboard.banners.edit', [

            'banner' => Banner::findOrFail($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banners, string $id)
    {
        //
        $rules = [

            'image' => 'image|file|max:2048',
            'title' => 'required'

        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $image = $request->file('image');


            $img = Image::make($image);
            $img->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
            });


            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }


            $path = $image->store('banners-images');


            $validatedData['image'] = $path;
        }


        Banner::where('id', $id)->update($validatedData);

        return redirect('/dashboard/banners')->with('success', 'Banner us has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banners, string $id)
    {
        //
        if ($banners->image) {
            Storage::delete($banners->image);
        }

        $banners = Banner::findOrFail($id);
        $banners->delete();
        return redirect('/dashboard/banners')->with('success', 'Banners us has been deleted!!');
    }
}
