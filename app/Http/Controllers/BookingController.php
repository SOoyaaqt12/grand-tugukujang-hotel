<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display booking form
     */
    public function index(Request $request)
    {
        // Ambil room_id dari query string
        $roomId = $request->query('room_id');
        
        // Jika tidak ada room_id, redirect ke product page
        if (!$roomId) {
            return redirect('/products')->with('info', 'Silakan pilih kamar terlebih dahulu');
        }
        
        // Ambil data room dari database
        $room = Products::findOrFail($roomId);
        
        // Buat object compatibility untuk view lama
        $room->name = $room->title;
        $room->category = $room->type;
        $room->max_guests = $room->capacity;
        $room->size = '45'; // Default value atau ambil dari database jika ada
        
        return view('reservasi', compact('room'));
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
            'room_id' => 'required|exists:products,id',
            'nama_pemesan' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_identitas' => 'required|digits:16',
            'tanggal_pesan' => 'required|date|after_or_equal:today',
            'durasi_menginap' => 'required|integer|min:1',
            'breakfast' => 'boolean',
            'total_bayar' => 'required|numeric|min:0',
        ], [
            'room_id.required' => 'Kamar wajib dipilih',
            'room_id.exists' => 'Kamar tidak ditemukan',
            'nama_pemesan.required' => 'Nama pemesan wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'nomor_identitas.required' => 'Nomor identitas wajib diisi',
            'nomor_identitas.digits' => 'Nomor identitas harus 16 digit',
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

        // Ambil data room
        $room = Products::findOrFail($request->room_id);

        // Hitung ulang total untuk validasi
        $calculation = Booking::hitungTotal(
            $room->price,
            $request->durasi_menginap,
            $request->has('breakfast')
        );

        $booking = Booking::create([
            'product_id' => $room->id,
            'nama_pemesan' => $request->nama_pemesan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_identitas' => $request->nomor_identitas,
            'tipe_kamar' => $room->type,
            'harga' => $room->price,
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
    public function transaksi()
    {
        $bookings = Booking::with('product')->orderBy('created_at', 'desc')->paginate(10);

        return view('booking.transaksi', compact('bookings'));
    }

    /**
     * Success page after booking
     */
    public function sukses()
    {
        if (!session()->has('success')) {
            return redirect('/products');
        }
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