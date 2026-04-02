<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienDashboardController extends Controller
{
    public function dashboard()
    {
        $pasien = Pasien::find(session('pasien_id'));
        return view('pasien.dashboard', compact('pasien'));
    }
}
