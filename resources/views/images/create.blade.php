<x-guest-layout>
    @section('title', 'Ajout d\'image')
    <x-slot name="create">
        <div class="flex justify-center items-center h-screen">
          <div class="rounded-lg  border-solid border shadow-xl w-3/5 my-4 z-10">
            <div class="bg_white rounded-lg ">
                <div class="flex justify-between p-4">
                    <h2 class="font-semibold text-3xl leading-tight kalam">
                        {{ __('Ajouter une image') }}
                    </h2>
                    <div class="flex justify-end">
                        <a href="{{ route('dashboard')}}">
                            <button class="kalam text-2xl font-bold pr-4 pt-4 hover">X</button>
                        </a>
                        </div>
                </div>
                <div class="my-5">
                    @foreach ($errors->all() as $error)
                    <span class="open">{{$error}}</span> {{-- Affiche un message d'erreur si les champs requis du formulaire ne sont pas remplis --}}
                    @endforeach
                </div>
    
            <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col px-4 pb-4 w-full " > 
            
                @csrf
                
                <div class="flex justify-between mb-4 flex_col_800">
                    <label for="image" class="flex items-center pl-1 kalam">Image du produit :</label>
                    <input id="image" type="file" name="image" class="rounded-lg kalam text-sm mt_800 hover">
                </div>
                <div class="h-28 mb-4">
                    <textarea id="alt" name="alt" class="rounded-lg w-full h-full open" placeholder="Description du produit... "></textarea>
                </div>
                <div class="flex justify-end">                   
                <button onclick="popUp(message='L\'image a bien été ajouté dans le carrousel !')" class="border rounded-lg p-2 kalam bg_pink text-white hover">Enregistrer</button>
                </div>
            </form>
    
        </div>
    </div>
    </div>
  </x-slot>
  </x-guest-layout>
  