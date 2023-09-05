<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query'); 

        $articles = Article::where('title', 'like', '%' . $query . '%')
                            ->orWhere('content', 'like', '%' . $query . '%')
                            ->get();

        return view('search.results', ['articles' => $articles, 'query' => $query]);
    }
}


