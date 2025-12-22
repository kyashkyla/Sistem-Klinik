@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Data Pasien</div>
    <div class="card-body">

        <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $p)
            <tr>
                <td>{{ $p->ID_Pasien }}</td>
                <td>{{ $p->Nama }}</td>
                <td>{{ $p->Email }}</td>
                <td>{{ $p->No_Telepon }}</td>
                <td>
                    <a href="{{ route('pasien.show', $p->ID_Pasien) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('pasien.edit', $p->ID_Pasien) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('pasien.destroy', $p->ID_Pasien) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
@endsection