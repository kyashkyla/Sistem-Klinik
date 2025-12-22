@extends('layout')

@section('content')
<h3>Edit Pasien</h3>

<form method="POST" action="{{ route('pasien.update', $data->ID_Pasien) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input name="Nama" value="{{ $data->Nama }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <input name="Alamat" value="{{ $data->Alamat }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>No Telepon</label>
        <input name="No_Telepon" value="{{ $data->No_Telepon }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="Email" value="{{ $data->Email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Biodata</label>
        <textarea name="Biodata_Diri" class="form-control">{{ $data->Biodata_Diri }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
