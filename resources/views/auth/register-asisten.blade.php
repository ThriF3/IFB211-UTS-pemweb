<x-guest-layout>
    <form method="POST" action="{{ route('register.asisten') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select name="role" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="admin">Admin</option>
                <option value="asisten" selected>Asisten</option>
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

        {{-- Header Asisten --}}
        <div class="flex w-full justify-between items-center mt-4">
            <div class="flex items-center ml-4">
                <i class="fa-solid fa-file-pen text-sky-400"></i>

                <h2 class="text-2xl font-bold py-2 px-2">Biodata</span></h2>
            </div>
            <hr class="border border-blue-100 w-full mx-2">
        </div>

        <div class="grid grid-cols-4 gap-4">

            <!-- Name -->
            <div class="col-span-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="col-span-1">
                <x-input-label for="NRP" :value="__('NRP')" />
                <x-text-input id="NRP" class="mt-1 w-full" type="text" name="NRP" :value="old('NRP')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('NRP')" class="mt-2" />
            </div>

            <div class="col-span-3">
                <x-input-label for="id_praktikum" :value="__('Kode Praktikum')" />
                <select name="id_praktikum" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                    @foreach ($praktikum as $data)
                    <option value="{{ $data['id_praktikum'] }}">{{ $data['id_praktikum'] }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
            </div>

            <div class="col-span-3">
                <x-input-label for="jurusan" :value="__('Jurusan')" />
                <x-text-input id="jurusan" class="mt-1 w-full" type="text" name="jurusan" :value="old('jurusan')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
            </div>

            <div class="col-span-1">
                <x-input-label for="semester" :value="__('Semester')" />
                <x-text-input id="semester" class="mt-1 w-full" type="text" name="semester" :value="old('semester')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('semester')" class="mt-2" />
            </div>

            <div class="col-span-2">
                <x-input-label for="angkatan" :value="__('Angkatan')" />
                <x-text-input id="angkatan" class="mt-1 w-full" type="text" name="angkatan" :value="old('angkatan')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
            </div>

            <div class="col-span-2">
                <x-input-label for="total_sks" :value="__('Total SKS')" />
                <x-text-input id="total_sks" class="mt-1 w-full" type="text" name="total_sks" :value="old('total_sks')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('total_sks')" class="mt-2" />
            </div>

            <div class="col-span-3">
                <x-input-label for="no_telp" :value="__('Nomor Telepon')" />
                <x-text-input id="no_telp" class="mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
            </div>

            <div class="col-span-1">
                <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                <select name="gender" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                    <option value="P">Pria</option>
                    <option value="W">Wanita</option>
                </select>
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="col-span-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-textarea-input id="alamat" class="mt-1 w-full" name="alamat" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            @if ($errors->any())
            <div class="bg-red text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4 col-span-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>