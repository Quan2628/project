<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    //
    protected $fillable = [
        'product_id', 'user_id', 'rating', 'review'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
