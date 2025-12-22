@extends('layout')

@section('content')
<h3>Detail Jadwal Dokter</h3>

<ul class="list-group">
    <li class="list-group-item"><b>ID:</b> {{ $data->ID_Jadwal }}</li>
    <li class="list-group-item"><b>Tanggal:</b> {{ $data->Tanggal }}</li>
    <li class="list-group-item"><b>Waktu:</b> {{ $data->Waktu }}</li>
    <li class="list-group-item"><b>Status:</b> {{ $data->Status_Slot }}</li>
    <li class="list-group-item"><b>Dokter:</b> {{ $data->dokter->Nama }}</li>
</ul>

<a href="{{ route('jadwal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection