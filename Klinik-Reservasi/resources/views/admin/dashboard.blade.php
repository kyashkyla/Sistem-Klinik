<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Klinik Sejahtera</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }

        .header {
            background: #007a79;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-circle {
            background: white;
            color: #007a79;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
        }

        .header-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .logout-btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .logout-btn:hover {
            background: #ff5252;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .welcome-box h1 {
            color: #007a79;
            margin-bottom: 10px;
        }

        .welcome-box p {
            color: #666;
            line-height: 1.6;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-left: 4px solid #007a79;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #007a79;
            margin: 10px 0;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card h3 {
            color: #007a79;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .card p {
            color: #999;
            font-size: 13px;
            line-height: 1.5;
        }

        .section-title {
            color: #007a79;
            font-size: 20px;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="header">
        <div class="header-left">
            <div class="logo-circle">+</div>
            <div>
                <h2>Klinik Sejahtera</h2>
                <p style="font-size: 12px; opacity: 0.9;">Admin Dashboard</p>
            </div>
        </div>
        <div class="header-right">
            <span>{{ Auth::user()->name }} (Admin)</span>
            <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="welcome-box">
            <h1>👋 Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p>Anda login sebagai <strong>Admin</strong> Klinik Sejahtera. Gunakan dashboard untuk mengelola seluruh operasional klinik.</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">👥 Total Pasien</div>
                <div class="stat-number">{{ $totalPasien }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">👨‍⚕️ Total Dokter</div>
                <div class="stat-number">{{ $totalDokter }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">📋 Reservasi Menunggu</div>
                <div class="stat-number">{{ $reservasiMenunggu }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">✓ Reservasi Disetujui</div>
                <div class="stat-number">{{ $reservasiDisetujui }}</div>
            </div>
        </div>

        <div class="section-title">Manajemen Sistem</div>
        <div class="grid">
            <a href="{{ route('staff_klinik.verifikasi') }}" class="card">
                <div class="card-icon">📋</div>
                <h3>Verifikasi Reservasi</h3>
                <p>Setujui atau tolak reservasi pasien</p>
            </a>

            <a href="{{ route('staff_klinik.Datapasien') }}" class="card">
                <div class="card-icon">👥</div>
                <h3>Kelola Pasien</h3>
                <p>Lihat daftar dan kelola data pasien</p>
            </a>

            <a href="{{ route('admin.jadwal.index') }}" class="card">
                <div class="card-icon">📅</div>
                <h3>Jadwal Dokter</h3>
                <p>Kelola jadwal praktik dokter</p>
            </a>

            <a href="{{ route('staff_klinik.kunjungan') }}" class="card">
                <div class="card-icon">🏥</div>
                <h3>Riwayat Kunjungan</h3>
                <p>Lihat riwayat kunjungan pasien</p>
            </a>

            <a href="{{ route('staff_klinik.riwayat') }}" class="card">
                <div class="card-icon">📊</div>
                <h3>Laporan</h3>
                <p>Lihat laporan dan statistik</p>
            </a>

            <a href="javascript:void(0)" class="card" onclick="alert('Fitur pengaturan sedang dikembangkan')">
                <div class="card-icon">⚙️</div>
                <h3>Pengaturan Sistem</h3>
                <p>Konfigurasi sistem klinik</p>
            </a>
        </div>
    </div>
</body>
</html>
