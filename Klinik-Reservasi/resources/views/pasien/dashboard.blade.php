<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Pasien</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #eef7f7;
        }

        /* HEADER */
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
            width: 48px;
            height: 48px;
            font-size: 30px;
            font-weight: 900;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* MENU GRID */
        .menu-container {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(2, 260px);
            justify-content: center;
            gap: 40px;
            margin-bottom: 120px;
        }

        .menu-box {
            background: white;
            width: 260px;
            height: 220px;
            border-radius: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .menu-box:hover {
            transform: scale(1.07);
        }

        .menu-title {
            font-size: 20px;
            color: #00838f;
            font-weight: bold;
            margin-top: 12px;
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
        }

        .bottom-nav div {
            color: white;
            text-align: center;
            font-size: 14px;
            cursor: pointer;
            font-weight: 600;
        }

        .bottom-nav svg {
            display: block;
            margin: auto;
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

    <div onclick="location.href='{{ route('pasien.profil') }}'">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="white">
            <circle cx="12" cy="8" r="4"/>
            <path d="M12 14c-4.4 0-8 2-8 4v2h16v-2c0-2-3.6-4-8-4z"/>
        </svg>
    </div>
</div>

<!-- MENU -->
<div class="menu-container">

    <!-- Daftar Online -->
    <div class="menu-box" onclick="location.href='{{ route('pasien.jadwal') }}'">
        <!-- ICON KALENDER -->
        <svg width="70" height="70" viewBox="0 0 24 24" fill="#00838f">
            <rect x="3" y="4" width="18" height="17" rx="3"/>
            <line x1="3" y1="10" x2="21" y2="10" stroke="white" stroke-width="2"/>
            <line x1="8" y1="2" x2="8" y2="6" stroke="white" stroke-width="2"/>
            <line x1="16" y1="2" x2="16" y2="6" stroke="white" stroke-width="2"/>
        </svg>
        <div class="menu-title">Daftar Online</div>
    </div>

    <!-- Dokter -->
    <div class="menu-box" onclick="location.href='{{ route('pasien.dokter') }}'">
        <!-- ICON DOKTER (STETOSKOP + ORANG) -->
        <svg width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#00838f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="6" r="3"></circle>
            <path d="M10 9c-3 1-5 3-5 7v4h14v-4c0-4-2-6-5-7"></path>
            <path d="M19 10v3a2 2 0 1 1-4 0v-1"></path>
            <path d="M19 10h2"></path>
        </svg>
        <div class="menu-title">Dokter</div>
    </div>

  <!-- Gawat Darurat -->
<div class="menu-box" onclick="location.href='{{ route('pasien.darurat') }}'">
    <!-- ICON LAMPU SIRENE -->
    <svg width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#00838f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M7 11V6a5 5 0 0 1 10 0v5"></path>
        <rect x="3" y="11" width="18" height="8" rx="2"></rect>
        <path d="M5 19h14"></path>
        <!-- Cahaya sirene -->
        <line x1="12" y1="2" x2="12" y2="0"/>
        <line x1="4" y1="6" x2="2.5" y2="4.5"/>
        <line x1="20" y1="6" x2="21.5" y2="4.5"/>
    </svg>
    <div class="menu-title">Gawat Darurat</div>
</div>


    <!-- Informasi -->
    <div class="menu-box" onclick="location.href='{{ route('pasien.informasi') }}'">
        <!-- ICON INFORMASI (HURUF i) -->
        <svg width="70" height="70" viewBox="0 0 24 24" fill="#00838f">
            <circle cx="12" cy="12" r="10"/>
            <rect x="11" y="10" width="2" height="7" fill="white"/>
            <circle cx="12" cy="7" r="1.5" fill="white"/>
        </svg>
        <div class="menu-title">Informasi</div>
    </div>

</div>

<!-- BOTTOM NAV -->
<div class="bottom-nav">

    <!-- MENU -->
    <div onclick="location.href='{{ route('pasien.dashboard') }}'">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
            <path d="M3 12l9-9 9 9v9H3z"/>
        </svg>
        Menu
    </div>

    <!-- RIWAYAT -->
    <div onclick="location.href='{{ route('pasien.riwayat') }}'">
        <svg width="26" height="26" fill="none" stroke="white" stroke-width="2"
             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="1 4 1 10 7 10"/>
            <path d="M3.5 15a9 9 0 1 0 .5-9"/>
            <polyline points="12 7 12 12 15 15"/>
        </svg>
        Riwayat
    </div>

    <!-- DISKON -->
    <div onclick="location.href='{{ route('pasien.diskon') }}'">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
            <path d="M3 12l9-9 9 9-9 9z"/>
            <circle cx="9" cy="9" r="2" fill="#0097a7"/>
            <circle cx="15" cy="15" r="2" fill="#0097a7"/>
            <line x1="8" y1="16" x2="16" y2="8" stroke="white" stroke-width="2"/>
        </svg>
        Diskon
    </div>

    <!-- BERITA -->
    <div onclick="location.href='{{ route('pasien.berita') }}'">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
            <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9z"/>
            <circle cx="12" cy="21" r="2"/>
        </svg>
        Notifikasi
    </div>

    <!-- SAYA -->
    <div onclick="location.href='{{ route('pasien.profil') }}'">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
             stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="10" r="3"/>
            <circle cx="12" cy="12" r="10"/>
            <path d="M6 18c0-3 3-5 6-5s6 2 6 5"/>
        </svg>
        Saya
    </div>

</div>

</body>
</html>
