<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = ['name', 'parent_id', 'description', 'created_at', 'updated_at'];

    // Quan hệ với danh mục con
    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    // Quan hệ với danh mục cha
    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }
}
