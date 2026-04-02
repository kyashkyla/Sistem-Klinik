@extends('layout')

@section('content')
<h3>Edit Jadwal</h3>

<form method="POST" action="{{ route('jadwal.update', $data->ID_Jadwal) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="Tanggal" value="{{ $data->Tanggal }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Waktu</label>
        <input type="time" name="Waktu" value="{{ $data->Waktu }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status Slot</label>
        <input name="Status_Slot" value="{{ $data->Status_Slot }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Dokter</label>
        <select name="ID_Dokter" class="form-control">
            @foreach($dokter as $d)
                <option value="{{ $d->ID_Dokter }}" @if($data->ID_Dokter == $d->ID_Dokter) selected @endif>
                    {{ $d->Nama }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection