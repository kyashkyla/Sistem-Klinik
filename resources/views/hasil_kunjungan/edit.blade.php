@extends('layout')

@section('content')
<h3>Edit Hasil Kunjungan</h3>

<form method="POST" action="{{ route('hasil_kunjungan.update', $data->ID_Hasil) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>ID Reservasi</label>
        <select name="ID_Reservasi" class="form-control">
            @foreach($reservasi as $r)
                <option value="{{ $r->ID_Reservasi }}" @if($data->ID_Reservasi == $r->ID_Reservasi) selected @endif>
                    {{ $r->ID_Reservasi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Kunjungan</label>
        <input type="date" name="Tanggal_Kunjungan" value="{{ $data->Tanggal_Kunjungan }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Catatan Dokter</label>
        <textarea name="Catatan_Dokter" class="form-control">{{ $data->Catatan_Dokter }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection