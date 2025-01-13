<div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg text-slate-700" id="section">

    {{-- Header --}}
    <div class="flex w-full justify-between items-center">
        <div class="flex items-center ml-4">
            <i class="fa-solid fa-user-group text-sky-400"></i>

            <h2 class="text-2xl font-bold py-2 px-2">Mahasiswa</span></h2>
        </div>
        <hr class="border border-blue-100 w-full mx-2">
        @if (Auth::user()->role == 'mahasiswa')
        @else
        <a href="{{ route('praktikum.peserta.create') }}"
            class="border hover:border-blue-400 p-1 rounded-lg transition-all duration-300">

            <button
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="flex flex-row gap-2 items-center">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('Tambah') }}
                </div>
            </button>

        </a>
        @endif
    </div>

    <table class="w-full overflow-hidden rounded-lg">
        <thead class="bg-blue-100">
            <tr class="text-slate-600">
                <th class="py-4">Kode Peserta</th>
                <th class="py-4">NRP</th>
                <th class="py-4">Nama Mahasiswa</th>
                <!-- Add other columns as needed -->
                 @if (Auth::user()->role == 'mahasiswa')
                 @else    
                 <th class="py-4">Aksi</th>
                 @endif
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($praktikum->has_peserta as $data)
            <tr class="border-b-2 border-slate-100 text-slate-800">
                <td class="py-4">{{ $data['id_peserta'] }}</td>
                <td class="py-4">{{ $data['NRP'] }}</td>
                <td class="py-4">{{ $data->has_mahasiswa['nama'] }}</td>
                <!-- Add other columns as needed -->
                 @if (Auth::user()->role == 'mahasiswa')
                 @else    
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
                 @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>