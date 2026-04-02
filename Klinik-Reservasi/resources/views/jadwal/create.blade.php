@extends('layout')

@section('content')
<h3>Tambah Jadwal Dokter</h3>

<form method="POST" action="{{ route('jadwal.store') }}">
    @csrf

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="Tanggal" class="form-control">
    </div>

    <div class="mb-3">
        <label>Waktu</label>
        <input type="time" name="Waktu" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status Slot</label>
        <input name="Status_Slot" class="form-control">
    </div>

    <div class="mb-3">
        <label>Dokter</label>
        <select name="ID_Dokter" class="form-control">
            @foreach($dokter as $d)
                <option value="{{ $d->ID_Dokter }}">{{ $d->Nama }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection