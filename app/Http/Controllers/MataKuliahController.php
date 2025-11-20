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
        $mataKuliah = MataKuliah::with(['prodi', 'kelas.dosenPengampu'])->get();
        return view('Dashboard.dashboard_admin_mk', compact('prodi', 'dosen', 'mataKuliah'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
