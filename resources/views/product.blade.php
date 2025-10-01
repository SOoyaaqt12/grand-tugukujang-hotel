<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamar & Suite - Grand Tugu Kujang Hotel</title>
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

        /* Navbar - sama seperti homepage */
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

        /* Page Header */
        .page-header {
            height: 50vh;
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

        /* Rooms Section */
        .rooms-section {
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 100%);
            padding: 100px 20px;
            position: relative;
        }

        .rooms-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .room-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin-bottom: 100px;
            background: rgba(26, 26, 46, 0.6);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
        }

        .room-card:hover {
            border-color: rgba(212, 175, 55, 0.6);
            box-shadow: 0 30px 80px rgba(212, 175, 55, 0.2);
            transform: translateY(-5px);
        }

        .room-card:nth-child(even) {
            direction: rtl;
        }

        .room-card:nth-child(even) > * {
            direction: ltr;
        }

        .room-image-container {
            position: relative;
            height: 500px;
            overflow: hidden;
        }

        .room-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .room-card:hover .room-image {
            transform: scale(1.1);
        }

        .room-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.3), rgba(15, 52, 96, 0.3));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .room-card:hover .room-image-overlay {
            opacity: 1;
        }

        .room-badge {
            position: absolute;
            top: 30px;
            right: 30px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 100%);
            color: #0a0a0a;
            padding: 10px 25px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            z-index: 10;
        }

        .room-content {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .room-category {
            font-size: 14px;
            letter-spacing: 3px;
            color: #d4af37;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .room-name {
            font-size: 42px;
            font-weight: 300;
            letter-spacing: 4px;
            color: #fff;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .room-description {
            font-size: 18px;
            line-height: 1.8;
            color: #c0c0c0;
            margin-bottom: 30px;
        }

        .room-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .room-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #f4e5b0;
            font-size: 16px;
        }

        .room-feature-icon {
            font-size: 20px;
        }

        .room-price-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        .room-price {
            font-size: 36px;
            font-weight: bold;
            color: #d4af37;
            letter-spacing: 2px;
        }

        .room-price-label {
            font-size: 14px;
            color: #c0c0c0;
            margin-top: 5px;
        }

        .room-cta {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 50%, #d4af37 100%);
            color: #0a0a0a;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
        }

        .room-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .room-cta:hover::before {
            left: 100%;
        }

        .room-cta:hover {
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
        @media (max-width: 968px) {
            .room-card {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .room-card:nth-child(even) {
                direction: ltr;
            }

            .room-image-container {
                height: 350px;
            }

            .room-content {
                padding: 40px 30px;
            }

            .room-name {
                font-size: 32px;
            }

            .room-features {
                grid-template-columns: 1fr;
            }

            .room-price-container {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }

            .page-title {
                font-size: 42px;
            }
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

            .navbar-logo-text {
                font-size: 16px;
            }

            .page-title {
                font-size: 36px;
                letter-spacing: 4px;
            }

            .page-subtitle {
                font-size: 16px;
            }

            .room-content {
                padding: 30px 20px;
            }

            .room-name {
                font-size: 28px;
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
            <svg class="navbar-logo-icon" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 10L90 90H10L50 10Z" fill="url(#gold-gradient)"/>
                <defs>
                    <linearGradient id="gold-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#d4af37;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#f4e5b0;stop-opacity:1" />
                    </linearGradient>
                </defs>
            </svg>
            <span class="navbar-logo-text">GRAND TUGU KUJANG</span>
        </a>
        
        <ul class="navbar-menu" id="navbarMenu">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/rooms">Product</a></li>
            <li><a href="/price">Price</a></li>
            <li><a href="/reservation">Reservation</a></li>
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
            <h1 class="page-title">Kamar & Suite</h1>
            <div class="decorative-line"></div>
            <p class="page-subtitle">Pengalaman Menginap yang Tak Terlupakan</p>
        </div>
    </section>

    <!-- Rooms Section -->
    <section class="rooms-section">
        <div class="rooms-container">
            <!-- Presidential Suite -->
            <div class="room-card">
                <div class="room-image-container">
                    <div class="room-badge">Terpopuler</div>
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #2c2c3e 0%, #1a1a2e 100%);"></div>
                    <div class="room-image-overlay"></div>
                </div>
                <div class="room-content">
                    <div class="room-category">Suite Mewah</div>
                    <h2 class="room-name">Presidential Suite</h2>
                    <p class="room-description">
                        Rasakan kemewahan tertinggi di Presidential Suite kami yang menampilkan desain interior eksklusif, ruang tamu pribadi, dan pemandangan kota yang menakjubkan. Dilengkapi dengan fasilitas premium untuk pengalaman menginap yang tak terlupakan.
                    </p>
                    <div class="room-features">
                        <div class="room-feature">
                            <span class="room-feature-icon">🛏️</span>
                            <span>King Size Bed</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">📏</span>
                            <span>120 m²</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">👥</span>
                            <span>2-4 Tamu</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">🌃</span>
                            <span>City View</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">🛁</span>
                            <span>Jacuzzi Premium</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">☕</span>
                            <span>Private Lounge</span>
                        </div>
                    </div>
                    <div class="room-price-container">
                        <div>
                            <div class="room-price">Rp 15.000.000</div>
                            <div class="room-price-label">per malam</div>
                        </div>
                        <button class="room-cta" onclick="alert('Sistem reservasi akan segera hadir!')">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Executive Suite -->
            <div class="room-card">
                <div class="room-image-container">
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #3d3d52 0%, #2a2a3e 100%);"></div>
                    <div class="room-image-overlay"></div>
                </div>
                <div class="room-content">
                    <div class="room-category">Suite Premium</div>
                    <h2 class="room-name">Executive Suite</h2>
                    <p class="room-description">
                        Suite eksekutif yang sempurna untuk profesional modern. Dilengkapi dengan area kerja yang luas, teknologi terkini, dan kenyamanan maksimal untuk produktivitas dan relaksasi.
                    </p>
                    <div class="room-features">
                        <div class="room-feature">
                            <span class="room-feature-icon">🛏️</span>
                            <span>King/Twin Bed</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">📏</span>
                            <span>75 m²</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">👥</span>
                            <span>2 Tamu</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">💼</span>
                            <span>Work Space</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">📺</span>
                            <span>Smart TV 65"</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">☕</span>
                            <span>Mini Bar</span>
                        </div>
                    </div>
                    <div class="room-price-container">
                        <div>
                            <div class="room-price">Rp 8.500.000</div>
                            <div class="room-price-label">per malam</div>
                        </div>
                        <button class="room-cta" onclick="alert('Sistem reservasi akan segera hadir!')">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Deluxe Room -->
            <div class="room-card">
                <div class="room-image-container">
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #4a4a5e 0%, #353545 100%);"></div>
                    <div class="room-image-overlay"></div>
                </div>
                <div class="room-content">
                    <div class="room-category">Kamar Premium</div>
                    <h2 class="room-name">Deluxe Room</h2>
                    <p class="room-description">
                        Kamar deluxe yang menggabungkan kenyamanan dan kemewahan dengan desain kontemporer. Ideal untuk wisatawan yang menginginkan pengalaman menginap berkelas dengan fasilitas lengkap.
                    </p>
                    <div class="room-features">
                        <div class="room-feature">
                            <span class="room-feature-icon">🛏️</span>
                            <span>Queen/Twin Bed</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">📏</span>
                            <span>45 m²</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">👥</span>
                            <span>2 Tamu</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">🌳</span>
                            <span>Garden View</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">🛁</span>
                            <span>Rain Shower</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">📶</span>
                            <span>High-Speed WiFi</span>
                        </div>
                    </div>
                    <div class="room-price-container">
                        <div>
                            <div class="room-price">Rp 4.500.000</div>
                            <div class="room-price-label">per malam</div>
                        </div>
                        <button class="room-cta" onclick="alert('Sistem reservasi akan segera hadir!')">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Superior Room -->
            <div class="room-card">
                <div class="room-image-container">
                    <div class="room-badge">Best Value</div>
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #565668 0%, #424252 100%);"></div>
                    <div class="room-image-overlay"></div>
                </div>
                <div class="room-content">
                    <div class="room-category">Kamar Standard</div>
                    <h2 class="room-name">Superior Room</h2>
                    <p class="room-description">
                        Kamar superior yang nyaman dengan sentuhan elegan, menawarkan nilai terbaik untuk pengalaman menginap yang berkualitas. Sempurna untuk liburan keluarga atau perjalanan bisnis singkat.
                    </p>
                    <div class="room-features">
                        <div class="room-feature">
                            <span class="room-feature-icon">🛏️</span>
                            <span>Double/Twin Bed</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">📏</span>
                            <span>35 m²</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">👥</span>
                            <span>2 Tamu</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">🏙️</span>
                            <span>Pool View</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">📺</span>
                            <span>Smart TV 43"</span>
                        </div>
                        <div class="room-feature">
                            <span class="room-feature-icon">☕</span>
                            <span>Coffee Maker</span>
                        </div>
                    </div>
                    <div class="room-price-container">
                        <div>
                            <div class="room-price">Rp 2.800.000</div>
                            <div class="room-price-label">per malam</div>
                        </div>
                        <button class="room-cta" onclick="alert('Sistem reservasi akan segera hadir!')">Pesan Sekarang</button>
                    </div>
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
        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const navbarMenu = document.getElementById('navbarMenu');

        mobileToggle.addEventListener('click', () => {
            mobileToggle.classList.toggle('active');
            navbarMenu.classList.toggle('active');
        });

        // Close mobile menu when clicking a link
        navbarMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileToggle.classList.remove('active');
                navbarMenu.classList.remove('active');
            });
        });

        // Animate room cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.room-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.8s ease';
            observer.observe(el);
        });

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