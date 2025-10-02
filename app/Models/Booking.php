<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'nama_pemesan',
        'jenis_kelamin',
        'nomor_identitas',
        'tanggal_pesan',
        'durasi_menginap',
        'breakfast',
        'diskon',
        'total_bayar'
    ];

    protected $casts = [
        'tanggal_pesan' => 'date',
        'breakfast' => 'boolean',
        'durasi_menginap' => 'integer',
        'diskon' => 'decimal:0',
        'total_bayar' => 'decimal:0'
    ];

    /**
     * Relasi ke Products
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    /**
     * Hitung total bayar dengan diskon dan breakfast
     */
    public static function hitungTotal($harga, $durasi, $breakfast = false)
    {
        // Breakfast Rp 80.000 per hari
        $breakfastCost = 0;
        if ($breakfast) {
            $breakfastCost = 80000 * $durasi;
        }
        
        $subtotal = $harga * $durasi + $breakfastCost;
        

        // Diskon 10% untuk menginap lebih dari 3 hari
        $diskon = 0;
        if ($durasi > 3) {
            $diskon = $subtotal * 0.1;
        }
        
        $afterDiskon = $subtotal - $diskon;

        $total = $afterDiskon;
        
        return [
            'subtotal' => $subtotal,
            'diskon' => $diskon,
            'breakfast_cost' => $breakfastCost,
            'total' => $total
        ];
    }
}