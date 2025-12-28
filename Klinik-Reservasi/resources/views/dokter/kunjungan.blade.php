<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Kunjungan Pasien - Klinik Sejahtera</title>

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

        .profile-icon svg {
            fill: white;
        }

        .form-container {
            max-width: 550px;
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

        label {
            font-weight: bold;
            color: #00838f;
        }

        input, textarea, select, button {
            font-family: Arial, sans-serif !important;
        }

        input::placeholder,
        textarea::placeholder {
            font-family: Arial, sans-serif !important;
        }

        input, textarea, select {
            width: 100%;
            padding: 11px 18px;
            border-radius: 10px;
            margin-top: 6px;
            margin-bottom: 20px;
            border: 1px solid #bbb;
            font-size: 15px;
            box-sizing: border-box;
        }

        textarea {
            height: 90px;
        }

        button {
            width: 100%;
            background: #0097a7;
            padding: 14px;
            border: none;
            color: white;
            font-size: 17px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #007d8a;
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
            text-align:center;
            font-size:14px;
            cursor:pointer;
            color:white;
            font-weight:600;
        }

        .bottom-nav img, .bottom-nav svg {
            width:26px;
            display:block;
            margin:auto;
            filter: brightness(0) invert(1);
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
            <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
        </div>
    </div>

 <div class="form-container">
    <h2>Hasil Kunjungan Pasien</h2>

    @if($reservasi->isEmpty())
        <p style="text-align: center; color: #666;">Tidak ada reservasi yang menunggu untuk dikunjungi</p>
    @else
        <form action="{{ route('dokter.kunjungan.store') }}" method="POST">
            @csrf

            <!-- Pilih Reservasi -->
            <label>Pilih Pasien</label>
            <select name="ID_Reservasi" id="reservasiSelect" required onchange="fillFormData()">
                <option value="">-- Pilih Pasien --</option>
                @foreach($reservasi as $r)
                    <option value="{{ $r->ID_Reservasi }}" 
                            data-nama="{{ $r->pasien->user->name ?? '-' }}"
                            data-tanggal="{{ $r->Tanggal_Kunjungan }}"
                            data-jam="{{ $r->Jam_Kunjungan ?? '-' }}"
                            data-keluhan="{{ $r->Keluhan ?? '-' }}">
                        {{ $r->pasien->user->name ?? '-' }} - {{ $r->Tanggal_Kunjungan }}
                    </option>
                @endforeach
            </select>

            <!-- Nama Pasien (Auto-filled) -->
            <label>Nama Pasien</label>
            <input type="text" id="namaPasien" placeholder="Nama pasien" readonly style="background-color: #f5f5f5;">

            <!-- Tanggal Kunjungan (Auto-filled) -->
            <label>Tanggal Kunjungan</label>
            <input type="date" id="tanggalKunjungan" name="Tanggal_Kunjungan" readonly style="background-color: #f5f5f5;">

            <!-- Jam Kunjungan (Auto-filled) -->
            <label>Jam Kunjungan</label>
            <input type="text" id="jamKunjungan" name="Jam_Kunjungan" placeholder="Jam kunjungan" readonly style="background-color: #f5f5f5;">

            <!-- Keluhan (Auto-filled) -->
            <label>Keluhan</label>
            <textarea id="keluhanText" placeholder="Keluhan pasien" readonly style="background-color: #f5f5f5;"></textarea>

            <!-- Catatan Dokter (Manual Input) -->
            <label>Catatan Dokter</label>
            <textarea name="Catatan_Dokter" placeholder="Isi catatan pemeriksaan Anda" required></textarea>

            <!-- Tombol -->
            <div style="display:flex; gap:15px; margin-top:10px;">
                <button type="submit" style="flex:1;">Simpan</button>

                <button type="button"
                    onclick="history.back()"
                    style="
                        flex:1;
                        background:white;
                        color:#0097a7;
                        border:2px solid #0097a7;
                    ">
                    Batal
                </button>
            </div>
        </form>

        <script>
            function fillFormData() {
                const select = document.getElementById('reservasiSelect');
                const option = select.options[select.selectedIndex];
                
                if (option.value) {
                    document.getElementById('namaPasien').value = option.getAttribute('data-nama');
                    document.getElementById('tanggalKunjungan').value = option.getAttribute('data-tanggal');
                    document.getElementById('jamKunjungan').value = option.getAttribute('data-jam');
                    document.getElementById('keluhanText').value = option.getAttribute('data-keluhan');
                } else {
                    document.getElementById('namaPasien').value = '';
                    document.getElementById('tanggalKunjungan').value = '';
                    document.getElementById('jamKunjungan').value = '';
                    document.getElementById('keluhanText').value = '';
                }
            }
        </script>
    @endif

    <!-- BOTTOM NAV -->
    <div class="bottom-nav">

        <div onclick="location.href='{{ route('dokter.dashboard') }}'">
            <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9v9H3z"/>
            </svg>
            <div>Menu</div>
        </div>

        <div onclick="location.href='{{ route('dokter.dashboard') }}'">
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2"
                 viewBox="0 0 24 24">
                <polyline points="1 4 1 10 7 10"/>
                <path d="M3.51 15a9 9 0 1 0 .49-9"/>
                <polyline points="12 7 12 12 15 15"/>
            </svg>
            <div>Riwayat</div>
        </div>

        <div onclick="location.href='{{ route('dokter.dashboard') }}'">
            <svg width="26" height="26" fill="white" viewBox="0 0 24 24">
                <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9zM13.73 21a2 2 0 11-3.46 0"/>
            </svg>
            <div>Berita</div>
        </div>

        <div onclick="location.href='{{ route('dokter.dashboard') }}'">
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