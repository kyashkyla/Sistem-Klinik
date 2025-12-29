<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pemeriksaan Dokter</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef7f7;
        }

        /* HEADER */
        .header {
            background: #0097a7;
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
            background: #fff;
            color: #0097a7;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            font-size: 30px;
            font-weight: 900;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrap {
            display: flex;
            justify-content: center;
            padding: 40px 15px 120px;
        }

        .card {
            background: #fff;
            max-width: 700px;
            width: 100%;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0097a7;
            margin-top: 0;
        }

        .item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
            transition: background 0.2s ease;
        }

        .item:hover {
            background: #f9fafb;
            padding: 15px 10px;
            border-radius: 8px;
        }

        .item:last-child {
            border-bottom: none;
        }

        .pasien-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .pasien-nama {
            font-weight: bold;
            color: #007c8a;
            font-size: 15px;
        }

        .badge {
            background: #4caf50;
            color: white;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 600;
        }

        .info {
            color: #555;
            font-size: 13px;
            line-height: 1.6;
        }

        .info-row {
            margin: 6px 0;
        }

        .label {
            color: #666;
            font-weight: 500;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 15px;
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

        .logout-btn:hover {
            background: #ff5252;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="logo-box">
        <div class="logo-circle">+</div>
        <span>Klinik Sejahtera</span>
    </div>
    <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
</div>

<!-- CONTENT -->
<div class="wrap">
    <div class="card">
        <h2>📋 Riwayat Pasien Ditangani</h2>

        @forelse ($riwayat as $data)
            <div class="item">
                <div class="pasien-header">
                    <span class="pasien-nama">👤 {{ $data->reservasi->pasien->user->name ?? 'Pasien Tidak Dikenal' }}</span>
                    <span class="badge">✓ Selesai</span>
                </div>
                <div class="info">
                    <div class="info-row">
                        <span class="label">📅 Tanggal:</span> {{ \Carbon\Carbon::parse($data->Tanggal_Kunjungan)->format('d F Y') }}
                    </div>
                    <div class="info-row">
                        <span class="label">🕐 Jam:</span> {{ $data->reservasi->Jam_Kunjungan ?? '-' }}
                    </div>
                    <div class="info-row">
                        <span class="label">🤔 Keluhan:</span> {{ $data->reservasi->Keluhan ?? '-' }}
                    </div>
                    <div class="info-row">
                        <span class="label">📝 Catatan Dokter:</span> {{ $data->Catatan_Dokter ?? '-' }}
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <p>Belum ada riwayat pemeriksaan pasien</p>
                <small style="color: #aaa;">Hasil pemeriksaan akan muncul di sini setelah pasien diperiksa</small>
            </div>
        @endforelse

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