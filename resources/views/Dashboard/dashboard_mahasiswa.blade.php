<x-app-layout>


    <div class="p-4 sm:p-6 bg-gray-50 min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-x-6 md:gap-y-6">
            {{-- Header --}}
            <div class="col-span-12 bg-yellow-300 text-center text-teal-700 font-semibold p-4 rounded-xl shadow mb-6">
                Selamat Datang, {{ Auth::user()->nama_lengkap ?? 'User' }}, sebagai Mahasiswa Informatika
            </div>

            {{-- Chart dan IPK --}}
            <div
                class="col-span-12 md:col-span-8 bg-yellow-100 p-4 h-auto md:h-95 rounded-xl shadow transform-gpu transition-transform duration-200 ease-out hover:scale-[1.01] hover:shadow-lg motion-reduce:transform-none motion-reduce:transition-none">
                <h2 class="font-semibold text-gray-700 mb-2">Perkembangan IPS per Semester</h2>
                <div class="relative h-64 md:h-80">
                    <canvas id="ipsChart"></canvas>
                </div>
            </div>
            <div
                class="relative overflow-hidden col-span-12 md:col-span-4 bg-gradient-to-br from-yellow-50 to-yellow-100 p-6 md:p-15 md:pt-20 h-auto md:h-95 rounded-xl shadow text-center transform-gpu transition-transform duration-200 ease-out hover:scale-[1.01] hover:shadow-lg ring-1 ring-yellow-200/70 motion-reduce:transform-none motion-reduce:transition-none">
                <div
                    class="pointer-events-none absolute -top-10 -right-10 w-40 h-40 bg-yellow-200/40 rounded-full blur-2xl">
                </div>
                <div
                    class="pointer-events-none absolute -bottom-12 -left-8 w-48 h-48 bg-yellow-300/30 rounded-full blur-3xl">
                </div>

                @php
                    $__vals = isset($ips) && is_array($ips) && count($ips) ? $ips : [4.0, 4.0, 0.0];
                    $__ipkCalc = isset($ipk) ? (float) $ipk : round(array_sum($__vals) / max(count($__vals), 1), 1);
                    $__pct = max(0, min(100, ($__ipkCalc / 4) * 100));
                @endphp

                <div class="flex items-center justify-center mb-3">
                    <i class="fa-solid fa-medal text-yellow-500 mr-2"></i>
                    <h2 class="text-sm text-gray-600">Indeks Prestasi Kumulatif</h2>
                </div>

                <div class="mx-auto w-28 h-28 relative mb-3">
                    <div class="absolute inset-0 rounded-full"
                        style="background: conic-gradient(#F59E0B {{ $__pct }}%, #FDE68A {{ $__pct }}% 100%)">
                    </div>
                    <div class="absolute inset-2 rounded-full bg-white/70 backdrop-blur ring-1 ring-yellow-200/60">
                    </div>
                    <div class="relative z-10 flex items-center justify-center w-full h-full">
                        <div>
                            <p class="text-3xl font-extrabold text-yellow-600 leading-none">
                                {{ number_format($__ipkCalc, 1) }}</p>
                            <p class="text-[10px] uppercase tracking-wider text-gray-500">dari 4.0</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-2 mb-2">
                    @php $badge = $__ipkCalc >= 3.5 ? 'Excellent' : ($__ipkCalc >= 3.0 ? 'Good' : 'Fair'); @endphp
                    <span
                        class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-yellow-200/70 text-yellow-800 border border-yellow-300/80">
                        {{ $badge }}
                    </span>
                </div>

                <div class="mx-auto max-w-xs">
                    <div class="h-2 w-full bg-yellow-200/60 rounded-full overflow-hidden ring-1 ring-yellow-200/70">
                        <div class="h-full bg-yellow-500" style="width: {{ $__pct }}%"></div>
                    </div>
                    <div class="mt-1 flex justify-between text-[11px] text-gray-500">
                        <span>0.0</span>
                        <span>Target 4.0</span>
                    </div>
                </div>

                <div class="flex justify-center gap-3 mt-4 text-gray-700">
                    <div class="px-3 py-1.5 rounded-full bg-white/70 border border-yellow-200/80">
                        <p class="text-sm font-semibold leading-none">64</p>
                        <p class="text-[11px] text-gray-500 leading-none mt-0.5">Total SKS</p>
                    </div>
                    <div class="px-3 py-1.5 rounded-full bg-white/70 border border-yellow-200/80">
                        <p class="text-sm font-semibold leading-none">3</p>
                        <p class="text-[11px] text-gray-500 leading-none mt-0.5">Semester</p>
                    </div>
                </div>
            </div>

            {{-- Jadwal Hari Ini --}}
            <div
                class="col-span-12 bg-white p-4 sm:p-6 rounded-xl shadow transform-gpu transition-transform duration-200 ease-out hover:scale-[1.01] hover:shadow-lg motion-reduce:transform-none motion-reduce:transition-none">
                <h2 class="font-semibold text-gray-700 mb-3">
                    <i class="fa-solid fa-calendar-days text-blue-500 mr-2"></i>
                    Jadwal Perkuliahan Hari Ini
                </h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-xs sm:text-sm border border-yellow-200">
                        <thead class="bg-yellow-50 text-gray-700">
                            <tr>
                                <th class="border border-yellow-200 px-1 sm:px-2 py-1">No</th>
                                <th class="border border-yellow-200 px-1 sm:px-2 py-1">Mata Kuliah</th>
                                <th class="border border-yellow-200 px-1 sm:px-2 py-1">Jumlah SKS</th>
                                <th class="border border-yellow-200 px-1 sm:px-2 py-1">Waktu Perkuliahan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-yellow-100">
                            <tr class="text-center hover:bg-yellow-50/60 transition-colors">
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">1</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">Pemrograman Web</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">3</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">10.00–12.30</td>
                            </tr>
                            <tr class="text-center hover:bg-yellow-50/60 transition-colors">
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">2</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">Basis Data</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">3</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">13.00–15.30</td>
                            </tr>
                            <tr class="text-center hover:bg-yellow-50/60 transition-colors">
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">3</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">Sistem Operasi</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">3</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">16.00–18.30</td>
                            </tr>
                            <tr class="text-center hover:bg-yellow-50/60 transition-colors">
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">4</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">Jaringan Komputer</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">3</td>
                                <td class="border border-yellow-200 px-1 sm:px-2 py-1">19.00–21.30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const canvas = document.getElementById('ipsChart');
                if (!canvas || !window.Chart) return;

                // Allow passing dynamic data from controller; fallback to demo values
                const labels = @json($labels ?? ['Semester 1', 'Semester 2', 'Semester 3']);
                const values = @json($ips ?? [4.0, 4.0, 0.0]);

                // Headroom to prevent top clipping of data labels
                const numericValues = (Array.isArray(values) ? values : []).map(v => Number(v)).filter(v => Number
                    .isFinite(v));
                const dataMax = numericValues.length ? Math.max(...numericValues) : 4;
                const ySuggestedMax = Math.max(4, dataMax + 0.3);

                if (window.ChartDataLabels) {
                    Chart.register(window.ChartDataLabels);
                }

                new Chart(canvas, {
                    type: 'line',
                    data: {
                        labels,
                        datasets: [{
                            label: 'IPS',
                            data: values,
                            borderColor: '#F59E0B', // amber-500
                            backgroundColor: 'rgba(245, 158, 11, 0.15)',
                            borderWidth: 3,
                            tension: 0, // straight segments (no curve)
                            stepped: false,
                            spanGaps: true,
                            pointBackgroundColor: '#F59E0B',
                            pointBorderColor: '#F59E0B',
                            pointRadius: 0, // hide point markers to match reference
                            hitRadius: 8,
                            pointHoverRadius: 4,
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'nearest',
                            intersect: false
                        },
                        layout: {
                            padding: {
                                top: 28,
                                right: 8,
                                bottom: 8,
                                left: 8
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) =>
                                        `${ctx.parsed.y?.toFixed ? ctx.parsed.y.toFixed(1) : ctx.parsed.y}`
                                }
                            },
                            datalabels: {
                                backgroundColor: '#FDE68A', // amber-200
                                borderColor: '#F59E0B',
                                borderWidth: 1,
                                borderRadius: 6,
                                color: '#92400E',
                                anchor: 'end',
                                align: 'top',
                                offset: 8,
                                padding: {
                                    top: 2,
                                    bottom: 2,
                                    left: 6,
                                    right: 6
                                },
                                formatter: (v) => (typeof v === 'number' ? v.toFixed(1) : v)
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                min: 0,
                                max: 4.0,
                                ticks: {
                                    stepSize: 1,
                                    callback: (v) => (typeof v === 'number' && v.toFixed ? v.toFixed(1) : v)
                                },
                                grid: {
                                    color: 'rgba(0,0,0,0.06)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
