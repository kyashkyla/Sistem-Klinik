<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Klinik Sejahtera - Dokter</title>

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
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: 900;
        }

        /* MENU GRID */
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

        /* Bottom Nav */
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
            Klinik Sejahtera
        </div>

        <div style="display: flex; align-items: center; gap: 15px;">
            <span style="color: white; font-size: 14px;">{{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
        </div>
    </div>

    <!-- MENU -->
    <div class="menu-container">

        <!-- Reservasi -->
        <div class="menu-box" onclick="location.href='{{ route('dokter.reservasi') }}'">
            <svg width="70" height="70" viewBox="0 0 24 24" fill="#00838f">
                <path d="M21 6h-3V3h-2v3H8V3H6v3H3v2h18z"/>
                <path d="M3 10v11h18V10z"/>
            </svg>
            <div class="menu-title">Jadwal Reservasi</div>
        </div>

        <!-- Kunjungan -->
        <div class="menu-box" onclick="location.href='{{ route('dokter.kunjungan') }}'">
            <svg width="70" height="70" viewBox="0 0 24 24" fill="#00838f">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <div class="menu-title">Hasil Kunjungan</div>
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
            <div>
                Notifikasi
                @if ($countPending > 0)
                    <span class="notification-badge">{{ $countPending }}</span>
                @endif
            </div>
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