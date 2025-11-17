<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan - Grand Tugu Kujang Hotel</title>
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
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .detail-container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(26, 26, 46, 0.8);
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(10px);
            overflow: hidden;
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

        .detail-header {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.2) 0%, rgba(244, 229, 176, 0.1) 100%);
            padding: 40px;
            text-align: center;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        }

        .success-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            animation: scaleIn 0.5s ease-out 0.3s both;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .detail-title {
            font-size: 36px;
            color: #d4af37;
            margin-bottom: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .booking-number {
            font-size: 18px;
            color: #f4e5b0;
            letter-spacing: 2px;
        }

        .booking-number span {
            color: #d4af37;
            font-weight: bold;
            font-size: 20px;
        }

        .detail-content {
            padding: 40px;
        }

        .info-section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 22px;
            color: #d4af37;
            margin-bottom: 20px;
            letter-spacing: 2px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(180deg, #d4af37, #f4e5b0);
            border-radius: 2px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item {
            background: rgba(15, 15, 30, 0.5);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .info-label {
            font-size: 14px;
            color: #888;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-value {
            font-size: 18px;
            color: #f4e5b0;
            font-weight: 500;
        }

        .room-card {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .room-title {
            font-size: 24px;
            color: #d4af37;
            margin-bottom: 10px;
        }

        .room-type {
            font-size: 16px;
            color: #888;
            margin-bottom: 15px;
        }

        .room-price {
            font-size: 20px;
            color: #f4e5b0;
            font-weight: bold;
        }

        .payment-summary {
            background: rgba(15, 15, 30, 0.7);
            border: 2px solid #d4af37;
            border-radius: 15px;
            padding: 30px;
            margin-top: 30px;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .payment-row:last-child {
            border-bottom: none;
            padding-top: 20px;
            margin-top: 10px;
            border-top: 2px solid rgba(212, 175, 55, 0.3);
        }

        .payment-label {
            color: #c0c0c0;
            font-size: 16px;
        }

        .payment-value {
            color: #f4e5b0;
            font-size: 16px;
            font-weight: 500;
        }

        .payment-value.discount {
            color: #4ade80;
        }

        .payment-value.total {
            color: #d4af37;
            font-size: 28px;
            font-weight: bold;
        }

        .payment-label.total {
            font-size: 20px;
            color: #d4af37;
            font-weight: bold;
        }

        .info-box {
            background: rgba(212, 175, 55, 0.1);
            border-left: 4px solid #d4af37;
            padding: 20px;
            border-radius: 10px;
            margin: 30px 0;
        }

        .info-box p {
            color: #c0c0c0;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .info-box p:last-child {
            margin-bottom: 0;
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
            text-decoration: none;
            display: inline-block;
            text-align: center;
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

        .badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-left: 10px;
        }

        .badge-success {
            background: rgba(74, 222, 128, 0.2);
            color: #4ade80;
            border: 1px solid #4ade80;
        }

        .decorative-line {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af37, transparent);
            margin: 20px auto;
        }

        @media (max-width: 768px) {
            .detail-container {
                margin: 20px 10px;
            }

            .detail-header {
                padding: 30px 20px;
            }

            .detail-title {
                font-size: 28px;
            }

            .detail-content {
                padding: 30px 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .payment-summary {
                padding: 20px;
            }

            .payment-value.total {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="detail-container">
        <div class="detail-header">
            <div class="success-icon">✓</div>
            <h1 class="detail-title">Pemesanan Berhasil</h1>
            <div class="decorative-line"></div>
            <p class="booking-number">Nomor Booking: <span>#{{ $booking->id }}</span></p>
        </div>

        <div class="detail-content">
            <!-- Room Information -->
            <div class="room-card">
                <h3 class="room-title">{{ $booking->product->title }}</h3>
                <p class="room-type">{{ $booking->product->type }}</p>
                <p class="room-price">Rp {{ number_format($booking->product->price, 0, ',', '.') }} / malam</p>
            </div>

            <!-- Guest Information -->
            <div class="info-section">
                <h2 class="section-title">Informasi Pemesan</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">{{ $booking->nama_pemesan }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Jenis Kelamin</div>
                        <div class="info-value">{{ $booking->jenis_kelamin }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Nomor Identitas (KTP)</div>
                        <div class="info-value">{{ $booking->nomor_identitas }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal Booking</div>
                        <div class="info-value">{{ $booking->created_at->format('d M Y, H:i') }} WIB</div>
                    </div>
                </div>
            </div>

            <!-- Stay Information -->
            <div class="info-section">
                <h2 class="section-title">Detail Menginap</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Tanggal Check-in</div>
                        <div class="info-value">{{ $booking->tanggal_pesan->format('d M Y') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Durasi Menginap</div>
                        <div class="info-value">{{ $booking->durasi_menginap }} Hari</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal Check-out</div>
                        <div class="info-value">{{ $booking->tanggal_pesan->addDays($booking->durasi_menginap)->format('d M Y') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Breakfast</div>
                        <div class="info-value">
                            {{ $booking->breakfast ? '✓ Termasuk' : '✗ Tidak Termasuk' }}
                            @if($booking->breakfast)
                                <span class="badge badge-success">Included</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Summary -->
            <div class="payment-summary">
                <h2 class="section-title">Rincian Pembayaran</h2>
                
                <div class="payment-row">
                    <span class="payment-label">Harga Kamar ({{ $booking->durasi_menginap }} malam)</span>
                    <span class="payment-value">Rp {{ number_format($booking->product->price * $booking->durasi_menginap, 0, ',', '.') }}</span>
                </div>

                @if($booking->breakfast)
                <div class="payment-row">
                    <span class="payment-label">Breakfast ({{ $booking->durasi_menginap }} hari × Rp 80.000)</span>
                    <span class="payment-value">Rp {{ number_format(80000 * $booking->durasi_menginap, 0, ',', '.') }}</span>
                </div>
                @endif

                @if($booking->diskon > 0)
                <div class="payment-row">
                    <span class="payment-label">Diskon (10% - Menginap > 3 hari)</span>
                    <span class="payment-value discount">- Rp {{ number_format($booking->diskon, 0, ',', '.') }}</span>
                </div>
                @endif

                <div class="payment-row">
                    <span class="payment-label total">TOTAL PEMBAYARAN</span>
                    <span class="payment-value total">Rp {{ number_format($booking->total_bayar, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <a href="{{ route('booking.transaksi') }}" class="btn btn-secondary">Lihat Semua Transaksi</a>
                <a href="/" class="btn btn-primary">Kembali ke Home</a>
            </div>
        </div>
    </div>
</body>
</html>