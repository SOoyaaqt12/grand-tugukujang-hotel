<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Cek dan hapus kolom jika ada
            if (Schema::hasColumn('bookings', 'tipe_kamar')) {
                $table->dropColumn('tipe_kamar');
            }
            
            if (Schema::hasColumn('bookings', 'harga')) {
                $table->dropColumn('harga');
            }
            
            // Tambah foreign key ke products jika belum ada
            if (!Schema::hasColumn('bookings', 'product_id')) {
                $table->foreignId('product_id')->after('id')->constrained('products')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Hapus foreign key jika ada
            if (Schema::hasColumn('bookings', 'product_id')) {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
            }
            
            // Kembalikan kolom lama jika belum ada
            if (!Schema::hasColumn('bookings', 'tipe_kamar')) {
                $table->enum('tipe_kamar', ['Standard', 'Deluxe', 'Executive'])->after('nomor_identitas');
            }
            
            if (!Schema::hasColumn('bookings', 'harga')) {
                $table->decimal('harga', 12, 2)->after('tipe_kamar');
            }
        });
    }
};