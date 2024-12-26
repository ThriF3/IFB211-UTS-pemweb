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