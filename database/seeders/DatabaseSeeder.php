<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // CREATE USER FIRST
        // $user = User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        // RUN CATEGORY SEEDER
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
        ]);

    }
}