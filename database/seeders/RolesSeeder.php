<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(
        [
            [
                'name' => 'Trainer', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Section Head', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Principal', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deputy Principal - Administration', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deputy Principal - Academics', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more roles as needed
        ]);
    }
}
