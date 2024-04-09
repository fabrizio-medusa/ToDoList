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
        // \App\Models\User::factory(25)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'test@example.com',
             'password' => '12345678',
             'role' => 'admin',
         ]);
    }
}
