<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }} - Grand Tugu Kujang Hotel</title>
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

        /* Hero Section */
        .hero-detail {
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
            overflow: hidden;
        }

        .hero-detail::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(212, 175, 55, 0.15) 0%, transparent 70%);
        }

        .hero-content {
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

        .breadcrumb {
            font-size: 14px;
            letter-spacing: 2px;
            color: #d4af37;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .breadcrumb a {
            color: #d4af37;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #f4e5b0;
        }

        .hero-title {
            font-size: 72px;
            font-weight: 300;
            letter-spacing: 8px;
            margin-bottom: 20px;
            text-transform: uppercase;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 50%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 24px;
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

        /* Main Content */
        .detail-section {
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 100%);
            padding: 100px 20px;
        }

        .detail-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Image Gallery */
        .gallery-section {
            margin-bottom: 80px;
        }

        .main-image-container {
            width: 100%;
            height: 600px;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 20px;
            position: relative;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .main-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .thumbnail {
            height: 150px;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .thumbnail:hover {
            border-color: #d4af37;
            transform: scale(1.05);
        }

        .thumbnail.active {
            border-color: #d4af37;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 60px;
            margin-bottom: 80px;
        }

        .info-content {
            background: rgba(26, 26, 46, 0.6);
            padding: 50px;
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
        }

        .section-title {
            font-size: 36px;
            color: #d4af37;
            margin-bottom: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .description-text {
            font-size: 18px;
            line-height: 2;
            color: #c0c0c0;
            margin-bottom: 40px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: rgba(212, 175, 55, 0.05);
            border-radius: 10px;
            border-left: 3px solid #d4af37;
        }

        .feature-icon {
            font-size: 24px;
            color: #d4af37;
        }

        .feature-text {
            font-size: 16px;
            color: #f4e5b0;
        }

        /* Booking Card */
        .booking-card {
            background: rgba(26, 26, 46, 0.6);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 120px;
        }

        .price-section {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .price-label {
            font-size: 14px;
            color: #c0c0c0;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .price-amount {
            font-size: 48px;
            font-weight: bold;
            color: #d4af37;
            letter-spacing: 2px;
        }

        .price-period {
            font-size: 16px;
            color: #c0c0c0;
            margin-top: 5px;
        }

        .booking-info {
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }

        .info-label {
            font-size: 16px;
            color: #c0c0c0;
        }

        .info-value {
            font-size: 16px;
            color: #f4e5b0;
            font-weight: bold;
        }

        .cta-button {
            width: 100%;
            padding: 18px;
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
            border: none;
            cursor: pointer;
            display: block;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.5);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 30px;
            background: transparent;
            color: #d4af37;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 2px;
            border: 2px solid #d4af37;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .back-button:hover {
            background: #d4af37;
            color: #0a0a0a;
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
        @media (max-width: 968px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .booking-card {
                position: relative;
                top: 0;
            }

            .main-image-container {
                height: 400px;
            }

            .hero-title {
                font-size: 42px;
            }

            .thumbnail-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }

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

            .hero-title {
                font-size: 32px;
                letter-spacing: 4px;
            }

            .hero-subtitle {
                font-size: 18px;
            }

            .info-content {
                padding: 30px 20px;
            }

            .section-title {
                font-size: 28px;
            }

            .price-amount {
                font-size: 36px;
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
            <li><a href="/products">Product</a></li>
            <li><a href="/price">Price</a></li>
        </ul>

        <div class="mobile-toggle" id="mobileToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-detail">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="/">Home</a> / <a href="/rooms">Kamar & Suite</a> / {{ $product->title }}
            </div>
            <h1 class="hero-title">{{ $product->title }}</h1>
            <div class="decorative-line"></div>
            <p class="hero-subtitle">{{ $product->type }}</p>
        </div>
    </section>

    <!-- Detail Section -->
    <section class="detail-section">
        <div class="detail-container">
            <a href="/rooms" class="back-button">
                ← Kembali ke Daftar Kamar
            </a>

            <!-- Image Gallery -->
            <div class="gallery-section">
                <div class="main-image-container">
                    <img src="{{ asset($product->main_image) }}" alt="{{ $product->title }}" class="main-image" id="mainImage">
                </div>
                
                @if($product->images && $product->images->count() > 0)
                <div class="thumbnail-grid">
                    <div class="thumbnail active" onclick="changeImage('{{ asset($product->main_image) }}', this)">
                        <img src="{{ asset($product->main_image) }}" alt="Main">
                    </div>
                    @foreach($product->images as $image)
                    <div class="thumbnail" onclick="changeImage('{{ asset($image->image) }}', this)">
                        <img src="{{ asset($image->image) }}" alt="Gallery {{ $loop->iteration }}">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Info Grid -->
            <div class="info-grid">
                <div class="info-content">
                    <h2 class="section-title">Deskripsi Kamar</h2>
                    <div class="decorative-line" style="margin: 20px 0;"></div>
                    <p class="description-text">{{ $product->description }}</p>

                    <h3 class="section-title" style="font-size: 28px; margin-top: 40px;">Fasilitas</h3>
                    <div class="decorative-line" style="margin: 20px 0;"></div>
                    <div class="features-grid">
                        @foreach(explode(',', $product->features) as $feature)
                        <div class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span class="feature-text">{{ trim($feature) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="booking-card">
                    <div class="price-section">
                        <div class="price-label">Harga Mulai Dari</div>
                        <div class="price-amount">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        <div class="price-period">per malam</div>
                    </div>

                    <div class="booking-info">
                        <div class="info-item">
                            <span class="info-label">Tipe Kamar</span>
                            <span class="info-value">{{ $product->type }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Kapasitas</span>
                            <span class="info-value">{{ $product->capacity }} Tamu</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Check-in</span>
                            <span class="info-value">14:00</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Check-out</span>
                            <span class="info-value">12:00</span>
                        </div>
                    </div>

                    <a href="/reservasi" class="cta-button">Reservasi Sekarang</a>
                </div>
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

        // Change main image
        function changeImage(src, element) {
            document.getElementById('mainImage').src = src;
            
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            
            // Add active class to clicked thumbnail
            element.classList.add('active');
        }

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>