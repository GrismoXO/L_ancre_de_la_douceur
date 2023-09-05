<x-app-layout>
    @section('title', 'Profil')
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight kalam">
            {{ __('Adresse') }}
        </h2>
    </x-slot>
    <div class="py-8 bg_pink_opa">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg p-8">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 kalam">
                        {{ __('Informations complémentaires') }}
                    </h2>
                <form action="{{ route('addresses.store') }}" method="post" class="mt-6 space-y-6">
                    @csrf
            
                    <div class=" max-w-xl flex flex-col">
                        <span class="kalam">N°/Rue</span>
                        <input type="text" id="street" name="street" class="rounded-lg open" >
                    </div>
                    <div class=" max-w-xl flex flex-col">
                        <span class="kalam">Ville</span>
                        <input type="text" id="city" name="city" class="rounded-lg open">
                    </div>
                    <div class=" max-w-xl flex flex-col">
                        <span class="kalam">Code postal</span>
                        <input type="text" id="postal_code" name="postal_code" class="rounded-lg open">
                    </div>
                    <div class=" max-w-xl flex flex-col">
                        <span class="kalam">Pays</span>
                        <input type="text" id="country" name="country" class="rounded-lg open">
                    </div>
                    <div class="flex items-center gap-4">
                        <button onclick="popUp(message='Vos coordonnées ont bien été modifiées !')" class="mt-4 border border-solid rounded-lg bg_black text_white px-3 py-1 kalam text-lg hover">Modifier</button>

                    </div>
            
                </form>

            </div>
        </div>
    </div>
</x-app-layout>