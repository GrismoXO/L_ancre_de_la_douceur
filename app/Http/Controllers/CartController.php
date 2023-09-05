<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $carts = Cart::with('user')->latest()->get();
    
    foreach ($carts as $cart) {
        $cart = $this->totalArticle($cart->article_id, $cart->quantity_cart);
    }

    $totalCart = $this->totalCart();
  
    return view('carts.index', [
        'carts' => $carts,
        'totalCart' => $totalCart,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $article)
    {
        $article = Article::findOrFail($article);

        // dd($article->title);
       
        $cart = new Cart();
        $cart->title = $article->title;
        $cart->image = $article->image;
        $cart->content = $article->content;
        $cart->price = $article->price;
        $cart->alt = $article->alt;
        $cart->quantity_cart = $request->quantity_cart;
        $cart->user_id = auth()->id();
        $cart->article_id = $article->id;


        
        $cart->save();
    
        return redirect()->back()->with('success', 'Votre article été ajouté');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('carts.index')->with('success', 'Produit supprimé du panier.');
    }
    
    public function totalArticle()
    {   
    }

    private function totalCart()
    {
        $carts = Cart::all();
        $totalCart = 0;

        foreach ($carts as $article) {
            $totalCart += $article->price * $article->quantity_cart;
        }

        return $totalCart;
    }

    public function increment(Cart $cart)
    {
        $cart->quantity_cart += 1;
        $cart->save();
        return redirect()->route('carts.index');
    }

    public function decrement(Cart $cart)
    {
        if ($cart->quantity_cart > 1) {
            $cart->quantity_cart -= 1;
            $cart->save();
        }
        return redirect()->route('carts.index');
    }

}
