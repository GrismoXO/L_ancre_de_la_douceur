<x-app-layout>
  @section('title', 'Boutique')
  <div class="w-full pt-4 pb-8 nav_barre bg_pink_opa shadow-lg relative">
    <form action="{{ route('search') }}" method="GET" class="w-full flex justify-center">
      <input type="text" name="query" placeholder="Rechercher votre article..." class="w-2/5 open nav_barre rounded-l-lg ">
      <button type="submit" class="border-solid border-2 p-2 rounded-r-lg nav"><i class="fa fa-search fa-2x"></i></button>
    </form>
  </div>
  <div class="h-8 bg-white"></div>
  <div class="bg-white" role="dialog" aria-modal="true">
    <div class="flex justify-center">
      <div class="h-8"></div>
      <div class=" border border-solid w-4/5 bg-white shadow-lg rounded-lg ">
        <div class="hover">
          <a href="{{ route('articles.index', $article)}}">
            <p class="kalam text-2xl font-bold flex justify-end pr-4 pt-4">X</p>
          </a>
        </div>
        <div class="flex justify-around pb-6 flex_col_800">
          <section class="flex items-center center">
              <div class="p-4">
                <img src="{{ asset('storage/'.$article->image)}}" class="object-cover h-72 w-72" alt="{{ $article->alt }}">
              </div>
          </section>
          <section class="flex justify-evenly " >
            <div class="mt-10">
              <div>
                <h2 class="text-2xl kalam font-bold"> {{$article->title}} </h2>
              </div>
              <div class="flex flex-col mt-4">
                <h4 class="font-medium kalam text-xl ">Description :</h4>
                <p class="open text-xl mt-2"> {{ $article->content }} </p>
                </div>
                @auth
                  @if (Auth::user()->is_admin)
                  <div class="flex mt-4">
                    <a href="{{ route('articles.edit', $article) }}"><i class="fa-solid fa-pen-to-square text-2xl mr-2 hover text_pink"></i></a>         
                    <form method="POST" action="{{ route('articles.destroy', $article) }}" >
                      @csrf
                      @method("DELETE")
                      <button onclick="popUp( message= 'L\'article a bien été supprimer !')"><i class="fa-regular fa-trash-can text-2xl text-red-600 hover"></i></button>
                    </form>
                  </div>  
                  @endif
                @endauth
            </div>
          </section>
          <section class="flex justify-evenly mt-10">
            <div>
              <div>
                <p class="text-2xl font-medium kalam">Prix :</p>
                <p class="text-2xl mt-2 open">{{ $article->price }} €</p>
              </div>
              <div >
                @auth
                <form action="{{ route('carts.store', $article) }}" method="post" class="flex flex-col">
                  @csrf
                  <label for="quantity_cart" class="mt-2 text-xl kalam">Nombres d'Articles</label>
                  <input type="number" id="quantity_cart" name="quantity_cart" class="rounded-lg mt-2 w-16 open" value="1">
                  <button onclick="popUp(message='Votre article a bien été ajouté à votre panier !')" class="mt-4 border border-solid rounded-lg bg_black text_white p-2 kalam text-xl hover">Ajouter</button>
                </form>
                @endauth
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="h-8"></div>
  </div>
  
  <!-- Ajoutez un bouton pour ajouter l'article au panier -->

    
</x-app-layout>