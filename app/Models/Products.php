<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'size',
        'max_guests',
        'bed_type',
        'view_type',
        'features',
        'main_image',
        'badge',
        'is_available'
    ];

    protected $casts = [
        'features' => 'array',
        'is_available' => 'boolean',
        'price' => 'decimal:0'
    ];

    public function bookings()
    {
        return $this->hasMany(Products::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductsImages::class, 'product_id');
    }
}
