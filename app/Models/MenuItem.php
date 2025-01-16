<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $fillable = [
        'business_id',
        'name',
        'description',
        'price',
        'category',
        'ingredients',
        'nutritional_info',
        'spicy',
        'vegetarian',
        'vegan',
        'gluten_free',
        'preparation_time',
        'available_for_delivery',
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
