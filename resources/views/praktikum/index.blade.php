<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Praktikum') }}
            </h2>

            <div class="flex flex-row gap-4">

                <a href="{{ route('praktikum.create') }}">

                    <x-primary-button>
                        <div class="flex flex-row gap-2 items-center">
                            <i class="fa-solid fa-plus"></i>
                            {{ __('Tambah') }}
                        </div>
                    </x-primary-button>

                </a>

            </div>


        </div>

    </x-slot>

    <div class="py-12">

        <!-- Ruang Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg">
                <table class="w-full overflow-hidden rounded-lg table-fixed">
                    <thead class="bg-slate-100">
                        <tr class="text-slate-600">
                            <th class="py-4 w-2/12 text-center bg-sky-400 text-white">Kode Praktikum</th>
                            <th class="py-4 w-6/12 text-left pl-4">Nama Matkul</th>
                            <th class="py-4 w-1/12 text-left">Kelas</th>
                            <th class="py-4 w-1/12 text-left">Jam</th>
                            <!-- Add other columns as needed -->
                            <th class="py-4 w-2/12 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($praktikum as $data)
                        @if (Auth::user()->role == 'asisten')
                            @if ($asisten->id_user == Auth::user()->id)
                                @if ($asisten->id_praktikum == $data->id_praktikum)
                                <tr class="border-b-2 border-slate-100 text-slate-800">
                                    <td class="text-center bg-sky-100">{{ $data['id_praktikum'] }}</td>
                                    <td class="text-left pl-4">{{ $data->has_matkul->nama }}</td>
                                    <td class="text-left">{{ $data['kelas'] }}</td>
                                    <td class="text-left">
                                        @if (isset($data->has_jadwal))
                                        {{ $data->has_jadwal['waktu'] }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <!-- Add other columns as needed -->
                                    <td class="text-left">
                                        <div class="flex flex-row justify-start">

                                            <a href="{{ route('praktikum.show', ['praktikum' => $data['id_praktikum'], 'section' => 'post']) }}">
                                                <x-edit-button class="bg-sky-400 hover:bg-sky-300 border-r-0 rounded-r-none w-full">
                                                    Detail
                                                </x-edit-button>
                                            </a>

                                            <a href="{{ route('praktikum.edit', $data['id_praktikum']) }}">
                                                <x-secondary-button class="border-x-0 rounded-none h-full">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </x-secondary-button>
                                            </a>

                                            <x-danger-button
                                                x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_praktikum'] }}')"
                                                class="border-l-0 rounded-l-none"><i class="fa-solid fa-trash"></i></x-danger-button>
                                            <x-modal name="confirm-data-deletion-{{ $data['id_praktikum'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                                <form action="{{ route('praktikum.destroy', $data['id_praktikum']) }}" method="POST" class="p-6">
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
                                @endif
                            @endif
                        @else
                        <tr class="border-b-2 border-slate-100 text-slate-800">
                            <td class="text-center bg-sky-100">{{ $data['id_praktikum'] }}</td>
                            <td class="text-left pl-4">{{ $data->has_matkul->nama }}</td>
                            <td class="text-left">{{ $data['kelas'] }}</td>
                            <td class="text-left">
                                @if (isset($data->has_jadwal))
                                {{ $data->has_jadwal['waktu'] }}
                                @else
                                -
                                @endif
                            </td>
                            <!-- Add other columns as needed -->
                            <td class="text-left">
                                <div class="flex flex-row justify-start">

                                    <a href="{{ route('praktikum.show', ['praktikum' => $data['id_praktikum'], 'section' => 'post']) }}">
                                        <x-edit-button class="bg-sky-400 hover:bg-sky-300 border-r-0 rounded-r-none w-full">
                                            Detail
                                        </x-edit-button>
                                    </a>

                                    <a href="{{ route('praktikum.edit', $data['id_praktikum']) }}">
                                        <x-secondary-button class="border-x-0 rounded-none h-full">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </x-secondary-button>
                                    </a>

                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_praktikum'] }}')"
                                        class="border-l-0 rounded-l-none"><i class="fa-solid fa-trash"></i></x-danger-button>
                                    <x-modal name="confirm-data-deletion-{{ $data['id_praktikum'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form action="{{ route('praktikum.destroy', $data['id_praktikum']) }}" method="POST" class="p-6">
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
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($errors->has('error'))
            <x-modal name="error-modal" :show="$errors->has('error')" focusable>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Error</h2>
                    <p class="mt-4 text-sm text-gray-600">{{ $errors->first('error') }}</p>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            Close
                        </x-secondary-button>
                    </div>
                </div>
            </x-modal>
            @endif
        </div>
    </div>
</x-app-layout>