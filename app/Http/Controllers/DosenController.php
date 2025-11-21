<?php

namespace App\Http\Controllers;

use App\Models\DosenDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    /**
     * Dashboard for dosen role.
     */
    public function dashboard()
    {
        return view('Dashboard.dashboard_dosen');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = User::where('role', 'dosen')->with('dosenDetail')->get();

        return view('Dashboard.dashboard_admin_dosen', compact('dosen'));
    }

    /**
     * Profile page for logged-in dosen (read-only view).
     */
    public function profile()
    {
        $user = Auth::user();
        $user->load('dosenDetail');
        $detail = $user->dosenDetail;

        $bidangRaw = $detail?->bidang_keahlian ?? '';
        $bidangList = $bidangRaw
            ? array_filter(array_map('trim', explode(',', $bidangRaw)))
            : [];

        $lecturer = (object) [
            'user_id' => $user->user_id,
            'name' => $user->nama_lengkap,
            'email' => $user->email,
            'nidn' => $detail?->nidn ?? '-',
            'jabatan_fungsional' => $detail?->jabatan_fungsional ?? '-',
            'bidang_keahlian_raw' => $bidangRaw,
            'bidang_keahlian_list' => $bidangList,
            // Data berikut disimpan di dosen_details (nullable, fallback placeholder)
            'jenis_kelamin' => $detail?->jenis_kelamin ?? 'Belum diatur',
            'program_studi' => $detail?->program_studi ?? 'Belum diatur',
            'fakultas' => $detail?->fakultas ?? 'Belum diatur',
            'alamat' => $detail?->alamat ?? 'Belum diatur',
            'no_hp' => $detail?->no_hp ?? 'Belum diatur',
            'status' => 'Aktif',
        ];

        return view('Profile.Profile_dosen', compact('lecturer'));
    }

    /**
     * Edit form (separate view) for logged-in dosen.
     */
    public function editProfile()
    {
        $user = Auth::user();
        $user->load('dosenDetail');
        $detail = $user->dosenDetail;

        $bidangRaw = $detail?->bidang_keahlian ?? '';

        $lecturer = (object) [
            'user_id' => $user->user_id,
            'name' => $user->nama_lengkap,
            'email' => $user->email,
            'nidn' => $detail?->nidn ?? '',
            'jabatan_fungsional' => $detail?->jabatan_fungsional ?? '',
            'bidang_keahlian_raw' => $bidangRaw,
            'jenis_kelamin' => $detail?->jenis_kelamin ?? '',
            'program_studi' => $detail?->program_studi ?? '',
            'fakultas' => $detail?->fakultas ?? '',
            'alamat' => $detail?->alamat ?? '',
            'no_hp' => $detail?->no_hp ?? '',
        ];

        return view('Profile.Profile_dosen_edit', compact('lecturer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'nidn' => 'required|string',
            'pangkat' => 'required|string',
            'keahlian' => 'required|string',
            'password' => 'required|min:5'
        ]);


        $user = User::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'role' => 'dosen',
            'password' => bcrypt($validated['password'])
        ]);

        DosenDetail::updateOrCreate(
            ['user_id' => $user->user_id],
            [
                'nidn' => $validated['nidn'],
                'jabatan_fungsional' => $validated['pangkat'],
                'bidang_keahlian' => $validated['keahlian']
            ]
        );

        return redirect('/dashboard-admin/dosen')->with('success', 'Dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen = User::where('role', 'dosen')->with('dosenDetail')->findOrFail($id);

        return response()->json([
            'user_id' => $dosen->user_id,
            'nama_lengkap' => $dosen->nama_lengkap,
            'email' => $dosen->email,
            'nidn' => $dosen->dosenDetail->nidn ?? '',
            'pangkat' => $dosen->dosenDetail->jabatan_fungsional ?? '',
            'keahlian' => $dosen->dosenDetail->bidang_keahlian ?? '',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect('/dashboard-admin/dosen');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosen = User::where('role', 'dosen')->with('dosenDetail')->findOrFail($id);

        $validated =  $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $dosen->user_id . ',user_id',
            'nidn' => 'required|string',
            'pangkat' => 'required|string',
            'keahlian' => 'required|string',
            'password' => 'nullable|min:5'
        ]);

        $updateUser = [
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $updateUser['password'] = bcrypt($validated['password']);
        }

        $dosen->update($updateUser);

        DosenDetail::updateOrCreate(
            ['user_id' => $dosen->user_id],
            [
                'nidn' => $validated['nidn'],
                'jabatan_fungsional' => $validated['pangkat'],
                'bidang_keahlian' => $validated['keahlian']
            ]
        );

        return redirect('/dashboard-admin/dosen')->with('success', 'Data dosen berhasil diperbarui');
    }

    /**
     * Update profile for logged-in dosen (self-service).
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $detail = $user->dosenDetail;

        $validated = $request->validate([
            'nama_lengkap' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->user_id . ',user_id',
            'nidn' => 'sometimes|required|string',
            'jabatan_fungsional' => 'sometimes|nullable|string',
            'bidang_keahlian' => 'sometimes|nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'program_studi' => 'nullable|string',
            'fakultas' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string',
        ]);

        // Update user core info jika dikirim
        $updateUser = [];
        if (isset($validated['nama_lengkap'])) {
            $updateUser['nama_lengkap'] = $validated['nama_lengkap'];
        }
        if (isset($validated['email'])) {
            $updateUser['email'] = $validated['email'];
        }
        if (!empty($updateUser)) {
            $user->update($updateUser);
        }

        DosenDetail::updateOrCreate(
            ['user_id' => $user->user_id],
            [
                'nidn' => $validated['nidn'] ?? $detail->nidn ?? null,
                'jabatan_fungsional' => $validated['jabatan_fungsional'] ?? $detail->jabatan_fungsional ?? null,
                'bidang_keahlian' => $validated['bidang_keahlian'] ?? $detail->bidang_keahlian ?? null,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? $detail->jenis_kelamin ?? null,
                'program_studi' => $validated['program_studi'] ?? $detail->program_studi ?? null,
                'fakultas' => $validated['fakultas'] ?? $detail->fakultas ?? null,
                'alamat' => $validated['alamat'] ?? $detail->alamat ?? null,
                'no_hp' => $validated['no_hp'] ?? $detail->no_hp ?? null,
            ]
        );

        return redirect()->route('dosen.profile')->with('success', 'Profil dosen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = User::where('role', 'dosen')->findOrFail($id);
        $dosen->delete();

        return redirect('/dashboard-admin/dosen')->with('success', 'Dosen berhasil dihapus');
    }
}
