<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';
    protected $fillable = 
    [
        'name', 'description', 'price', 'size', 'color', 'stock', 'image', 'category_id', 'created_at', 'updated_at'
    ];
    
    public function cartDetails()
    {
        return $this->hasMany(Cart_details::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
