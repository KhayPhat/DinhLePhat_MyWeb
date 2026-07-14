<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'fullname'   => 'Đinh Lê Phát',
                'username'   => 'admin',
                'email'      => 'dinhlephat@gmail.com',
                'password'   => Hash::make('123456'),
                'phone'      => '0123456789',
                'address'    => 'TPHCM',
                'gender'     => 1,
                'birthday'   => '2004-01-01',
                'role'       => 1,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}