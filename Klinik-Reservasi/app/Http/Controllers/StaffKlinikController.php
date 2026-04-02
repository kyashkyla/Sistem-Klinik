<?php

namespace App\Http\Controllers;

use App\Models\StaffKlinik;
use Illuminate\Http\Request;

class StaffKlinikController extends Controller
{
    public function index()
    {
        $data = StaffKlinik::all();
        return view('staff_klinik.index', compact('data'));
    }

    public function create()
    {
        return view('staff_klinik.create');
    }

    public function store(Request $request)
    {
        StaffKlinik::create($request->all());
        return redirect()->route('staff_klinik.index');
    }

    public function show($id)
    {
        $data = StaffKlinik::findOrFail($id);
        return view('staff_klinik.show', compact('data'));
    }

    public function edit($id)
    {
        $data = StaffKlinik::findOrFail($id);
        return view('staff_klinik.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = StaffKlinik::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('staff_klinik.index');
    }

    public function destroy($id)
    {
        StaffKlinik::destroy($id);
        return redirect()->route('staff_klinik.index');
    }
}