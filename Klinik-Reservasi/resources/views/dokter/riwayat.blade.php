<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pemeriksaan Dokter</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #eef7f7
        }

        /* HEADER (SAMA DENGAN PASIEN) */
        .header {
            background: #0097a7;
            color: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: bold
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
            align-items: center
        }

        .wrap {
            display: flex;
            justify-content: center;
            padding: 40px 15px 120px
        }

        .card {
            background: #fff;
            max-width: 700px;
            width: 100%;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1)
        }

        h2 {
            text-align: center;
            color: #0097a7
        }

        .item {
            border-bottom: 1px solid #eee;
            padding: 15px 0
        }

        .pasien {
            font-weight: bold;
            color: #007c8a;
        }

        .badge {
            background: #4caf50;
            color: white;
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 12px;
            margin-left: 6px;
        }

        /* BOTTOM NAV (SAMA DENGAN PASIEN) */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #0097a7;
            display: flex;
            justify-content: space-around;
            padding: 10px 0
        }

        .bottom-nav div {
            color: #fff;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer
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

        .bottom-nav svg {
            display: block;
            margin: auto
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="logo-box">
        <div class="logo-circle">+</div>Klinik Sejahtera
    </div>
    <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
</div>

<!-- CONTENT -->
<div class="wrap">
    <div class="card">
        <h2>Riwayat Pasien Ditangani</h2>

        @forelse ($riwayat as $data)
            <div class="item">
                <div class="pasien">
                    {{ $data->reservasi->pasien->user->name ?? '-' }}
                    <span class="badge">Selesai</span>
                </div>
                <div class="info">
                    📅 {{ \Carbon\Carbon::parse($data->Tanggal_Kunjungan)->format('d F Y') }} | ⏰ {{ $data->reservasi->Jam_Kunjungan ?? '-' }} <br>
                    Keluhan: {{ $data->reservasi->Keluhan ?? '-' }} <br>
                    Catatan: {{ $data->Catatan_Dokter ?? '-' }}
                </div>
            </div>
        @empty
            <p style="text-align: center; color: #666;">Belum ada riwayat pemeriksaan</p>
        @endforelse

    </div>
</div>

<!-- BOTTOM NAV -->
<div class="bottom-nav">

    <div onclick="location.href='{{ route('dokter.dashboard') }}'">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
            <path d="M3 12l9-9 9 9v9H3z"/>
        </svg>
        Menu
    </div>

    <div onclick="location.href='{{ route('dokter.riwayat') }}'">
        <svg width="26" height="26" fill="none" stroke="white" stroke-width="2"
             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="1 4 1 10 7 10"/>
            <path d="M3.5 15a9 9 0 1 0 .5-9"/>
            <polyline points="12 7 12 12 15 15"/>
        </svg>
        Riwayat
    </div>

    <div onclick="location.href='{{ route('dokter.notifikasi') }}'">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
            <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9z"/>
            <circle cx="12" cy="21" r="2"/>
        </svg>
       Notifikasi
    </div>

    <div onclick="location.href='{{ route('dokter.dashboard') }}'">
        <svg width="26" height="26" fill="none"
             stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             viewBox="0 0 24 24">
            <circle cx="12" cy="10" r="3"/>
            <circle cx="12" cy="12" r="10"/>
            <path d="M6 18c0-3 3-5 6-5s6 2 6 5"/>
        </svg>
        Saya
    </div>

</div>

</body>
</html>