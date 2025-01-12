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
    <form method="POST" action="{{ route('postingan.update', [$postingan['id_post']]) }}" enctype="multipart/form-data">
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
                    <h4 class="text-slate-400">> Edit Data</h4>
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
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4 mx-24">

        {{-- Header --}}
        <div class="flex w-full justify-between items-center">
            <div class="flex items-center ml-4">
                <i class="fa-solid fa-file-pen text-sky-400"></i>

                <h2 class="text-2xl font-bold py-2 px-2">Nilai</span></h2>
            </div>
            <hr class="border border-blue-100 w-full mx-2">
        </div>

        <table class="w-full overflow-hidden rounded-lg table-fixed">
            <thead class="bg-slate-100">
                <tr class="text-slate-600">
                    <th class="py-4">NRP</th>
                    <th class="py-4">Nama Mahasiswa</th>
                    <th class="py-4">Predikat</th>
                    <th class="py-4">Nilai</th>
                    <!-- Add other columns as needed -->
                    <th class="py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($postingan->has_nilai as $data)
                <tr class="border-b-2 border-slate-100 text-slate-800">
                    <td>{{ $data['NRP'] }}</td>
                    <td>
                        @foreach ($praktikum_peserta as $peserta)
                        @if ($peserta['NRP'] == $data['NRP'])
                        {{ $peserta->has_mahasiswa['nama'] }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @if (isset($data['nilai']))
                        {{ $data['predikat'] }}
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if (isset($data['nilai']))
                        {{ $data['nilai'] }}
                        @else
                        -
                        @endif
                    </td>

                    <!-- Add other columns as needed -->
                    <td>
                        <div class="flex flex-row justify-end">
                            <a href="{{ route('praktikum.nilai.download', $data->id_nilai) }}"
                                class="inline-flex gap-2 items-center px-4 py-2 bg-white border-blue-600 border rounded-md rounded-r-none font-semibold text-xs text-blue-700 hover:text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-white active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                <i class="fa-solid fa-download"></i>
                            </a>
                            <a href="{{ route('praktikum.nilai.edit', [$data->id_nilai]) }}">
                                <x-secondary-button class="border-x-0 rounded-none h-full">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </x-secondary-button>
                            </a>

                            <x-danger-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_nilai'] }}')"
                                class="border-l-0 rounded-l-none">
                                <i class="fa-solid fa-trash"></i>
                            </x-danger-button>
                            <x-modal name="confirm-data-deletion-{{ $data->id_nilai }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form action="{{ route('praktikum.nilai.destroy', $data->id_nilai) }}" method="POST" class="p-6">
                                    @csrf
                                    @method('DELETE')

                                    <h2 class="text-lg font-medium text-gray-900">
                                        {{ __('Are you sure you want to delete this data?') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ __('Once your data is deleted, it will be permanently deleted.') }}
                                    </p>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('Delete Nilai') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>