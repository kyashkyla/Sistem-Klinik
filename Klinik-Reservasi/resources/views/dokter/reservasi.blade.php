<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Reservasi Pasien - Klinik Sejahtera</title>

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

        .content-container {
            max-width: 750px;
            background: white;
            margin: 35px auto 120px;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #007d8a;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border-radius: 12px;
            overflow: hidden;
        }

        table th {
            background: #0097a7;
            color: white;
            padding: 14px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 14px 12px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 13px;
        }

        table tbody tr:hover {
            background-color: #f5f9fa;
            transition: background-color 0.2s ease;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        .status {
            padding: 6px 10px;
            font-size: 13px;
            border-radius: 8px;
            font-weight: bold;
        }

        .pending { background: #fff3cd; color: #856404; }
        .disetujui { background: #d4edda; color: #155724; }
        .dibatalkan { background: #f8d7da; color: #721c24; }

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
        }

        .bottom-nav svg {
            width: 26px;
            display: block;
            margin: auto;
            fill: white;
        }

        .bottom-nav div:hover {
            opacity: 0.8;
            transition: opacity 0.2s ease;
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
            <div class="profile-icon">
                <svg width="26" height="26" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M12 14c-4.4 0-8 2-8 4v2h16v-2c0-2-3.6-4-8-4z"></path>
                </svg>
            </div>
            <a href="{{ route('logout') }}" style="background: #ff6b6b; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; text-decoration: none; font-size: 13px; font-weight: 600;">Logout</a>
        </div>
    </div>

    <!-- TABEL RESERVASI -->
    <div class="content-container">
        <h2>Daftar Reservasi Pasien</h2>

        <table>
    <thead>
        <tr>
            <th>ID Reservasi</th>
            <th>Nama Pasien</th>
            <th>Jadwal</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($reservasi as $r)
        <tr>
            <td><strong>{{ $r->ID_Reservasi }}</strong></td>

            <td>{{ $r->pasien->Nama ?? '-' }}</td>

            <td>
                @if($r->jadwal)
                    <strong>{{ $r->jadwal->Hari ?? '-' }}</strong><br/>
                    <small>{{ $r->jadwal->Jam_Mulai ?? '' }} - {{ $r->jadwal->Jam_Selesai ?? '' }}</small>
                @else
                    <small style="color: #999;">Jadwal belum ditentukan</small>
                @endif
            </td>

            <td>{{ \Carbon\Carbon::parse($r->Tanggal_Kunjungan)->format('d-m-Y') ?? $r->Tanggal_Reservasi }}</td>

            <td>
                <span class="status {{ strtolower($r->Status) }}">
                    {{ $r->Status }}
                </span>
            </td>

            <td>
                <a href="{{ route('dokter.periksa', $r->ID_Reservasi) }}"
                   style="background:#0097a7; color:white; padding:8px 14px; border-radius:8px; text-decoration:none; font-size:12px; font-weight:600; display:inline-block;">
                    Periksa
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align:center; padding:20px; color:#777;">
                Tidak ada reservasi disetujui.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
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
            <div>Notifikasi</div>
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