<x-app-layout>
    <form method="POST" action="{{ route('ruang.store')}}">
        @csrf
        <x-slot name="header">
            <div class="flex flex-row items-center justify-between">

                <div class="flex flex-row gap-4 items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('ruang') }}">
                            {{ __('Data Ruang') }}
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
                            <x-input-label for="id_ruang" :value="__('Kode Ruang')" />
                            <x-text-input id="id_ruang" class="mt-1 w-full" type="text" name="id_ruang" :value="old('id_ruang')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('id_ruang')" class="mt-2" />
                        </div>

                        <div class="col-span-3">
                            <x-input-label for="lokasi" :value="__('Lokasi')" />
                            <x-text-input id="lokasi" class="mt-1 w-full" type="text" name="lokasi" :value="old('lokasi')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="tipe" :value="__('Tipe Ruang')" />
                            <select name="tipe" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                <option value="lab">Labotarium</option>
                                <option value="kelas">Kelas</option>
                            </select>
                            <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="kapasitas" :value="__('Kapasitas')" />
                            <x-text-input id="kapasitas" class="mt-1 w-full" type="text" name="kapasitas" :value="old('kapasitas')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('kapasitas')" class="mt-2" />
                        </div>

                        <div class="col-span-4 flex flex-row justify-end">

                            <a href="{{ route('ruang') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
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