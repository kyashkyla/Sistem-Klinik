@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Online</h1>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color:red">{{ session('error') }}</div>
    @endif

    <form action="{{ route('pasien.reservasi.store') }}" method="POST">
        @csrf
        <div>
            <label>Jadwal Dokter:</label>
            <select name="ID_Jadwal" required>
                <option value="">-- Pilih Jadwal --</option>
                @foreach($jadwals as $jadwal)
                    <option value="{{ $jadwal->ID_Jadwal }}">
                        {{ $jadwal->dokter->name ?? 'Dokter' }} - {{ $jadwal->Tanggal }} - {{ $jadwal->Jam }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tanggal Kunjungan:</label>
            <input type="date" name="Tanggal_Reservasi" required>
        </div>

        <div>
            <label>Keterangan:</label>
            <textarea name="Keterangan" placeholder="Opsional"></textarea>
        </div>

        <button type="submit">Daftar Sekarang</button>
    </form>
</div>
@endsection
