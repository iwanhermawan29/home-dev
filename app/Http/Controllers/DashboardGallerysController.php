<?php

namespace App\Http\Controllers;

use App\Models\GalleryProperty;
use App\Models\HomeProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardGallerysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gallerys = GalleryProperty::with('homeProperties')->get();
        return view('dashboard.gallerys.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.gallerys.create', [
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
            'image' => 'image|file|max:1024',
            'caption' => 'required'
        ]);



        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        // if ($request->file('image')) {
        //     $image = $request->file('image');

        //     // Mengubah ukuran gambar dengan menggunakan Intervention Image
        //     $resizedImage = Image::make($image)->resize(1000, 750)->encode();
        //     $filename = time() . '.' . $image->getClientOriginalExtension();

        //     // Simpan gambar ke folder public/gallery-images
        //     Storage::disk('public')->put('gallery-images/' . $filename, $resizedImage);

        //     // Simpan nama file di database
        //     $validatedData['image'] = $filename;
        // }

        GalleryProperty::create($validatedData);

        return redirect('/dashboard/gallerys')->with('success', 'New gallerys has been added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryProperty $galleryProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryProperty $galleryProperty, string $id)
    {
        //
        return view('dashboard.gallerys.edit', [

            'gallery' => GalleryProperty::findOrFail($id),
            'homes' => HomeProperty::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryProperty $galleryProperty, string $id)
    {
        //

        $rules = [
            'home_property_id' =>  'required',
            'image' => 'image|file|max:1024',
            'caption' => 'required'
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        GalleryProperty::where('id', $id)->update($validatedData);

        return redirect('/dashboard/gallerys')->with('success', 'Gallerys has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryProperty $galleryProperty, string $id)
    {
        //
        if ($galleryProperty->image) {
            Storage::delete($galleryProperty->image);
        }
        $gallery = GalleryProperty::findOrFail($id);
        $gallery->delete();
        return redirect('/dashboard/gallerys')->with('success', 'Gallerys has been deleted!!');
    }
}
