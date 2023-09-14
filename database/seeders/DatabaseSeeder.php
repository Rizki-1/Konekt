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
            'name' => 'yapi',
            'email' => 'yafihabibi22@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'kambing',
            'email' => 'kambinglucu@gmail.com',
            'password' => '12345678',
            'role' => 'penjual',
        ]);
    }
}
