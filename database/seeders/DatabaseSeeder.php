<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'iqballubis015@gmail.com',
            'password' => Hash::make('10292004'),
            'level' => 'admin',
            'aktif' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
          DB::table('users')->insert([
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('10292004'),
            'level' => 'pemilik',
            'aktif' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
          DB::table('users')->insert([
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('10292004'),
            'level' => 'pelanggan',
            'aktif' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
          DB::table('users')->insert([
            'email' => 'operator@gmail.com',
            'password' => Hash::make('10292004'),
            'level' => 'operator',
            'aktif' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
