<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_pemesan',
        'jenis_kelamin',
        'nomor_identitas',
        'tipe_kamar',
        'harga',
        'tanggal_pesan',
        'durasi_menginap',
        'breakfast',
        'diskon',
        'total_bayar',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_pesan' => 'date',
        'breakfast' => 'boolean',
        'harga' => 'decimal:2',
        'diskon' => 'decimal:2',
        'total_bayar' => 'decimal:2',
    ];

    /**
     * Get harga kamar berdasarkan tipe
     *
     * @param string $tipe
     * @return float
     */
    public static function getHargaKamar($tipe)
    {
        $harga = [
            'Standard' => 2800000,
            'Deluxe' => 4500000,
            'Executive' => 8500000,
        ];

        return $harga[$tipe] ?? 0;
    }

    /**
     * Hitung total bayar dengan diskon dan breakfast
     *
     * @param float $harga
     * @param int $durasi
     * @param bool $breakfast
     * @return array
     */
    public static function hitungTotal($harga, $durasi, $breakfast)
    {
        $subtotal = $harga * $durasi;
        $diskon = 0;
        
        // Diskon 10% jika durasi > 3 hari
        if ($durasi > 3) {
            $diskon = $subtotal * 0.10;
        }
        
        $total = $subtotal - $diskon;
        
        // Tambahan breakfast Rp 80.000 per hari
        if ($breakfast) {
            $total += (80000 * $durasi);
        }
        
        return [
            'subtotal' => $subtotal,
            'diskon' => $diskon,
            'breakfast_cost' => $breakfast ? (80000 * $durasi) : 0,
            'total' => $total,
        ];
    }
}