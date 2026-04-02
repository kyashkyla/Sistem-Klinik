<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::with('dokter')->get();
        return view('jadwal.index', compact('data'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        return view('jadwal.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        Jadwal::create($request->all());
        return redirect()->route('jadwal.index');
    }

    public function show($id)
    {
        $data = Jadwal::with('dokter')->findOrFail($id);
        return view('jadwal.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Jadwal::findOrFail($id);
        $dokter = Dokter::all();
        return view('jadwal.edit', compact('data', 'dokter'));
    }

    public function update(Request $request, $id)
    {
        $data = Jadwal::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('jadwal.index');
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect()->route('jadwal.index');
    }
}