<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reservasi Kamar - Grand Tugu Kujang Hotel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cormorant Garamond', 'Georgia', serif;
            color: #1a1a1a;
            overflow-x: hidden;
            background: #0a0a0a;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.4s ease;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 30px rgba(212, 175, 55, 0.2);
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
        }

        .navbar-logo-icon {
            width: 60px;
            height: auto;
            transition: all 0.3s ease;
        }

        .navbar-logo-text {
            font-size: 20px;
            font-weight: 300;
            letter-spacing: 3px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-menu {
            display: flex;
            gap: 40px;
            list-style: none;
            align-items: center;
        }

        .navbar-menu li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 2px;
            text-transform: uppercase;
            position: relative;
            padding: 5px 0;
            transition: all 0.3s ease;
        }

        .navbar-menu li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #d4af37, #f4e5b0);
            transition: width 0.3s ease;
        }

        .navbar-menu li a:hover {
            color: #d4af37;
        }

        .navbar-menu li a:hover::after {
            width: 100%;
        }

        .mobile-toggle {
            display: none;
            flex-direction: column;
            gap: 6px;
            cursor: pointer;
            padding: 10px;
        }

        .mobile-toggle span {
            width: 30px;
            height: 3px;
            background: linear-gradient(90deg, #d4af37, #f4e5b0);
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .page-header {
            height: 40vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
            margin-top: 80px;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(212, 175, 55, 0.15) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .page-header-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-title {
            font-size: 64px;
            font-weight: 300;
            letter-spacing: 8px;
            margin-bottom: 20px;
            text-transform: uppercase;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 50%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            font-size: 20px;
            letter-spacing: 3px;
            color: #f4e5b0;
            font-style: italic;
        }

        .decorative-line {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af37, transparent);
            margin: 30px auto;
        }

        .reservation-section {
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 100%);
            padding: 80px 20px;
            min-height: 100vh;
        }

        .reservation-container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(26, 26, 46, 0.6);
            border-radius: 20px;
            padding: 60px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-label {
            display: block;
            color: #d4af37;
            font-size: 18px;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .form-label .required {
            color: #ff6b6b;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 15px 20px;
            background: rgba(15, 15, 30, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            font-family: 'Cormorant Garamond', 'Georgia', serif;
            transition: all 0.3s ease;
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #d4af37;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
        }

        .form-input[readonly] {
            background: rgba(15, 15, 30, 0.5);
            cursor: not-allowed;
        }

        .form-radio-group {
            display: flex;
            gap: 30px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .radio-item input[type="radio"] {
            width: 20px;
            height: 20px;
            accent-color: #d4af37;
            cursor: pointer;
        }

        .radio-item label {
            color: #f4e5b0;
            font-size: 16px;
            cursor: pointer;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            background: rgba(15, 15, 30, 0.5);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .checkbox-item:hover {
            border-color: rgba(212, 175, 55, 0.5);
            background: rgba(15, 15, 30, 0.7);
        }

        .checkbox-item input[type="checkbox"] {
            width: 24px;
            height: 24px;
            accent-color: #d4af37;
            cursor: pointer;
        }

        .checkbox-item label {
            color: #f4e5b0;
            font-size: 18px;
            cursor: pointer;
            flex: 1;
        }

        .checkbox-note {
            font-size: 14px;
            color: #888;
            font-style: italic;
        }

        .button-group {
            display: flex;
            gap: 20px;
            margin-top: 40px;
        }

        .btn {
            flex: 1;
            padding: 18px 40px;
            font-size: 18px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.4s ease;
            border: none;
            font-family: 'Cormorant Garamond', 'Georgia', serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 50%, #d4af37 100%);
            color: #0a0a0a;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.5);
        }

        .btn-secondary {
            background: rgba(212, 175, 55, 0.1);
            color: #d4af37;
            border: 2px solid #d4af37;
        }

        .btn-secondary:hover {
            background: rgba(212, 175, 55, 0.2);
            transform: translateY(-3px);
        }

        .btn-danger {
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
            border: 2px solid #ff6b6b;
        }

        .btn-danger:hover {
            background: rgba(255, 107, 107, 0.2);
            transform: translateY(-3px);
        }

        .error-message {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 8px;
            display: block;
        }

        .alert {
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 16px;
        }

        .alert-danger {
            background: rgba(255, 107, 107, 0.1);
            border: 1px solid #ff6b6b;
            color: #ff6b6b;
        }

        .total-info {
            background: rgba(212, 175, 55, 0.1);
            border: 2px solid #d4af37;
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .total-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .total-label {
            color: #f4e5b0;
            font-size: 16px;
        }

        .total-value {
            color: #d4af37;
            font-size: 16px;
            font-weight: bold;
        }

        .total-final {
            font-size: 24px !important;
            letter-spacing: 2px;
        }

        .footer {
            background: #0a0a0a;
            padding: 40px 20px;
            text-align: center;
            color: #888;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .mobile-toggle {
                display: flex;
            }

            .navbar-menu {
                position: fixed;
                top: 70px;
                left: -100%;
                right: 0;
                flex-direction: column;
                background: rgba(10, 10, 10, 0.98);
                backdrop-filter: blur(10px);
                padding: 40px 20px;
                gap: 30px;
                transition: left 0.4s ease;
                border-top: 1px solid rgba(212, 175, 55, 0.3);
            }

            .navbar-menu.active {
                left: 0;
            }

            .page-title {
                font-size: 42px;
            }

            .reservation-container {
                padding: 30px 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .form-radio-group {
                flex-direction: column;
                gap: 15px;
            }
        }

        .mobile-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
        }
    </style>
</head>
<body>
    <nav class="navbar" id="navbar">
        <a href="/" class="navbar-logo">
            <img class="navbar-logo-icon" src="{{ asset('storage/assets/images/logo.png') }}"/>
            <span class="navbar-logo-text">GRAND TUGU KUJANG</span>
        </a>
        
        <ul class="navbar-menu" id="navbarMenu">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/product">Product</a></li>
            <li><a href="/price">Price</a></li>
        </ul>

        <div class="mobile-toggle" id="mobileToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">Reservasi</h1>
            <div class="decorative-line"></div>
            <p class="page-subtitle">Pesan Kamar Impian Anda</p>
        </div>
    </section>

    <section class="reservation-section">
        <div class="reservation-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terdapat kesalahan:</strong>
                    <ul style="margin-top: 10px; margin-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nama Pemesan <span class="required">*</span></label>
                    <input type="text" name="nama_pemesan" class="form-input" value="{{ old('nama_pemesan') }}" required>
                    @error('nama_pemesan')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                    <div class="form-radio-group">
                        <div class="radio-item">
                            <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                            <label for="laki">Laki-laki</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} required>
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Identitas (KTP) <span class="required">*</span></label>
                    <input type="text" name="nomor_identitas" class="form-input" maxlength="16" value="{{ old('nomor_identitas') }}" required>
                    <small style="color: #888; font-size: 14px; display: block; margin-top: 8px;">Harus 16 digit angka</small>
                    @error('nomor_identitas')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Tipe Kamar <span class="required">*</span></label>
                    <input type="text" id="tipe_kamar_display" class="form-input" value="{{ old('tipe_kamar', $tipeKamar) }}" readonly style="background: rgba(212, 175, 55, 0.1); border-color: rgba(212, 175, 55, 0.4); color: #d4af37; font-weight: bold;">
                    <input type="hidden" name="tipe_kamar" id="tipe_kamar" value="{{ old('tipe_kamar', $tipeKamar) }}">
                    <small style="color: #888; font-size: 14px; display: block; margin-top: 8px;">
                        Tipe kamar dipilih dari halaman produk. 
                        <a href="/products" style="color: #d4af37; text-decoration: underline;">Ubah pilihan kamar</a>
                    </small>
                    @error('tipe_kamar')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Harga per Malam</label>
                    <input type="text" name="harga" id="harga" class="form-input" value="{{ old('harga', $harga) }}" readonly>
                </div>

                <div class="form-group">
                    <label class="form-label">Tanggal Pesan <span class="required">*</span></label>
                    <input type="date" name="tanggal_pesan" class="form-input" value="{{ old('tanggal_pesan', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}" required>
                    @error('tanggal_pesan')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Durasi Menginap (Hari) <span class="required">*</span></label>
                    <input type="number" name="durasi_menginap" id="durasi_menginap" class="form-input" value="{{ old('durasi_menginap', 1) }}" min="1" required>
                    <small style="color: #888; font-size: 14px; display: block; margin-top: 8px;">Diskon 10% untuk menginap lebih dari 3 hari</small>
                    @error('durasi_menginap')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Fasilitas Tambahan</label>
                    <div class="checkbox-item">
                        <input type="checkbox" id="breakfast" name="breakfast" value="1" {{ old('breakfast') ? 'checked' : '' }}>
                        <label for="breakfast">Termasuk Breakfast</label>
                        <span class="checkbox-note">+ Rp 80.000 / hari</span>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-secondary" id="btnHitung" style="width: 100%;">
                        Hitung Total Bayar
                    </button>
                </div>

                <div class="total-info" id="totalInfo" style="display: none;">
                    <div class="total-row">
                        <span class="total-label">Subtotal (Harga × Durasi):</span>
                        <span class="total-value" id="subtotalText">Rp 0</span>
                    </div>
                    <div class="total-row" id="diskonRow" style="display: none;">
                        <span class="total-label">Diskon (10%):</span>
                        <span class="total-value" style="color: #4ade80;" id="diskonText">- Rp 0</span>
                    </div>
                    <div class="total-row" id="breakfastRow" style="display: none;">
                        <span class="total-label">Breakfast:</span>
                        <span class="total-value" id="breakfastText">+ Rp 0</span>
                    </div>
                    <div class="total-row">
                        <span class="total-label total-final">TOTAL BAYAR:</span>
                        <span class="total-value total-final" id="totalText">Rp 0</span>
                    </div>
                </div>

                <input type="hidden" name="total_bayar" id="total_bayar" value="{{ old('total_bayar', 0) }}">

                <div class="button-group">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='/'">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan Pemesanan</button>
                </div>
            </form>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2025 Grand Tugu Kujang Hotel. All Rights Reserved.</p>
        <p style="margin-top: 10px;">Designed with Excellence & Luxury</p>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const navbarMenu = document.getElementById('navbarMenu');

        mobileToggle.addEventListener('click', () => {
            mobileToggle.classList.toggle('active');
            navbarMenu.classList.toggle('active');
        });

        navbarMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileToggle.classList.remove('active');
                navbarMenu.classList.remove('active');
            });
        });

        // Format rupiah
        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Update harga saat tipe kamar berubah
        document.getElementById('tipe_kamar').addEventListener('change', function() {
            const tipe = this.value;
            fetch('/booking/get-harga?tipe=' + tipe)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('harga').value = data.harga;
                    // Reset total info
                    document.getElementById('totalInfo').style.display = 'none';
                });
        });

        // Validasi nomor identitas
        document.querySelector('input[name="nomor_identitas"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '');
            if (this.value.length > 16) {
                this.value = this.value.slice(0, 16);
            }
        });

        // Hitung total bayar
        document.getElementById('btnHitung').addEventListener('click', function() {
            const harga = parseFloat(document.getElementById('harga').value) || 0;
            const durasi = parseInt(document.getElementById('durasi_menginap').value) || 1;
            const breakfast = document.getElementById('breakfast').checked;

            if (durasi < 1) {
                alert('Durasi menginap minimal 1 hari');
                return;
            }

            fetch('/booking/hitung-total', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    harga: harga,
                    durasi: durasi,
                    breakfast: breakfast
                })
            })
            .then(response => response.json())
            .then(data => {
                // Update tampilan
                document.getElementById('subtotalText').textContent = formatRupiah(data.subtotal);
                
                if (data.diskon > 0) {
                    document.getElementById('diskonRow').style.display = 'flex';
                    document.getElementById('diskonText').textContent = '- ' + formatRupiah(data.diskon);
                } else {
                    document.getElementById('diskonRow').style.display = 'none';
                }

                if (data.breakfast_cost > 0) {
                    document.getElementById('breakfastRow').style.display = 'flex';
                    document.getElementById('breakfastText').textContent = '+ ' + formatRupiah(data.breakfast_cost);
                } else {
                    document.getElementById('breakfastRow').style.display = 'none';
                }

                document.getElementById('totalText').textContent = formatRupiah(data.total);
                document.getElementById('total_bayar').value = data.total;
                document.getElementById('totalInfo').style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghitung total');
            });
        });

        // Validasi form sebelum submit
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            const totalBayar = parseFloat(document.getElementById('total_bayar').value);
            
            if (!totalBayar || totalBayar <= 0) {
                e.preventDefault();
                alert('Silakan hitung total bayar terlebih dahulu');
                return false;
            }

            const nomorIdentitas = document.querySelector('input[name="nomor_identitas"]').value;
            if (nomorIdentitas.length !== 16) {
                e.preventDefault();
                alert('Nomor identitas harus 16 digit');
                return false;
            }

            if (!confirm('Apakah Anda yakin data pemesanan sudah benar?')) {
                e.preventDefault();
                return false;
            }
        });

        // Auto calculate when values change
        ['durasi_menginap', 'breakfast'].forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('change', function() {
                    if (document.getElementById('totalInfo').style.display === 'block') {
                        document.getElementById('btnHitung').click();
                    }
                });
            }
        });
    </script>
</body>
</html>
                    