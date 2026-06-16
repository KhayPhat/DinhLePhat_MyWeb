<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'cateid';

    protected $fillable = [
        'catename',
        'slug',
        'image',
        'status',
        'sort_order',
        'description'
    ];

    // Quan hệ với Product
    public function products()
    {
        return $this->hasMany(Product::class, 'catid', 'cateid');
    }
}