@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Data Staff Klinik</div>
    <div class="card-body">

        <a href="{{ route('staff_klinik.create') }}" class="btn btn-primary mb-3">Tambah Staff</a>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $s)
            <tr>
                <td>{{ $s->ID_Staff }}</td>
                <td>{{ $s->Nama }}</td>
                <td>{{ $s->Email }}</td>
                <td>{{ $s->No_Telepon }}</td>
                <td>
                    <a href="{{ route('staff_klinik.show', $s->ID_Staff) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('staff_klinik.edit', $s->ID_Staff) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('staff_klinik.destroy', $s->ID_Staff) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus staff?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
@endsection
