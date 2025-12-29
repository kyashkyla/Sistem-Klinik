<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Reservasi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef7f7;
            padding-bottom: 120px;
        }

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

        .container {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .page-title {
            color: #006064;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .reservation-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-left: 5px solid #0097a7;
        }

        .reservation-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }

        .reservation-date {
            font-size: 16px;
            font-weight: 600;
            color: #0097a7;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffc107;
        }

        .status-approved {
            background: #d4edda;
            color: #155724;
            border: 1px solid #28a745;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .reservation-info {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: 600;
            color: #333;
            display: inline-block;
            min-width: 100px;
        }

        .reservation-complaint {
            background: #f5f5f5;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            color: #666;
            margin: 10px 0;
        }

        .doctor-notes {
            background: #e8f4f8;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            color: #0097a7;
            margin: 10px 0;
            border-left: 3px solid #0097a7;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 15px;
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
            color: #fff;
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

    <div class="header">
        <div class="logo-box">
            <div class="logo-circle">+</div>
            Klinik Sejahtera
        </div>
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>

    <div class="container">
        <div class="page-title">Riwayat Reservasi</div>

        @forelse ($riwayat as $data)
            <div class="reservation-card">
                <div class="reservation-header">
                    <div class="reservation-date">
                        {{ \Carbon\Carbon::parse($data->created_at)->format('d F Y') }}
                    </div>
                    <span class="status-badge 
                        @if($data->Status == 'menunggu') status-pending 
                        @elseif($data->Status == 'Disetujui') status-approved 
                        @else status-rejected @endif">
                        {{ ucfirst($data->Status) }}
                    </span>
                </div>

                <div class="reservation-info">
                    <div style="margin-bottom: 8px;">
                        <span class="info-label">Dokter:</span>
                        {{ $data->dokter->Nama ?? '-' }}
                    </div>
                    <div style="margin-bottom: 8px;">
                        <span class="info-label">Jadwal:</span>
                        {{ \Carbon\Carbon::parse($data->Tanggal_Kunjungan)->format('d-m-Y') }}
                    </div>
                </div>

                @if($data->Keluhan)
                    <div class="reservation-complaint">
                        <strong>Keluhan:</strong><br>
                        {{ $data->Keluhan }}
                    </div>
                @endif

                @if($data->hasilKunjungan && $data->hasilKunjungan->count() > 0)
                    <div class="doctor-notes">
                        <strong>Catatan Dokter:</strong><br>
                        {{ $data->hasilKunjungan->first()->Catatan_Dokter ?? '-' }}
                    </div>
                @endif
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-icon">📋</div>
                <div style="font-size: 16px; color: #999;">Belum ada riwayat reservasi</div>
                <div style="font-size: 13px; color: #bbb; margin-top: 10px;">
                    Buat reservasi baru untuk mulai berkonsultasi
                </div>
            </div>
        @endforelse

    </div>

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