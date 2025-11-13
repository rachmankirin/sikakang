<x-app-layout>
	@section('title', 'Tagihan Mahasiswa')

	@php
		if (!isset($bills) || empty($bills)) {
			$bills = [
				[
					'id' => 'INV-2025-001',
					'jenis' => 'UKT',
					'nominal' => 4500000,
					'jatuh_tempo' => '2025-08-30',
					'tanggal_pembayaran' => '2025-08-28',
					'semester' => '2025/2026 - Ganjil',
					'status' => 'Lunas',
					'metode' => 'Virtual Account BNI',
					'catatan' => 'Pembayaran melalui mobile banking pada pukul 09:31 WIB.',
				],
				[
					'id' => 'INV-2025-006',
					'jenis' => 'UKT',
					'nominal' => 4500000,
					'jatuh_tempo' => '2026-01-25',
					'tanggal_pembayaran' => null,
					'semester' => '2025/2026 - Genap',
					'status' => 'Belum Lunas',
					'metode' => 'Virtual Account Mandiri',
					'catatan' => 'Segera lakukan pembayaran sebelum jatuh tempo.',
				],
				[
					'id' => 'INV-2025-008',
					'jenis' => 'SPP Tambahan',
					'nominal' => 750000,
					'jatuh_tempo' => '2025-11-15',
					'tanggal_pembayaran' => null,
					'semester' => '2025 - Penunjang',
					'status' => 'Menunggu Konfirmasi',
					'metode' => 'Transfer Bank BRI',
					'catatan' => 'Upload bukti transfer untuk mempercepat verifikasi.',
				],
				[
					'id' => 'INV-2025-011',
					'jenis' => 'Praktikum',
					'nominal' => 350000,
					'jatuh_tempo' => '2025-09-12',
					'tanggal_pembayaran' => '2025-09-10',
					'semester' => '2025 - Penunjang',
					'status' => 'Lunas',
					'metode' => 'E-Wallet GoPay',
					'catatan' => 'Pembayaran otomatis terkonfirmasi.',
				],
			];
		}
	@endphp

	<div x-data='billPage({ bills: @json($bills) })' class="space-y-8">
		<div x-show="toastMessage" x-transition.opacity.duration.300ms class="fixed top-4 left-1/2 z-50 w-full max-w-sm -translate-x-1/2">
			<div class="rounded-2xl border border-emerald-200 bg-white px-5 py-3 text-sm font-medium text-emerald-700 shadow-lg shadow-emerald-200/40">
				<i class="fa-solid fa-circle-check me-2"></i><span x-text="toastMessage"></span>
			</div>
		</div>

		<div x-show="loaded" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-6"
			x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
			<header class="flex flex-col gap-6 rounded-3xl border border-yellow-200 bg-gradient-to-br from-yellow-50 via-white to-white px-6 py-8 shadow-sm md:flex-row md:items-center md:justify-between">
				<div>
					<p class="text-sm font-semibold text-yellow-600">Perkuliahan &raquo; Tagihan</p>
					<h1 class="mt-1 text-3xl font-extrabold text-gray-800">Tagihan Mahasiswa</h1>
					<p class="mt-2 max-w-xl text-sm text-gray-500">Kelola seluruh kewajiban keuanganmu dengan tampilan yang hangat dan mudah dibaca. Pantau status pembayaran, tenggat waktu, dan riwayat transaksi dalam satu tempat.</p>
				</div>
				<div class="rounded-2xl border border-yellow-100 bg-white/80 px-5 py-4 shadow-inner">
					<p class="text-xs uppercase tracking-wide text-gray-500">Status Terakhir</p>
					<p class="mt-1 text-lg font-semibold text-gray-700" x-text="lastUpdate"></p>
				</div>
			</header>

			<section class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
				<template x-for="metric in metrics" :key="metric.title">
					<article class="group relative overflow-hidden rounded-3xl border border-yellow-100 bg-white/90 px-6 py-5 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-lg">
						<div class="absolute inset-0 bg-gradient-to-br from-transparent via-transparent to-yellow-100 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
						<div class="relative z-10 flex items-start justify-between">
							<div>
								<p class="text-xs font-semibold uppercase tracking-wide text-gray-400" x-text="metric.subtitle"></p>
								<h2 class="mt-3 text-xl font-bold text-gray-800" x-text="metric.value"></h2>
							</div>
							<span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-yellow-100 text-yellow-600 shadow-inner">
								<i class="fa-solid" :class="metric.icon"></i>
							</span>
						</div>
						<p class="relative z-10 mt-4 text-sm font-semibold text-gray-600" x-text="metric.title"></p>
						<div class="relative z-10 mt-4 h-1.5 w-full overflow-hidden rounded-full bg-yellow-50">
							<div class="h-full bg-gradient-to-r from-yellow-400 to-yellow-500" :style="`width: ${metric.progress}%`"></div>
						</div>
					</article>
				</template>
			</section>

			<section class="rounded-3xl border border-yellow-100 bg-white/80 px-6 py-5 shadow-sm backdrop-blur">
				<div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
					<div>
						<p class="text-sm font-bold text-gray-700">Filter Tagihan</p>
						<p class="text-xs text-gray-500">Sesuaikan tampilan berdasarkan jenis biaya dan status pembayaran.</p>
					</div>
					<div class="flex flex-col items-stretch gap-3 md:flex-row md:items-center">
						<div class="relative">
							<select x-model="typeFilter" class="w-full appearance-none rounded-2xl border border-yellow-200 bg-white px-4 py-2 text-sm font-semibold text-gray-600 shadow-sm focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-300">
								<option value="all">Semua Jenis</option>
								<template x-for="option in types" :key="option">
									<option x-bind:value="option" x-text="option"></option>
								</template>
							</select>
							<span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-yellow-500"><i class="fa-solid fa-chevron-down"></i></span>
						</div>
						<div class="flex flex-wrap gap-2">
							<template x-for="option in statusOptions" :key="option.value">
								<button type="button" @click="statusFilter = option.value" :class="statusFilter === option.value ? 'bg-yellow-400 text-gray-900 shadow-md' : 'bg-yellow-100 text-gray-700 hover:bg-yellow-200'"
									class="rounded-full px-4 py-2 text-xs font-semibold transition">
									<i :class="option.icon" class="me-2"></i>
									<span x-text="option.label"></span>
								</button>
							</template>
						</div>
					</div>
				</div>
			</section>

			<section class="grid gap-6 xl:grid-cols-[2fr_1fr]">
				<div class="overflow-hidden rounded-3xl border border-yellow-100 bg-white/90 shadow-lg shadow-yellow-100/40">
					<div class="flex flex-col gap-2 border-b border-yellow-100 bg-yellow-50/70 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
						<div>
							<h2 class="text-lg font-bold text-gray-800">Daftar Tagihan Mahasiswa</h2>
							<p class="text-xs text-gray-500">Rincian kewajiban kuliah yang perlu diperhatikan.</p>
						</div>
						<span class="inline-flex items-center gap-2 rounded-full border border-yellow-200 bg-white px-4 py-1 text-xs font-semibold text-gray-600 shadow-sm">
							<i class="fa-solid fa-list"></i>
							<span x-text="`${filteredBills.length} Tagihan`"></span>
						</span>
					</div>
					<div class="overflow-x-auto">
						<table class="min-w-full divide-y divide-yellow-100 text-sm">
							<thead class="bg-yellow-50 text-xs uppercase tracking-wide text-gray-500">
								<tr>
									<th class="px-6 py-3 text-left">Jenis Tagihan</th>
									<th class="px-6 py-3 text-left">Nominal</th>
									<th class="px-6 py-3 text-left">Jatuh Tempo</th>
									<th class="px-6 py-3 text-left">Tanggal Pembayaran</th>
									<th class="px-6 py-3 text-left">Semester</th>
									<th class="px-6 py-3 text-left">Status</th>
								</tr>
							</thead>
							<tbody class="divide-y divide-yellow-50">
								<template x-if="filteredBills.length === 0">
									<tr>
										<td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">
											Belum ada data tagihan yang sesuai dengan filter saat ini.
										</td>
									</tr>
								</template>
								<template x-for="bill in filteredBills" :key="bill.id">
									<tr class="group transition duration-200 hover:bg-yellow-50/60">
										<td class="px-6 py-4 align-top">
											<p class="font-semibold text-gray-800" x-text="bill.jenis"></p>
											<p class="text-xs text-gray-500" x-text="bill.id"></p>
											<p class="mt-1 text-[11px] text-gray-400" x-text="bill.metode"></p>
										</td>
										<td class="px-6 py-4 align-top">
											<p class="font-semibold text-gray-800" x-text="formatCurrency(bill.nominal)"></p>
											<p class="mt-1 text-[11px] text-gray-400" x-text="bill.catatan"></p>
										</td>
										<td class="px-6 py-4 align-top">
											<div class="flex flex-col gap-1">
												<span class="text-gray-700" x-text="formatDate(bill.jatuh_tempo)"></span>
												<template x-if="bill.overdue">
													<span class="inline-flex w-fit items-center gap-1 rounded-full bg-rose-100 px-2 py-0.5 text-[11px] font-semibold text-rose-600">
														<i class="fa-solid fa-triangle-exclamation"></i>
														Terlewat
													</span>
												</template>
												<template x-if="bill.dueSoon && !bill.overdue">
													<span class="inline-flex w-fit items-center gap-1 rounded-full bg-amber-100 px-2 py-0.5 text-[11px] font-semibold text-amber-700">
														<i class="fa-solid fa-bell"></i>
														<span x-text="`Due ${bill.dueInDays} hari lagi`"></span>
													</span>
												</template>
											</div>
										</td>
										<td class="px-6 py-4 align-top">
											<span class="text-gray-700" x-text="formatDate(bill.tanggal_pembayaran)"></span>
										</td>
										<td class="px-6 py-4 align-top">
											<span class="text-gray-700" x-text="bill.semester"></span>
										</td>
										<td class="px-6 py-4 align-top">
											<div class="flex flex-col gap-2">
												<span class="inline-flex w-fit items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold" :class="badgeClass(bill.status)">
													<i class="fa-solid fa-circle"></i>
													<span x-text="bill.status"></span>
												</span>
												<button type="button" @click="remind(bill)" class="hidden items-center gap-1 text-[11px] font-semibold text-yellow-600 transition group-hover:flex">
													<i class="fa-solid fa-paper-plane"></i>
													Kirim Pengingat
												</button>
											</div>
										</td>
									</tr>
								</template>
							</tbody>
						</table>
					</div>
				</div>

				<aside class="flex flex-col gap-4 rounded-3xl border border-yellow-100 bg-gradient-to-br from-white via-white to-yellow-50 px-6 py-6 shadow-sm">
					<div class="flex items-center justify-between">
						<h3 class="text-base font-bold text-gray-800">Agenda Pembayaran</h3>
						<span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700" x-text="upcomingBills.length ? `${upcomingBills.length} jadwal` : 'Tidak ada' "></span>
					</div>
					<p class="text-xs text-gray-500">Pantau tagihan yang belum lunas dan lakukan pembayaran tepat waktu untuk menghindari denda.</p>
					<div class="relative flex-1">
						<div class="absolute left-2 top-3 bottom-3 w-0.5 bg-gradient-to-b from-yellow-400 via-yellow-200 to-transparent"></div>
						<div class="space-y-5">
							<template x-if="upcomingBills.length === 0">
								<div class="rounded-2xl border border-yellow-100 bg-white px-4 py-6 text-center text-sm text-gray-500">
									Semua tagihan sudah diselesaikan. Tetap pertahankan!
								</div>
							</template>
							<template x-for="bill in upcomingBills" :key="`upcoming-${bill.id}`">
								<div class="relative ms-6 rounded-2xl border border-yellow-100 bg-white px-4 py-4 shadow-sm">
									<span class="absolute -left-6 top-4 inline-flex h-3 w-3 -translate-x-1/2 items-center justify-center rounded-full border-2 border-white" :class="bill.overdue ? 'bg-rose-500' : 'bg-yellow-400'"></span>
									<p class="text-xs font-semibold uppercase tracking-wide text-gray-400" x-text="formatDate(bill.jatuh_tempo)"></p>
									<h4 class="mt-1 text-sm font-bold text-gray-800" x-text="bill.jenis"></h4>
									<p class="text-xs text-gray-500" x-text="bill.semester"></p>
									<div class="mt-3 flex items-center justify-between">
										<span class="text-sm font-semibold text-gray-700" x-text="formatCurrency(bill.nominal)"></span>
										<button type="button" @click="remind(bill)" class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-3 py-1 text-[11px] font-semibold text-yellow-700 transition hover:bg-yellow-200">
											<i class="fa-solid fa-bell"></i>
											Ingatkan
										</button>
									</div>
								</div>
							</template>
						</div>
					</div>
				</aside>
			</section>
		</div>
	</div>

	@push('scripts')
		<script>
			document.addEventListener('alpine:init', () => {
				Alpine.data('billPage', (config = {}) => ({
					loaded: false,
					bills: config.bills || [],
					statusFilter: 'all',
					typeFilter: 'all',
					toastMessage: '',
					init() {
						this.$nextTick(() => {
							this.loaded = true;
						});
					},
					get types() {
						return Array.from(new Set(this.bills.map((bill) => bill.jenis))).sort();
					},
					get statusOptions() {
						const uniqueStatuses = Array.from(new Set(this.bills.map((bill) => bill.status)));
						return [
							{ value: 'all', label: 'Semua Status', icon: 'fa-solid fa-filter' },
							...uniqueStatuses.map((status) => ({
								value: status,
								label: status,
								icon: 'fa-solid fa-circle',
							})),
						];
					},
					get filteredBills() {
						return this.bills
							.filter((bill) => (this.typeFilter === 'all' ? true : bill.jenis === this.typeFilter))
							.filter((bill) => (this.statusFilter === 'all' ? true : bill.status === this.statusFilter))
							.map((bill) => this.decorateBill(bill));
					},
					get upcomingBills() {
						return this.bills
							.filter((bill) => bill.status !== 'Lunas')
							.sort((a, b) => new Date(a.jatuh_tempo) - new Date(b.jatuh_tempo))
							.slice(0, 3)
							.map((bill) => this.decorateBill(bill));
					},
					get totalNominal() {
						return this.bills.reduce((sum, bill) => sum + (bill.nominal || 0), 0);
					},
					get totalPaid() {
						return this.bills
							.filter((bill) => bill.status === 'Lunas')
							.reduce((sum, bill) => sum + (bill.nominal || 0), 0);
					},
					get totalOutstanding() {
						const outstanding = this.totalNominal - this.totalPaid;
						return outstanding > 0 ? outstanding : 0;
					},
					get metrics() {
						const outstandingPercentage = this.totalNominal
							? Math.min(Math.round((this.totalOutstanding / this.totalNominal) * 100), 100)
							: 0;
						const paidPercentage = this.totalNominal
							? Math.min(Math.round((this.totalPaid / this.totalNominal) * 100), 100)
							: 0;

						return [
							{
								title: 'Total Tagihan',
								value: this.formatCurrency(this.totalNominal),
								subtitle: 'Akumulasi hingga semester berjalan',
								icon: 'fa-coins',
								progress: 100,
							},
							{
								title: 'Sudah Dibayar',
								value: this.formatCurrency(this.totalPaid),
								subtitle: 'Nominal yang sudah terselesaikan',
								icon: 'fa-circle-check',
								progress: paidPercentage,
							},
							{
								title: 'Belum Lunas',
								value: this.formatCurrency(this.totalOutstanding),
								subtitle: 'Segera selesaikan sebelum jatuh tempo',
								icon: 'fa-hourglass-half',
								progress: outstandingPercentage,
							},
						];
					},
					get lastUpdate() {
						const formatter = new Intl.DateTimeFormat('id-ID', {
							day: 'numeric',
							month: 'long',
							year: 'numeric',
							hour: '2-digit',
							minute: '2-digit',
						});
						return formatter.format(new Date());
					},
					decorateBill(bill) {
						const decorated = { ...bill };
						if (!bill.jatuh_tempo) {
							decorated.overdue = false;
							decorated.dueSoon = false;
							decorated.dueInDays = null;
							return decorated;
						}

						const today = new Date();
						const due = new Date(bill.jatuh_tempo);
						const diffInMs = due - today;
						const diffInDays = Math.ceil(diffInMs / (1000 * 60 * 60 * 24));

						decorated.overdue = due < new Date(today.toDateString()) && bill.status !== 'Lunas';
						decorated.dueSoon = !decorated.overdue && bill.status !== 'Lunas' && diffInDays <= 10;
						decorated.dueInDays = diffInDays;

						return decorated;
					},
					formatCurrency(value) {
						if (typeof value !== 'number') {
							return value || '-';
						}
						return 'Rp ' + value.toLocaleString('id-ID');
					},
					formatDate(dateString) {
						if (!dateString) {
							return '-';
						}
						const date = new Date(dateString);
						if (Number.isNaN(date.getTime())) {
							return dateString;
						}
						return date.toLocaleDateString('id-ID', {
							day: '2-digit',
							month: 'short',
							year: 'numeric',
						});
					},
					badgeClass(status) {
						switch (status) {
							case 'Lunas':
								return 'bg-emerald-100 text-emerald-700';
							case 'Belum Lunas':
								return 'bg-rose-100 text-rose-700';
							case 'Menunggu Konfirmasi':
								return 'bg-amber-100 text-amber-700';
							default:
								return 'bg-slate-100 text-slate-600';
						}
					},
					remind(bill) {
						this.toastMessage = `Pengingat dikirim untuk ${bill.id}.`;
						setTimeout(() => {
							this.toastMessage = '';
						}, 2200);
					},
				}));
			});
		</script>
	@endpush
</x-app-layout>
