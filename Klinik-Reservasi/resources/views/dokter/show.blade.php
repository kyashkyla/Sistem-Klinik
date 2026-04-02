@extends('layout')

@section('content')
<h3>Detail Dokter</h3>

<ul class="list-group">
    <li class="list-group-item"><b>ID:</b> {{ $data->ID_Dokter }}</li>
    <li class="list-group-item"><b>Nama:</b> {{ $data->Nama }}</li>
    <li class="list-group-item"><b>Email:</b> {{ $data->Email }}</li>
    <li class="list-group-item"><b>No Telepon:</b> {{ $data->No_Telepon }}</li>
    <li class="list-group-item"><b>Spesialis:</b> {{ $data->Spesialis }}</li>
    <li class="list-group-item"><b>Biodata:</b> {{ $data->Biodata_Diri }}</li>
</ul>

<a href="{{ route('dokter.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection