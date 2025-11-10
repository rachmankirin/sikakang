<x-app-layout>
    <h1 class="text-second font-semibold text-xl mb-10">Hasil Studi</h1>
    <div class="flex justify-center gap-2 md:gap-5">
        <div class="w-1/3 bg-primary rounded-xl">
            <div class="flex p-2 h-20">
                <div class="icon lg:h-10 lg:w-10 h-7 w-10 flex justify-center items-center rounded-lg me-3 bg-second">
                    <img src="{{ asset('images/Vector (2).svg') }}" alt="">
                </div>
                <h1 class="mt-2 font-semibold text-slate-500 text-sm md:text-md">Total SKS Kurikulum</h1>
            </div>

            <div class="p-5">
                <h1 class="text-3xl font-bold text-slate-700">172</h1>
                <h5 class="text-sm text-slate-500">total SKS dalam kurikulum</h5>
            </div>
        </div>
        <div class="w-1/3 bg-primary rounded-xl">
            <div class="flex p-2 h-20">
                <div class="icon h-10 w-10 flex justify-center items-center rounded-lg me-3 bg-second">
                    <img src="{{ asset('images/Vector (3).svg') }}" alt="">
                </div>
                <h1 class="mt-2 font-semibold text-slate-500 text-sm md:text-md">Total SKS Ditempuh</h1>
            </div>

            <div class="p-5">
                <h1 class="text-3xl font-bold text-slate-700">40</h1>
                <h5 class="text-sm text-slate-500">SKS yang telah selesai</h5>
            </div>
        </div>
        <div class="w-1/3 bg-primary rounded-xl">
            <div class="flex p-2 h-20">
                <div class="icon h-10 w-10 flex justify-center items-center rounded-lg me-3 bg-second">
                    <img src="{{ asset('images/Vector (4).svg') }}" alt="">
                </div>
                <h1 class="mt-2 font-semibold text-slate-500 text-sm md:text-md">Jatah SKS Semeseter ini</h1>
            </div>

            <div class="p-5">
                <h1 class="text-3xl font-bold text-slate-700">24</h1>
                <h5 class="text-sm text-slate-500">Maksimal SKS yang dapat ditempuh</h5>
            </div>
        </div>
    </div>
    <div class="notif mt-5">
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg flex items-start gap-2">
            <span class="text-yellow-500 text-lg">⚠️</span>
            <p class="text-sm font-medium">
                Saat ini bukan periode pengisian KRS. Periode pengisian KRS telah berlangsung pada
                <span class="font-semibold">28 Juli 2025 pukul 00.00</span> hingga
                <span class="font-semibold">15 September 2025 pukul 23.00</span>.
            </p>
        </div>

    </div>
    <div class="border-2 border-second rounded-lg mt-5">
        <header class="flex justify-between p-2 bg-primary">
            <div class="lg:text-lg text-md font-semibold text-slate-600">
                <h2>Kartu Hasil Studi - NAMA</h2>
                <h2>3337240077</h2>
            </div>
            <div class="flex gap-4 font-semibold text-md">

                <button class="flex items-center bg-second rounded-lg px-2 py-2">

                    <img src="{{ asset('images/Vector (3).svg') }}" alt="" class="me-2">
                    <span>
                        Cetak KRS
                    </span>
                </button>
            </div>
        </header>


        <div class="mt-10">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-slate-700 dark:text-gray-400">
                    <thead class="text-xs text-slate-700 uppercase bg-second ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kode Jadwal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Mata Kuliah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dosen
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Mutu
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-primary text-slate-700">
                            <th scope="row" class="px-6 py-4 font-medium text-slate-700">
                                1
                            </th>
                            <td class="px-6 py-4">
                                (INF622201)
                            </td>
                            <td class="px-6 py-4">
                                Pemrograman Web <br>
                                <span class="py-1 px-3 bg-second rounded-lg font-semibold text-slate-700 pd-2">3
                                    SKS</span>
                            </td>
                            <td class="px-6 py-4">
                                Yulian Ansore
                            </td>
                            <td class="px-6 py-4">
                                90
                            </td>
                            <td class="px-6 py-4">
                                A
                            </td>
                        </tr>
                        <tr class="bg-primary text-slate-700">
                            <th scope="row" class="px-6 py-4 font-medium text-slate-700">
                                2
                            </th>
                            <td class="px-6 py-4">
                                (INF622201)
                            </td>
                            <td class="px-6 py-4">
                                Pemrograman Web <br>
                                <span class="py-1 px-3 bg-second rounded-lg font-semibold text-slate-700 pd-2">3
                                    SKS</span>
                            </td>
                            <td class="px-6 py-4">
                                Yulian Ansore
                            </td>
                            <td class="px-6 py-4">
                                90
                            </td>
                            <td class="px-6 py-4">
                                A
                            </td>
                        </tr>
                        <tr class="bg-primary text-slate-700">
                            <th scope="row" class="px-6 py-4 font-medium text-slate-700">
                                3
                            </th>
                            <td class="px-6 py-4">
                                (INF622201)
                            </td>
                            <td class="px-6 py-4">
                                Pemrograman Web <br>
                                <span class="py-1 px-3 bg-second rounded-lg font-semibold text-slate-700 pd-2">3
                                    SKS</span>
                            </td>
                            <td class="px-6 py-4">
                                Yulian Ansore
                            </td>
                            <td class="px-6 py-4">
                                90
                            </td>
                            <td class="px-6 py-4">
                                A
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
