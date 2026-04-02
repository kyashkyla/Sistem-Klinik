@extends('layout')

@section('content')
<h3>Edit Reservasi</h3>

<form method="POST" action="{{ route('reservasi.update', $data->ID_Reservasi) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Pasien</label>
        <select name="ID_Pasien" class="form-control">
            @foreach($pasien as $p)
                <option value="{{ $p->ID_Pasien }}" @if($data->ID_Pasien == $p->ID_Pasien) selected @endif>
                    {{ $p->Nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Jadwal</label>
        <select name="ID_Jadwal" class="form-control">
            @foreach($jadwal as $j)
                <option value="{{ $j->ID_Jadwal }}" @if($data->ID_Jadwal == $j->ID_Jadwal) selected @endif>
                    {{ $j->Tanggal }} - {{ $j->Waktu }} ({{ $j->dokter->Nama }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Reservasi</label>
        <input type="date" name="Tanggal_Reservasi" value="{{ $data->Tanggal_Reservasi }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <input name="Status" value="{{ $data->Status }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="Keterangan" class="form-control">{{ $data->Keterangan }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection