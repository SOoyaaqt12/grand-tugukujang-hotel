<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Berhasil - Grand Tugu Kujang Hotel</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .success-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 60px 40px;
            background: rgba(26, 26, 46, 0.8);
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(10px);
            text-align: center;
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

        .success-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #d4af37 0%, #f4e5b0 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
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

        .success-title {
            font-size: 48px;
            color: #d4af37;
            margin-bottom: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .success-message {
            font-size: 20px;
            color: #f4e5b0;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .success-info {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
        }

        .success-info p {
            color: #c0c0c0;
            font-size: 18px;
            margin-bottom: 15px;
            line-height: 1.8;
        }

        .success-info p:last-child {
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

        .decorative-line {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af37, transparent);
            margin: 30px auto;
        }

        @media (max-width: 768px) {
            .success-container {
                padding: 40px 20px;
                margin: 20px;
            }

            .success-title {
                font-size: 36px;
            }

            .success-message {
                font-size: 18px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        
        <h1 class="success-title">Berhasil!</h1>
        
        <div class="decorative-line"></div>
        
        <p class="success-message">
            @if(session('success'))
                {{ session('success') }}
            @else
                Pemesanan kamar Anda telah berhasil disimpan!
            @endif
        </p>

        <div class="success-info">
            <p>✉️ Konfirmasi pemesanan telah dikirim ke email Anda</p>
            <p>📱 Tim kami akan menghubungi Anda dalam 1x24 jam</p>
            <p>🏨 Silakan tunjukkan nomor booking saat check-in</p>
        </div>

        <div class="button-group">
            <a href="{{ route('booking.transaksi') }}" class="btn btn-secondary">Lihat Transaksi</a>
            <a href="/" class="btn btn-primary">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>