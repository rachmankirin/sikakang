<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view('Dashboard.dashboard_admin_prodi', compact('fakultas', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'fakultas_id' => 'required'

        ]);
        $validated['code'] = 'FAK' . str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
        Prodi::create($validated);
        return redirect('/dashboard-admin/prodi');
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
