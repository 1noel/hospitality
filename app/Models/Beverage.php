<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    protected $fillable = [
        'business_id',
        'name',
        'description',
        'price',
        'category',
        'alcohol',
        'alcohol_content',
        'ingredients',
        'hot',     
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
