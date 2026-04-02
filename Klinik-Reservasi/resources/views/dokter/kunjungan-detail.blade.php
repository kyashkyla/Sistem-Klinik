<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Detail Kunjungan - Klinik Sejahtera</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #eef7f7;
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

        .content-container {
            max-width: 750px;
            background: white;
            margin: 35px auto 120px;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #007d8a;
            margin-bottom: 25px;
        }

        .detail-section {
            margin-bottom: 25px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 10px;
            border-left: 4px solid #0097a7;
        }

        .detail-section h3 {
            color: #0097a7;
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .detail-row {
            display: flex;
            margin-bottom: 12px;
        }

        .detail-label {
            font-weight: 600;
            color: #006064;
            min-width: 150px;
            flex: 0 0 150px;
        }

        .detail-value {
            color: #555;
            flex: 1;
            padding: 8px 12px;
            background: white;
            border-radius: 5px;
            word-break: break-word;
        }

        .btn-back {
            background: #0097a7;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background: #006064;
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
            text-align:center;
            font-size:14px;
            cursor:pointer;
            color:white;
            font-weight:600;
        }

        .bottom-nav svg {
            width:26px;
            display:block;
            margin:auto;
            fill: white;
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
    <div class="content-container">
        <a href="{{ route('dokter.kunjungan') }}" class="btn-back">← Kembali</a>
        
        <h2>Detail Hasil Pemeriksaan</h2>

        <!-- INFORMASI PASIEN -->
        <div class="detail-section">
            <h3>Informasi Pasien</h3>
            
            <div class="detail-row">
                <div class="detail-label">Nama Pasien</div>
                <div class="detail-value">{{ $hasil->reservasi->pasien->user->name ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $hasil->reservasi->pasien->user->email ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Nomor Telepon</div>
                <div class="detail-value">{{ $hasil->reservasi->pasien->No_Telepon ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Alamat</div>
                <div class="detail-value">{{ $hasil->reservasi->pasien->Alamat ?? '-' }}</div>
            </div>
        </div>

        <!-- INFORMASI KUNJUNGAN -->
        <div class="detail-section">
            <h3>Informasi Kunjungan</h3>
            
            <div class="detail-row">
                <div class="detail-label">ID Hasil</div>
                <div class="detail-value">{{ $hasil->ID_Hasil }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Tanggal Kunjungan</div>
                <div class="detail-value">{{ \Carbon\Carbon::parse($hasil->Tanggal_Kunjungan)->format('d-m-Y') }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Dokter</div>
                <div class="detail-value">{{ $hasil->reservasi->dokter->Nama ?? '-' }}</div>
            </div>
        </div>

        <!-- INFORMASI MEDIS -->
        <div class="detail-section">
            <h3>Informasi Medis</h3>
            
            <div class="detail-row">
                <div class="detail-label">Keluhan Pasien</div>
                <div class="detail-value">{{ $hasil->reservasi->Keluhan ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Catatan Dokter</div>
                <div class="detail-value">{{ $hasil->Catatan_Dokter ?? '-' }}</div>
            </div>
        </div>

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
