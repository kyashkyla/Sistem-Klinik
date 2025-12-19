<?php

namespace App\Http\Controllers;

class StaffKlinikDashboardController extends Controller
{
    public function index()
    {
        return view('staff_klinik.dashboard');
    }
}