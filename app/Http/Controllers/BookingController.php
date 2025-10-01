<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display booking form
     */
    public function index(Request $request)
    {
        // Ambil tipe kamar dari query string
        $tipeKamar = $request->query('tipe');
        
        // Jika tidak ada tipe kamar, redirect ke product page
        if (!$tipeKamar || !in_array($tipeKamar, ['Standard', 'Deluxe', 'Executive'])) {
            return redirect('/product')->with('info', 'Silakan pilih kamar terlebih dahulu');
        }
        
        $harga = Booking::getHargaKamar($tipeKamar);
        
        return view('reservasi', compact('tipeKamar', 'harga'));
    }

    /**
     * Get harga kamar via AJAX
     */
    public function getHarga(Request $request)
    {
        $tipe = $request->get('tipe');
        $harga = Booking::getHargaKamar($tipe);
        
        return response()->json(['harga' => $harga]);
    }

    /**
     * Hitung total bayar via AJAX
     */
    public function hitungTotal(Request $request)
    {
        $harga = $request->get('harga', 0);
        $durasi = $request->get('durasi', 1);
        $breakfast = $request->get('breakfast', false);
        
        $result = Booking::hitungTotal($harga, $durasi, $breakfast);
        
        return response()->json($result);
    }

    /**
     * Store booking
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemesan' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_identitas' => 'required|digits:16',
            'tipe_kamar' => 'required|in:Standard,Deluxe,Executive',
            'harga' => 'required|numeric|min:0',
            'tanggal_pesan' => 'required|date|after_or_equal:today',
            'durasi_menginap' => 'required|integer|min:1',
            'breakfast' => 'boolean',
            'total_bayar' => 'required|numeric|min:0',
        ], [
            'nama_pemesan.required' => 'Nama pemesan wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'nomor_identitas.required' => 'Nomor identitas wajib diisi',
            'nomor_identitas.digits' => 'Nomor identitas harus 16 digit',
            'tipe_kamar.required' => 'Tipe kamar wajib dipilih',
            'tanggal_pesan.required' => 'Tanggal pesan wajib diisi',
            'tanggal_pesan.after_or_equal' => 'Tanggal pesan tidak boleh kurang dari hari ini',
            'durasi_menginap.required' => 'Durasi menginap wajib diisi',
            'durasi_menginap.integer' => 'Durasi menginap harus berupa angka',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Hitung ulang total untuk validasi
        $calculation = Booking::hitungTotal(
            $request->harga,
            $request->durasi_menginap,
            $request->has('breakfast')
        );

        $booking = Booking::create([
            'nama_pemesan' => $request->nama_pemesan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_identitas' => $request->nomor_identitas,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'tanggal_pesan' => $request->tanggal_pesan,
            'durasi_menginap' => $request->durasi_menginap,
            'breakfast' => $request->has('breakfast'),
            'diskon' => $calculation['diskon'],
            'total_bayar' => $calculation['total'],
        ]);

        return redirect()->route('booking.sukses')
            ->with('success', 'Pemesanan berhasil! Nomor booking: ' . $booking->id);
    }

    /**
     * Display all bookings (transactions)
     */
    public function transactions()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        return view('transactions', compact('bookings'));
    }

    /**
     * Success page after booking
     */
    public function sukses()
    {
        return view('booking.sukses');
    }

    /**
     * Delete booking
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking.transaksi')
            ->with('success', 'Booking berhasil dihapus');
    }
}