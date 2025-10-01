<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\ProductsImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Products::create([
            'type' => 'Deluxe Room',
            'title' => 'Kamar Deluxe dengan view Kota',
            'description' => 'Rasakan kemewahan tertinggi di Presidential Suite kami yang menampilkan desain interior eksklusif, ruang tamu pribadi, dan pemandangan kota yang menakjubkan. Dilengkapi dengan fasilitas premium untuk pengalaman menginap yang tak terlupakan.',
            'features' => 'AC, Wifi, Breakfast, TV',
            'capacity' => 2,
            'main_image' => 'storage/assets/images/president-suite-room-index.jpg',
            'price' => 1200000,
        ]);

        ProductsImages::create([
            'product_id' => $product->id,
            'image' => 'storage/assets/images/deluxe-1.jpg',
        ]);

        ProductsImages::create([
            'product_id' => $product->id,
            'image' => 'storage/assets/images/deluxe-2.jpg',
        ]);

        ProductsImages::create([
            'product_id' => $product->id,
            'image' => 'storage/assets/images/deluxe-3.jpg',
        ]);
    }
}
