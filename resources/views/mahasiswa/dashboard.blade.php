<x-app-layout>
  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Praktikum</title>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard Mahasiswa') }}
      </h2>
    </x-slot>
  </head>

  <body>
    <div class="p-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 ">

        @foreach ($praktikum as $data)
        @foreach ($data->has_peserta as $peserta)
        @if ($peserta->NRP == $user->has_mahasiswa->NRP)
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
          <svg class="w-7 h-7 text-gray-700 dark:text-gray-700 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
          </svg>
          <a href="{{ route('praktikum.show', ['praktikum' => $data['id_praktikum'], 'section' => 'post']) }}">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-slate-950">{{ $data->id_praktikum }} {{ $data->has_matkul->nama }}</h5>
          </a>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-700">
            @if (isset($data->has_jadwal))
            Ruangan : {{ $data->has_jadwal->id_ruang }}
            @else
            Ruangan : -
            @endif
          </p>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-700">
            @if (isset($data->has_jadwal))
            Waktu : {{ $data->has_jadwal->waktu }}
            @else
            Waktu : -
            @endif
          </p>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-700">
            @if (isset($data->has_asisten[0]))
            Asisten :
            @foreach ($data->has_asisten as $asisten)
            {{ $asisten->nama }}
            @endforeach
            @else
            Asisten : -
            @endif
          </p>
          <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
            Masuk
            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
              /svg>
          </a>
        </div>
        @else
        @endif
        @endforeach
        @endforeach

      </div>
    </div>
  </body>

  </html>
</x-app-layout>