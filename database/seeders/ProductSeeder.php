<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;
use App\Models\Room;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Presidential Suite',
                'category' => 'Suite Mewah',
                'description' => 'Rasakan kemewahan tertinggi di Presidential Suite kami yang menampilkan desain interior eksklusif, ruang tamu pribadi, dan pemandangan kota yang menakjubkan. Dilengkapi dengan fasilitas premium untuk pengalaman menginap yang tak terlupakan.',
                'price' => 15000000,
                'size' => 120,
                'max_guests' => 4,
                'bed_type' => 'King Size Bed',
                'view_type' => 'City View',
                'features' => ['King Size Bed', '120 m²', 'Jacuzzi Premium', 'Private Lounge', 'City View', 'Mini Bar'],
                'main_image' => 'storage/assets/images/president-suite-room-index.jpg',
                'badge' => 'Terpopuler',
                'is_available' => true
            ],
            [
                'name' => 'Executive Suite',
                'category' => 'Suite Premium',
                'description' => 'Suite eksekutif yang sempurna untuk profesional modern. Dilengkapi dengan area kerja yang luas, teknologi terkini, dan kenyamanan maksimal untuk produktivitas dan relaksasi.',
                'price' => 8500000,
                'size' => 75,
                'max_guests' => 2,
                'bed_type' => 'King/Twin Bed',
                'view_type' => 'City View',
                'features' => ['King/Twin Bed', '75 m²', 'Work Space', 'Smart TV 65"', 'Mini Bar', 'High-Speed WiFi'],
                'main_image' => 'storage/assets/images/lobby-lounge-index.jpg',
                'badge' => null,
                'is_available' => true
            ],
            [
                'name' => 'Deluxe Room',
                'category' => 'Kamar Premium',
                'description' => 'Kamar deluxe yang menggabungkan kenyamanan dan kemewahan dengan desain kontemporer. Ideal untuk wisatawan yang menginginkan pengalaman menginap berkelas dengan fasilitas lengkap.',
                'price' => 4500000,
                'size' => 45,
                'max_guests' => 2,
                'bed_type' => 'Queen/Twin Bed',
                'view_type' => 'Garden View',
                'features' => ['Queen/Twin Bed', '45 m²', 'Garden View', 'Rain Shower', 'Smart TV', 'Coffee Maker'],
                'main_image' => 'storage/assets/images/restaurant-index.jpg',
                'badge' => null,
                'is_available' => true
            ],
            [
                'name' => 'Superior Room',
                'category' => 'Kamar Standard',
                'description' => 'Kamar superior yang nyaman dengan sentuhan elegan, menawarkan nilai terbaik untuk pengalaman menginap yang berkualitas. Sempurna untuk liburan keluarga atau perjalanan bisnis singkat.',
                'price' => 2800000,
                'size' => 35,
                'max_guests' => 2,
                'bed_type' => 'Double/Twin Bed',
                'view_type' => 'Pool View',
                'features' => ['Double/Twin Bed', '35 m²', 'Pool View', 'Smart TV 43"', 'Coffee Maker', 'High-Speed WiFi'],
                'main_image' => 'storage/assets/images/infinty-pool-index.jpg',
                'badge' => 'Best Value',
                'is_available' => true
            ],
        ];

        foreach ($rooms as $room) {
            Products::create($room);
        }
    }
}