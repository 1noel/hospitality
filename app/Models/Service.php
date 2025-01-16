<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'pricing_type',
        'price_variations',
        'duration',
        'category',
        'included_items',
        'requirements',
        'capacity',
        'booking_required',
        'advance_booking_days',
        'available_days',
        'available_times',
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
