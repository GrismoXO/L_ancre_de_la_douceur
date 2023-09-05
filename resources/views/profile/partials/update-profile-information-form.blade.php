<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 kalam">
            {{ __('Information du profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 open">
            {{ __("Mettez à jour les informations de profil et l'adresse électronique de votre compte.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Prénom')" class="kalam" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full open" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 open" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Nom')" class="kalam"/>
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full open" :value="old('lastname', $user->lastname)" required autofocus autocomplete="lastname" />
            <x-input-error class="mt-2 open" :messages="$errors->get('lastname')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="kalam"/>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full open" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 open" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200 kalam">
                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse électronique..') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button onclick="popUp(message='Vos coordonnées ont bien été modifiées !')" class="mt-4 border border-solid rounded-lg bg-black text-white px-3 py-1 kalam text-lg hover">Modifier</button>


            @if (session('status') === 'profile-updated')
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
