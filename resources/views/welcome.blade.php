<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Tugu Kujang Hotel - Kemewahan & Keanggunan</title>
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

        .hero {
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('{{ asset('storage/assets/images/lobby-index.jpg')}}');
            background-size: cover;       /* gambar menyesuaikan layar */
            background-position: center;  /* posisi fokus tengah */
            background-repeat: no-repeat; /* biar gak diulang */
            background-attachment: fixed;
            height: 100vh;                /* tinggi penuh layar */
            overflow: hidden;
            z-index: 1;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* Overlay gradasi emas + hitam elegan */
            background: linear-gradient(
                rgba(0, 0, 0, 0.6), 
                rgba(0, 0, 0, 0.6)
            ),
            radial-gradient(circle at 30% 50%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 70% 50%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
            opacity: 0.9;
            z-index: 0;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            padding: 20px;
            animation: fadeInUp 1.5s ease-out;
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

        .logo {
            width: 700px;
            height: auto;
            margin: auto;
            display: block;
        }

        h1 {
            font-size: 72px;
            font-weight: 300;
            letter-spacing: 8px;
            margin: 10px 0;
            margin-top: -10px
            text-transform: uppercase;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 50%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textShine 3s ease-in-out infinite;
        }

        @keyframes textShine {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .subtitle {
            font-size: 24px;
            letter-spacing: 4px;
            margin-bottom: 40px;
            color: #f4e5b0;
            font-style: italic;
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
            cursor: pointer;
        }

        .features {
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 100%);
            padding: 100px 20px;
            position: relative;
            z-index: 2;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af37, transparent);
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: rgba(26, 26, 46, 0.6);
            padding: 50px 30px;
            text-align: center;
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(212, 175, 55, 0.6);
            box-shadow: 0 20px 50px rgba(212, 175, 55, 0.2);
        }

        .feature-icon {
            font-size: 64px;
            margin-bottom: 20px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .feature-card:nth-child(2) .feature-icon {
            animation-delay: 0.5s;
        }

        .feature-card:nth-child(3) .feature-icon {
            animation-delay: 1s;
        }

        .feature-title {
            font-size: 28px;
            margin-bottom: 15px;
            color: #d4af37;
            letter-spacing: 2px;
        }

        .feature-description {
            font-size: 16px;
            line-height: 1.8;
            color: #c0c0c0;
        }

        .gallery {
            background: #0a0a0a;
            padding: 100px 20px;
            position: relative;
            z-index: 3;
        }

        .gallery-title {
            text-align: center;
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 60px;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .gallery-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            height: 300px;
            background: linear-gradient(135deg, #1b1b1b, #000000);
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.3), rgba(15, 52, 96, 0.3));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .gallery-item:hover::before {
            opacity: 1;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 60px rgba(212, 175, 55, 0.3);
        }

        .gallery-label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
            color: #fff;
            font-size: 24px;
            letter-spacing: 2px;
            transform: translateY(100%);
            transition: transform 0.4s ease;
        }

        .gallery-item:hover .gallery-label {
            transform: translateY(0);
        }

        .contact {
            background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);
            padding: 100px 20px;
            text-align: center;
        }

        .contact-title {
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 30px;
            letter-spacing: 4px;
        }

        .contact-info {
            font-size: 20px;
            color: #f4e5b0;
            margin-bottom: 15px;
            letter-spacing: 2px;
        }

        .footer {
            background: #0a0a0a;
            padding: 40px 20px;
            text-align: center;
            color: #888;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        .decorative-line {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af37, transparent);
            margin: 30px auto;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 42px;
                letter-spacing: 4px;
            }
            
            .subtitle {
                font-size: 18px;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }

        .gallery-item-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
            opacity: 50%;
        }

        .gallery-item-image:hover {
            transform: scale(1.1);
            opacity: 100%;
            transition: transform 0.4s ease, opacity 0.4s ease;
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
            display: block;
            transition: all 0.3s ease;
        }

        .navbar.scrolled .navbar-logo-icon {
            width: 60px;
            height: auto;
            font-size: 20px;
        }

        .navbar-logo-text {
            font-size: 24px;
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

        /* Mobile Menu Toggle */
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

        .mobile-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
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
                left: 0;
                right: 0;
                flex-direction: column;
                padding: 40px 20px;
                gap: 30px;
                border-top: 1px solid rgba(212, 175, 55, 0.3);

                background: rgba(10, 10, 10, 0.9);
                backdrop-filter: blur(10px);

                transform: translateX(-120%);
                opacity: 0;
                pointer-events: none;
                transition: transform 0.4s ease, opacity 0.4s ease;

                z-index: 999; /* biar tampil di atas hero */
            }

            .navbar-menu.active {
                transform: translateX(0);
                opacity: 1;
                pointer-events: auto;
            }

            .navbar-logo-text {
                font-size: 18px;
            }

            .hero {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                background-image: url('{{ asset('storage/assets/images/lobby-index.jpg')}}');
                background-size: cover;       /* gambar menyesuaikan layar */
                background-position: center;  /* posisi fokus tengah */
                background-repeat: no-repeat; /* biar gak diulang */
                background-attachment: fixed;
                height: 100vh;                /* tinggi penuh layar */
                overflow: hidden;
                z-index: 1;
            }

            .hero::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                /* Overlay gradasi emas + hitam elegan */
                background: linear-gradient(
                    rgba(0, 0, 0, 0.6), 
                    rgba(0, 0, 0, 0.6)
                ),
                radial-gradient(circle at 30% 50%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 70% 50%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
                opacity: 0.9;
                z-index: 0;
            }

            @keyframes shimmer {
                0%, 100% { opacity: 0.5; }
                50% { opacity: 1; }
            }

            .hero-content {
                position: relative;
                z-index: 2;
                text-align: center;
                color: #fff;
                padding: 20px;
                animation: fadeInUp 1.5s ease-out;
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

            .logo {
                width: 400px;
                height: auto;
                margin: auto;
                display: block;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar" id="navbar">
        <a href="/" class="navbar-logo">
            <img class="navbar-logo-icon" src="{{ asset('storage/assets/images/logo.png')}}"/>
            <span class="navbar-logo-text">GRAND TUGU KUJANG</span>
        </a>
        
        <ul class="navbar-menu" id="navbarMenu">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/products">Product</a></li>
            <li><a href="/price">Price</a></li>
            <li><a href="/transaksi">Transaksi</a></li>
        </ul>

        <div class="mobile-toggle" id="mobileToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <section class="hero">
        <div class="hero-content">
            <img class="logo" src="{{asset('storage/assets/images/logo.png')}}" alt="">
            <h1 class="title-logo">Grand Tugu Kujang</h1>
            <p class="subtitle">Where Luxury Meets Elegance</p>
            <div class="decorative-line"></div>
            <button class="cta-button" onclick="window.location.href='/products'">Cek Kamar</button>   
        </div>
    </section>

    <section class="features">
        <div class="features-container">
            <div class="feature-card">
                <div class="feature-icon">👑</div>
                <h3 class="feature-title">Kamar Premium</h3>
                <p class="feature-description">Nikmati kenyamanan kamar mewah dengan desain interior eksklusif dan fasilitas bintang lima yang memanjakan setiap tamu kami.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🍽️</div>
                <h3 class="feature-title">Fine Dining</h3>
                <p class="feature-description">Rasakan pengalaman kuliner kelas dunia dengan chef profesional yang menyajikan hidangan gourmet terbaik.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💎</div>
                <h3 class="feature-title">Spa & Wellness</h3>
                <p class="feature-description">Relaksasi total di spa mewah kami dengan treatment premium dan suasana yang menenangkan jiwa.</p>
            </div>
        </div>
    </section>

    <section class="gallery">
        <h2 class="gallery-title">Galeri Kemewahan</h2>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img class="gallery-item-image" src="{{asset('storage/assets/images/president-suite-room-index.jpg')}}" alt="">
                <div class="gallery-label">Presidential Suite</div>
            </div>
            <div class="gallery-item">
                <img class="gallery-item-image" src="{{asset('storage/assets/images/grand-ballroom-index.jpg')}}" alt="">
                <div class="gallery-label">Grand Ballroom</div>
            </div>
            <div class="gallery-item">
                <img class="gallery-item-image" src="{{asset('storage/assets/images/infinty-pool-index.jpg')}}" alt="">
                <div class="gallery-label">Infinity Pool</div>
            </div>
            <div class="gallery-item">
                <img class="gallery-item-image" src="{{asset('storage/assets/images/restaurant-index.jpg')}}" alt="">
                <div class="gallery-label">Restaurant</div>
            </div>
            <div class="gallery-item">
                <img class="gallery-item-image" src="{{asset('storage/assets/images/lobby-lounge-index.jpg')}}" alt="">
                <div class="gallery-label">Lobby Lounge</div>
            </div>
            <div class="gallery-item">
                <img class="gallery-item-image" src="{{asset('storage/assets/images/garden-index.jpg')}}" alt="">
                <div class="gallery-label">Garden View</div>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h2 class="contact-title">Hubungi Kami</h2>
        <div class="decorative-line"></div>
        <p class="contact-info">📞 +62 21 1234 5678</p>
        <p class="contact-info">✉️ reservation@grandtugukujang.com</p>
        <p class="contact-info">📍 Jl. Kemewahan Raya No. 1, Jakarta</p>
        <div style="margin-top: 40px;">
            <a href="tel:+622112345678" class="cta-button">Hubungi Sekarang</a>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2025 Grand Tugu Kujang Hotel. All Rights Reserved.</p>
        <p style="margin-top: 10px;">Designed with Excellence & Luxury</p>
    </footer>

    <script>
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

        // Parallax effect on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Animate features on scroll
        const observerOptions = {
            threshold: 0.2,
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

        document.querySelectorAll('.feature-card, .gallery-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        const mobileToggle = document.getElementById('mobileToggle');
        const navbarMenu = document.getElementById('navbarMenu');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
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
    </script>
</body>
</html>