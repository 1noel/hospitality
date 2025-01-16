<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 
        'booking_id',
        'business_id', // Add this field
        'amount', 
        'status', 
        'payment_method', 
        'transaction_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
