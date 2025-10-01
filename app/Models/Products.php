<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'type',
        'title',
        'description',
        'features',
        'capacity',
        'main_image',
        'price',
    ];

    public function images()
    {
        return $this->hasMany(ProductsImages::class, 'product_id');
    }
}
