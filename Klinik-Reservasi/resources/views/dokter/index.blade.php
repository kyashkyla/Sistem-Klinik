@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Data Dokter</div>
    <div class="card-body">

        <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Spesialis</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $d)
            <tr>
                <td>{{ $d->ID_Dokter }}</td>
                <td>{{ $d->Nama }}</td>
                <td>{{ $d->Email }}</td>
                <td>{{ $d->Spesialis }}</td>
                <td>
                    <a href="{{ route('dokter.show', $d->ID_Dokter) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('dokter.edit', $d->ID_Dokter) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('dokter.destroy', $d->ID_Dokter) }}" method="POST" style="display:inline;">
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