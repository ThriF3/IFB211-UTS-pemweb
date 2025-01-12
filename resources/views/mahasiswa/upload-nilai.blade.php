<x-app-layout>
    <form method="POST" action="{{ route('praktikum.nilai.store')}}" enctype="multipart/form-data">
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

                        <div class="col-span-2 hidden">
                            <x-input-label for="id_praktikum" :value="__('Kode Praktikum')" />
                            <select name="id_praktikum" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                <option value="{{ $postingan['id_praktikum'] }}"
                                    selected>{{ $postingan['id_praktikum'] }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
                        </div>

                        <div class="col-span-2 hidden">
                            <x-input-label for="id_post" :value="__('Posting')" />
                            <select name="id_post" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                <option value="{{ $postingan['id_post'] }}">{{$postingan['judul']}}</option>
                            </select>
                            <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
                        </div>

                        <div class="col-span-2 hidden">
                            <x-input-label for="NRP" :value="__('Nama')" />
                            <select name="NRP" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                @foreach ($mhsw as $data)
                                @if ($data['NRP'] == $nrp)
                                <option value="{{ $data['NRP'] }}">{{ $data['nama'] }}</option>
                                @endif
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('NRP')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="nilai" :value="__('Nilai')" />
                            <x-text-input id="nilai" class="mt-1 w-full" type="number" name="nilai" :value="old('nilai')" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('nilai')" class="mt-2" />
                        </div>

                        <div class="col-span-4">
                            <x-input-label for="file_content" :value="__('Upload File')" />
                            <input
                                class="mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="file_content" id="file_content" type="file" accept=".pdf">
                            <x-input-error :messages="$errors->get('file_content')" class="mt-2" />
                        </div>

                        <div class="col-span-4 flex flex-row justify-end">

                            <a href="{{ route('praktikum.show', [$postingan->id_praktikum, 'nilai']) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Kembali
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Save Data') }}
                            </x-primary-button>

                        </div>

                    </div>
                    @if ($errors->any())
                    <div class="bg-red text-red-400">
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