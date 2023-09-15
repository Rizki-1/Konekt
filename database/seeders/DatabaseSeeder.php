<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'adminpassword',
            'role' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'penjual',
            'role' => 'user',
        ]);
        // \App\Models\adminkategori::factory()->create([
        //     'kategori' => 'gorengan',
        //     'keterangan' => 'halotest'
        // ]);
    }
}
