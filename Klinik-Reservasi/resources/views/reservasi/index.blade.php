@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Data Reservasi</div>
    <div class="card-body">

        <a href="{{ route('reservasi.create') }}" class="btn btn-primary mb-3">Tambah Reservasi</a>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Pasien</th>
                <th>Jadwal</th>
                <th>Tanggal Reservasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $r)
            <tr>
                <td>{{ $r->ID_Reservasi }}</td>
                <td>{{ $r->pasien->Nama }}</td>
                <td>{{ $r->jadwal->Tanggal }} {{ $r->jadwal->Waktu }}</td>
                <td>{{ $r->Tanggal_Reservasi }}</td>
                <td>{{ $r->Status }}</td>
                <td>
                    <a href="{{ route('reservasi.show', $r->ID_Reservasi) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('reservasi.edit', $r->ID_Reservasi) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('reservasi.destroy', $r->ID_Reservasi) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus reservasi?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
@endsection