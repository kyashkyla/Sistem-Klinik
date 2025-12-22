<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Riwayat Pasien</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* === COPY CSS MENTAH === */
body{margin:0;font-family:Arial,sans-serif;background:#eef7f7;padding-bottom:100px}
.header{background:#0097a7;color:#fff;padding:15px 25px;display:flex;align-items:center}
.logo-box{display:flex;align-items:center;gap:10px;font-size:22px;font-weight:bold}
.logo-circle{background:white;color:#0097a7;border-radius:50%;width:45px;height:45px;display:flex;align-items:center;justify-content:center;font-size:30px;font-weight:900}
.container{padding:25px}
h2{color:#006064;margin-bottom:20px}
.card{background:white;border-radius:20px;padding:20px;box-shadow:0 8px 20px rgba(0,0,0,.15)}
table{width:100%;border-collapse:collapse}
th{background:#0097a7;color:white;padding:12px}
td{padding:12px;border-bottom:1px solid #ddd;text-align:center}
.bottom-nav{position:fixed;bottom:0;left:0;width:100%;background:#0097a7;display:flex;justify-content:space-around;padding:10px 0;z-index:999}
.bottom-nav div{text-align:center;font-size:14px;cursor:pointer;color:white;font-weight:600}
.bottom-nav svg{display:block;margin:0 auto 4px}
</style>
</head>
<body>

<div class="header"><div class="logo-box"><div class="logo-circle">+</div>Klinik Sejahtera</div></div>

<div class="container">
<h2>Riwayat Pasien</h2>
<div class="card">
<table>
<tr><th>No</th><th>Pasien</th><th>Tindakan</th><th>Tanggal</th></tr>
<tr><td>1</td><td>Ahmad</td><td>Check Up</td><td>20-12-2025</td></tr>
<tr><td>2</td><td>Siti</td><td>Konsultasi</td><td>19-12-2025</td></tr>
</table>
</div>
</div>


<!-- BOTTOM NAV -->
<div class="bottom-nav">

    <div onclick="location.href='{{ route('staff.dashboard') }}'">
        <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M3 12l9-9 9 9v9H3z"/>
        </svg>
        <div>Menu</div>
    </div>

    <div onclick="location.href='{{ route('staff.riwayat') }}'">
        <svg width="28" height="28" fill="none" stroke="white" stroke-width="2"
             viewBox="0 0 24 24">
            <polyline points="1 4 1 10 7 10"/>
            <path d="M3.51 15a9 9 0 1 0 .49-9"/>
            <polyline points="12 7 12 12 15 15"/>
        </svg>
        <div>Riwayat</div>
    </div>

   <div onclick="location.href='{{ route('staff.dashboard') }}'">
        <svg width="26" height="26" fill="white" viewBox="0 0 24 24">
            <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9z"/>
        </svg>
        <div>Notifikasi</div>
    </div>

    <div onclick="location.href='{{ route('staff.dashboard') }}'">
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
