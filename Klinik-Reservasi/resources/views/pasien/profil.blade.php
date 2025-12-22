<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profil Saya</title>

<style>
* {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    background: #eef6f6;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 520px;
    margin: 40px auto 120px;
    background: #fff;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

h2 {
    text-align: center;
    color: #0097a7;
    margin-bottom: 25px;
}

label {
    display: block;
    margin-top: 15px;
    margin-bottom: 6px;
    font-size: 14px;
    color: #333;
}

input, textarea {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #0097a7;
}

textarea {
    resize: none;
    height: 90px;
}

.note {
    font-size: 12px;
    color: #777;
    margin-top: 4px;
}

.btn-group {
    display: flex;
    gap: 10px;
    margin-top: 25px;
}

button {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
}

.btn-save {
    background: #0097a7;
    color: white;
}

.btn-update {
    background: #ffa000;
    color: white;
}

.btn-delete {
    background: #e53935;
    color: white;
}

/* LOGOUT */
.btn-logout {
    background: #455a64;
    color: white;
    width: 100%;
}
</style>
</head>

<body>

<div class="container">
    <h2>Profil Saya</h2>

    <label>Nama Lengkap</label>
    <input type="text" placeholder="Nama lengkap">

    <label>Umur</label>
    <input type="number" placeholder="Masukkan umur">

    <label>NIK</label>
    <input type="text" placeholder="16 digit NIK">

    <label>Alamat</label>
    <textarea placeholder="Alamat lengkap"></textarea>

    <label>No Telepon</label>
    <input type="text" placeholder="08xxxxxxxxxx">

    <label>Email</label>
    <input type="email" placeholder="email@example.com" disabled>
    <div class="note">Email tidak dapat diubah</div>

    <label>No BPJS <span class="note">(Opsional)</span></label>
    <input type="text" placeholder="Masukkan nomor BPJS jika ada">

    <label>Password Baru</label>
    <input type="password" placeholder="Kosongkan jika tidak diubah">

    <label>Biodata Diri</label>
    <textarea placeholder="Riwayat singkat / catatan kesehatan"></textarea>

    <!-- SIMPAN & UPDATE -->
    <div class="btn-group">
        <button class="btn-save">Simpan</button>
        <button class="btn-update">Update</button>
    </div>

    <!-- HAPUS AKUN -->
    <div class="btn-group">
        <button class="btn-delete">Hapus Akun</button>
    </div>

    <!-- LOGOUT -->
    <div class="btn-group">
        <form action="{{ route('logout') }}" method="GET" style="width:100%">
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</div>

</body>
</html>
