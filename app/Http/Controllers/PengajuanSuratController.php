<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource (Riwayat Surat).
     */
    public function index()
    {
        // TODO: Replace with Auth::id() when authentication is implemented
        $userId = 1; // Dummy user ID for now
        
        $pengajuanSurat = PengajuanSurat::where('mahasiswa_user_id', $userId)
            ->with(['jenisSurat', 'dosenPa'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('surat.riwayat', compact('pengajuanSurat'));
    }

    /**
     * Show the form for creating a new resource (Buat Surat).
     */
    public function create()
    {
        $jenisSurat = JenisSurat::all();
        return view('surat.buat', compact('jenisSurat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_surat_id' => 'required|exists:jenis_surat,jenis_surat_id',
            'keperluan' => 'required|string',
            'tanggal_keperluan' => 'required|date',
        ]);

        // TODO: Replace with Auth::id() when authentication is implemented
        $userId = 1; // Dummy user ID for now

        // Get dosen PA from mahasiswa detail
        $mahasiswa = \App\Models\MahasiswaDetail::where('user_id', $userId)->first();
        
        PengajuanSurat::create([
            'mahasiswa_user_id' => $userId,
            'jenis_surat_id' => $validated['jenis_surat_id'],
            'dosen_pa_id' => $mahasiswa->dosen_pa_id ?? null,
            'keperluan' => $validated['keperluan'],
            'tanggal_keperluan' => $validated['tanggal_keperluan'],
            'status_pengajuan' => 'menunggu',
        ]);

        return redirect()->route('surat.riwayat')->with('success', 'Pengajuan surat berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = PengajuanSurat::with(['jenisSurat', 'dosenPa', 'mahasiswa.mahasiswaDetail'])
            ->findOrFail($id);

        return view('surat.detail', compact('pengajuan'));
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
        $pengajuan = PengajuanSurat::findOrFail($id);
        
        // Only allow deletion if status is 'menunggu'
        if ($pengajuan->status_pengajuan === 'menunggu') {
            $pengajuan->delete();
            return redirect()->route('surat.riwayat')->with('success', 'Pengajuan surat berhasil dibatalkan!');
        }

        return redirect()->route('surat.riwayat')->with('error', 'Pengajuan surat tidak dapat dibatalkan!');
    }
}
