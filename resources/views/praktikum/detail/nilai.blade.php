<div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg text-slate-700">

    {{-- Header --}}
    <div class="flex w-full justify-between items-center">
        <div class="flex items-center ml-4">
            <i class="fa-solid fa-file-pen text-sky-400"></i>

            <h2 class="text-2xl font-bold py-2 px-2">Nilai</span></h2>
        </div>
        <hr class="border border-blue-100 w-full mx-2">
        <a href="{{ route('praktikum.nilai.create', $praktikum['id_praktikum']) }}"
            class="border hover:border-blue-400 p-1 rounded-lg transition-all duration-300">

            <button
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="flex flex-row gap-2 items-center">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('Tambah') }}
                </div>
            </button>

        </a>
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
            @foreach($nilai as $data)
            <tr class="border-b-2 border-slate-100 text-slate-800">
                <td>{{ $data->has_mahasiswa['NRP'] }}</td>
                <td>{{ $data->has_mahasiswa['nama'] }}</td>
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
                        <a href="{{ route('praktikum.nilai.edit', $data->id_nilai) }}">
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