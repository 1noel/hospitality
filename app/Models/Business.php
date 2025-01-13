<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
     protected $fillable = ['user_id', 
     'name',
      'description', 
      'location',
       'logo',
       'photo',
       'photo1',
       'photo2',
       'photo3',
       'photo4',
       'country',
       'province',
        'district',
        'sector',
        'cell',
        'village',
        'status'
        ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
