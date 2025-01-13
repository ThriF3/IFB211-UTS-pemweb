<x-app-layout>
    <div class="flex flex-row items-center justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 shadow">

        <div class="flex flex-row gap-4 items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a 
                href="{{ route('praktikum.show', ['praktikum' => $postingan['id_praktikum'], 'section' => 'post']) }}"
                >
                    {{ __('Data Praktikum') }}
                </a>
            </h2>
            <h4 class="text-slate-400">> Detai Postingan</h4>

        </div>

        <div class="flex flex-row gap-4">

            <a
                href="{{ route('praktikum.show', ['praktikum' => $postingan['id_praktikum'], 'section' => 'post']) }}"
                >

                <x-secondary-button>
                    <div class="flex flex-row gap-2 items-center">
                        {{ __('Kembali') }}
                    </div>
                </x-secondary-button>

            </a>

        </div>


    </div>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0 ">

            <div class="mt-6 sm:mt-8 lg:flex lg:gap-8 justify-center">
                <div
                    class="w-full divide-gray-200 overflow-hidden rounded-lg border border-gray-200 dark:divide-gray-700 dark:border-gray-700 lg:max-w-xl xl:max-w-2xl">

                    <div class="flex bg-blue-500 justify-between items-center">
                        <h2 class="text-xl font-semibold sm:text-2xl bg-blue-500 text-white px-6 py-3">{{$postingan->judul}}</h2>
                        <h4 class="text-xs pr-4 text-white">
                            @if (count($nilai) > 0)
                            @if (is_null($nilai[0]->nilai))
                            Belum Dinilai
                            @else
                            {{$nilai[0]->nilai}}/100
                            @endif
                            @else
                            - /100
                            @endif
                        </h4>
                    </div>
                    <div class=" ">

                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400"><span
                                    class="font-medium text-gray-900 dark:text-white"></p>

                            <div class="flex items-center justify-end gap-4">
                                <p class="text-base font-normal text-gray-900 dark:text-white"></p>

                                <p class="text-xl font-bold leading-tight text-gray-900 dark:text-white"></p>
                            </div>
                        </div>
                    </div>

                    <div class="relative p-4 bg-white rounded-lg  dark:bg-gray-800 md:p-8">
                        <div class="flex">

                            @if ($postingan['tipe'] == 'modul')
                            <h4 class="text-xs pr-2 text-gray-400">Materi |</h4>
                            <svg class="w-[16px] h-[16px] text-blue-400 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 5V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v2H3V7a2 2 0 0 1 2-2h1ZM3 19v-8h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm5-6a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2H8Z"
                                    clip-rule="evenodd" />
                            </svg>
                            @else
                            <h4 class="text-xs pr-2 text-gray-400">Penugasan |</h4>
                            <svg class="w-[16px] h-[16px] text-blue-400 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                    clip-rule="evenodd" />
                            </svg>
                            @endif

                            @if ($postingan['tipe'] == 'modul')
                            <h4 class="text-xs pr-2 text-blue-400">
                                {{ (new DateTime($postingan['startDate']))->format('d F Y') }}
                            </h4>
                            @else
                            <h4 class="text-xs pr-2 text-blue-400">
                                {{ (new DateTime($postingan['startDate']))->format('d F Y') }} -
                                {{ (new DateTime($postingan['endDate']))->format('d F Y') }}
                            </h4>
                            @endif

                        </div>
                        <div class="b-4 text-sm font-light text-gray-500 dark:text-gray-400">
                            <div class="flex justify-between">

                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Deskripsi</h3>
                                <a href="{{ route('postingan.download', $postingan->id_post) }}"
                                    class="inline-flex gap-2 items-center px-4 py-2 bg-white border-blue-600 border rounded-md font-semibold text-xs text-blue-700 hover:text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                    <i class="fa-solid fa-download"></i>
                                    <span>Download PDF</span>
                                </a>

                            </div>
                            {{ $postingan->description }}
                        </div>
                        <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                            <a href="#"
                                class="font-medium text-primary-600 dark:text-primary-500 hover:underline"></a>
                            <div class="items-center space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                                <button id="close-modal" type="button"
                                    class="py-2 px-4 w-full text-sm font-medium text-gray-500 border-gray-200 sm:w-auto hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"></button>
                                <button id="confirm-button" type="button"
                                    class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-auto hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"></button>
                            </div>
                            <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                                <a href="#"
                                    class="font-medium text-primary-600 dark:text-primary-500 hover:underline"></a>
                                <div class="items-center space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                                    <button id="close-modal" type="button"
                                        class="py-2 px-4 w-full text-sm font-medium text-gray-500 border-gray-200 sm:w-auto hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"></button>
                                    <button id="confirm-button" type="button"
                                        class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-auto hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6  sm:mt-8 lg:mt-0">
                    <form
                        method="POST"
                        @if (count($nilai)> 0)
                        action="{{ route('praktikum.nilai.update', $nilai[0]->id_nilai) }}"
                        @else
                        action="{{ route('praktikum.nilai.store')}}"
                        @endif
                        enctype="multipart/form-data">
                        @if (count($nilai) > 0)
                        @method('PUT')
                        @endif
                        @csrf

                        <div
                            class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex justify-between">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tugas</h3>
                                @if (count($nilai) > 0)
                                <h3 class="text-s font-semibold text-blue-400 dark:text-white">Sudah Disubmit</h3>
                                @else
                                <h3 class="text-s font-semibold text-gray-400 dark:text-white">Belum Disubmit</h3>
                                @endif
                            </div>

                            <ol class="relative mt-4 dark:border-gray-700">
                                <li class="mb-4 ">
                                    <div class="grid grid-cols-4 gap-4">

                                        <div class="col-span-2 hidden">
                                            <x-input-label for="id_praktikum" :value="__('Kode Praktikum')" />
                                            <select name="id_praktikum" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                                <option value="{{ $postingan['id_praktikum'] }}"
                                                    selected>{{ $postingan['id_praktikum'] }}</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
                                        </div>

                                        <div class="col-span-2 hidden">
                                            <x-input-label for="id_post" :value="__('Posting')" />
                                            <select name="id_post" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                                <option value="{{ $postingan['id_post'] }}">{{$postingan['judul']}}</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('id_praktikum')" class="mt-2" />
                                        </div>

                                        <div class="col-span-2 hidden">
                                            <x-input-label for="NRP" :value="__('Nama')" />
                                            <select name="NRP" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                                <option value="{{ $user->has_mahasiswa->NRP }}">{{ $user->has_mahasiswa->NRP }}</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('NRP')" class="mt-2" />
                                        </div>

                                        <div class="col-span-2 hidden">
                                            <x-input-label for="nilai" :value="__('Nilai')" />
                                            <x-text-input id="nilai" class="mt-1 w-full" type="number" name="nilai" :value="old('nilai')" autofocus autocomplete="name" />
                                            <x-input-error :messages="$errors->get('nilai')" class="mt-2" />
                                        </div>

                                        <div class="col-span-4">
                                            <x-input-label for="file_content" :value="__('Upload File')" />
                                            <input
                                                class="mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                                name="file_content" id="file_content" type="file" accept=".pdf">
                                            <x-input-error :messages="$errors->get('file_content')" class="mt-2" />
                                        </div>

                                    </div>
                                    @if ($errors->any())
                                    <div class="bg-red text-red-400">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </li>

                                <li class="mb-4">
                                    <h3 class="text-xs  text-gray-400 dark:text-white">
                                        @if (count($nilai) > 0)
                                        Waktu Pengumpulan: {{ Carbon::parse($nilai[0]->updated_at)->format('d F Y, H:i:s') }}
                                        @endif
                                    </h3>
                                    <button type="submit"
                                        class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                        <span
                                            class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            @if (count($nilai) > 0)
                                            Kirim Ulang
                                            @else
                                            Kirim
                                            @endif
                                        </span>
                                    </button>
                                </li>


                                <a href="#"
                                    class="mt-4 flex w-full items-center justify-center rounded-lg bg-primary-700  px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300  dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0">Order
                                    details</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
</x-app-layout>