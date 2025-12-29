@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Edit Jadwal Dokter</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('staff_klinik.jadwaldokter.update', $jadwal->ID_Jadwal) }}" method="POST" class="card shadow-sm p-4">
                @csrf
                @method('PUT')

                <!-- Doctor Selection -->
                <div class="mb-3">
                    <label for="ID_Dokter" class="form-label fw-bold">Pilih Dokter</label>
                    <select class="form-select @error('ID_Dokter') is-invalid @enderror" 
                            id="ID_Dokter" name="ID_Dokter" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokter as $d)
                            <option value="{{ $d->ID_Dokter }}" 
                                    {{ $jadwal->ID_Dokter == $d->ID_Dokter ? 'selected' : '' }}>
                                {{ $d->Nama }} ({{ $d->Spesialis }})
                            </option>
                        @endforeach
                    </select>
                    @error('ID_Dokter')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Day of Week Selection -->
                <div class="mb-3">
                    <label for="Hari" class="form-label fw-bold">Hari Kerja</label>
                    <select class="form-select @error('Hari') is-invalid @enderror" 
                            id="Hari" name="Hari" required>
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
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Time Range -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="Jam_Mulai" class="form-label fw-bold">Jam Mulai</label>
                        <input type="time" class="form-control @error('Jam_Mulai') is-invalid @enderror" 
                               id="Jam_Mulai" name="Jam_Mulai" 
                               value="{{ $jadwal->Jam_Mulai }}" required>
                        @error('Jam_Mulai')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Jam_Selesai" class="form-label fw-bold">Jam Selesai</label>
                        <input type="time" class="form-control @error('Jam_Selesai') is-invalid @enderror" 
                               id="Jam_Selesai" name="Jam_Selesai" 
                               value="{{ $jadwal->Jam_Selesai }}" required>
                        @error('Jam_Selesai')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Status Slot -->
                <div class="mb-3">
                    <label for="Status_Slot" class="form-label fw-bold">Status Slot</label>
                    <select class="form-select @error('Status_Slot') is-invalid @enderror" 
                            id="Status_Slot" name="Status_Slot" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Tersedia" {{ $jadwal->Status_Slot == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Penuh" {{ $jadwal->Status_Slot == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                    @error('Status_Slot')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-check-circle"></i> Update Jadwal
                    </button>
                    <a href="{{ route('staff_klinik.jadwaldokter.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
