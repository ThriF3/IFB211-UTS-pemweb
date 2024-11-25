<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row items-center justify-between">

            <div class="flex flex-row gap-4 items-center">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <a href="{{ route('praktikum') }}">
                        {{ __('Data Praktikum') }}
                    </a>
                </h2>
                <h4 class="text-slate-400">> Detail Data</h4>

            </div>

            <div class="flex flex-row gap-4">

                <a href="{{ route('praktikum') }}">

                    <x-secondary-button>
                        <div class="flex flex-row gap-2 items-center">
                            {{ __('Kembali') }}
                        </div>
                    </x-secondary-button>

                </a>

            </div>


        </div>

    </x-slot>

    <div class="py-12">

        <!-- Ruang Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg text-slate-700">
                <h2 class="text-2xl font-bold py-4 px-2">Praktikum <span class="text-sm p-2 bg-sky-400 text-white rounded-lg">{{ $praktikum['id_praktikum'] }}</span></h2>
                <div class="grid grid-cols-4">

                    <div class="col-span-1 flex flex-col gap-1 border-r-2 border-slate-200 px-2">
                        <h4>Nama Mata Kuliah</h4>
                        <h4 class="text-black">{{ $praktikum->has_matkul['nama'] }} <span class="text-sm px-2 bg-teal-400 text-white rounded-lg">{{ $praktikum->has_matkul['id_matkul'] }}</span></h4>
                    </div>

                    <div class="col-span-1 flex flex-col gap-1 border-r-2 border-slate-200 px-2">
                        <h4>Kelas</h4>
                        <h4 class="text-black">{{ $praktikum['kelas'] }}</h4>
                    </div>

                    <div class="col-span-1 flex flex-col gap-1 border-r-2 border-slate-200 px-2">
                        <h4>Jadwal</h4>
                        <h4 class="text-black">{{ $praktikum->has_jadwal['hari'] }}, {{ $praktikum->has_jadwal['waktu'] }}</h4>
                    </div>

                    <div class="col-span-1 flex flex-col gap-1 border-r-2 border-slate-200 px-2">
                        <h4>Total SKS</h4>
                        <h4 class="text-black">{{ $praktikum->has_matkul['sks'] }}</h4>
                    </div>

                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">

            <div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg text-slate-700">

                <div class="flex flex-row justify-between items-center px-4">

                    <h2 class="text-2xl font-bold py-4 px-2">Data Peserta</span></h2>

                    <a href="{{ route('praktikum.peserta.create') }}">

                        <x-primary-button>
                            <div class="flex flex-row gap-2 items-center">
                                <i class="fa-solid fa-plus"></i>
                                {{ __('Tambah Peserta') }}
                            </div>
                        </x-primary-button>

                    </a>

                </div>

                <table class="w-full overflow-hidden rounded-lg">
                    <thead class="bg-slate-100">
                        <tr class="text-slate-600">
                            <th class="py-4">Kode Peserta</th>
                            <th class="py-4">NRP</th>
                            <th class="py-4">Nama Mahasiswa</th>
                            <!-- Add other columns as needed -->
                            <th class="py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($praktikum->has_peserta as $data)
                        <tr class="border-b-2 border-slate-100 text-slate-800">
                            <td class="py-4">{{ $data['id_peserta'] }}</td>
                            <td class="py-4">{{ $data['NRP'] }}</td>
                            <td class="py-4">{{ $data->has_mahasiswa['nama'] }}</td>
                            <!-- Add other columns as needed -->
                            <td>
                                <div class="flex flex-row justify-center gap-4">

                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_peserta'] }}')">{{ __('Delete Data') }}</x-danger-button>
                                    <x-modal name="confirm-data-deletion-{{ $data['id_peserta'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form action="{{ route('praktikum.peserta.destroy', $data['id_peserta']) }}" method="POST" class="p-6">
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
                                                    {{ __('Delete Peserta') }}
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

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">

            <div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg text-slate-700">

                <div class="flex flex-row justify-between items-center px-4">

                    <h2 class="text-2xl font-bold py-4 px-2">Data Nilai</span></h2>

                    <a href="{{ route('praktikum.nilai.create', $praktikum['id_praktikum']) }}">

                        <x-primary-button>
                            <div class="flex flex-row gap-2 items-center">
                                <i class="fa-solid fa-plus"></i>
                                {{ __('Tambah Nilai') }}
                            </div>
                        </x-primary-button>

                    </a>

                </div>

                <table class="w-full overflow-hidden rounded-lg">
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
                        @foreach($nilai as $data)
                        <tr class="border-b-2 border-slate-100 text-slate-800">
                            <td class="py-4">{{ $data->has_mahasiswa['NRP'] }}</td>
                            <td class="py-4">{{ $data->has_mahasiswa['nama'] }}</td>
                            <td class="py-4">{{ $data['predikat'] }}</td>
                            <td class="py-4">{{ $data['nilai'] }}</td>

                            <!-- Add other columns as needed -->
                            <td>
                                <div class="flex flex-row justify-center gap-4">

                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_nilai'] }}')">{{ __('Delete Data') }}</x-danger-button>
                                    <x-modal name="confirm-data-deletion-{{ $data['id_nilai'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form action="{{ route('praktikum.nilai.destroy', $data['id_nilai']) }}" method="POST" class="p-6">
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

        </div>


    </div>
</x-app-layout>