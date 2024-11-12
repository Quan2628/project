<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //
    protected $table = 'carts';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at'];

    public function cartDetails()
    {
        return $this->hasMany(Cart_details::class);
    }
}
