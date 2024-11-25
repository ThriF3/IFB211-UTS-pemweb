<x-app-layout>
    <form method="POST" action="{{ route('nilai.store')}}">
        @csrf
        <x-slot name="header">
            <div class="flex flex-row items-center justify-between">

                <div class="flex flex-row gap-4 items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('nilai') }}">
                            {{ __('Data nilai') }}
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
                            <x-input-label for="NRP" :value="__('Nama')" />
                            <select name="NRP" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                @foreach ($mhsw as $data)
                                <option value="{{ $data['NRP'] }}">{{ $data['nama'] }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
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
                            <x-input-label for="nilai" :value="__('Nilai')" />
                            <x-text-input id="nilai" class="mt-1 w-full" type="number" name="nilai" :value="old('nilai')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('nilai')" class="mt-2" />
                        </div>

                        <div class="col-span-4 flex flex-row justify-end">

                            <a href="{{ route(name: 'nilai') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
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