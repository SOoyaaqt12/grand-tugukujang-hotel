<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.products', compact('products'));
    }

    public function price()
    {
        $products = Products::orderBy('price', 'asc')->get();
        return view('price', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::with('images')->findOrFail($id);
        
        // Pastikan features tidak null
        if (empty($product->features)) {
            $product->features = '';
        }
        
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Get all kamar for API
     */
    public function getKamar()
    {
        try {
            $kamar = Products::select('id', 'name', 'category', 'price')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Data kamar berhasil diambil',
                'data' => $kamar,
                'count' => $kamar->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data kamar: ' . $e->getMessage()
            ], 500);
        }
    }
}