<div class="flex flex-col gap-2 bg-white overflow-hidden shadow-sm p-4 rounded-lg text-slate-700" id="section">
    {{-- Header --}}
    <div class="flex w-full justify-between items-center">
        <div class="flex items-center ml-4">
            <svg class="w-6 h-6 text-sky-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z"
                    clip-rule="evenodd" />
            </svg>

            <h2 class="text-2xl font-bold py-2 px-2">Posting</span></h2>
        </div>
        <hr class="border border-blue-100 w-full mx-2">
        @if (Auth::user()->role == 'mahasiswa')
        @else
        <a href="{{ route('postingan.create', $praktikum['id_praktikum']) }}"
            class="border hover:border-blue-400 p-1 rounded-lg transition-all duration-300">

            <button
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="flex flex-row gap-2 items-center">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('Post') }}
                </div>
            </button>

        </a>
        @endif
    </div>

    {{-- Content --}}
    @foreach ($posting as $data)
    <div>

        <div class="flex flex-row items-center gap-2 border border-gray-200 rounded-lg rounded-l-full pr-4 w-full hover:shadow-md hover:border-sky-400 transition-all overflow-hidden justify-between cursor-pointer"
            onclick="toggleAccordion('accordion-{{ $data['id_post'] }}')">

            <div class="flex items-center h-full">

                <div class="bg-sky-400 h-full py-2 items-center flex">
                    <div class="rounded-full bg-sky-400 text-white h-fit p-2 ml-2">
                        @if ($data['tipe'] == 'modul')
                        <svg class="w-[24px] h-[24px] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                clip-rule="evenodd" />
                        </svg>
                        @else
                        <svg class="w-6 h-6 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                clip-rule="evenodd" />
                        </svg>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col ml-2">
                    <div class="flex">
                        @if ($data['tipe'] == 'modul')
                        <h4 class="text-xs px-2 text-gray-400">Materi |</h4>
                        <svg class="w-[16px] h-[16px] text-blue-400 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M6 5V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v2H3V7a2 2 0 0 1 2-2h1ZM3 19v-8h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm5-6a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2H8Z"
                                clip-rule="evenodd" />
                        </svg>
                        @else
                        <h4 class="text-xs px-2 text-gray-400">Penugasan |</h4>
                        <svg class="w-[16px] h-[16px] text-blue-400 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                clip-rule="evenodd" />
                        </svg>
                        @endif

                        @if ($data['tipe'] == 'modul')
                        <h4 class="text-xs px-2 text-blue-400">
                            {{ (new DateTime($data['startDate']))->format('d F Y') }}
                        </h4>
                        @else
                        <h4 class="text-xs px-2 text-blue-400">
                            {{ (new DateTime($data['startDate']))->format('d F Y') }} -
                            {{ (new DateTime($data['endDate']))->format('d F Y') }}
                        </h4>
                        @endif
                    </div>
                    <h2 class="text-lg font-bold px-2">{{ $data['judul'] }}</h2>
                </div>

            </div>


            <div class="flex flex-row gap-4 items-center">
                <i class="fa-solid fa-chevron-up" id="icon-accordion-{{ $data['id_post'] }}"></i>
            </div>

        </div>

        {{-- Post Detail Content --}}
        <div class="mx-12 px-4 py-2 bg-gray-50 border-b-2 transition-all" id="accordion-{{ $data['id_post'] }}">
            <div class="flex gap-2 m-2">

                <div class="w-full bg-white border border-gray-300 rounded-md px-4 py-2">

                    <div class="grid grid-cols-3 mb-2">

                        <div class="flex flex-col justify-center">
                            <h4 class="font-bold text-xl">Deskripsi</h4>
                        </div>
                        <div class="flex justify-end gap-2 col-span-2 items-center">
                            @if (Auth::user()->role == 'mahasiswa')
                            <h4 class="font-bold text-s text-blue-500">
                                @foreach ($nilai as $nilai_data)
                                    @if ($data->id_post == $nilai_data->id_post)
                                        @if ($nilai_data->NRP == Auth::user()->has_mahasiswa->NRP)    
                                            @if (is_null($nilai_data->nilai))
                                            Belum dinilai
                                            @break
                                            @else
                                            {{$nilai_data->nilai}}/100
                                            @break
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </h4>
                            @endif
                            <a href="{{ route('postingan.download', $data->id_post) }}"
                                class="inline-flex gap-2 items-center px-4 py-2 bg-white border-blue-600 border rounded-md font-semibold text-xs text-blue-700 hover:text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                <i class="fa-solid fa-download"></i>
                                <span>Download</span>
                            </a>

                            @if (Auth::user()->role == 'mahasiswa')
                            <a href="{{ route('mahasiswa.detail_kelas', $data->id_post) }}">
                                <x-secondary-button>
                                    Detail
                                </x-secondary-button>
                            </a>
                            @else
                            <a href="{{ route('postingan.edit', $data->id_post) }}">
                                <x-secondary-button>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </x-secondary-button>
                            </a>
                            @endif

                            @if (Auth::user()->role == 'mahasiswa')
                            @else
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_post'] }}')">
                                <i class="fa-solid fa-trash"></i></x-danger-button>
                            @endif
                            <x-modal name="confirm-data-deletion-{{ $data['id_post'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form action="{{ route('postingan.destroy', $data['id_post']) }}" method="POST"
                                    class="p-6">
                                    @csrf
                                    @method('DELETE')

                                    <h2 class="text-lg font-medium text-gray-900">
                                        {{ __('Apakah anda yakin ingin menghapus post ini?') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ __('Setelah data ini dihapus, data tersebut akan dihapus secara permanen.') }}
                                    </p>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('Delete Post') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                        </div>

                    </div>
                    <p class="text-gray-500">{{ $data['description'] }}</p>

                </div>

            </div>

        </div>

    </div>
    @endforeach

</div>

<script>
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById(`icon-${id}`);

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180'); // Rotate icon
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180'); // Reset icon
        }
    }
</script>