<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #eef7f7;
            padding-bottom: 100px;
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

        .wrap {
            display: flex;
            justify-content: center;
            padding: 40px 15px 120px
        }

        .container {
            background: #fff;
            max-width: 640px;
            width: 100%;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .1)
        }

        h2 {
            text-align: center;
            color: #0097a7;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .promo-card {
            border: 2px solid #0097a7;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #fff 0%, #f0fafb 100%);
        }

        .promo-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 151, 167, 0.2);
        }

        .promo-title {
            font-size: 18px;
            font-weight: bold;
            color: #0097a7;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .promo-desc {
            font-size: 13px;
            color: #666;
            margin-bottom: 12px;
        }

        .promo-button {
            background: #0097a7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            transition: 0.3s ease;
        }

        .promo-button:hover {
            background: #00838f;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background-color: #fefefe;
            margin: 50px auto;
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            animation: slideUp 0.3s;
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }

        .modal-title {
            font-size: 22px;
            font-weight: bold;
            color: #0097a7;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #999;
            padding: 0;
            width: 30px;
            height: 30px;
        }

        .close-btn:hover {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-input, .form-textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', Arial;
            font-size: 14px;
            transition: 0.3s;
        }

        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: #0097a7;
            box-shadow: 0 0 0 3px rgba(0, 151, 167, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        .code-display {
            background: linear-gradient(135deg, #0097a7 0%, #00838f 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 20px;
        }

        .code-label {
            font-size: 12px;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        .code-value {
            font-size: 28px;
            font-weight: bold;
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            margin-bottom: 12px;
            word-break: break-all;
        }

        .copy-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid white;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 12px;
            transition: 0.3s;
        }

        .copy-btn:hover {
            background: rgba(255,255,255,0.3);
        }

        .terms {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            font-size: 12px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .cancel-btn, .submit-btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
        }

        .cancel-btn {
            background: #eee;
            color: #333;
        }

        .cancel-btn:hover {
            background: #ddd;
        }

        .submit-btn {
            background: #0097a7;
            color: white;
        }

        .submit-btn:hover {
            background: #00838f;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #0097a7;
            display: flex;
            justify-content: space-around;
            padding: 10px 0
        }

        .bottom-nav div {
            color: #fff;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer
        }

        .bottom-nav svg {
            display: block;
            margin: auto
        }

        .discount-badge {
            display: inline-block;
            background: #ff6b6b;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .success-message {
            background: #4caf50;
            color: white;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            display: none;
            text-align: center;
            animation: slideDown 0.3s;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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
            <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
        </div>
    </div>

    <!-- KONTEN -->
    <div class="wrap">
        <div class="container">
            <h2>
                <i class="bi bi-ticket-perforated"></i> 
                Promo & Diskon
            </h2>

            <div class="promo-card" onclick="openModal('diskon1')">
                <div class="promo-title">
                    <i class="bi bi-percent"></i>
                    Diskon 20% Pemeriksaan Umum
                    <span class="discount-badge">20%</span>
                </div>
                <div class="promo-desc">
                    Dapatkan diskon 20% untuk semua layanan pemeriksaan kesehatan umum. Berlaku hingga akhir tahun.
                </div>
                <button class="promo-button" onclick="openModal('diskon1'); event.stopPropagation();">
                    <i class="bi bi-gift"></i> Ambil Kupon
                </button>
            </div>

            <div class="promo-card" onclick="openModal('diskon2')">
                <div class="promo-title">
                    <i class="bi bi-star"></i>
                    Gratis Konsultasi Pasien Baru
                    <span class="discount-badge">Gratis</span>
                </div>
                <div class="promo-desc">
                    Konsultasi pertama gratis untuk semua pasien baru yang mendaftar melalui aplikasi ini.
                </div>
                <button class="promo-button" onclick="openModal('diskon2'); event.stopPropagation();">
                    <i class="bi bi-gift"></i> Ambil Kupon
                </button>
            </div>

            <div class="promo-card" onclick="openModal('diskon3')">
                <div class="promo-title">
                    <i class="bi bi-heart"></i>
                    Paket Check-up Lengkap Hemat
                    <span class="discount-badge">30%</span>
                </div>
                <div class="promo-desc">
                    Paket pemeriksaan kesehatan menyeluruh dengan harga khusus untuk member baru.
                </div>
                <button class="promo-button" onclick="openModal('diskon3'); event.stopPropagation();">
                    <i class="bi bi-gift"></i> Ambil Kupon
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL DISKON 1 -->
    <div id="diskon1Modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Diskon 20%</div>
                <button class="close-btn" onclick="closeModal('diskon1')">&times;</button>
            </div>

            <div class="success-message" id="diskon1Success">
                <i class="bi bi-check-circle"></i> Kode kupon berhasil disalin!
            </div>

            <div class="code-display">
                <div class="code-label">Kode Kupon Anda</div>
                <div class="code-value" id="diskon1Code">KLINIK2024</div>
                <button class="copy-btn" onclick="copyCode('diskon1Code', 'diskon1Success')">
                    <i class="bi bi-files"></i> Salin Kode
                </button>
            </div>

            <div class="form-group">
                <label class="form-label">Detail Promo</label>
                <textarea class="form-textarea" readonly>Diskon 20% untuk Pemeriksaan Umum

Benefit:
• Diskon 20% untuk semua layanan pemeriksaan kesehatan umum
• Berlaku untuk 1 kali pemeriksaan
• Dapat digunakan dengan dokter apapun
• Berlaku hingga 31 Desember 2025

Cara Penggunaan:
1. Gunakan kode kupon saat melakukan pembayaran
2. Diskon otomatis akan dikurangkan dari total biaya
3. Kode kupon hanya berlaku sekali</textarea>
            </div>

            <div class="terms">
                <strong>Syarat & Ketentuan:</strong>
                <ul style="margin: 10px 0 0 20px;">
                    <li>Kupon tidak dapat digabung dengan promosi lain</li>
                    <li>Berlaku untuk pasien lama dan baru</li>
                    <li>Berlaku hingga 31 Desember 2025</li>
                    <li>Kode tidak dapat ditransfer atau dijual</li>
                </ul>
            </div>

            <div class="action-buttons">
                <button class="cancel-btn" onclick="closeModal('diskon1')">Tutup</button>
                <button class="submit-btn" onclick="redeemCoupon('KLINIK2024')">
                    <i class="bi bi-check"></i> Gunakan Kupon
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL DISKON 2 -->
    <div id="diskon2Modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Gratis Konsultasi</div>
                <button class="close-btn" onclick="closeModal('diskon2')">&times;</button>
            </div>

            <div class="success-message" id="diskon2Success">
                <i class="bi bi-check-circle"></i> Kode kupon berhasil disalin!
            </div>

            <div class="code-display">
                <div class="code-label">Kode Kupon Anda</div>
                <div class="code-value" id="diskon2Code">KONSULTASI</div>
                <button class="copy-btn" onclick="copyCode('diskon2Code', 'diskon2Success')">
                    <i class="bi bi-files"></i> Salin Kode
                </button>
            </div>

            <div class="form-group">
                <label class="form-label">Detail Promo</label>
                <textarea class="form-textarea" readonly>Gratis Konsultasi untuk Pasien Baru

Benefit:
• Konsultasi gratis dengan dokter spesialis
• Pemeriksaan awal kesehatan tanpa biaya
• Dapat dilakukan secara online atau offline
• Valid untuk 1 kali konsultasi

Cara Penggunaan:
1. Daftarkan diri Anda sebagai pasien baru
2. Gunakan kode kupon saat membuat jadwal konsultasi
3. Konsultasi pertama akan gratis
4. Jika diperlukan pemeriksaan lanjutan, akan dikenakan biaya normal</textarea>
            </div>

            <div class="terms">
                <strong>Syarat & Ketentuan:</strong>
                <ul style="margin: 10px 0 0 20px;">
                    <li>Hanya untuk pasien baru yang belum pernah berkunjung</li>
                    <li>Kupon berlaku hingga 31 Januari 2025</li>
                    <li>Gratis hanya untuk konsultasi, pemeriksaan tambahan sesuai tarif</li>
                    <li>Wajib membawa kartu identitas saat konsultasi</li>
                </ul>
            </div>

            <div class="action-buttons">
                <button class="cancel-btn" onclick="closeModal('diskon2')">Tutup</button>
                <button class="submit-btn" onclick="redeemCoupon('KONSULTASI')">
                    <i class="bi bi-check"></i> Gunakan Kupon
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL DISKON 3 -->
    <div id="diskon3Modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Paket Check-up Hemat</div>
                <button class="close-btn" onclick="closeModal('diskon3')">&times;</button>
            </div>

            <div class="success-message" id="diskon3Success">
                <i class="bi bi-check-circle"></i> Kode kupon berhasil disalin!
            </div>

            <div class="code-display">
                <div class="code-label">Kode Kupon Anda</div>
                <div class="code-value" id="diskon3Code">CHECKUP30</div>
                <button class="copy-btn" onclick="copyCode('diskon3Code', 'diskon3Success')">
                    <i class="bi bi-files"></i> Salin Kode
                </button>
            </div>

            <div class="form-group">
                <label class="form-label">Detail Promo</label>
                <textarea class="form-textarea" readonly>Paket Check-up Lengkap dengan Diskon 30%

Benefit:
• Diskon 30% untuk paket check-up komprehensif
• Pemeriksaan laboratorium lengkap
• Konsultasi dengan dokter spesialis
• Hasil lab dapat diakses online

Cara Penggunaan:
1. Hubungi kami untuk informasi paket lengkap
2. Gunakan kode kupon saat melakukan pemesanan
3. Jadwalkan waktu check-up Anda
4. Hadir sesuai jadwal yang ditentukan</textarea>
            </div>

            <div class="terms">
                <strong>Syarat & Ketentuan:</strong>
                <ul style="margin: 10px 0 0 20px;">
                    <li>Berlaku untuk semua kelompok usia</li>
                    <li>Kupon berlaku sampai 28 Februari 2025</li>
                    <li>Hasil lab dikirim dalam 2-3 hari kerja</li>
                    <li>Paket tidak termasuk biaya obat/resep tambahan</li>
                </ul>
            </div>

            <div class="action-buttons">
                <button class="cancel-btn" onclick="closeModal('diskon3')">Tutup</button>
                <button class="submit-btn" onclick="redeemCoupon('CHECKUP30')">
                    <i class="bi bi-check"></i> Gunakan Kupon
                </button>
            </div>
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

    <script>
        function openModal(diskonId) {
            const modalId = diskonId + 'Modal';
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(diskonId) {
            const modalId = diskonId + 'Modal';
            document.getElementById(modalId).style.display = 'none';
        }

        function copyCode(codeId, successId) {
            const codeElement = document.getElementById(codeId);
            const codeText = codeElement.textContent;
            
            navigator.clipboard.writeText(codeText).then(() => {
                const successMsg = document.getElementById(successId);
                successMsg.style.display = 'block';
                setTimeout(() => {
                    successMsg.style.display = 'none';
                }, 2000);
            });
        }

        function redeemCoupon(code) {
            alert('Kupon "' + code + '" berhasil digunakan!\n\nGunakan kode ini saat melakukan pembayaran untuk mendapatkan diskon.');
        }

        // Tutup modal jika klik di luar
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>

</body>

</html>