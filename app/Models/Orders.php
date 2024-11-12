<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['user_id', 'date_order', 'total', 'status', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(Order_details::class);
    }
}
