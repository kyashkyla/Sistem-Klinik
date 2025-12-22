@extends('layout')

@section('content')
<h3>Detail Reservasi</h3>

<ul class="list-group">
    <li class="list-group-item"><b>ID:</b> {{ $data->ID_Reservasi }}</li>
    <li class="list-group-item"><b>Pasien:</b> {{ $data->pasien->Nama }}</li>
    <li class="list-group-item"><b>Jadwal:</b> {{ $data->jadwal->Tanggal }} {{ $data->jadwal->Waktu }}</li>
    <li class="list-group-item"><b>Tanggal Reservasi:</b> {{ $data->Tanggal_Reservasi }}</li>
    <li class="list-group-item"><b>Status:</b> {{ $data->Status }}</li>
    <li class="list-group-item"><b>Keterangan:</b> {{ $data->Keterangan }}</li>
</ul>

<a href="{{ route('reservasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection