@extends('layout')

@section('content')
<h3>Detail Pasien</h3>

<ul class="list-group">
    <li class="list-group-item"><b>ID:</b> {{ $data->ID_Pasien }}</li>
    <li class="list-group-item"><b>Nama:</b> {{ $data->Nama }}</li>
    <li class="list-group-item"><b>Email:</b> {{ $data->Email }}</li>
    <li class="list-group-item"><b>No Telepon:</b> {{ $data->No_Telepon }}</li>
    <li class="list-group-item"><b>Alamat:</b> {{ $data->Alamat }}</li>
    <li class="list-group-item"><b>Biodata:</b> {{ $data->Biodata_Diri }}</li>
</ul>

<a href="{{ route('pasien.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
