<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'detail',
        'description',
        'price',
        'pricesale',
        'qty',
        'catid',
        'brandid',
        'status'
    ];

    // Quan hệ Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'catid', 'id');
    }

    // Quan hệ Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandid', 'id');
    }
    
}