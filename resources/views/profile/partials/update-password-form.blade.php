<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 kalam">
            {{ __('Mise à jour du mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 open">
            {{ __('Veillez à ce que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Mot de passe actuel')" class="kalam" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full open" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 open" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Nouveau mot de passe')" class="kalam" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full open" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 open" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="kalam"/>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full open" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 open" />
        </div>

        <div class="flex items-center gap-4">
            <button onclick="popUp(message='Votre mot de passe a bien été modifier !')" class="mt-4 border border-solid rounded-lg bg-black text-white px-3 py-1 kalam text-lg hover">Modifier</button>


            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
