<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dokter</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
            background: #eef7f7;
            padding-bottom: 80px;
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
            padding: 20px 15px 40px;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #0097a7;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .doctors-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .doctor-card {
            background: #fff;
            border-radius: 12px;
            padding: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #0097a7;
        }

        .doctor-card h3 {
            margin: 0 0 6px 0;
            color: #0097a7;
            font-size: 16px;
            font-weight: bold;
        }

        .doctor-card .specialty {
            color: #666;
            font-size: 12px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .schedule-item {
            font-size: 11px;
            color: #333;
            margin: 4px 0;
            padding: 4px;
            background: #f5f5f5;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .schedule-day {
            font-weight: 600;
            color: #0097a7;
            flex: 0 0 50px;
        }

        .schedule-time {
            color: #666;
            font-size: 10px;
        }

        .no-data {
            text-align: center;
            padding: 40px 20px;
            color: #999;
            font-size: 14px;
            background: #fff;
            border-radius: 12px;
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
            box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
            z-index: 999;
        }

        .bottom-nav div {
            color: #fff;
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            flex: 1;
        }

        .bottom-nav svg {
            display: block;
            margin: 0 auto 4px;
        }

        @media (max-width: 500px) {
            .doctors-grid {
                grid-template-columns: 1fr;
            }
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
        <h2>👨‍⚕️ Daftar Dokter</h2>

        @php
            // Group jadwal by dokter
            $dokterGroups = $jadwal->groupBy('ID_Dokter');
        @endphp

        @forelse($dokterGroups as $id_dokter => $jadwalGroup)
            @php
                $dokter = $jadwalGroup->first()->dokter;
                $daysOfWeek = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            @endphp
            
            <div class="doctor-card">
                <h3>{{ $dokter->Nama ?? 'Dokter' }}</h3>
                <div class="specialty">{{ $dokter->Spesialis ?? 'Spesialis' }}</div>
                
                @foreach($jadwalGroup as $j)
                    <div class="schedule-item">
                        <span class="schedule-day">{{ $daysOfWeek[$j->Hari] ?? 'N/A' }}</span>
                        <span class="schedule-time">{{ $j->Jam_Mulai }} - {{ $j->Jam_Selesai }}</span>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="no-data">
                📭 Tidak ada jadwal dokter tersedia saat ini
            </div>
        @endforelse
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