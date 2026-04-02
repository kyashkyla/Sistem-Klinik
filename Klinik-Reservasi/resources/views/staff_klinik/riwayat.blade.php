<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Riwayat Reservasi - Klinik Sejahtera</title>

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
            max-width: 900px;
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
            padding: 12px;
            text-align: left;
            font-size: 13px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        .status {
            padding: 6px 10px;
            font-size: 12px;
            border-radius: 8px;
            font-weight: bold;
        }

        .disetujui { 
            background: #d4edda; 
            color: #155724; 
        }

        .badge {
            padding: 4px 8px;
            font-size: 11px;
            border-radius: 5px;
            font-weight: bold;
        }

        .badge-selesai {
            background: #90EE90;
            color: #2d5016;
        }

        .badge-belum {
            background: #FFB6C1;
            color: #8b0000;
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

        .bottom-nav svg {
            width: 28px;
            height: 28px;
            display: block;
            margin: 0 auto 4px;
            fill: white;
            stroke: white;
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

    <!-- CONTENT -->
    <div class="content-container">
        <h2>Riwayat Reservasi (Disetujui)</h2>

        <table>
            <thead>
                <tr>
                    <th>ID Reservasi</th>
                    <th>Nama Pasien</th>
                    <th>Dokter</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Status Reservasi</th>
                    <th>Status Pemeriksaan</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($reservasi as $r)
                <tr>
                    <td>{{ $r->ID_Reservasi }}</td>

                    <td>{{ $r->pasien->user->name ?? '-' }}</td>

                    <td>{{ $r->dokter->Nama ?? '-' }}</td>

                    <td>{{ \Carbon\Carbon::parse($r->Tanggal_Kunjungan)->format('d-m-Y') }}</td>

                    <td>
                        <span class="status disetujui">
                            {{ $r->Status }}
                        </span>
                    </td>

                    <td>
                        @if($r->hasilKunjungan && count($r->hasilKunjungan) > 0)
                            <span class="badge badge-selesai">Selesai Diperiksa</span>
                        @else
                            <span class="badge badge-belum">Belum Diperiksa</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:15px; color:#777;">
                        Tidak ada data riwayat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
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
            <div>Notifikasi</div>
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
