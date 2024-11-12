<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_details extends Model
{
    //
    protected $table = 'cart_details';
    protected $fillable = [
        'cart_id', 'product_id', 'quantity', 'size', 'color', 'unit_price', 'total_price'
    ];
    public $timestamp = false;

    public function cart()
    {
        return $this->belongsTo(Carts::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
