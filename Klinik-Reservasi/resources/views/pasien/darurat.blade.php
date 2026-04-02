<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Gawat Darurat</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #eef7f7
        }

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
            max-width: 640px;
            width: 100%;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .1)
        }

        .card h2 {
            color: #d32f2f
        }

        button {
            background: #d32f2f;
            color: #fff;
            border: none;
            padding: 14px 25px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer
        }

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
            <div class="logo-circle">+</div>
            Klinik Sejahtera
        </div>
        <div style="display: flex; align-items: center; gap: 15px;">
            <div onclick="location.href='{{ route('pasien.profil') }}'" style="cursor: pointer;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="white">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M12 14c-4.4 0-8 2-8 4v2h16v-2c0-2-3.6-4-8-4z" />
                </svg>
            </div>
            <a href="{{ route('logout') }}" style="background: #ff6b6b; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; text-decoration: none; font-size: 13px; font-weight: 600;">Logout</a>
        </div>
    </div>

    <!-- KONTEN -->
    <div class="wrap">
        <div class="card">
            <h2>Keadaan Darurat</h2>
            <p>Segera hubungi layanan darurat:</p>
            <h3>📞 119</h3>

            <button onclick="window.location.href='tel:119'">
                Hubungi Sekarang
            </button>
        </div>
    </div>

    <!-- BOTTOM NAV -->
    <div class="bottom-nav">

        <div onclick="location.href='{{ route('pasien.dashboard') }}'">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
                <path d="M3 12l9-9 9 9v9H3z" />
            </svg>
            Menu
        </div>

        <div onclick="location.href='{{ route('pasien.riwayat') }}'">
            <svg width="26" height="26" fill="none" stroke="white" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="1 4 1 10 7 10" />
                <path d="M3.5 15a9 9 0 1 0 .5-9" />
                <polyline points="12 7 12 12 15 15" />
            </svg>
            Riwayat
        </div>

        <div onclick="location.href='{{ route('pasien.diskon') }}'">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
                <path d="M3 12l9-9 9 9-9 9z" />
                <circle cx="9" cy="9" r="2" fill="#0097a7" />
                <circle cx="15" cy="15" r="2" fill="#0097a7" />
                <line x1="8" y1="16" x2="16" y2="8" stroke="white" stroke-width="2" />
            </svg>
            Diskon
        </div>

        <div onclick="location.href='{{ route('pasien.berita') }}'">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
                <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9z" />
                <circle cx="12" cy="21" r="2" />
            </svg>
           Notifikasi
        </div>

        <div onclick="location.href='{{ route('pasien.profil') }}'">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="10" r="3" />
                <circle cx="12" cy="12" r="10" />
                <path d="M6 18c0-3 3-5 6-5s6 2 6 5" />
            </svg>
            Saya
        </div>

    </div>

</body>

</html>