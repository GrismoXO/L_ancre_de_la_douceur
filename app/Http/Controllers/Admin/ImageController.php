<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('images.create', [
            'images' => Image::with('user')->latest()->get(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image',
            'alt' => 'required|string|max:255',
        ]);
        
        $validated = [
            'image' => $request->image->store('image'),
            'alt' => $request->alt,
        ];

        $request->user()->images()->create($validated);
 
        return redirect()->back()->with('success', 'Votre photo été ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        $images = Image::all();
        // return view('welcome', compact('images'));
        return view('images.show', compact('images'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        Storage::delete($image->image);

        // On les informations du $post de la table "posts"
        $image->delete();

        return redirect(route('images.show')); 
    }
}
