<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal Dokter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #eef7f7;
            padding-bottom: 100px;
        }

        .header {
            background-color: #0097a7;
            color: white;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-circle {
            background: white;
            color: #0097a7;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 900;
        }

        .header-title {
            font-size: 20px;
            font-weight: bold;
        }

        .logout-btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .container {
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
        }

        .page-title {
            color: #006064;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #0097a7;
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0f2f1;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', Arial, sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #0097a7;
            box-shadow: 0 0 0 3px rgba(0, 151, 167, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .error-message {
            background: #ff6b6b;
            color: white;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .error-message ul {
            margin: 0;
            padding-left: 20px;
        }

        .error-message li {
            margin: 4px 0;
        }

        .input-error {
            border-color: #ff6b6b !important;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: #0097a7;
            color: white;
        }

        .btn-primary:hover {
            background: #006064;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 151, 167, 0.3);
        }

        .btn-secondary {
            background: #e0e0e0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #d0d0d0;
            transform: translateY(-2px);
        }

        /* BOTTOM NAV */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #0097a7;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            z-index: 999;
            box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
        }

        .bottom-nav div {
            text-align: center;
            font-size: 14px;
            cursor: pointer;
            color: white;
            font-weight: 600;
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: 5px;
            background: #ff6b6b;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="header-left">
        <div class="logo-circle">+</div>
        <div class="header-title">Klinik Sejahtera</div>
    </div>
    <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
</div>

<!-- CONTENT -->
<div class="container">
    <div class="page-title">
        <i class="bi bi-calendar-plus"></i> Tambah Jadwal Dokter
    </div>

    <div class="form-card">
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('staff_klinik.jadwaldokter.store') }}" method="POST">
            @csrf

            <!-- Dokter Selection -->
            <div class="form-group">
                <label for="ID_Dokter">
                    <i class="bi bi-person-badge"></i> Pilih Dokter
                </label>
                <select class="form-control @error('ID_Dokter') input-error @enderror" 
                        id="ID_Dokter" name="ID_Dokter" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokter as $d)
                        <option value="{{ $d->ID_Dokter }}" 
                                {{ old('ID_Dokter') == $d->ID_Dokter ? 'selected' : '' }}>
                            {{ $d->Nama }} ({{ $d->Spesialis }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Day Selection -->
            <div class="form-group">
                <label for="Hari">
                    <i class="bi bi-calendar3"></i> Hari Kerja
                </label>
                <select class="form-control @error('Hari') input-error @enderror" 
                        id="Hari" name="Hari" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="1" {{ old('Hari') == '1' ? 'selected' : '' }}>📅 Senin</option>
                    <option value="2" {{ old('Hari') == '2' ? 'selected' : '' }}>📅 Selasa</option>
                    <option value="3" {{ old('Hari') == '3' ? 'selected' : '' }}>📅 Rabu</option>
                    <option value="4" {{ old('Hari') == '4' ? 'selected' : '' }}>📅 Kamis</option>
                    <option value="5" {{ old('Hari') == '5' ? 'selected' : '' }}>📅 Jumat</option>
                    <option value="6" {{ old('Hari') == '6' ? 'selected' : '' }}>📅 Sabtu</option>
                    <option value="7" {{ old('Hari') == '7' ? 'selected' : '' }}>📅 Minggu</option>
                </select>
            </div>

            <!-- Time Range -->
            <div class="form-row">
                <div class="form-group">
                    <label for="Jam_Mulai">
                        <i class="bi bi-clock-history"></i> Jam Mulai
                    </label>
                    <input type="time" class="form-control @error('Jam_Mulai') input-error @enderror" 
                           id="Jam_Mulai" name="Jam_Mulai" 
                           value="{{ old('Jam_Mulai') }}" required>
                </div>
                <div class="form-group">
                    <label for="Jam_Selesai">
                        <i class="bi bi-clock-history"></i> Jam Selesai
                    </label>
                    <input type="time" class="form-control @error('Jam_Selesai') input-error @enderror" 
                           id="Jam_Selesai" name="Jam_Selesai" 
                           value="{{ old('Jam_Selesai') }}" required>
                </div>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="Status_Slot">
                    <i class="bi bi-check-circle"></i> Status Slot
                </label>
                <select class="form-control @error('Status_Slot') input-error @enderror" 
                        id="Status_Slot" name="Status_Slot" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Tersedia" {{ old('Status_Slot') == 'Tersedia' ? 'selected' : '' }}>✅ Tersedia</option>
                    <option value="Penuh" {{ old('Status_Slot') == 'Penuh' ? 'selected' : '' }}>🔒 Penuh</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Simpan Jadwal
                </button>
                <a href="{{ route('staff_klinik.jadwaldokter.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<!-- BOTTOM NAV -->
<div class="bottom-nav">

    <div onclick="location.href='{{ route('staff_klinik.dashboard') }}'">
        <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M3 12l9-9 9 9v9H3z"/>
        </svg>
        <div>Menu</div>
    </div>

    <div onclick="location.href='{{ route('staff_klinik.riwayat') }}'">
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="1 4 1 10 7 10"/>
            <path d="M3.51 15a9 9 0 1 0 .49-9"/>
            <polyline points="12 7 12 12 15 15"/>
        </svg>
        <div>Riwayat</div>
    </div>

    <div onclick="location.href='{{ route('staff_klinik.notifikasi') }}'">
        <svg width="26" height="26" fill="white" viewBox="0 0 24 24">
            <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9z"/>
        </svg>
        <div>Notifikasi</div>
    </div>

    <div onclick="location.href='{{ route('staff_klinik.profil') }}'">
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="10" r="3"/>
            <circle cx="12" cy="12" r="10"/>
            <path d="M6 18c0-3 3-5 6-5s6 2 6 5"/>
        </svg>
        <div>Saya</div>
    </div>

</div>

</body>
</html>
