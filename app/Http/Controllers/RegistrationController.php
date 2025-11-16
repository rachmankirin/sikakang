<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function detail()
    {
        // your logic here
        return view('registration.registrasi');
    }
}