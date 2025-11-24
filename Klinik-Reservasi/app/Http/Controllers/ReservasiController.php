<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pasien;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $data = Reservasi::with(['pasien', 'jadwal'])->get();
        return view('reservasi.index', compact('data'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        $jadwal = Jadwal::all();
        return view('reservasi.create', compact('pasien', 'jadwal'));
    }

    public function store(Request $request)
    {
        Reservasi::create($request->all());
        return redirect()->route('reservasi.index');
    }

    public function show($id)
    {
        $data = Reservasi::with(['pasien', 'jadwal'])->findOrFail($id);
        return view('reservasi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Reservasi::findOrFail($id);
        $pasien = Pasien::all();
        $jadwal = Jadwal::all();
        return view('reservasi.edit', compact('data', 'pasien', 'jadwal'));
    }

    public function update(Request $request, $id)
    {
        $data = Reservasi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('reservasi.index');
    }

    public function destroy($id)
    {
        Reservasi::destroy($id);
        return redirect()->route('reservasi.index');
    }
}