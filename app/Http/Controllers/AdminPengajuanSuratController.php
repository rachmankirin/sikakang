<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminPengajuanSuratController extends Controller
{
    /**
     * List pengajuan surat untuk admin verifikasi
     */
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = PengajuanSurat::with(['jenisSurat', 'mahasiswa.mahasiswaDetail', 'dosenPa'])
            ->orderByDesc('created_at');

        if ($status && in_array($status, ['menunggu', 'disetujui', 'ditolak'])) {
            $query->where('status_pengajuan', $status);
        }

        $pengajuan = $query->get();

        return view('Dashboard.admin_pengajuan_surat', compact('pengajuan', 'status'));
    }

    /** Approve pengajuan */
    public function approve(Request $request, string $id)
    {
        $request->validate([
            'catatan' => 'nullable|string',
        ]);

        $p = PengajuanSurat::findOrFail($id);
        $p->status_pengajuan = 'disetujui';
        $p->tanggal_disetujui = now();
        if ($request->filled('catatan')) {
            $p->catatan = $request->catatan;
        }
        $p->save();

        return redirect()->back()->with('success', 'Pengajuan disetujui.');
    }

    /** Reject pengajuan */
    public function reject(Request $request, string $id)
    {
        $request->validate([
            'catatan' => 'required|string|min:5',
        ]);

        $p = PengajuanSurat::findOrFail($id);
        $p->status_pengajuan = 'ditolak';
        $p->catatan = $request->catatan;
        $p->save();

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }
}
