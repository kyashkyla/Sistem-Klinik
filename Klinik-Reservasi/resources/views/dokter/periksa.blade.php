<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Periksa Pasien - Klinik Sejahtera</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #eef7f7;
            padding-bottom: 30px;
        }

        .header {
            background-color: #0097a7;
            color: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: bold;
        }

        .logo-circle {
            background: white;
            color: #0097a7;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: 900;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            color: #0097a7;
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }

        .patient-info {
            background: #f0f8f9;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            border-left: 5px solid #0097a7;
        }

        .patient-info-title {
            font-size: 14px;
            font-weight: 700;
            color: #0097a7;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(0, 151, 167, 0.2);
        }

        .info-row {
            display: flex;
            margin-bottom: 14px;
            font-size: 13px;
            align-items: flex-start;
        }

        .info-label {
            font-weight: 600;
            color: #0097a7;
            min-width: 140px;
            flex-shrink: 0;
        }

        .info-value {
            color: #333;
            flex: 1;
            word-break: break-word;
            line-height: 1.5;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #0097a7;
            box-shadow: 0 0 5px rgba(0, 151, 167, 0.2);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit {
            background: #0097a7;
            color: white;
        }

        .btn-submit:hover {
            background: #006064;
        }

        .btn-back {
            background: #ddd;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-back:hover {
            background: #bbb;
        }

        .required {
            color: #d9534f;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .hidden {
            display: none;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #0097a7;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
        }

        .bottom-nav div {
            text-align: center;
            font-size: 14px;
            cursor: pointer;
            color: white;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <div class="logo-box">
            <div class="logo-circle">+</div>
            Klinik Sejahtera
        </div>

        <div style="display: flex; align-items: center; gap: 15px;">
            <div class="profile-icon">
                <svg width="26" height="26" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M12 14c-4.4 0-8 2-8 4v2h16v-2c0-2-3.6-4-8-4z"></path>
                </svg>
            </div>
            <a href="{{ route('logout') }}" style="background: #ff6b6b; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; text-decoration: none; font-size: 13px; font-weight: 600;">Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <h1>Periksa Pasien</h1>

        <!-- INFORMASI PASIEN -->
        <div class="patient-info">
            <div class="patient-info-title">Informasi Pasien</div>
            
            <div class="info-row">
                <div class="info-label">Nama Pasien</div>
                <div class="info-value"><strong>{{ $reservasi->pasien->user->name ?? '-' }}</strong></div>
            </div>
            <div class="info-row">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $reservasi->pasien->user->email ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Keluhan</div>
                <div class="info-value">{{ $reservasi->Keluhan ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Kunjungan</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($reservasi->Tanggal_Kunjungan)->format('d-m-Y') ?? '-' }}</div>
            </div>
        </div>

        <!-- FORM PEMERIKSAAN -->
        <form action="{{ route('dokter.kunjungan.store') }}" method="POST">
            @csrf

            <input type="hidden" name="ID_Reservasi" value="{{ $reservasi->ID_Reservasi }}">
            <input type="hidden" name="Tanggal_Kunjungan" value="{{ now()->format('Y-m-d') }}">

            <div class="form-group">
                <label for="catatan">
                    Catatan Pemeriksaan <span class="required">*</span>
                </label>
                <textarea 
                    id="catatan" 
                    name="Catatan_Dokter" 
                    placeholder="Masukkan catatan hasil pemeriksaan pasien..."
                    required></textarea>
                @error('Catatan_Dokter')
                    <div class="alert alert-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <a href="{{ route('dokter.reservasi') }}" class="btn btn-back">← Kembali</a>
                <button type="submit" class="btn btn-submit">Simpan Pemeriksaan</button>
            </div>
        </form>
    </div>

    <!-- BOTTOM NAV -->
    <div class="bottom-nav">

        <div onclick="location.href='{{ route('dokter.dashboard') }}'">
            <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9v9H3z"/>
            </svg>
            <div>Menu</div>
        </div>

        <div onclick="location.href='{{ route('dokter.riwayat') }}'">
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2"
                 viewBox="0 0 24 24">
                <polyline points="1 4 1 10 7 10"/>
                <path d="M3.51 15a9 9 0 1 0 .49-9"/>
                <polyline points="12 7 12 12 15 15"/>
            </svg>
            <div>Riwayat</div>
        </div>

        <div onclick="location.href='{{ route('dokter.notifikasi') }}'">
            <svg width="26" height="26" fill="white" viewBox="0 0 24 24">
                <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9zM13.73 21a2 2 0 11-3.46 0"/>
            </svg>
            <div>Notifikasi</div>
        </div>

        <div onclick="location.href='{{ route('dokter.profil') }}'">
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2"
                 viewBox="0 0 24 24">
                <circle cx="12" cy="10" r="3"/>
                <circle cx="12" cy="12" r="10"/>
                <path d="M6 18c0-3 3-5 6-5s6 2 6 5"/>
            </svg>
            <div>Saya</div>
        </div>

    </div>

</body>
</html>
