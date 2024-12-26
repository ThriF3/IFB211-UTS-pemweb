<div class="flex flex-col gap-2 bg-white overflow-hidden shadow-sm p-4 rounded-lg text-slate-700" id="section">

    <div class="flex w-full justify-between items-center">
        <div class="flex items-center ml-4">
            <svg class="w-6 h-6 text-sky-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z" clip-rule="evenodd" />
            </svg>

            <h2 class="text-2xl font-bold py-2 px-2">Posting</span></h2>
        </div>
        <hr class="border border-blue-100 w-full mx-2">
        <a href="{{ route('praktikum.peserta.create') }}" class="border hover:border-blue-400 p-1 rounded-lg transition-all duration-300">

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <div class="flex flex-row gap-2 items-center">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('Post') }}
                </div>
            </button>

        </a>
    </div>

    <div class="flex flex-row items-center gap-2 border border-gray-200 rounded-lg rounded-l-full pr-4 w-full hover:shadow-md hover:border-sky-400 transition-all overflow-hidden justify-between">

        <div class="flex items-center h-full">

            <div class="bg-sky-400 h-full py-2 items-center flex">
                <div class="rounded-full bg-sky-400 text-white h-fit p-2 ml-2">
                    <svg class="w-[24px] h-[24px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="flex flex-col ml-2">
                <div class="flex">
                    <h4 class="text-xs px-2 text-gray-400">Materi |</h4>
                    <svg class="w-[16px] h-[16px] text-blue-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M6 5V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v2H3V7a2 2 0 0 1 2-2h1ZM3 19v-8h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm5-6a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2H8Z" clip-rule="evenodd" />
                    </svg>



                    <h4 class="text-xs px-2 text-blue-400">16 Desember 2024</h4>
                </div>
                <h2 class="text-lg font-bold px-2">Javascript Dasar</h2>
            </div>

        </div>


        <div class="flex flex-row gap-4 items-center">

            <button class="bg-white text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white px-2 py-1 rounded-lg transition-all">
                Download PDF
            </button>

            <input id="helper-radio" aria-describedby="helper-radio-text" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

        </div>

    </div>

    <div class="flex flex-row items-center gap-2 border border-gray-200 rounded-lg rounded-l-full pr-4 w-full hover:shadow-md hover:border-sky-400 transition-all overflow-hidden justify-between">

        <div class="flex items-center h-full">

            <div class="bg-sky-400 h-full py-2 items-center flex">
                <div class="rounded-full bg-sky-400 text-white h-fit p-2 ml-2">

                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd" />
                    </svg>

                </div>
            </div>
            <div class="flex flex-col ml-2">
                <div class="flex">
                    <h4 class="text-xs px-2 text-gray-400">Penugasan |</h4>
                    <svg class="w-[16px] h-[16px] text-blue-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                    </svg>


                    <h4 class="text-xs px-2 text-blue-400">23 Desember - 5 Januari 2024</h4>
                </div>
                <h2 class="text-lg font-bold px-2">Laravel Dasar</h2>
            </div>

        </div>

        <div class="flex flex-row gap-4 items-center">

            <button class="bg-white text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white px-2 py-1 rounded-lg transition-all">
                Detail Tugas
            </button>

            <input id="helper-radio" aria-describedby="helper-radio-text" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

        </div>


    </div>

</div>