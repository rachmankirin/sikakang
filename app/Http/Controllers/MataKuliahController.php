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
        
        for ($i = 0; $i < $jumlahKelas; $i++) {
            $namaKelas = chr(65 + $i); // A, B, C, dst
            
            Kelas::create([
                'mk_id' => $mataKuliah->mk_id,
                'dosen_pengampu_id' => $request->input('dosen_pengampu_id'),
                'nama_kelas' => $namaKelas . '-' . ($request->input('angkatan') ?? date('y')),
                'tahun_ajar' => date('Y') . '/' . (date('Y') + 1),
                'semester' => $semesterType,
                'kapasitas' => $request->input('kapasitas_' . $namaKelas, 40),
                'hari' => $request->input('waktu_hari_' . $namaKelas),
                'jam_mulai' => $request->input('waktu_mulai_' . $namaKelas),
                'jam_selesai' => $request->input('waktu_selesai_' . $namaKelas),
            ]);
        }
        
        return redirect('/dashboard-admin/mk')->with('success', 'Mata Kuliah dan Kelas berhasil ditambahkan');
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
