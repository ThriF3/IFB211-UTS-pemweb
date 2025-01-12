<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Mahasiswa') }}
            </h2>

            <!-- Add New mahasiswa Button -->
            <form method="get" action="{{ route('asisten.create') }}">
                <x-primary-button href="{{ route('asisten.create') }}">
                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-plus"></i>
                        {{ __('Tambah') }}
                    </div>
                </x-primary-button>
            </form>

        </div>

    </x-slot>

    <div class="py-12">

        <!-- Asisten Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg">
                <table class="w-full overflow-hidden rounded-lg">
                    <thead class="bg-slate-100">
                        <tr class="text-slate-600">
                            <th class="py-4 bg-sky-400 text-white">NRP</th>
                            <th class="py-4">Nama</th>
                            <th class="py-4">Gender</th>
                            <th class="py-4">Jurusan</th>
                            <th class="py-4">Angkatan</th>
                            <th class="py-4">Semester</th>
                            <th class="py-4">Total SKS</th>
                            <th class="py-4">Alamat</th>
                            <!-- Add other columns as needed -->
                            <th class="py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($asisten as $data)
                        <tr class="border-b-2 border-slate-100 text-slate-800">
                            <td class="py-4 bg-sky-100">{{ $data['NRP'] }}</td>
                            <td class="py-4">{{ $data['nama'] }}</td>
                            <td class="py-4">
                                @if ($data['gender'] == 'P')
                                <div class="bg-sky-400 rounded-full text-white font-bold">
                                    Pria
                                </div>
                                @else
                                <div class="bg-pink-400 rounded-full text-white font-bold">
                                    Wanita
                                </div>
                                @endif
                            </td>
                            <td class="py-4">{{ $data['jurusan'] }}</td>
                            <td class="py-4">{{ $data['angkatan'] }}</td>
                            <td class="py-4">{{ $data['semester'] }}</td>
                            <td class="py-4">{{ $data['total_sks'] }}</td>
                            <td class="py-4">{{ substr($data['alamat'],0,20).'...' }}</td>
                            <!-- Add other columns as needed -->
                            <td>
                                <div class="flex flex-row justify-center gap-4">

                                    <a href="{{ route('mahasiswa.edit', $data['NRP']) }}">
                                        <x-secondary-button>
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                    </a>

                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['NRP'] }}')">{{ __('Delete Data') }}</x-danger-button>
                                    <x-modal name="confirm-data-deletion-{{ $data['NRP'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form action="{{ route('mahasiswa.destroy', $data['NRP']) }}" method="POST" class="p-6">
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
                                                    {{ __('Delete Mahasiswa') }}
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