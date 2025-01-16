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
    

        public function transactions()
        {
            return $this->hasMany(Transaction::class);
        }
        
        public function bookings()
        {
            return $this->hasMany(Booking::class);
        }
        
        public function products()
        {
            return $this->hasMany(Product::class);
        }
        
        public function services()
        {
            return $this->hasMany(Service::class);
        }
        
        public function beverages()
        {
            return $this->hasMany(Beverage::class);
        }
        
        public function menuItems()
        {
            return $this->hasMany(MenuItem::class);
        }
        
        public function employees()
        {
            return $this->hasMany(Employee::class);
        }
}
