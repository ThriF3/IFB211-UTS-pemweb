<x-app-layout>
    <form method="POST" action="{{ route('asisten.update', $asisten['NRP']) }}">
        @method('PUT')
        @csrf
        <x-slot name="header">
            <div class="flex flex-row items-center justify-between">

                <div class="flex flex-row gap-4 items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('mahasiswa') }}">
                            {{ __('Data Mahasiswa') }}
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
                            <x-input-label for="NRP" :value="__('NRP')" />
                            <x-text-input disabled id="NRP" class="mt-1 w-full disabled:bg-neutral-300" type="text" name="NRP" :value="$asisten->NRP" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('NRP')" class="mt-2" />
                        </div>

                        <div class="col-span-2 disabled">
                            <x-input-label for="id_praktikum" :value="__('Kode Praktikum')" />
                            <select disabled name="id_praktikum" class="border-gray-300 disabled:bg-neutral-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                <option value="{{ $asisten['id_praktikum'] }}">{{ $asisten['id_praktikum'] }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
                        </div>

                        <div class="col-span-4">
                            <x-input-label for="nama" :value="__('Nama Mahasiswa')" />
                            <x-text-input id="nama" class="mt-1 w-full" type="text" name="nama" :value="$asisten->nama" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="col-span-3">
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-text-input id="jurusan" class="mt-1 w-full" type="text" name="jurusan" :value="$asisten->jurusan" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                        </div>

                        <div class="col-span-1">
                            <x-input-label for="semester" :value="__('Semester')" />
                            <x-text-input id="semester" class="mt-1 w-full" type="text" name="semester" :value="$asisten->semester" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('semester')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="angkatan" :value="__('Angkatan')" />
                            <x-text-input id="angkatan" class="mt-1 w-full" type="text" name="angkatan" :value="$asisten->angkatan" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="total_sks" :value="__('Total SKS')" />
                            <x-text-input id="total_sks" class="mt-1 w-full" type="text" name="total_sks" :value="$asisten->total_sks" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('total_sks')" class="mt-2" />
                        </div>

                        <div class="col-span-3">
                            <x-input-label for="no_telp" :value="__('Nomor Telepon')" />
                            <x-text-input id="no_telp" class="mt-1 w-full" type="text" name="no_telp" :value="$asisten->no_telp" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                        </div>

                        <o class="col-span-1">
                            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                            <select name="gender" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                @if ($asisten->gender == 'P')
                                <option value="P" selected>Pria</option>
                                <option value="W">Wanita</option>
                                @elseif ($asisten->gender == 'w')
                                <option value="P">Pria</option>
                                <option value="W" selected>Wanita</option>
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="col-span-4">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-textarea-input id="alamat" class="mt-1 w-full" name="alamat">
                                {{ $asisten->alamat }}
                            </x-textarea-input>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div class="col-span-4 flex flex-row justify-end">

                            <a href="{{ route('asisten') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
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