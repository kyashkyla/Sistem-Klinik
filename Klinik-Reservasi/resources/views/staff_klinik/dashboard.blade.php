<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Klinik Sejahtera - Staff Klinik</title>

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

        .menu-container {
            margin-top: 180px;
            display: grid;
            grid-template-columns: repeat(2, 250px);
            justify-content: center;
            gap: 40px;
            margin-bottom: 120px;
        }

        .menu-box {
            background: white;
            width: 250px;
            height: 220px;
            border-radius: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: 0.25s ease;
            cursor: pointer;
        }

        .menu-box:hover {
            transform: scale(1.07);
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        .menu-title {
            font-size: 20px;
            color: #00838f;
            font-weight: bold;
            margin-top: 10px;
        }
        .menu-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .menu-icon svg {
        width: 50px; 
        height: 50px;
        color: #117a8b;
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
            position: relative;
            top: -9px;
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
        Klinik Sejahtera
    </div>

    <div class="profile-icon">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
            <circle cx="12" cy="8" r="4"/>
            <path d="M12 14c-4.4 0-8 2-8 4v2h16v-2c0-2-3.6-4-8-4z"/>
        </svg>
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>
</div>

<!-- MENU -->
<div class="menu-container">

    <!-- Verifikasi Reservasi (Kalender + ceklis) -->
    <div class="menu-box" onclick="location.href='{{ route('staff_klinik.verifikasi') }}'">
        <div class="menu-icon">
            <svg viewBox="0 0 24 24" fill="#0097a7">
                <!-- kalender -->
                <rect x="3" y="4" width="18" height="17" rx="2"/>
                <rect x="3" y="9" width="18" height="2" fill="white"/>
                <rect x="7" y="2" width="2" height="4"/>
                <rect x="15" y="2" width="2" height="4"/>
                <!-- ceklis -->
                <path d="M9 14l2 2 4-4" fill="none" stroke="white" stroke-width="2"/>
            </svg>
        </div>
        <div class="menu-title">Verifikasi Reservasi</div>
    </div>

    <!-- Kelola Jadwal Dokter (Stetoskop) -->
 <div class="menu-box" onclick="location.href='{{ route('staff_klinik.jadwaldokter.index') }}'">
    <div class="menu-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#0097a7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            
            <path d="M5 3h2" /> <path d="M17 3h2" /> <path d="M6 3v5" />  <path d="M18 3v5" /> <path d="M6 8a6 6 0 0 0 12 0" />
            
            <path d="M12 14v3" /> <path d="M12 17c0 3 -2.5 4 -5 4" />

            <circle cx="7" cy="21" r="3" />
            <circle cx="7" cy="21" r="1" /> </svg>
    </div>
    <div class="menu-title">Kelola Jadwal Dokter</div>
</div>

    <!-- Data Pasien (Icon Orang) -->
    <div class="menu-box" onclick="location.href='{{ route('staff_klinik.Datapasien') }}'">
        <div class="menu-icon">
            <svg viewBox="0 0 24 24" fill="#0097a7">
                <circle cx="12" cy="7" r="4"/>
                <path d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
            </svg>
        </div>
        <div class="menu-title">Data Pasien</div>
    </div>

    <!-- Data Hasil Kunjungan (Laporan) -->
    <div class="menu-box" onclick="location.href='{{ route('staff_klinik.kunjungan') }}'">
        <div class="menu-icon">
            <svg viewBox="0 0 24 24" fill="#0097a7">
                <path d="M6 2h9l5 5v15a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2z"/>
                <path d="M15 2v6h6" fill="white"/>
                <rect x="9" y="11" width="6" height="2" fill="white"/>
                <rect x="9" y="15" width="6" height="2" fill="white"/>
                <rect x="9" y="19" width="4" height="2" fill="white"/>
            </svg>
        </div>
        <div class="menu-title">Data Hasil Kunjungan</div>
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
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2"
             viewBox="0 0 24 24">
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
        <div>
            Notifikasi
            @if ($countPending > 0)
                <span class="notification-badge">{{ $countPending }}</span>
            @endif
        </div>
    </div>

    <div onclick="location.href='{{ route('staff_klinik.profil') }}'">
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
