<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil - Pasien</title>
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

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #0097a7, #006064);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 50px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .profile-name {
            font-size: 22px;
            font-weight: bold;
            color: #006064;
            margin-bottom: 5px;
        }

        .profile-role {
            font-size: 14px;
            color: #0097a7;
            font-weight: 600;
        }

        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }

        .profile-section-title {
            font-size: 14px;
            font-weight: bold;
            color: #0097a7;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
            border-bottom: 2px solid #e0f2f1;
            padding-bottom: 10px;
        }

        .profile-item {
            display: flex;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .profile-item-icon {
            width: 40px;
            height: 40px;
            background: #e0f2f1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0097a7;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .profile-item-content {
            flex: 1;
        }

        .profile-item-label {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .profile-item-value {
            font-size: 15px;
            color: #333;
            font-weight: 500;
            word-break: break-word;
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
    <div class="profile-header">
        <div class="profile-avatar">
            <i class="bi bi-person"></i>
        </div>
        <div class="profile-name">{{ auth()->user()->name }}</div>
        <div class="profile-role">Pasien</div>
    </div>

    <!-- INFO PRIBADI -->
    <div class="profile-card">
        <div class="profile-section-title">Informasi Pribadi</div>

        <div class="profile-item">
            <div class="profile-item-icon">
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="profile-item-content">
                <div class="profile-item-label">Nama Lengkap</div>
                <div class="profile-item-value">{{ $pasien->Nama ?? auth()->user()->name }}</div>
            </div>
        </div>

        <div class="profile-item">
            <div class="profile-item-icon">
                <i class="bi bi-envelope-fill"></i>
            </div>
            <div class="profile-item-content">
                <div class="profile-item-label">Email</div>
                <div class="profile-item-value">{{ auth()->user()->email }}</div>
            </div>
        </div>

        <div class="profile-item">
            <div class="profile-item-icon">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div class="profile-item-content">
                <div class="profile-item-label">No. Telepon</div>
                <div class="profile-item-value">{{ $pasien->No_Telepon ?? '-' }}</div>
            </div>
        </div>

        <div class="profile-item">
            <div class="profile-item-icon">
                <i class="bi bi-house-fill"></i>
            </div>
            <div class="profile-item-content">
                <div class="profile-item-label">Alamat</div>
                <div class="profile-item-value">{{ $pasien->Alamat ?? '-' }}</div>
            </div>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="profile-card">
        <div class="profile-section-title">Informasi Kunjungan</div>

        <div class="profile-item">
            <div class="profile-item-icon">
                <i class="bi bi-calendar2-check"></i>
            </div>
            <div class="profile-item-content">
                <div class="profile-item-label">Total Kunjungan</div>
                <div class="profile-item-value">{{ $totalKunjungan }} kali</div>
            </div>
        </div>

        <div class="profile-item">
            <div class="profile-item-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="profile-item-content">
                <div class="profile-item-label">Member Sejak</div>
                <div class="profile-item-value">{{ auth()->user()->created_at->format('d F Y') }}</div>
            </div>
        </div>
    </div>
</div>

<!-- BOTTOM NAV -->
<div class="bottom-nav">

    <div onclick="location.href='{{ route('pasien.dashboard') }}'">
        <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M3 12l9-9 9 9v9H3z"/>
        </svg>
        <div>Menu</div>
    </div>

    <div onclick="location.href='{{ route('pasien.dokter') }}'">
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
            <circle cx="8.5" cy="7" r="4"/>
        </svg>
        <div>Dokter</div>
    </div>

    <div onclick="location.href='{{ route('pasien.riwayat') }}'">
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="1 4 1 10 7 10"/>
            <path d="M3.51 15a9 9 0 1 0 .49-9"/>
            <polyline points="12 7 12 12 15 15"/>
        </svg>
        <div>Riwayat</div>
    </div>

    <div onclick="location.href='{{ route('pasien.profil') }}'">
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
