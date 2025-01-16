<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['business_id', 'name', 'email','phone_number','status', 'performance_score'];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
