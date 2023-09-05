<x-app-layout >
  @section('title', 'Boutique')
  <x-tailwind/>
  <div class="h-4 bg_pink_opa"></div>
  <div class="w-full pt-4 pb-8 nav_barre bg_pink_opa">
    <form action="{{ route('search') }}" method="GET" class="w-full flex justify-center">
      <input type="text" name="query" placeholder="Rechercher votre article..." class="w-2/5 open nav_barre rounded-l-lg ">
      <button type="submit" class="border-solid border-2 p-2 rounded-r-lg nav"><i class="fa fa-search fa-2x"></i></button>
    </form>
  </div>
  <div class="h-8 bg_pink_opa shadow-lg relative"></div>
  <div class="h-8 bg-white"></div>
  <div><h1 class="kalam text-4xl bg-white flex justify-center">Nos Produits :</h1></div>
  <div class="h-8 bg-white"></div>
  <div class="w-full flex justify-center bg-white">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8  w-4/5 ">
    @foreach ($articles as $article)
      <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white hover">
        <a href="{{ route('articles.show', $article) }}"></a>
        <div class="relative flex justify-center "><a href="{{ route('articles.show', $article) }}" class="">
          <img class="p-2   object-countain object-center rounded-lg h-60 " src="{{ asset('storage/'.$article->image)}}" alt="{{$article->alt}}">
        </div>
        <div class="px-6 py-4 mb-aut">
            <a href="{{ route('articles.show', $article) }}" class=" text-xl hover:text-indigo-600 transition duration-500 ease-in-out kalam font-bold mb-2 flex justify-center">{{ $article->title}}</a>
              <div class="open mt-1 flex justify-center">{{$article->content}}</div>   
              <div class="open text-lg mt-1 flex justify-center">{{$article->price}} €</div>
        </div>
      </div>
    @endforeach
  </div></div>
  <div class="h-8 bg-white"></div>
  </x-app-layout>