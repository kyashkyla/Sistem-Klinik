<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Online</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef7f7;
        }

        /* HEADER */
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

        /* CONTENT */
        .wrap {
            display: flex;
            justify-content: center;
            padding: 40px 15px 120px;
        }

        .card {
            background: #fff;
            max-width: 640px;
            width: 100%;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .1);
        }

        h2 {
            text-align: center;
            color: #0097a7;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 9px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 13px;
        }


        textarea {
            resize: none;
            height: 70px;
        }


        button {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #0097a7;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
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
            width: auto;
            margin-top: 0;
        }

        .logout-btn:hover {
            background: #ff5252;
        }

        /* BOTTOM NAV (ASLI) */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #0097a7;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
        }

        .bottom-nav div {
            color: #fff;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
        }

        .bottom-nav svg {
            display: block;
            margin: auto;
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
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>

    <!-- CONTENT -->
    <div class="wrap">
        <div class="card">

            <h2>Daftar Online</h2>

            <form action="{{ route('pasien.jadwal') }}" method="POST">
                @csrf

                <label>Nama Pasien</label>
                <input type="text" value="{{ Auth::user()->name }}" disabled>

                <label>Keluhan</label>
                <textarea name="keluhan" placeholder="Tuliskan keluhan singkat" required>{{ old('keluhan') }}</textarea>
                @error('keluhan')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror

                <label>Pilih Dokter</label>
                <select name="id_dokter" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokter as $doc)
                        <option value="{{ $doc->id }}" {{ old('id_dokter') == $doc->id ? 'selected' : '' }}>
                            {{ $doc->name }} ({{ $doc->spesialis }})
                        </option>
                    @endforeach
                </select>
                @error('id_dokter')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror

                <label>Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}" required>
                @error('tanggal_kunjungan')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror

                <label>Jam Kunjungan</label>
                <select name="jam_kunjungan" required>
                    <option value="">-- Pilih Jam --</option>
                    <option value="08.00 - 09.00" {{ old('jam_kunjungan') == '08.00 - 09.00' ? 'selected' : '' }}>08.00 - 09.00</option>
                    <option value="09.00 - 10.00" {{ old('jam_kunjungan') == '09.00 - 10.00' ? 'selected' : '' }}>09.00 - 10.00</option>
                    <option value="10.00 - 11.00" {{ old('jam_kunjungan') == '10.00 - 11.00' ? 'selected' : '' }}>10.00 - 11.00</option>
                    <option value="13.00 - 14.00" {{ old('jam_kunjungan') == '13.00 - 14.00' ? 'selected' : '' }}>13.00 - 14.00</option>
                </select>
                @error('jam_kunjungan')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror

                <button type="submit">
                    Daftar Sekarang
                </button>

            </form>

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