<form method="POST" action="{{ route('pasien.reservasi.store') }}">
@csrf

<label>Keluhan</label>
<textarea name="Keterangan" required>{{ old('Keterangan') }}</textarea>

<label>Pilih Dokter & Jam</label>
<select name="ID_Jadwal" required>
    <option value="">-- Pilih Jam --</option>
    @foreach($jadwal as $j)
        <option value="{{ $j->ID_Jadwal }}">
            {{ $j->Nama_Dokter ?? 'Dokter' }} - {{ $j->Jam }}
        </option>
    @endforeach
</select>

<label>Tanggal Kunjungan</label>
<input type="date"
       name="Tanggal_Reservasi"
       value="{{ old('Tanggal_Reservasi') }}"
       required>

<button type="submit">Daftar</button>
</form>
