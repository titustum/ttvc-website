<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 

        $this->call([
            // DepartmentSeeder::class,
            HeroSlideContentSeeder::class,
            RolesSeeder::class,
            // CourseSeeder::class,
            // Add other seeders here
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => 'password123'
        ]);
    }
}
