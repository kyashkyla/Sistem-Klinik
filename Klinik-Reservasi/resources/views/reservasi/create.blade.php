@extends('layout')

@section('content')
<h3>Tambah Reservasi</h3>

<form method="POST" action="{{ route('reservasi.store') }}">
    @csrf

    <div class="mb-3">
        <label>Pasien</label>
        <select name="ID_Pasien" class="form-control">
            @foreach($pasien as $p)
                <option value="{{ $p->ID_Pasien }}">{{ $p->Nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Jadwal</label>
        <select name="ID_Jadwal" class="form-control">
            @foreach($jadwal as $j)
                <option value="{{ $j->ID_Jadwal }}">
                    {{ $j->Tanggal }} - {{ $j->Waktu }} ({{ $j->dokter->Nama }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Reservasi</label>
        <input type="date" name="Tanggal_Reservasi" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <input name="Status" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="Keterangan" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection