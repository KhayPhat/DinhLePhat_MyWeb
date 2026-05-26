<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'catename' => 'Điện thoại',
                'slug' => Str::slug('Điện thoại'),
                'image' => 'dienthoai.jpg',
                'status' => 1,
                'sort_order' => 1,
                'description' => 'Danh mục điện thoại',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'catename' => 'Laptop',
                'slug' => Str::slug('Laptop'),
                'image' => 'laptop.jpg',
                'status' => 1,
                'sort_order' => 2,
                'description' => 'Danh mục laptop',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}