<x-guest-layout>
    @section('title', 'Mot de passe oublié')
    <div class="mb-4 text-sm">
        {{ __('Vous avez oublié votre mot de passe ? Pas de problème. Indiquez-nous votre adresse électronique et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d\'en choisir un nouveau.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="kalam"/>
            <x-text-input id="email" class="block mt-1 w-full open" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 open" />
        </div>

        <div class="flex items-center justify-end mt-4 hover">
            <x-primary-button>
                {{ __('Réinitialisation du mot de passe') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
