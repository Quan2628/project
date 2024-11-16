<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = [
        'product_id', 'user_id', 'comment', 'parent_id'
    ];
    public $timestamp = false;

    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    // Quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với các bình luận con (replies)
    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }

    // Quan hệ với bình luận cha (nếu có)
    public function parent()
    {
        return $this->belongsTo(Comments::class, 'parent_id');
    }
}
