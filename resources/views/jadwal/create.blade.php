<x-app-layout>
    <form method="POST" action="{{ route('jadwal.store')}}">
        @csrf
        <x-slot name="header">
            <div class="flex flex-row items-center justify-between">

                <div class="flex flex-row gap-4 items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('jadwal') }}">
                            {{ __('Data jadwal') }}
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

                        <div class="col-span-2">
                            <x-input-label for="id_jadwal" :value="__('Id Jadwal')" />
                            <x-text-input id="id_jadwal" class="mt-1 w-full" type="text" name="id_jadwal" :value="old('id_jadwal')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('id_jadwal')" class="mt-2" />
                        </div>

                        <div class="col-span-1">
                            <x-input-label for="hari" :value="__('Hari')" />
                            <select name="hari" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                            <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                        </div>

                        <div class="col-span-1">
                            <x-input-label for="waktu" :value="__('Waktu')" />
                            <x-text-input id="waktu" class="mt-1 w-full" type="time" name="waktu" :value="old('waktu')" required autofocus autocomplete="name" step="1" />
                            <x-input-error :messages="$errors->get('waktu')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="id_praktikum" :value="__('Kode Praktikum')" />
                            <select name="id_praktikum" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                @foreach ($praktikum as $data)
                                <option value="{{ $data['id_praktikum'] }}">{{ $data['id_praktikum'] }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="id_ruang" :value="__('Kode Ruang')" />
                            <select name="id_ruang" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                @foreach ($ruang as $data)
                                <option value="{{ $data['id_ruang'] }}">{{ $data['id_ruang'] }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_ruang')" class="mt-2" />
                        </div>

                        <div class="col-span-4 flex flex-row justify-end">

                            <a href="{{ route(name: 'jadwal') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
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