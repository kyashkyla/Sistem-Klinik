@extends('layout')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0">✏️ Edit Jadwal Dokter</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->ID_Jadwal) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Dokter <span class="text-danger">*</span></label>
                <select name="ID_Dokter" class="form-select @error('ID_Dokter') is-invalid @enderror" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokter as $d)
                        <option value="{{ $d->ID_Dokter }}" {{ $jadwal->ID_Dokter == $d->ID_Dokter ? 'selected' : '' }}>
                            {{ $d->Nama }} ({{ $d->Spesialis }})
                        </option>
                    @endforeach
                </select>
                @error('ID_Dokter')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Hari Kerja <span class="text-danger">*</span></label>
                <select name="Hari" class="form-select @error('Hari') is-invalid @enderror" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="1" {{ $jadwal->Hari == 1 ? 'selected' : '' }}>Senin</option>
                    <option value="2" {{ $jadwal->Hari == 2 ? 'selected' : '' }}>Selasa</option>
                    <option value="3" {{ $jadwal->Hari == 3 ? 'selected' : '' }}>Rabu</option>
                    <option value="4" {{ $jadwal->Hari == 4 ? 'selected' : '' }}>Kamis</option>
                    <option value="5" {{ $jadwal->Hari == 5 ? 'selected' : '' }}>Jumat</option>
                    <option value="6" {{ $jadwal->Hari == 6 ? 'selected' : '' }}>Sabtu</option>
                    <option value="7" {{ $jadwal->Hari == 7 ? 'selected' : '' }}>Minggu</option>
                </select>
                @error('Hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                        <input type="time" name="Jam_Mulai" class="form-control @error('Jam_Mulai') is-invalid @enderror" 
                               value="{{ $jadwal->Jam_Mulai }}" required>
                        @error('Jam_Mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                        <input type="time" name="Jam_Selesai" class="form-control @error('Jam_Selesai') is-invalid @enderror" 
                               value="{{ $jadwal->Jam_Selesai }}" required>
                        @error('Jam_Selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Slot <span class="text-danger">*</span></label>
                <select name="Status_Slot" class="form-select @error('Status_Slot') is-invalid @enderror" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Tersedia" {{ $jadwal->Status_Slot == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Penuh" {{ $jadwal->Status_Slot == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                </select>
                @error('Status_Slot')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">❌ Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
