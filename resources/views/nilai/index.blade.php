<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Nilai') }}
            </h2>

            <!-- Add New Ruang Button -->

        </div>

    </x-slot>

    <div class="py-12">

        <!-- Ruang Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg">
                <table class="w-full overflow-hidden rounded-lg">
                    <thead class="bg-slate-100">
                        <tr class="text-slate-600">
                            <th class="py-4 bg-sky-400 text-white">Kode Nilai</th>
                            <th class="py-4">Kode Praktikum</th>
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
                            <td class="py-4 bg-sky-100">{{ $data['id_nilai'] }}</td>
                            <td class="py-4">
                                {{ $data->has_praktikum['id_matkul'] }}
                            </td>
                            <td class="py-4">{{ $data['NRP'] }}</td>
                            <td class="py-4">{{ $data->has_mahasiswa['nama'] }}</td>
                            <td class="py-4">{{ $data['predikat'] }}</td>
                            <td class="py-4">{{ $data['nilai'] }}</td>
                            <!-- Add other columns as needed -->
                            <td>
                                <div class="flex flex-row justify-center gap-4">

                                    <a href="{{ route('nilai.edit', $data['id_nilai']) }}">
                                        <x-secondary-button>
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                    </a>

                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_nilai'] }}')">{{ __('Delete Data') }}</x-danger-button>
                                    <x-modal name="confirm-data-deletion-{{ $data['id_nilai'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form action="{{ route('nilai.destroy', $data['id_nilai']) }}" method="POST" class="p-6">
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
                                                    {{ __('Delete Data') }}
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