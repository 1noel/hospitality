<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'business_id',
        'stock_quantity',
        'brand',
        'category',
        'specifications',
        'variants',
        'weight',
        'unit',
        'featured',
        'availability',
        'image1',
        'image2',
        'image3',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
