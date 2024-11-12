<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    //
    protected $table = 'order_details';
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'unit_price', 'total_price'
    ];
    public $timestamp = false;

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
