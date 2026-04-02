@extends('layout')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">📅 Jadwal Dokter</h5>
            <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success btn-sm">+ Tambah Jadwal</a>
        </div>
    </div>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($data->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Dokter</th>
                            <th>Spesialis</th>
                            <th>Hari</th>
                            <th>Jam Kerja</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $jadwal)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><strong>{{ $jadwal->dokter->Nama ?? 'N/A' }}</strong></td>
                                <td>{{ $jadwal->dokter->Spesialis ?? 'N/A' }}</td>
                                <td>
                                    @php
                                        $daysOfWeek = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                    @endphp
                                    {{ $daysOfWeek[$jadwal->Hari] ?? 'N/A' }}
                                </td>
                                <td>{{ $jadwal->Jam_Mulai }} - {{ $jadwal->Jam_Selesai }}</td>
                                <td>
                                    @if($jadwal->Status_Slot === 'Tersedia')
                                        <span class="badge bg-success">✓ {{ $jadwal->Status_Slot }}</span>
                                    @else
                                        <span class="badge bg-danger">✗ {{ $jadwal->Status_Slot }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.jadwal.edit', $jadwal->ID_Jadwal) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('admin.jadwal.destroy', $jadwal->ID_Jadwal) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                📭 Belum ada jadwal dokter. <a href="{{ route('admin.jadwal.create') }}">Buat jadwal baru</a>
            </div>
        @endif
    </div>
</div>
@endsection
