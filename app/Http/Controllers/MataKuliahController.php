<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodi;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        $dosen = \App\Models\User::where('role', 'dosen')->get();
        $allMataKuliah = MataKuliah::with(['prodi', 'kelas.dosenPengampu'])->get();
        return view('Dashboard.dashboard_admin_mk', compact('prodi', 'dosen', 'allMataKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required',
            'id_prodi' => 'required|exists:prodi,id',
            'deskripsi' => 'nullable',
            'dosen_pengampu_id' => 'nullable|exists:users,user_id',
            'angkatan' => 'nullable',
            'jumlah_kelas' => 'nullable|integer|min:1'
        ]);
        
        // Generate kode MK otomatis 5 digit
        $validated['kode_mk'] = 'MK' . str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        
        $mataKuliah = MataKuliah::create($validated);
        
        // Buat kelas otomatis jika jumlah_kelas ada
        $jumlahKelas = $request->input('jumlah_kelas', 1);
        
        // Konversi semester angka ke ganjil/genap
        $semesterType = (intval($validated['semester']) % 2 == 1) ? 'ganjil' : 'genap';
        
        // Generate singkatan mata kuliah
        $singkatan = $this->generateSingkatan($validated['nama_mk']);
        
        for ($i = 0; $i < $jumlahKelas; $i++) {
            $kelasLetter = chr(65 + $i); // A, B, C, dst
            
            // Generate unique 4 digit code
            $uniqueCode = $this->generateUniqueCode();
            $namaKelas = $singkatan . '_' . $kelasLetter . $uniqueCode;
            
            Kelas::create([
                'mk_id' => $mataKuliah->mk_id,
                'dosen_pengampu_id' => $request->input('dosen_pengampu_id'),
                'nama_kelas' => $namaKelas,
                'tahun_ajar' => date('Y') . '/' . (date('Y') + 1),
                'semester' => $semesterType,
                'kapasitas' => $request->input('kapasitas_' . $kelasLetter, 40),
                'hari' => $request->input('waktu_hari_' . $kelasLetter),
                'jam_mulai' => $request->input('waktu_mulai_' . $kelasLetter),
                'jam_selesai' => $request->input('waktu_selesai_' . $kelasLetter),
            ]);
        }
        
        return redirect('/dashboard-admin/mk')->with('success', 'Mata Kuliah dan Kelas berhasil ditambahkan');
    }

    /**
     * Generate singkatan dari nama mata kuliah
     */
    private function generateSingkatan($namaMK)
    {
        $namaMK = strtolower($namaMK);
        
        // Mapping nama mata kuliah ke singkatan
        $mappings = [
            'basis data' => 'BASDAT',
            'sistem basis data' => 'BASDAT',
            'sistem operasi' => 'SISOP',
            'internet of things' => 'IOT',
            'iot' => 'IOT',
            'pengantar kecerdasan artificial' => 'PKA',
            'kecerdasan artificial' => 'PKA',
            'pemrograman web' => 'PEMWEB',
            'desain dan analisis algoritma' => 'DAA',
            'jaringan komputer' => 'JARKOM',
            'e-commerce' => 'ECOM',
        ];
        
        // Cek mapping
        foreach ($mappings as $key => $singkatan) {
            if (str_contains($namaMK, $key)) {
                return $singkatan;
            }
        }
        
        // Jika tidak ada mapping, generate dari huruf kapital atau 6 huruf pertama
        $words = explode(' ', $namaMK);
        if (count($words) > 1) {
            // Ambil huruf pertama setiap kata
            $singkatan = '';
            foreach ($words as $word) {
                if (strlen($word) > 0) {
                    $singkatan .= strtoupper($word[0]);
                }
            }
            return substr($singkatan, 0, 6);
        } else {
            // Ambil 6 huruf pertama
            return strtoupper(substr($namaMK, 0, 6));
        }
    }

    /**
     * Generate unique 4 digit code
     */
    private function generateUniqueCode()
    {
        do {
            $code = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            $exists = \App\Models\Kelas::where('nama_kelas', 'LIKE', '%' . $code)->exists();
        } while ($exists);
        
        return $code;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editMataKuliah = MataKuliah::with(['prodi', 'kelas.dosenPengampu'])->findOrFail($id);
        $prodi = Prodi::all();
        $dosen = \App\Models\User::where('role', 'dosen')->get();
        $allMataKuliah = MataKuliah::with(['prodi', 'kelas.dosenPengampu'])->get();
        
        return view('Dashboard.dashboard_admin_mk', compact('prodi', 'dosen', 'allMataKuliah', 'editMataKuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Debug: log data yang diterima
        \Log::info('Update MataKuliah', [
            'id' => $id,
            'request' => $request->all()
        ]);
        
        $mataKuliah = MataKuliah::findOrFail($id);
        
        $validated = $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required',
            'id_prodi' => 'required|exists:prodi,id',
            'deskripsi' => 'nullable',
            'dosen_pengampu_id' => 'nullable|exists:users,user_id',
            'angkatan' => 'nullable',
        ]);
        
        \Log::info('Validated data', $validated);
        $semesterType = (intval($validated['semester']) % 2 === 1) ? 'ganjil' : 'genap';
        $angkatanBaru = $request->input('angkatan');
        
        // Update hanya field yang ada di tabel mata_kuliah
        $mataKuliah->update([
            'nama_mk' => $validated['nama_mk'],
            'sks' => $validated['sks'],
            'semester' => $validated['semester'],
            'id_prodi' => $validated['id_prodi'],
            'deskripsi' => $validated['deskripsi'],
        ]);
        
        // Update data kelas agar konsisten dengan perubahan mata kuliah
        if ($mataKuliah->kelas()->exists()) {
            foreach ($mataKuliah->kelas as $kelas) {
                $kelasUpdateData = [
                    'semester' => $semesterType,
                ];

                if ($angkatanBaru !== null && $angkatanBaru !== '') {
                    $kelasLetter = $kelas->nama_kelas ? substr($kelas->nama_kelas, 0, 1) : 'A'; // fallback jika nama belum ada
                    $kelasUpdateData['nama_kelas'] = $kelasLetter . '-' . $angkatanBaru;
                }

                if ($request->filled('dosen_pengampu_id')) {
                    $kelasUpdateData['dosen_pengampu_id'] = $request->dosen_pengampu_id;
                }

                $kelas->update($kelasUpdateData);
            }
        }
        
        return redirect('/dashboard-admin/mk')->with('success', 'Mata Kuliah berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        
        // Hapus semua kelas terkait
        $mataKuliah->kelas()->delete();
        
        // Hapus mata kuliah
        $mataKuliah->delete();
        
        return redirect('/dashboard-admin/mk')->with('success', 'Mata Kuliah dan semua kelasnya berhasil dihapus');
    }
}
