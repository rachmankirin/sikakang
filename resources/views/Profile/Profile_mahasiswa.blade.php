<x-app-layout>
    @section('title', 'Profile Mahasiswa')

    @php
        $active = $active ?? request()->get('tab', 'data');
    @endphp

    <div x-data="{
        underline: { left: 0, width: 0 },
        fading: false,
        moveTo(el) {
            if (!el) return;
            const base = this.$refs.tablist.getBoundingClientRect();
            const rect = el.getBoundingClientRect();
            this.underline = { left: rect.left - base.left, width: rect.width };
        },
        go(el) {
            this.moveTo(el);
            this.fading = true;
            setTimeout(() => window.location.href = el.href, 220);
        }
    }" x-init="$nextTick(() => {
        const active = document.querySelector('[data-tab={{ json_encode($active) }}]');
        moveTo(active);
    })" class="space-y-6">
        <!-- Header -->
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-yellow-100 via-white to-yellow-50 border border-yellow-100">
            <div class="absolute inset-0 opacity-30"
                 style="background: radial-gradient(circle at 20% 30%, rgba(255,224,94,0.4), transparent 35%), radial-gradient(circle at 80% 40%, rgba(255,224,94,0.25), transparent 30%), radial-gradient(circle at 50% 90%, rgba(255,224,94,0.25), transparent 40%);">
            </div>
            <div class="relative px-6 py-6 sm:px-8 sm:py-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-yellow-700/70 mb-2">Student Profile</p>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Profile Mahasiswa</h1>
                    <p class="text-gray-600 mt-1">Data pribadi mahasiswa dengan akses tab riwayat akademik & registrasi.</p>
                </div>
                <div class="flex items-center gap-3 bg-white/70 backdrop-blur rounded-2xl px-4 py-3 border border-yellow-100 shadow-sm">
                    <div class="w-12 h-12 rounded-full bg-yellow-200 grid place-content-center text-xl text-gray-800">
                        {{ strtoupper(substr($student->name ?? 'M', 0, 1)) }}
                    </div>
                    <div class="leading-tight text-sm">
                        <p class="font-semibold text-gray-900">{{ $student->name ?? (auth()->user()->name ?? 'Mahasiswa') }}</p>
                        <p class="text-yellow-700/80">Mahasiswa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white/80 backdrop-blur rounded-xl border border-gray-100 shadow-sm">
            <div x-ref="tablist" class="relative flex gap-2 sm:gap-4 p-2 sm:p-3 overflow-x-auto">
                <a data-tab="data" href="{{ url('/profile/mahasiswa') }}?tab=data" @click.prevent="go($el)"
                    class="relative flex items-center text-sm md:text-md gap-2 px-4 py-2 rounded-lg transition-colors {{ $active === 'data' ? 'text-yellow-600' : 'text-gray-500 hover:text-yellow-600 hover:bg-yellow-50' }}">
                    <i class="fa-solid fa-user text-lg"></i>
                    <span class="font-semibold">Data Pribadi</span>
                </a>
                <a data-tab="akademik" href="{{ url('/profile/mahasiswa') }}?tab=akademik" @click.prevent="go($el)"
                    class="relative flex items-center text-sm md:text-md gap-2 px-4 py-2 rounded-lg transition-colors {{ $active === 'akademik' ? 'text-yellow-600' : 'text-gray-500 hover:text-yellow-600 hover:bg-yellow-50' }}">
                    <i class="fa-solid fa-book-open text-lg"></i>
                    <span class="font-semibold">Riwayat Akademik</span>
                </a>
                <a data-tab="registrasi" href="{{ url('/profile/mahasiswa') }}?tab=registrasi" @click.prevent="go($el)"
                    class="relative flex items-center text-sm md:text-md gap-2 px-4 py-2 rounded-lg transition-colors {{ $active === 'registrasi' ? 'text-yellow-600' : 'text-gray-500 hover:text-yellow-600 hover:bg-yellow-50' }}">
                    <i class="fa-solid fa-receipt text-lg"></i>
                    <span class="font-semibold">Riwayat Registrasi</span>
                </a>
                <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-100 rounded-b-xl"></div>
                <div class="absolute bottom-0 h-[3px] rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 transition-all duration-300 ease-out"
                    :style="{ width: underline.width + 'px', transform: 'translateX(' + underline.left + 'px)' }"></div>
            </div>
        </div>

        <!-- Content -->
        <div x-ref="content" class="space-y-6 transition-all duration-300 ease-out"
            :class="fading ? 'opacity-0 translate-y-1' : 'opacity-100 translate-y-0'">
            @if ($active === 'data')
                @include('Profile.partials._data_pribadi', ['student' => $student ?? null])
            @elseif ($active === 'akademik')
                @include('Profile.partials._riwayat_akademik', ['histories' => $histories ?? null])
            @elseif ($active === 'registrasi')
                @include('Profile.partials._riwayat_registrasi', [
                    'registrations' => $registrations ?? null,
                ])
            @endif
        </div>
    </div>

</x-app-layout>
