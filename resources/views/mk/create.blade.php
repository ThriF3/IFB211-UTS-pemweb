<x-app-layout>
    <form method="POST" action="{{ route('mk.store')}}">
        @csrf
        <x-slot name="header">
            <div class="flex flex-row items-center justify-between">

                <div class="flex flex-row gap-4 items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('mk') }}">
                            {{ __('Data Mata Kuliah') }}
                        </a>
                    </h2>
                    <h4 class="text-slate-400">> Tambah Data</h4>
                </div>

            </div>


        </x-slot>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="grid grid-cols-4 gap-4">

                        <div class="col-span-1">
                            <x-input-label for="id_matkul" :value="__('Kode Mata Kuliah')" />
                            <x-text-input id="id_matkul" class="mt-1 w-full" type="text" name="id_matkul" :value="old('id_matkul')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('id_matkul')" class="mt-2" />
                        </div>

                        <div class="col-span-3">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="col-span-4">
                            <x-input-label for="fakultas" :value="__('Fakultas')" />
                            <x-text-input id="fakultas" class="mt-1 w-full" type="text" name="fakultas" :value="old('fakultas')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('fakultas')" class="mt-2" />
                        </div>

                        <div class="col-span-1">
                            <x-input-label for="semester" :value="__('Semester')" />
                            <x-text-input id="semester" class="mt-1 w-full" type="number" name="semester" :value="old('semester')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('semester')" class="mt-2" />
                        </div>

                        <div class="col-span-1">
                            <x-input-label for="sks" :value="__('Total SKS')" />
                            <x-text-input id="sks" class="mt-1 w-full" type="number" name="sks" :value="old('sks')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('sks')" class="mt-2" />
                        </div>

                        <div class="col-span-4 flex flex-row justify-end">

                            <a href="{{ route('mk') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Kembali
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Save Data') }}
                            </x-primary-button>

                        </div>

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
                </div>
            </div>
        </div>

    </form>
</x-app-layout>