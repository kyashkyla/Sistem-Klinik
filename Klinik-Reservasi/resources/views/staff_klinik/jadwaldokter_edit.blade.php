<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Jadwal - Staff Klinik</title>

    <style>
        body { margin:0; font-family: Arial, sans-serif; background-color: #eef7f7; }
        .header { background-color: #0097a7; color:#fff; padding:15px 25px; display:flex; justify-content:space-between; align-items:center; }
        .logo-box { display:flex; align-items:center; gap:10px; font-size:22px; font-weight:bold; }
        .logo-circle { background:white; color:#0097a7; border-radius:50%; width:45px; height:45px; display:flex; align-items:center; justify-content:center; font-size:30px; font-weight:900; }
        .card { max-width:720px; margin:80px auto 140px; background:white; border-radius:16px; padding:22px; box-shadow:0 10px 25px rgba(0,0,0,0.12); }
        label { display:block; margin-top:12px; font-weight:600; font-size:14px; }
        input[type=time], select { width:100%; padding:10px; border-radius:8px; border:1px solid #ccc; margin-top:6px; }
        .row { display:flex; gap:12px; }
        .col { flex:1; }
        .btn { padding:12px 16px; border-radius:10px; border:none; cursor:pointer; font-weight:700; }
        .btn-primary { background:#0097a7; color:white; }
        .btn-secondary { background:#e0e0e0; color:#333; }
        .bottom-nav { position:fixed; bottom:0; left:0; width:100%; background:#0097a7; display:flex; justify-content:space-around; padding:10px 0; z-index:999; }
        .bottom-nav div { text-align:center; color:white; font-weight:600; cursor:pointer; }
        .notification-badge { position:absolute; top:-5px; right:5px; background:#ff6b6b; color:white; border-radius:50%; width:20px; height:20px; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:bold; }
        .actions { display:flex; gap:12px; margin-top:18px; }
        .error { color: #b00020; margin-top:8px; }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="logo-box">
        <div class="logo-circle">+</div>
        Klinik Sejahtera
    </div>
    <div>
        <a href="{{ route('logout') }}" style="background:#ff6b6b;color:white;padding:8px 12px;border-radius:6px;text-decoration:none;font-weight:700;">Logout</a>
    </div>
</div>

<div class="card">
    <h2 style="text-align:center;color:#006064;margin:0 0 10px;">Edit Jadwal Dokter</h2>

    @if ($errors->any())
        <div class="error">
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staff_klinik.jadwaldokter.update', $jadwal->ID_Jadwal) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="ID_Dokter">Pilih Dokter</label>
        <select id="ID_Dokter" name="ID_Dokter" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach($dokter as $d)
                <option value="{{ $d->ID_Dokter }}" {{ $jadwal->ID_Dokter == $d->ID_Dokter ? 'selected' : '' }}>{{ $d->Nama }} ({{ $d->Spesialis }})</option>
            @endforeach
        </select>

        <label for="Hari">Hari Kerja</label>
        <select id="Hari" name="Hari" required>
            <option value="">-- Pilih Hari --</option>
            <option value="1" {{ $jadwal->Hari == 1 ? 'selected' : '' }}>Senin</option>
            <option value="2" {{ $jadwal->Hari == 2 ? 'selected' : '' }}>Selasa</option>
            <option value="3" {{ $jadwal->Hari == 3 ? 'selected' : '' }}>Rabu</option>
            <option value="4" {{ $jadwal->Hari == 4 ? 'selected' : '' }}>Kamis</option>
            <option value="5" {{ $jadwal->Hari == 5 ? 'selected' : '' }}>Jumat</option>
            <option value="6" {{ $jadwal->Hari == 6 ? 'selected' : '' }}>Sabtu</option>
            <option value="7" {{ $jadwal->Hari == 7 ? 'selected' : '' }}>Minggu</option>
        </select>

        <div class="row" style="margin-top:12px;">
            <div class="col">
                <label for="Jam_Mulai">Jam Mulai</label>
                <input type="time" id="Jam_Mulai" name="Jam_Mulai" value="{{ \Carbon\Carbon::parse($jadwal->Jam_Mulai)->format('H:i') }}" required>
            </div>
            <div class="col">
                <label for="Jam_Selesai">Jam Selesai</label>
                <input type="time" id="Jam_Selesai" name="Jam_Selesai" value="{{ \Carbon\Carbon::parse($jadwal->Jam_Selesai)->format('H:i') }}" required>
            </div>
        </div>

        <label for="Status_Slot">Status Slot</label>
        <select id="Status_Slot" name="Status_Slot" required>
            <option value="Tersedia" {{ $jadwal->Status_Slot == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Penuh" {{ $jadwal->Status_Slot == 'Penuh' ? 'selected' : '' }}>Penuh</option>
        </select>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Update Jadwal</button>
            <a href="{{ route('staff_klinik.jadwaldokter.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<!-- BOTTOM NAV -->
<div class="bottom-nav">
    <div onclick="location.href='{{ route('staff_klinik.dashboard') }}'">
        <svg width="28" height="28" fill="white" viewBox="0 0 24 24"><path d="M3 12l9-9 9 9v9H3z"/></svg>
        <div>Menu</div>
    </div>
    <div onclick="location.href='{{ route('staff_klinik.riwayat') }}'">
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-9"/><polyline points="12 7 12 12 15 15"/></svg>
        <div>Riwayat</div>
    </div>
    <div onclick="location.href='{{ route('staff_klinik.notifikasi') }}'">
        <svg width="26" height="26" fill="white" viewBox="0 0 24 24"><path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9z"/></svg>
        <div>Notifikasi @if(isset($countPending) && $countPending>0) <span class="notification-badge">{{ $countPending }}</span> @endif</div>
    </div>
    <div onclick="location.href='{{ route('staff_klinik.profil') }}'">
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/><path d="M6 18c0-3 3-5 6-5s6 2 6 5"/></svg>
        <div>Saya</div>
    </div>
</div>

</body>
</html>
