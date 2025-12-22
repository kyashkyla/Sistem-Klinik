@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Data Hasil Kunjungan</div>
    <div class="card-body">

        <a href="{{ route('hasil_kunjungan.create') }}" class="btn btn-primary mb-3">Tambah Hasil</a>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Reservasi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $h)
            <tr>
                <td>{{ $h->ID_Hasil }}</td>
                <td>{{ $h->reservasi->ID_Reservasi }}</td>
                <td>{{ $h->Tanggal_Kunjungan }}</td>
                <td>
                    <a href="{{ route('hasil_kunjungan.show', $h->ID_Hasil) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('hasil_kunjungan.edit', $h->ID_Hasil) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('hasil_kunjungan.destroy', $h->ID_Hasil) }}" method="POST" style="display:inline;">
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