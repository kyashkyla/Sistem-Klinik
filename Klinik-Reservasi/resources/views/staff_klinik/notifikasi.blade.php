<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi - Klinik Sejahtera</title>
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

        .page-title {
            color: #006064;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .notification-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-left: 5px solid #ff6b6b;
            transition: all 0.3s ease;
        }

        .notification-card:hover {
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 12px;
        }

        .notification-title {
            font-size: 16px;
            font-weight: bold;
            color: #006064;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .notification-icon {
            width: 24px;
            height: 24px;
            background: #ff6b6b;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .notification-time {
            font-size: 12px;
            color: #999;
        }

        .notification-detail {
            font-size: 13px;
            color: #555;
            margin: 10px 0;
            line-height: 1.5;
        }

        .notification-detail-item {
            display: flex;
            margin: 6px 0;
        }

        .notification-detail-item label {
            font-weight: 600;
            color: #333;
            min-width: 100px;
        }

        .notification-detail-item value {
            color: #666;
            flex: 1;
        }

        .notification-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .btn-verify {
            background: #0097a7;
            color: white;
        }

        .btn-verify:hover {
            background: #006064;
        }

        .btn-detail {
            background: #e0e0e0;
            color: #333;
        }

        .btn-detail:hover {
            background: #d0d0d0;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 64px;
            color: #ccc;
            margin-bottom: 15px;
        }

        .empty-text {
            color: #999;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .empty-button {
            background: #0097a7;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
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

        .badge-baru {
            display: inline-block;
            background: #ff6b6b;
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 5px;
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
    <div class="page-title">
        <i class="bi bi-bell"></i> Notifikasi
    </div>

    @forelse ($reservasi as $r)
        <div class="notification-card">
            <div class="notification-header">
                <div class="notification-title">
                    <div class="notification-icon">
                        <i class="bi bi-exclamation"></i>
                    </div>
                    Reservasi Baru
                </div>
                <div class="notification-time">
                    {{ $r->created_at->diffForHumans() }}
                </div>
            </div>

            <div class="notification-detail">
                <div class="notification-detail-item">
                    <label>Pasien:</label>
                    <value>{{ $r->pasien->user->name ?? $r->pasien->Nama }}</value>
                </div>
                <div class="notification-detail-item">
                    <label>Email:</label>
                    <value>{{ $r->pasien->user->email ?? $r->pasien->Email }}</value>
                </div>
                <div class="notification-detail-item">
                    <label>Dokter:</label>
                    <value>{{ $r->dokter->Nama ?? '-' }}</value>
                </div>
                <div class="notification-detail-item">
                    <label>Tanggal:</label>
                    <value>{{ \Carbon\Carbon::parse($r->Tanggal_Kunjungan)->format('d-m-Y') }}</value>
                </div>
                <div class="notification-detail-item">
                    <label>Keluhan:</label>
                    <value>{{ substr($r->Keluhan, 0, 50) }}{{ strlen($r->Keluhan) > 50 ? '...' : '' }}</value>
                </div>
                <span class="badge-baru">BARU</span>
            </div>

            <div class="notification-actions">
                <button class="btn btn-verify" onclick="location.href='{{ route('staff_klinik.verifikasi') }}'">
                    <i class="bi bi-check-circle"></i> Verifikasi Sekarang
                </button>
                <button class="btn btn-detail" onclick="alert('Detail: {{ $r->pasien->user->name ?? $r->pasien->Nama }} - {{ $r->Keluhan }}')">
                    <i class="bi bi-info-circle"></i> Detail
                </button>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <div class="empty-icon">
                <i class="bi bi-inbox"></i>
            </div>
            <div class="empty-text">Tidak ada notifikasi</div>
            <div class="empty-text" style="font-size: 13px; color: #bbb; margin-top: 10px;">
                Semua reservasi sudah diverifikasi
            </div>
            <button class="empty-button" onclick="location.href='{{ route('staff_klinik.dashboard') }}'">
                Kembali ke Menu
            </button>
        </div>
    @endforelse
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
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
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
