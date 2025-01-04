<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <h1 class="text-3xl font-bold">Praktik <span class="text-3xl font-bold bg-sky-400 rounded-lg p-1 text-white">U</span></h1>
            </a>
        </div>

        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200  ">
            <li class="me-2">
                <a
                    href="{{ url('register') }}"
                    aria-current="page"
                    @if (request()->Is('register'))
                    class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600 "
                    @else
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 "
                    @endif
                    >Admin</a>
            </li>
            <li class="me-2">
                <a
                    href="{{ url('register/asisten') }}"
                    @if (request()->Is('register/asisten'))
                    class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600 "
                    @else
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 "
                    @endif
                    >Asisten</a>
            </li>
            <li class="me-2">
                <a
                    href="{{ url('register/asisten') }}"
                    @if (request()->Is('register/asisten'))
                    class="inline-block p-4 text-blue-600 bg-gray-200 rounded-t-lg active border-b-2 border-blue-600 "
                    @else
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 "
                    @endif
                    >Mahasiswa</a>
            </li>
        </ul>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>