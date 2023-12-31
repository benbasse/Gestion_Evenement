@if (session()->has('success'))
<div class="alert alert-dismissible alert-primary">
    <strong>
        {{ session()->get('success') }}
    </strong>
</div>
@endif
<x-guest-layout>
    {{-- <form method="POST" action="{{ route('inscription') }}" enctype="multipart/form-data"> --}}
        <form method="POST" action="#" enctype="multipart/form-data">

        @csrf
        Ici c'est le formulaire de login des clients
        <!-- Nom -->
        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>
        <!-- Prenom -->

        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="number" name="telephone" :value="old('telephone')" required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="mot_de_passe" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="mot_de_passe"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('mot_de_passe')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Welcom') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
