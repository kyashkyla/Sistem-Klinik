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
            width: 100%;
            height: 100%;
            fill: #0097a7;
        }

        .menu-link {
            text-decoration: none;
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

    <div class="profile-icon">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
            <circle cx="12" cy="8" r="4"/>
            <path d="M12 14c-4.4 0-8 2-8 4v2h16v-2c0-2-3.6-4-8-4z"/>
        </svg>
    </div>
</div>

<!-- MENU -->
<div class="menu-container">

    <!-- VERIFIKASI RESERVASI -->
    <a href="{{ route('staff.verifikasi') }}" class="menu-link">
        <div class="menu-box">
            <div class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M3 3h18v18H3z" fill="none"/>
                    <path d="M7 7h10v2H7zm0 4h10v2H7zm0 4h6v2H7z"/>
                </svg>
            </div>
            <div class="menu-title">Verifikasi Reservasi</div>
        </div>
    </a>

    <!-- KELOLA JADWAL DOKTER -->
    <a href="{{ route('staff.jadwal.index') }}" class="menu-link">
        <div class="menu-box">
            <div class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" fill="none"/>
                    <path d="M12 6v6l4 2"/>
                </svg>
            </div>
            <div class="menu-title">Kelola Jadwal Dokter</div>
        </div>
    </a>

    <!-- DATA PASIEN (BELUM DIAKTIFKAN) -->
    <a href="{{ route('staff.data-pasien') }}" class="menu-link">
    <div class="menu-box">
        <div class="menu-icon">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
            </svg>
        </div>
        <div class="menu-title">Data Pasien</div>
    </div>
</a>


    <!-- HASIL KUNJUNGAN -->
    <div class="menu-box" onclick="alert('Fitur Hasil Kunjungan belum aktif')">
        <div class="menu-icon">
            <svg viewBox="0 0 24 24">
                <rect x="5" y="3" width="14" height="18" rx="2" ry="2" fill="none"/>
                <path d="M9 7h6M9 11h6M9 15h4"/>
                <path d="M12 2v4"/>
            </svg>
        </div>
        <div class="menu-title">Data Hasil Kunjungan</div>
    </div>

</div>

<!-- BOTTOM NAV -->
<div class="bottom-nav">

    <div onclick="location.href='{{ route('staff.dashboard') }}'">
        <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M3 12l9-9 9 9v9H3z"/>
        </svg>
        <div>Menu</div>
    </div>

    <div onclick="alert('Riwayat belum aktif')">
        <div>Riwayat</div>
    </div>

    <div onclick="alert('Berita belum aktif')">
        <div>Berita</div>
    </div>

    <div onclick="alert('Profil belum aktif')">
        <div>Saya</div>
    </div>

</div>

</body>
</html>
