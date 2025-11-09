<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    // Contoh data dinamis untuk chart IPS
    $labels = ['Semester 1', 'Semester 2', 'Semester 3'];
    $ips    = [4.0, 4.0, 0.0];

    // Pastikan nama view sesuai path sebenarnya (folder 'Dashboard')
    return view('Dashboard.dashboard_mahasiswa', compact('labels', 'ips'));
});
