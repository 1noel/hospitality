<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'business_id', 'name', 'description', 'price', 
        'category', 'availability', 'image1', 'image2', 'image3'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
