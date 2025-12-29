@extends('layout')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">➕ Tambah Jadwal Dokter</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.jadwal.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Dokter <span class="text-danger">*</span></label>
                <select name="ID_Dokter" class="form-select @error('ID_Dokter') is-invalid @enderror" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokter as $d)
                        <option value="{{ $d->ID_Dokter }}" {{ old('ID_Dokter') == $d->ID_Dokter ? 'selected' : '' }}>
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
                    <option value="1" {{ old('Hari') == '1' ? 'selected' : '' }}>Senin</option>
                    <option value="2" {{ old('Hari') == '2' ? 'selected' : '' }}>Selasa</option>
                    <option value="3" {{ old('Hari') == '3' ? 'selected' : '' }}>Rabu</option>
                    <option value="4" {{ old('Hari') == '4' ? 'selected' : '' }}>Kamis</option>
                    <option value="5" {{ old('Hari') == '5' ? 'selected' : '' }}>Jumat</option>
                    <option value="6" {{ old('Hari') == '6' ? 'selected' : '' }}>Sabtu</option>
                    <option value="7" {{ old('Hari') == '7' ? 'selected' : '' }}>Minggu</option>
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
                               value="{{ old('Jam_Mulai') }}" required>
                        @error('Jam_Mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                        <input type="time" name="Jam_Selesai" class="form-control @error('Jam_Selesai') is-invalid @enderror" 
                               value="{{ old('Jam_Selesai') }}" required>
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
                    <option value="Tersedia" {{ old('Status_Slot') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Penuh" {{ old('Status_Slot') == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                </select>
                @error('Status_Slot')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">💾 Simpan</button>
                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">❌ Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
