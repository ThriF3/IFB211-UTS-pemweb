<x-app-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('postingan.update', $postingan['id_post']) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-slot name="header">
            <div class="flex flex-row items-center justify-between">

                <div class="flex flex-row gap-4 items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('praktikum') }}">
                            {{ __('Data Posting') }}
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

                        <x-text-input id="id_praktikum" class="mt-1 w-full" type="hidden" name="id_praktikum"
                            :value="$postingan['id_praktikum']" required autofocus autocomplete="name" />

                        <div class="col-span-4">
                            <x-input-label for="judul" :value="__('Judul')" />
                            <x-text-input id="judul" class="mt-1 w-full" type="text" name="judul"
                                :value="$postingan['judul']" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                        </div>

                        <div class="col-span-4">
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <x-textarea-input id="description" class="mt-1 w-full"
                                name="description">{{ $postingan['description'] }}</x-textarea-input>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="tipe" :value="__('Tipe')" />
                            <select name="tipe"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                @if ($postingan['tipe'] == 'modul')
                                <option value="modul" selected>Modul</option>
                                <option value="penugasan">Penugasan</option>
                                @else
                                <option value="modul">Modul</option>
                                <option value="penugasan" selected>Penugasan</option>
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                        </div>

                        <div class="col-span-1">
                            <x-input-label for="startDate" :value="__('Tanggal Posting')" />
                            <x-text-input id="startDate" class="mt-1 w-full" type="date" name="startDate"
                                :value="Carbon::parse($postingan['startDate'])->format('Y-m-d')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('startDate')" class="mt-2" />
                        </div>

                        <div class="col-span-1">
                            <x-input-label for="endDate" :value="__('Deadline')" />
                            <x-text-input id="endDate" class="mt-1 w-full" type="date" name="endDate"
                                :value="Carbon::parse($postingan['endDate'])->format('Y-m-d')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('endDate')" class="mt-2" />
                        </div>

                        <div class="col-span-4">
                            <x-input-label for="file_content" :value="__('Upload File')" />
                            <input
                                class="mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="file_content" id="file_content" type="file" accept=".pdf">
                            <x-input-error :messages="$errors->get('file_content')" class="mt-2" />
                        </div>


                        <div class="col-span-4 flex flex-row justify-end">

                            <a href="{{ url('praktikum/detail/' . $postingan['id_praktikum'] . '/post') }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
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