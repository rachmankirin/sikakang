<?php

namespace App\Http\Controllers;

use App\Models\DosenDetail;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = User::where('role', 'dosen')->get();

        return view('Dashboard.dashboard_admin_dosen', compact('dosen'));
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
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nidn' => 'required',
            'pangkat' => 'required',
            'keahlian' => 'required'
        ]);


        $user = User::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'role' => 'dosen'
        ]);

        DosenDetail::create([
            'user_id' => $user->id,
            'nidn' => $validated['nidn'],
            'jabatan_fungsional' => $validated['pangkat'],
            'bidang_keahlian' => $validated['keahlian']
        ]);
        return redirect('/dashboard-admin');
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
