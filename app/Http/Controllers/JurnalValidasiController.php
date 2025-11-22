<?php

namespace App\Http\Controllers;

use App\Models\JurnalPerkuliahan;
use App\Models\Krs;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalValidasiController extends Controller
{
    /**
     * Show jurnal that needs mahasiswa validation for a specific mata kuliah
     */
    public function index($kodeMk)
    {
        $userId = Auth::id();

        $mataKuliah = MataKuliah::where('kode_mk', $kodeMk)->first();
        
        if (!$mataKuliah) {
            return redirect()->route('jadwal.index')->with('error', 'Mata kuliah tidak ditemukan');
        }

        // Verify student is enrolled in this class
        $krs = Krs::where('mahasiswa_user_id', $userId)
            ->whereHas('kelas', function($query) use ($mataKuliah) {
                $query->where('mk_id', $mataKuliah->mk_id);
            })
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->first();

        if (!$krs) {
            return redirect()->route('jadwal.index')->with('error', 'Anda belum mengambil mata kuliah ini');
        }

        $kelas = $krs->kelas;
        $dosen = $kelas->dosenPengampu;

        // Get jurnal that are validated by dosen but not yet by mahasiswa
        $jurnalNeedingValidation = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', false)
            ->with(['dosenValidator', 'absensi'])
            ->orderBy('pertemuan_ke', 'desc')
            ->get();

        return view('Dashboard.jurnal_validasi', compact(
            'mataKuliah',
            'kelas',
            'dosen',
            'jurnalNeedingValidation'
        ));
    }

    /**
     * Validate a jurnal by mahasiswa
     */
    public function validate(Request $request, $jurnalId)
    {
        $jurnal = JurnalPerkuliahan::find($jurnalId);

        if (!$jurnal) {
            return response()->json([
                'success' => false,
                'message' => 'Jurnal tidak ditemukan'
            ], 404);
        }

        // Check if student is enrolled in this class
        $userId = Auth::id();
        $isEnrolled = Krs::where('mahasiswa_user_id', $userId)
            ->where('kelas_id', $jurnal->kelas_id)
            ->where('status_krs', 'diambil')
            ->exists();

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak terdaftar di kelas ini'
            ], 403);
        }

        // Check if dosen has validated first
        if (!$jurnal->validasi_dosen) {
            return response()->json([
                'success' => false,
                'message' => 'Jurnal belum divalidasi oleh dosen'
            ], 400);
        }

        // Check if already validated by mahasiswa
        if ($jurnal->validasi_mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Jurnal sudah divalidasi sebelumnya'
            ], 400);
        }

        // Validate the jurnal
        $jurnal->validasi_mahasiswa = true;
        $jurnal->mahasiswa_validator_id = $userId;
        $jurnal->waktu_validasi_mahasiswa = now();
        $jurnal->save();

        return response()->json([
            'success' => true,
            'message' => 'Jurnal berhasil divalidasi'
        ]);
    }
}
