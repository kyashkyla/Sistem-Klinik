@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Data Jadwal Dokter</div>
    <div class="card-body">

        <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Dokter</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $j)
            <tr>
                <td>{{ $j->ID_Jadwal }}</td>
                <td>{{ $j->Tanggal }}</td>
                <td>{{ $j->Waktu }}</td>
                <td>{{ $j->Status_Slot }}</td>
                <td>{{ $j->dokter->Nama }}</td>
                <td>
                    <a href="{{ route('jadwal.show', $j->ID_Jadwal) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('jadwal.edit', $j->ID_Jadwal) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('jadwal.destroy', $j->ID_Jadwal) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
@endsection