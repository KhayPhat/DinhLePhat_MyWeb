<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'brandname' => 'Apple',
                'slug' => Str::slug('Apple'),
                'image' => 'apple.jpg',
                'status' => 1,
                'sort_order' => 1,
                'description' => 'Thương hiệu Apple',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'brandname' => 'Samsung',
                'slug' => Str::slug('Samsung'),
                'image' => 'samsung.jpg',
                'status' => 1,
                'sort_order' => 2,
                'description' => 'Thương hiệu Samsung',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}