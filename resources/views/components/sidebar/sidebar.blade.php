<!-- Sidebar Toggle Button (opens sidebar) -->
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-[#FFE05E] rounded-lg sm:hidden   ">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
    </svg>
</button>

<!-- SIDEBAR -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transform -translate-x-full sm:translate-x-0 transition-transform duration-300"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto bg-white border-2 border-[#FFE05E] relative">
        <div class="flex justify-between">
            <a href="" class="mt-2">
                <img src="{{ url('images/Vector.svg') }}" alt="" width="13">
            </a>
            <button data-drawer-hide="logo-sidebar" aria-controls="logo-sidebar" type="button"
                class="absolute top-3 right-3 inline-flex items-center p-2 text-[#FFE05E] rounded-lg  sm:hidden">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
                </svg>
            </button>

        </div>
        <!-- Close button (inside sidebar, top right) -->

        <a href="#" class="flex items-center justify-center ps-2.5 mb-5 mx-auto mt-2">
            <img src="{{ url('images/untirta.png') }}" class="h-10 me-3" alt="Flowbite Logo" />
            <span class="self-center font-bold text-xl  whitespace-nowrap text-[#FFE05E]">Sikakang</span>
        </a>

        <p class="text-center text-[#FFE05E] my-5 font-semibold text-lg">Main Menu</p>

        @php
            $role = optional(auth()->user())->role;
            $isAdmin = $role === 'admin';
            $isDosen = $role === 'dosen';
        @endphp

        @if($isAdmin)
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/dashboard-admin"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dashboard-admin') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Dashboard Admin</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard-admin/dosen"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dashboard-admin/dosen*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Kelola Dosen</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard-admin/mahasiswa"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dashboard-admin/mahasiswa*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Kelola Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard-admin/prodi"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dashboard-admin/prodi*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Kelola Prodi</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard-admin/fakultas"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dashboard-admin/fakultas*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Kelola Fakultas</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard-admin/mk"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dashboard-admin/mk*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Kelola Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.surat.index') }}"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::routeIs('admin.surat.*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Frame.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Verifikasi Surat</span>
                    </a>
                </li>

                <hr class="text-slate-500 mt-5 mb-5">
                <li class="flex items-center p-2">
                    <img src="{{ url('images/logout.svg') }}" alt="" srcset="">
                    <form method="POST" action="{{ route('logout') }}" class="w-full js-logout-form">
                        @csrf
                        <button type="submit" class="ms-7 text-slate-500 text-left hover:text-red-500 w-full">Sign-Out</button>
                    </form>
                </li>
            </ul>

        @elseif($isDosen)
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/dosen/dashboard"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dosen/dashboard') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Dashboard Dosen</span>
                    </a>
                </li>
                <li>
                    <a href="/dosen"
                       class="flex items-center w-full p-2 rounded-lg {{ Request::is('dosen') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        <img src="{{ url('images/profile.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Profile</span>
                    </a>
                </li>
                <hr class="text-slate-500 mt-5 mb-5">
                <li class="flex items-center p-2">
                    <img src="{{ url('images/logout.svg') }}" alt="" srcset="">
                    <form method="POST" action="{{ route('logout') }}" class="w-full js-logout-form">
                        @csrf
                        <button type="submit" class="ms-7 text-slate-500 text-left hover:text-red-500 w-full">Sign-Out</button>
                    </form>
                </li>
            </ul>

        @else

        @php
            $perkuliahanOpen =
                Request::is('dashboard*') ||
                Request::is('krs*') ||
                Request::is('hasil*') ||
                Request::is('jadwal*') ||
                Request::is('registration*') ||
                Request::is('tagihan*');
            
            $pengajuanSuratOpen =
                Request::routeIs('surat.*');
        @endphp

        <ul class="space-y-2 font-medium" x-data="{ openMenu: {{ $perkuliahanOpen ? 1 : ($pengajuanSuratOpen ? 3 : 0) }} }">

                <!-- Dashboard -->
                <li class="text-slate-500">
                    <button @click="openMenu === 1 ? openMenu = null : openMenu = 1"
                        class="flex items-center w-full p-2  rounded-lg hover:text-[#FFE05E] transition">
                        <img src="{{ url('images/Group.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Perkuliahan</span>
                        <svg class="w-4 h-4 transition" :class="{ 'rotate-180': openMenu === 1 }" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="openMenu === 1" x-collapse class="pl-14 space-y-1 text-sm mt-1">
                        <li><a href="/dashboard"
                                class="block py-1 hover:text-[#FFE05E] {{ Request::is('dashboard') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">Dashboard</a>
                        </li>
                        <li><a href="/krs"
                                class="block py-1 hover:text-[#FFE05E] {{ Request::is('krs') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">Rencana
                                Studi</a></li>
                        <li><a href="/jadwal"
                                class="block py-1 hover:text-[#FFE05E] {{ Request::is('jadwal*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">Jadwal
                                Kuliah</a></li>
                        <li><a href="/hasil"
                                class="block py-1 hover:text-[#FFE05E] {{ Request::is('hasil') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">Hasil
                                Studi</a></li>
                        <li class="hidden"><a href="#"
                                class="block py-1 hover:text-[#FFE05E] {{ Request::is('tugasAkhir') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">Tugas
                                Akhir</a></li>
                        <li><a href="/registration/detail"
                                class="block py-1 hover:text-[#FFE05E] {{ Request::is('registration*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">Registrasi</a>
                        </li>
                        <li><a href="{{ route('tagihan.tagihan_mahasiswa') }}"
                                class="block py-1 {{ Request::routeIs('tagihan.*') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">Tagihan</a>
                        </li>
                    </ul>
                </li>

                <!-- Tugas -->
                <li class="text-slate-500 hidden">
                    <button @click="openMenu === 2 ? openMenu = null : openMenu = 2"
                        class="flex items-center w-full p-2  rounded-lg hover:text-[#FFE05E] transition">
                        <img src="{{ url('images/tugas.svg') }}" alt="" width="20">
                        <span class="ms-7 flex-1 text-left">Tugas</span>
                        <svg class="w-4 h-4 transition" :class="{ 'rotate-180': openMenu === 2 }" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="openMenu === 2" x-collapse class="pl-14 space-y-1 text-sm mt-1">
                        <li><a href="/mycourse" class="block py-1 hover:text-[#FFE05E] {{ Request::is('mycourse*') || Request::is('incourse*') ? 'text-[#FFE05E] font-semibold' : '' }}">Tugas Kuliah</a></li>
                    </ul>
                </li>

                <!-- Pengajuan Surat -->
                <li class="text-slate-500">
                    <button @click="openMenu === 3 ? openMenu = null : openMenu = 3"
                        class="flex items-center w-full p-2  rounded-lg hover:text-[#FFE05E] transition">
                        <img src="{{ url('images/Frame.svg') }}" alt="">
                        <span class="ms-7 flex-1 text-left">Pengajuan Surat</span>
                        <svg class="w-4 h-4 transition" :class="{ 'rotate-180': openMenu === 3 }" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="openMenu === 3" x-collapse class="pl-14 space-y-1 text-sm mt-1">
                        <li><a href="{{ route('surat.create') }}" class="block py-1 hover:text-[#FFE05E] {{ Request::routeIs('surat.create') ? 'text-[#FFE05E] font-semibold' : '' }}">Buat Surat</a></li>
                        <li><a href="{{ route('surat.riwayat') }}" class="block py-1 hover:text-[#FFE05E] {{ Request::routeIs('surat.riwayat') || Request::routeIs('surat.show') ? 'text-[#FFE05E] font-semibold' : '' }}">Riwayat Surat</a></li>
                    </ul>
                </li>

                <hr class="text-slate-500 mt-5 mb-5">
                <li class="flex items-center p-2">
                    <img src="{{ url('images/profile.svg') }}" alt="" srcset="">
                    <a href="/profile/mahasiswa"
                        class="ms-7 text-slate-500 text-left {{ Request::is('profile/mahasiswa') ? 'text-[#FFE05E] font-semibold' : 'hover:text-[#FFE05E]' }}">
                        Profile
                    </a>
                </li>
                <li class="flex items-center p-2">
                    <img src="{{ url('images/logout.svg') }}" alt="" srcset="">
                    <form method="POST" action="{{ route('logout') }}" class="w-full js-logout-form">
                        @csrf
                        <button type="submit" class="ms-7 text-slate-500 text-left hover:text-red-500 w-full">Sign-Out</button>
                    </form>
                </li>

            </ul>
        @endif

    </div>
</aside>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.js-logout-form').forEach((form) => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: 'Keluar dari sesi?',
                    text: 'Anda akan diarahkan ke halaman login.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, keluar',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
