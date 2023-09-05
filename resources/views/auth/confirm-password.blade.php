<x-guest-layout>
    @section('title', 'Confirmer votre mot de passe')
    <div class="mb-4 text-sm ">
        {{ __('Il s\'agit d\'une zone sécurisée de l\'application. Veuillez confirmer votre mot de passe avant de continuer.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="kalam"/>

            <x-text-input id="password" class="block mt-1 w-full open"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 open" />
        </div>

        <div class="flex justify-end mt-4 hover">
            <x-primary-button>
                {{ __('Confirmer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
