<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [

        'productname',

        'price',

        'cateid',

        'brandid'

    ];

    // Quan hệ Category
    public function category()
    {
        return $this->belongsTo(Category::class,'cateid','cateid');
    }

    // Quan hệ Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brandid','id');
    }
}