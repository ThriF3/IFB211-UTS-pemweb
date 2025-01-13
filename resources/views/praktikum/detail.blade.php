<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row items-center justify-between">

            <div class="flex flex-row gap-4 items-center">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <a href="{{ route('praktikum') }}">
                        {{ __('Data Praktikum') }}
                    </a>
                </h2>
                <h4 class="text-slate-400">> Detail</h4>

            </div>

            <div class="flex flex-row gap-4">

                <a 
                @if (Auth::user()->role == 'mahasiswa')
                href="{{ route('dashboard') }}"    
                @else
                href="{{ route('praktikum') }}"
                @endif
                >

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

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r to-sky-400 from-blue-500 overflow-hidden shadow-sm p-4 sm:rounded-lg text-white hover:translate-x-2 hover:shadow-2xl transition-all duration-500">
                <h2 class="text-2xl font-bold py-4 px-2">Praktikum <span class="text-sm p-2 bg-sky-400 text-white rounded-lg">{{ $praktikum['id_praktikum'] }}</span></h2>
                <div class="grid grid-cols-4">

                    <div class="col-span-1 flex flex-col gap-1 border-r-2 border-slate-100 px-3">
                        <h4>Nama Mata Kuliah</h4>
                        <h4>{{ $praktikum->has_matkul['nama'] }} <span class="text-sm px-2 bg-teal-400 text-white rounded-lg">{{ $praktikum->has_matkul['id_matkul'] }}</span></h4>
                    </div>

                    <div class="col-span-1 flex flex-col gap-1 border-r-2 border-slate-100 px-3">
                        <h4>Kelas</h4>
                        <h4>{{ $praktikum['kelas'] }}</h4>
                    </div>

                    <div class="col-span-1 flex flex-col gap-1 border-r-2 border-slate-100 px-3">
                        <h4>Jadwal</h4>
                        <h4>
                            @if (isset($praktikum->has_jadwal['hari']))
                            {{ $praktikum->has_jadwal['hari'] }}, {{ $praktikum->has_jadwal['waktu'] }}
                            @else
                            Belum ada jadwal
                            @endif
                        </h4>
                    </div>

                    <div class="col-span-1 flex flex-col gap-1 px-3">
                        <h4>Total SKS</h4>
                        <h4>{{ $praktikum->has_matkul['sks'] }}</h4>
                    </div>

                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="flex flex-row gap-4 justify-between w-svh mx-4">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200  ">
                    <li class="me-2">
                        <a
                            href="{{ url('praktikum/detail/' . $praktikum['id_praktikum'] . '/post') }}"
                            aria-current="page"
                            @if (request()->Is('praktikum/detail/' . $praktikum['id_praktikum'] . '/post'))
                            class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600  "
                            @elseif (request()->Is('praktikum/detail/' . $praktikum['id_praktikum']))
                            class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600  "
                            @else
                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  "
                            @endif
                            >Post</a>
                    </li>
                    <li class="me-2">
                        <a
                            href="{{ url('praktikum/detail/' . $praktikum['id_praktikum'] . '/peserta') }}"
                            @if (request()->Is('praktikum/detail/' . $praktikum['id_praktikum'] . '/peserta'))
                            class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600  "
                            @else
                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  "
                            @endif
                            >Mahasiswa</a>
                    </li>
                    <li class="me-2">
                        <a
                            href="{{ url('praktikum/detail/' . $praktikum['id_praktikum'] . '/nilai') }}"
                            @if (request()->Is('praktikum/detail/' . $praktikum['id_praktikum'] . '/nilai'))
                            class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600  "
                            @else
                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  "
                            @endif
                            >Nilai</a>
                    </li>
                </ul>
            </div>

            {!! $view !!}


        </div>
    </div>
</x-app-layout>