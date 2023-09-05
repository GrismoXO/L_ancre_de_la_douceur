<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::All();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'required|image',
            'alt' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        
        $validated = [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image->store('articles'),
            'alt' => $request->alt,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];

        $request->user()->articles()->create($validated);    
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        $categories = Category::All();
        return view('articles.edit', [
            'article' => $article,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, article $article): RedirectResponse
    {
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ];
        if ($request->has("image")) {
            // On ajoute la règle de validation pour "picture"
            $rules["image"] = 'required|image';
        }

        $this->validate($request, $rules);

        if ($request->has("picture")) {


            Storage::delete($article->picture);

            $chemin_image = $request->picture->store("articles");
        }
        
        $article->update([
            "title" => $request->title,
            "content" => $request->content,
            "picture" => isset($chemin_image) ? $chemin_image : $article->image,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article): RedirectResponse
    {
           // On supprime l'image existant
           Storage::delete($article->image);

           // On les informations du $post de la table "posts"
           $article->delete();
   
           return redirect(route('articles.index')); 
    }


}
