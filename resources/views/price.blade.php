<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Harga - Grand Tugu Kujang Hotel</title>
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

        /* Navbar */
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
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 50px;
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
            width: 70px;
            height: auto;
            transition: all 0.3s ease;
        }

        .navbar.scrolled .navbar-logo-icon {
            width: 60px;
        }

        .navbar-logo-text {
            font-size: 24px;
            font-weight: 300;
            letter-spacing: 3px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
        }

        .navbar.scrolled .navbar-logo-text {
            font-size: 20px;
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

        /* Page Header */
        .page-header {
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
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

        /* Price Section */
        .price-section {
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 100%);
            padding: 100px 20px;
        }

        .price-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .price-intro {
            text-align: center;
            margin-bottom: 60px;
        }

        .intro-text {
            font-size: 18px;
            line-height: 1.8;
            color: #c0c0c0;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Table Styles */
        .table-wrapper {
            background: rgba(26, 26, 46, 0.6);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .price-table {
            width: 100%;
            border-collapse: collapse;
        }

        .price-table thead {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.2), rgba(15, 52, 96, 0.2));
        }

        .price-table th {
            padding: 25px 20px;
            text-align: left;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #d4af37;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        }

        .price-table tbody tr {
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.3s ease;
        }

        .price-table tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
            transform: scale(1.01);
        }

        .price-table tbody tr:last-child {
            border-bottom: none;
        }

        .price-table td {
            padding: 30px 20px;
            color: #c0c0c0;
            font-size: 16px;
        }

        .room-type-cell {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .room-name {
            font-size: 24px;
            font-weight: bold;
            color: #f4e5b0;
            letter-spacing: 1px;
        }

        .room-category {
            font-size: 14px;
            color: #d4af37;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .price-cell {
            font-size: 28px;
            font-weight: bold;
            color: #d4af37;
            letter-spacing: 1px;
        }

        .price-period {
            font-size: 14px;
            color: #c0c0c0;
            font-weight: normal;
            display: block;
            margin-top: 5px;
        }

        .action-cell {
            text-align: center;
        }

        .view-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 50%, #d4af37 100%);
            color: #0a0a0a;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.4s ease;
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
        }

        .view-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.5);
        }

        /* Note Section */
        .price-note {
            margin-top: 40px;
            padding: 30px;
            background: rgba(212, 175, 55, 0.05);
            border-radius: 15px;
            border-left: 4px solid #d4af37;
        }

        .note-title {
            font-size: 20px;
            color: #d4af37;
            margin-bottom: 15px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .note-list {
            list-style: none;
            padding: 0;
        }

        .note-list li {
            font-size: 16px;
            color: #c0c0c0;
            line-height: 1.8;
            padding-left: 25px;
            position: relative;
            margin-bottom: 10px;
        }

        .note-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #d4af37;
            font-weight: bold;
        }

        /* CTA Section */
        .cta-section {
            text-align: center;
            margin-top: 80px;
            padding: 60px 20px;
            background: rgba(26, 26, 46, 0.4);
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .cta-title {
            font-size: 36px;
            color: #d4af37;
            margin-bottom: 20px;
            letter-spacing: 3px;
        }

        .cta-text {
            font-size: 18px;
            color: #c0c0c0;
            margin-bottom: 30px;
        }

        .cta-button {
            display: inline-block;
            padding: 18px 50px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 50%, #d4af37 100%);
            color: #0a0a0a;
            text-decoration: none;
            font-size: 18px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.5);
        }

        /* Footer */
        .footer {
            background: #0a0a0a;
            padding: 40px 20px;
            text-align: center;
            color: #888;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .navbar.scrolled {
                padding: 12px 20px;
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

            .navbar-logo-text {
                font-size: 18px;
            }

            .page-title {
                font-size: 36px;
                letter-spacing: 4px;
            }

            .page-subtitle {
                font-size: 16px;
            }

            /* Mobile Table */
            .table-wrapper {
                overflow-x: auto;
            }

            .price-table {
                min-width: 600px;
            }

            .price-table th,
            .price-table td {
                padding: 15px 10px;
                font-size: 14px;
            }

            .room-name {
                font-size: 18px;
            }

            .price-cell {
                font-size: 20px;
            }

            .view-button {
                padding: 10px 20px;
                font-size: 12px;
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
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <a href="/" class="navbar-logo">
            <img src="{{asset('storage/assets/images/logo.png')}}" class="navbar-logo-icon"/>
            <span class="navbar-logo-text">GRAND TUGU KUJANG</span>
        </a>
        
        <ul class="navbar-menu" id="navbarMenu">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/rooms">Product</a></li>
            <li><a href="/price">Price</a></li>
        </ul>

        <div class="mobile-toggle" id="mobileToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">Daftar Harga</h1>
            <div class="decorative-line"></div>
            <p class="page-subtitle">Transparansi Harga untuk Pengalaman Terbaik Anda</p>
        </div>
    </section>

    <!-- Price Section -->
    <section class="price-section">
        <div class="price-container">
            <div class="price-intro">
                <p class="intro-text">
                    Kami berkomitmen memberikan transparansi harga untuk setiap tipe kamar. 
                    Semua harga sudah termasuk pajak dan layanan. Nikmati kemewahan dengan nilai terbaik.
                </p>
            </div>

            <!-- Price Table -->
            <div class="table-wrapper">
                <table class="price-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe Kamar</th>
                            <th>Harga</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="room-type-cell">
                                    <span class="room-name">{{ $product->title }}</span>
                                    <span class="room-category">{{ $product->type }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="price-cell">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                    <span class="price-period">per malam</span>
                                </div>
                            </td>
                            <td class="action-cell">
                                <a href="{{ route('products.show', $product->id) }}" class="view-button">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Price Note -->
            <div class="price-note">
                <h3 class="note-title">Catatan Penting:</h3>
                <ul class="note-list">
                    <li>Harga sudah termasuk pajak dan service charge</li>
                    <li>Harga dapat berubah sewaktu-waktu tanpa pemberitahuan</li>
                    <li>Harga spesial tersedia untuk pemesanan jangka panjang</li>
                    <li>Untuk group booking atau corporate rate, silakan hubungi kami</li>
                    <li>Check-in: 14:00 | Check-out: 12:00</li>
                    <li>Late check-out dikenakan biaya tambahan 50% dari harga kamar</li>
                </ul>
            </div>

            <!-- CTA Section -->
            <div class="cta-section">
                <h2 class="cta-title">Siap Memesan Kamar?</h2>
                <div class="decorative-line"></div>
                <p class="cta-text">Lihat kamar kamar terbaik kami</p>
                <a href="/products" class="cta-button">Cek Kamar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Grand Tugu Kujang Hotel. All Rights Reserved.</p>
        <p style="margin-top: 10px;">Designed with Excellence & Luxury</p>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

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
    </script>
</body>
</html>