<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Grand Tugu Kujang Hotel</title>
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

        .mobile-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
        }

        /* Hero About */
        .hero-about {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('{{ asset('storage/assets/images/lobby-index.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            overflow: hidden;
            height: 100vh;
        }

        .hero-about::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                rgba(0, 0, 0, 0.6), 
                rgba(0, 0, 0, 0.6)
            ),
            radial-gradient(circle at 30% 50%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 70% 50%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
            opacity: 0.9;
            z-index: 1;
        }

        .hero-about-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            padding: 20px;
            animation: fadeInUp 1.2s ease-out;
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

        .hero-about h1 {
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

        .hero-about .subtitle {
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

        /* Story Section */
        .story-section {
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 100%);
            padding: 100px 20px;
        }

        .story-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .story-image {
            width: 100%;
            height: 500px;
            background: url('{{ asset('storage/assets/images/receptionist-about.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 20px 60px rgba(212, 175, 55, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 120px;
        }

        .story-content h2 {
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 30px;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .story-content p {
            font-size: 18px;
            line-height: 2;
            color: #c0c0c0;
            margin-bottom: 25px;
            text-align: justify;
        }

        .story-highlight {
            background: rgba(212, 175, 55, 0.1);
            border-left: 4px solid #d4af37;
            padding: 25px;
            margin: 30px 0;
            border-radius: 10px;
        }

        .story-highlight p {
            font-style: italic;
            color: #f4e5b0;
            margin: 0;
        }

        /* Values Section */
        .values-section {
            background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);
            padding: 100px 20px;
            position: relative;
        }

        .values-title {
            text-align: center;
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 60px;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .values-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .value-card {
            background: rgba(26, 26, 46, 0.6);
            padding: 50px 30px;
            text-align: center;
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
        }

        .value-card:hover {
            transform: translateY(-10px);
            border-color: rgba(212, 175, 55, 0.6);
            box-shadow: 0 20px 50px rgba(212, 175, 55, 0.2);
        }

        .value-icon {
            font-size: 72px;
            margin-bottom: 20px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .value-card:nth-child(2) .value-icon {
            animation-delay: 0.5s;
        }

        .value-card:nth-child(3) .value-icon {
            animation-delay: 1s;
        }

        .value-card:nth-child(4) .value-icon {
            animation-delay: 1.5s;
        }

        .value-title {
            font-size: 28px;
            margin-bottom: 15px;
            color: #d4af37;
            letter-spacing: 2px;
        }

        .value-description {
            font-size: 16px;
            line-height: 1.8;
            color: #c0c0c0;
        }

        /* Timeline Section */
        .timeline-section {
            background: #0a0a0a;
            padding: 100px 20px;
        }

        .timeline-title {
            text-align: center;
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 80px;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .timeline-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, transparent, #d4af37, transparent);
        }

        .timeline-item {
            display: flex;
            margin-bottom: 80px;
            position: relative;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-content {
            width: 45%;
            padding: 30px;
            background: rgba(26, 26, 46, 0.6);
            border-radius: 15px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        .timeline-content:hover {
            transform: scale(1.05);
            border-color: rgba(212, 175, 55, 0.6);
        }

        .timeline-year {
            font-size: 32px;
            color: #d4af37;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .timeline-text {
            font-size: 16px;
            line-height: 1.8;
            color: #c0c0c0;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 30px;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: #d4af37;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
            z-index: 10;
        }

        /* Team Section */
        .team-section {
            background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);
            padding: 100px 20px;
        }

        .team-title {
            text-align: center;
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 60px;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .team-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .team-card {
            background: rgba(26, 26, 46, 0.6);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.4s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            border-color: rgba(212, 175, 55, 0.6);
            box-shadow: 0 20px 50px rgba(212, 175, 55, 0.2);
        }

        .team-photo {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #1b1b1b, #2a2a2a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
        }

        .team-info {
            padding: 30px;
            text-align: center;
        }

        .team-name {
            font-size: 24px;
            color: #d4af37;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .team-position {
            font-size: 16px;
            color: #f4e5b0;
            font-style: italic;
        }

        /* CTA Section */
        .cta-section {
            background: #0a0a0a;
            padding: 100px 20px;
            text-align: center;
        }

        .cta-title {
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 30px;
            letter-spacing: 4px;
        }

        .cta-text {
            font-size: 20px;
            color: #f4e5b0;
            margin-bottom: 40px;
            letter-spacing: 2px;
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

            .navbar.scrolled .navbar-logo-text {
                font-size: 16px;
            }

            .hero-about h1 {
                font-size: 42px;
                letter-spacing: 4px;
            }

            .story-container {
                grid-template-columns: 1fr;
            }

            .story-image {
                height: 350px;
            }

            .timeline-line {
                left: 20px;
            }

            .timeline-item {
                flex-direction: column !important;
                margin-left: 40px;
            }

            .timeline-content {
                width: 100%;
            }

            .timeline-dot {
                left: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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
        </ul>

        <div class="mobile-toggle" id="mobileToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Hero About -->
    <section class="hero-about">
        <div class="hero-about-content">
            <h1>Tentang Kami</h1>
            <div class="decorative-line"></div>
            <p class="subtitle">Sejarah Kemewahan & Keunggulan</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="story-container">
            <div class="story-image"></div>
            <div class="story-content">
                <h2>Kisah Kami</h2>
                <div class="decorative-line" style="margin: 20px 0;"></div>
                <p>Grand Tugu Kujang Bogor berdiri sejak tahun 1985 sebagai simbol kemewahan dan keanggunan di jantung kota Bogor. Dengan visi untuk memberikan pengalaman menginap yang tak terlupakan, kami telah melayani ribuan tamu dari berbagai penjuru dunia.</p>
                <p>Terinspirasi dari arsitektur klasik Eropa, setiap sudut hotel kami dirancang untuk menciptakan atmosfer yang elegan dan mewah. Kami percaya bahwa setiap tamu adalah bagian dari keluarga besar Grand Tugu Kujang.</p>
                <div class="story-highlight">
                    <p>"Kami tidak hanya menyediakan tempat menginap, tetapi menciptakan pengalaman dan kenangan yang akan diingat selamanya."</p>
                </div>
                <p>Dengan lebih dari 35 tahun pengalaman di industri perhotelan, kami terus berinovasi dan meningkatkan standar pelayanan untuk memastikan setiap kunjungan Anda menjadi istimewa.</p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <h2 class="values-title">Nilai-Nilai Kami</h2>
        <div class="decorative-line"></div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">⭐</div>
                <h3 class="value-title">Keunggulan</h3>
                <p class="value-description">Kami berkomitmen untuk memberikan layanan terbaik dengan standar internasional yang konsisten di setiap aspek.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Integritas</h3>
                <p class="value-description">Kejujuran dan transparansi adalah fondasi dalam setiap interaksi dengan tamu dan mitra kami.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">❤️</div>
                <h3 class="value-title">Keramahan</h3>
                <p class="value-description">Setiap tamu disambut dengan kehangatan dan perhatian personal yang membuat mereka merasa seperti di rumah sendiri.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🌟</div>
                <h3 class="value-title">Inovasi</h3>
                <p class="value-description">Kami terus berkembang dan beradaptasi dengan kebutuhan modern sambil mempertahankan nilai-nilai klasik kami.</p>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <h2 class="timeline-title">Perjalanan Kami</h2>
        <div class="decorative-line"></div>
        <div class="timeline-container">
            <div class="timeline-line"></div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">1985</div>
                    <p class="timeline-text">Grand Tugu Kujang Hotel resmi dibuka dengan 150 kamar mewah dan menjadi landmark baru di Jakarta.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">1995</div>
                    <p class="timeline-text">Ekspansi besar-besaran dengan penambahan Grand Ballroom dan fasilitas spa kelas dunia.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2005</div>
                    <p class="timeline-text">Menerima penghargaan "Best Luxury Hotel in Southeast Asia" dari World Travel Awards.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2015</div>
                    <p class="timeline-text">Renovasi total dengan teknologi smart room dan desain interior kontemporer yang memukau.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2025</div>
                    <p class="timeline-text">Melanjutkan tradisi keunggulan dengan visi baru untuk masa depan hospitality Indonesia.</p>
                </div>
                <div class="timeline-dot"></div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2 class="team-title">Tim Manajemen</h2>
        <div class="decorative-line"></div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-photo">👨‍💼</div>
                <div class="team-info">
                    <h3 class="team-name">Budi Santoso</h3>
                    <p class="team-position">General Manager</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-photo">👩‍💼</div>
                <div class="team-info">
                    <h3 class="team-name">Siti Nurhaliza</h3>
                    <p class="team-position">Director of Operations</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-photo">👨‍🍳</div>
                <div class="team-info">
                    <h3 class="team-name">Chef André Laurent</h3>
                    <p class="team-position">Executive Chef</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-photo">👩‍💼</div>
                <div class="team-info">
                    <h3 class="team-name">Diana Putri</h3>
                    <p class="team-position">Guest Relations Manager</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2 class="cta-title">Rasakan Pengalaman Tak Terlupakan</h2>
        <div class="decorative-line"></div>
        <p class="cta-text">Bergabunglah dengan ribuan tamu yang telah merasakan kemewahan Grand Tugu Kujang</p>
        <a href="#" class="cta-button" onclick="alert('Sistem reservasi akan segera hadir!'); return false;">Reservasi Sekarang</a>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Grand Tugu Kujang Hotel. All Rights Reserved.</p>
        <p style="margin-top: 10px;">Designed with Excellence & Luxury</p>
    </footer>

    <script>
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

        // Animate elements on scroll
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

        document.querySelectorAll('.value-card, .timeline-item, .team-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>