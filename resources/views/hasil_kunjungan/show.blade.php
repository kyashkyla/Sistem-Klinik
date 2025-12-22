@extends('layout')

@section('content')
<h3>Detail Hasil Kunjungan</h3>

<ul class="list-group">
    <li class="list-group-item"><b>ID:</b> {{ $data->ID_Hasil }}</li>
    <li class="list-group-item"><b>ID Reservasi:</b> {{ $data->ID_Reservasi }}</li>
    <li class="list-group-item"><b>Tanggal:</b> {{ $data->Tanggal_Kunjungan }}</li>
    <li class="list-group-item"><b>Catatan Dokter:</b> {{ $data->Catatan_Dokter }}</li>
</ul>

<a href="{{ route('hasil_kunjungan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection