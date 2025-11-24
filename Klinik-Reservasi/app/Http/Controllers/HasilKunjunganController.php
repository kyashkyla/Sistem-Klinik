<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilKunjunganController extends Controller
{
    //
}

namespace App\Http\Controllers;

use App\Models\HasilKunjungan;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class HasilKunjunganController extends Controller
{
    public function index()
    {
        $data = HasilKunjungan::with('reservasi')->get();
        return view('hasil_kunjungan.index', compact('data'));
    }

    public function create()
    {
        $reservasi = Reservasi::all();
        return view('hasil_kunjungan.create', compact('reservasi'));
    }

    public function store(Request $request)
    {
        HasilKunjungan::create($request->all());
        return redirect()->route('hasil_kunjungan.index');
    }

    public function show($id)
    {
        $data = HasilKunjungan::with('reservasi')->findOrFail($id);
        return view('hasil_kunjungan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = HasilKunjungan::findOrFail($id);
        $reservasi = Reservasi::all();
        return view('hasil_kunjungan.edit', compact('data', 'reservasi'));
    }

    public function update(Request $request, $id)
    {
        $data = HasilKunjungan::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('hasil_kunjungan.index');
    }

    public function destroy($id)
    {
        HasilKunjungan::destroy($id);
        return redirect()->route('hasil_kunjungan.index');
    }
}
