<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Mahasiswa</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

            body {
                font-family: 'Inter', sans-serif;
            }

            .hover-scale:hover {
                transform: scale(1.01);
            }

            .transition-smooth {
                transition: all 0.2s ease-out;
            }
        </style>
    </head>

    <body class="bg-gray-50">
        <!-- Top Navigation Bar -->
        <nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Left side - Logo/App Name -->
                <div class="flex items-center">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-sm"></i>
                        </div>
                        <span class="font-bold text-gray-800 text-lg">Dashboard</span>
                    </div>
                </div>

                <!-- Right side - Profile and Notifications -->
                <div class="flex items-center space-x-4">


                    <!-- Profile Picture and Name -->
                    <div class="flex items-center space-x-2">
                        <div class="flex flex-col items-end">
                            <span
                                class="text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap ?? 'Mahasiswa' }}</span>
                            <span class="text-xs text-gray-500">Mahasiswa Informatika</span>
                        </div>
                        <a href="/profile/mahasiswa" class="relative">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                alt="Profile Picture"
                                class="w-10 h-10 rounded-full object-cover border-2 border-yellow-400">
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="p-4 sm:p-6 bg-gray-50 min-h-screen">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-x-6 md:gap-y-6">
                {{-- Header --}}
                <div
                    class="col-span-12 bg-yellow-300 text-center text-teal-700 font-semibold p-4 rounded-xl shadow mb-6">
                    Selamat Datang, {{ Auth::user()->nama_lengkap ?? 'User' }},
                </div>

                <!-- Admin Management Boxes -->
                <div class="col-span-12 grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-6">
                    <!-- Mahasiswa Box -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 transition-smooth hover-scale">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Mahasiswa</h3>
                                <p class="text-sm text-gray-500 mt-1">Total Mahasiswa Aktif</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <span class="text-3xl font-bold text-gray-800">1,254</span>
                            </div>
                            <a href="/dashboard-admin/mahasiswa"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                Kelola
                            </a>
                        </div>
                    </div>

                    <!-- Dosen Box -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 transition-smooth hover-scale">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Dosen</h3>
                                <p class="text-sm text-gray-500 mt-1">Total Dosen Aktif</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <span class="text-3xl font-bold text-gray-800">84</span>
                            </div>
                            <a href="/dashboard-admin/dosen"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                Kelola
                            </a>
                        </div>
                    </div>

                    <!-- Fakultas Box -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 transition-smooth hover-scale">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Fakultas</h3>
                                <p class="text-sm text-gray-500 mt-1">Total Fakultas</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-university text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <span class="text-3xl font-bold text-gray-800">8</span>
                            </div>
                            <a href="/admin/fakultas"
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                Kelola
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Rest of your content would go here -->

            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const canvas = document.getElementById('ipsChart');
                if (!canvas || !window.Chart) return;

                // Allow passing dynamic data from controller; fallback to demo values
                const labels = ['Semester 1', 'Semester 2', 'Semester 3'];
                const values = [4.0, 4.0, 0.0];

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
    </body>
</x-app-layout>
