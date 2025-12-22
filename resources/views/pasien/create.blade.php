@extends('layout')

@section('content')
<h3>Tambah Pasien</h3>

<form method="POST" action="{{ route('pasien.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input name="Nama" class="form-control">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <input name="Alamat" class="form-control">
    </div>

    <div class="mb-3">
        <label>No Telepon</label>
        <input name="No_Telepon" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="Email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input name="Password" type="password" class="form-control">
    </div>

    <div class="mb-3">
        <label>Biodata</label>
        <textarea name="Biodata_Diri" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
