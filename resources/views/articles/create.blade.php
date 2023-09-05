<x-guest-layout>
    @section('title', 'Ajout d\'articles')
  <x-slot name="create">
        <div class="flex justify-center items-center h-screen h_100">

          <div class="rounded-lg  border-solid border shadow-xl w-3/5 my-4 z-10">
            <div class="bg_white rounded-lg ">
                <div class="flex justify-between p-4">
                    <h2 class="font-semibold text-3xl leading-tight kalam">
                        {{ __('Créer un article') }}
                    </h2>
                <a href="{{ route('dashboard')}}">
                    <p class="kalam text-2xl font-bold hover">X</p>
                </a>
                </div>
                <div class="my-5">
                    @foreach ($errors->all() as $error)
                    <span class="open">{{$error}}</span> {{-- Affiche un message d'erreur si les champs requis du formulaire ne sont pas remplis --}}
                    @endforeach
                </div>
    
            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col px-4 pb-4 w-full " > 
            
                @csrf
                <div class="flex justify-between mb-4 mt-4 flex_col_800 w_100">
                    <input id="title" name="title" class="rounded-lg w-2/5 w_100 open" placeholder="Nom du produit...">
                    <input type="number" id="price" name="price" class="rounded-lg w-2/5 open w_100 mt_800" placeholder="Prix...">
                </div>
                <div class="h-32 mb-4 ">
                    <textarea id="content" name="content" class="rounded-lg w-full h-full open" placeholder="Description du produit..."></textarea>
                </div>
                <div class="flex justify-between w-4/5 w_100 mb-4 flex_col_800">
                    <input type="number" id="quantity" name="quantity" class="rounded-lg w-2/5 open w_100" placeholder="Stock...">
                    <select name="category" id="category" class="rounded-lg w_40_800 mt_800">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-between mb-4 flex_col_800">
                    <label for="image" class="flex items-center pl-1 kalam">Image du produit :</label>
                    <input id="image" type="file" name="image" class="rounded-lg kalam text-sm mt_800 hover">
                </div>
                <div class="h-28 mb-4">
                    <textarea id="alt" name="alt" class="rounded-lg w-full h-full open" placeholder="Description de l'image... "></textarea>
                </div>
                <div class="flex justify-end">                   
                <button onclick="popUp(message='Votre article a bien été ajouté à la boutique')" class="border rounded-lg p-2 kalam bg_black text_white hover">Enregistrer</button>
                </div>
            </form>
    
        </div>
    </div>
    </div>
  </x-slot>
</x-guest-layout>
