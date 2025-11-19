<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MahasiswaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mhs = User::where('role', 'mahasiswa')
            ->with('mahasiswaDetail')
            ->paginate(10); // Using paginate for better performance
        
        $dosenPa = User::where('role', 'dosen')->get();

        return view('Dashboard.dashboard_admin_mahasiswa', compact('mhs', 'dosenPa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosenPa = User::where('role', 'dosen')->get();
        return view('Dashboard.mahasiswa_create', compact('dosenPa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nim' => 'required|unique:mahasiswa_details,nim',
            'dosen_pa_id' => 'nullable|exists:users,user_id',
            'angkatan' => 'required|digits:4',
            'fakultas' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'status_mahasiswa' => 'required|in:aktif,cuti,nonaktif,lulus',
        ]);

        // Create user
        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        // Create mahasiswa detail
        $detailData = $request->only([
            'nim', 'dosen_pa_id', 'angkatan', 'fakultas', 'program_studi', 'status_mahasiswa'
        ]);
        $detailData['user_id'] = $user->user_id;

        MahasiswaDetail::create($detailData);

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Mahasiswa berhasil ditambahkan.']);
        }

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan.');
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
        $mahasiswa = User::with('mahasiswaDetail')->findOrFail($id);
        
        return response()->json([
            'user' => $mahasiswa,
            'detail' => $mahasiswa->mahasiswaDetail
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'nim' => 'required|unique:mahasiswa_details,nim,' . $user->user_id . ',user_id',
            'dosen_pa_id' => 'nullable|exists:users,user_id',
            'angkatan' => 'required|digits:4',
            'fakultas' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'status_mahasiswa' => 'required|in:aktif,cuti,nonaktif,lulus',
        ]);

        // Update user
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
        ]);

        // Update password if provided
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Update mahasiswa detail
        $user->mahasiswaDetail->update([
            'nim' => $request->nim,
            'dosen_pa_id' => $request->dosen_pa_id,
            'angkatan' => $request->angkatan,
            'fakultas' => $request->fakultas,
            'program_studi' => $request->program_studi,
            'status_mahasiswa' => $request->status_mahasiswa,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => 'Data mahasiswa berhasil diperbarui.']);
        }

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => 'Mahasiswa berhasil dihapus.']);
        }

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
