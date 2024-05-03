<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Login Address -->
        <div class="mt-4">
            <x-input-label for="loginname" :value="__('Felhasználónév')" />

            <x-text-input id="loginname" class="block mt-1 w-full" style="padding: 10px; border: 1px solid rgba(0, 0, 0, 0.2)" type="loginname" name="loginname" :value="old('loginname')" required />
            
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Jelszó')" />

            <x-text-input id="password" class="block mt-1 w-full" style="padding: 10px; border: 1px solid rgba(0, 0, 0, 0.2)" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Emlékezz rám') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Elfelejtett jelszó?') }}
            </a>
            @endif

            <x-primary-button class="ms-3" style="background: #0266b2">
                {{ __('Bejelentkezés') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>