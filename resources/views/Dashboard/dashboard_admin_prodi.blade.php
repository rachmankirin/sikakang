<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin - Program Studi</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>

    <body class="bg-gray-50">

        <!-- Top Navigation Bar -->
        <nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-gray-800 text-lg">Dashboard Program Studi</span>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <div class="flex flex-col items-end">
                            <span class="text-sm font-medium text-gray-700">
                                {{ Auth::user()->nama_lengkap ?? 'Admin' }}
                            </span>
                            <span class="text-xs text-gray-500">Koordinator Program Studi</span>
                        </div>
                        <a href="/profile/admin">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e"
                                class="w-10 h-10 rounded-full object-cover border-2 border-yellow-400">
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="p-6 bg-gray-50">

            <div class="flex justify-between mb-4">
                <h2 class="text-xl font-semibold">Data Program Studi</h2>

                <button id="addBtn"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    <i class="fas fa-plus mr-2"></i>Tambah Prodi
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow border">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Kode</th>
                            <th class="px-4 py-2 text-left">Nama Prodi</th>
                            <th class="px-4 py-2 text-left">Fakultas</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($prodi as $pr)
                            <tr>
                                <td class="px-4 py-2">{{ $pr->code }}</td>
                                <td class="px-4 py-2">{{ $pr->name }}</td>
                                <td class="px-4 py-2">{{ $pr->fakultas->fakultas }}</td>
                                <td class="px-4 py-2">
                                    <button class="text-yellow-600 mr-2"><i class="fas fa-edit"></i></button>
                                    <button class="text-red-600"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Modal -->
        <div id="dataModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">

            <div class="bg-white rounded-xl shadow-lg w-full max-w-xl">

                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold">Tambah Prodi</h3>
                    <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form class="p-4 space-y-4" action="/dashboard-admin/prodi" method="POST">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Prodi</label>
                        <input type="text" name="name"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"
                            required />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                        <select name="fakultas_id"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                            @foreach ($fakultas as $fks)
                                <option value="{{ $fks->id }}">{{ $fks->fakultas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 border rounded-lg hover:bg-gray-100">Batal</button>

                        <button type="submit"
                            class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>

        </div>

        <script>
            const addBtn = document.getElementById("addBtn");
            const dataModal = document.getElementById("dataModal");
            const closeModal = document.getElementById("closeModal");
            const cancelBtn = document.getElementById("cancelBtn");

            addBtn.addEventListener("click", () => {
                dataModal.classList.remove("hidden");
            });

            closeModal.addEventListener("click", () => {
                dataModal.classList.add("hidden");
            });

            cancelBtn.addEventListener("click", () => {
                dataModal.classList.add("hidden");
            });
        </script>

    </body>
</x-app-layout>
