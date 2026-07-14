<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

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

    protected $dates = [
        'deleted_at'
    ];

    // Quan hệ với Product
    public function products()
    {
        return $this->hasMany(Product::class, 'catid', 'cateid');
    }
}