<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::all();
        return view('dokter.index', compact('data'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        Dokter::create($request->all());
        return redirect()->route('dokter.index');
    }

    public function show($id)
    {
        $data = Dokter::findOrFail($id);
        return view('dokter.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Dokter::findOrFail($id);
        return view('dokter.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Dokter::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('dokter.index');
    }

    public function destroy($id)
    {
        Dokter::destroy($id);
        return redirect()->route('dokter.index');
    }
}