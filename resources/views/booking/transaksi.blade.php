<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Transaksi - Grand Tugu Kujang Hotel</title>
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

        .transactions-section {
            background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 100%);
            padding: 80px 20px;
            min-height: 100vh;
        }

        .transactions-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .alert {
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 16px;
        }

        .alert-success {
            background: rgba(74, 222, 128, 0.1);
            border: 1px solid #4ade80;
            color: #4ade80;
        }

        .table-container {
            background: rgba(26, 26, 46, 0.6);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .table-title {
            font-size: 32px;
            color: #d4af37;
            letter-spacing: 2px;
        }

        .btn {
            padding: 12px 30px;
            font-size: 16px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.4s ease;
            border: none;
            text-decoration: none;
            display: inline-block;
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

        .btn-danger {
            background: rgba(255, 107, 107, 0.2);
            color: #ff6b6b;
            border: 1px solid #ff6b6b;
            padding: 8px 20px;
            font-size: 14px;
        }

        .btn-danger:hover {
            background: rgba(255, 107, 107, 0.3);
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: rgba(212, 175, 55, 0.1);
        }

        th {
            padding: 20px 15px;
            text-align: left;
            color: #d4af37;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        }

        td {
            padding: 20px 15px;
            color: #c0c0c0;
            font-size: 16px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }

        tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        .badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .badge-yes {
            background: rgba(74, 222, 128, 0.2);
            color: #4ade80;
        }

        .badge-no {
            background: rgba(156, 163, 175, 0.2);
            color: #9ca3af;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .empty-text {
            font-size: 24px;
            color: #888;
            margin-bottom: 30px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .pagination a, .pagination span {
            padding: 10px 20px;
            background: rgba(212, 175, 55, 0.1);
            color: #d4af37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: rgba(212, 175, 55, 0.2);
            transform: translateY(-2px);
        }

        .pagination .active {
            background: #d4af37;
            color: #0a0a0a;
            border-color: #d4af37;
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

            .table-container {
                padding: 20px;
            }

            .table-header {
                flex-direction: column;
                gap: 20px;
            }

            table {
                font-size: 14px;
            }

            th, td {
                padding: 12px 8px;
                font-size: 14px;
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
            <li><a href="/reservation">Reservation</a></li>
        </ul>

        <div class="mobile-toggle" id="mobileToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">Transaksi</h1>
            <div class="decorative-line"></div>
            <p class="page-subtitle">Daftar Pemesanan Kamar</p>
        </div>
    </section>

    <section class="transactions-section">
        <div class="transactions-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">Daftar Booking</h2>
                    <a href="{{ route('booking.index') }}" class="btn btn-primary">+ Tambah Booking</a>
                </div>

                @if($bookings->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Identitas</th>
                                <th>Tipe Kamar</th>
                                <th>Tanggal Pesan</th>
                                <th>Durasi</th>
                                <th>Breakfast</th>
                                <th>Total Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $index => $booking)
                            <tr>
                                <td>{{ ($bookings->currentPage() - 1) * $bookings->perPage() + $index + 1 }}</td>
                                <td>{{ $booking->nama_pemesan }}</td>
                                <td>{{ $booking->jenis_kelamin }}</td>
                                <td>{{ $booking->nomor_identitas }}</td>
                                <td>{{ $booking->tipe_kamar }}</td>
                                <td>{{ $booking->tanggal_pesan->format('d/m/Y') }}</td>
                                <td>{{ $booking->durasi_menginap }} hari</td>
                                <td>
                                    @if($booking->breakfast)
                                        <span class="badge badge-yes">✓ Ya</span>
                                    @else
                                        <span class="badge badge-no">✗ Tidak</span>
                                    @endif
                                </td>
                                <td style="color: #d4af37; font-weight: bold;">Rp {{ number_format($booking->total_bayar, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $bookings->links('pagination::simple-default') }}
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">📋</div>
                        <div class="empty-text">Belum ada data pemesanan</div>
                        <a href="{{ route('booking.index') }}" class="btn btn-primary">Buat Pemesanan Pertama</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2025 Grand Tugu Kujang Hotel. All Rights Reserved.</p>
        <p style="margin-top: 10px;">Designed with Excellence & Luxury</p>
    </footer>

    <script>
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