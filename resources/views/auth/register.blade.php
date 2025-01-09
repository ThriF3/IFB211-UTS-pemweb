<x-guest-layout>
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200  ">
        <li class="me-2">
            <a
                href="{{ url('register') }}"
                aria-current="page"
                @if (request()->Is('register'))
                class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600 "
                @else
                class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 "
                @endif
                >Admin</a>
        </li>
        <li class="me-2">
            <a
                href="{{ url('register/asisten') }}"
                @if (request()->Is('register/asisten'))
                class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600 "
                @else
                class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 "
                @endif
                >Asisten</a>
        </li>
        <li class="me-2">
            <a
                href="{{ url('register/mahasiswa') }}"
                @if (request()->Is('register/mahasiswa'))
                class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600 "
                @else
                class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 "
                @endif
                >Mahasiswa</a>
        </li>
    </ul>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select name="role" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="admin">Admin</option>
                <option value="asisten">Asisten</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>