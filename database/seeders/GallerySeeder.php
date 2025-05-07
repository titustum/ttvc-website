<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('galleries')->insert([
            [
                'name' => '2025 - TVET Games',
                'slug' => Str::slug('2025 - TVET Games'),
                'category' => 'Sports',
                'description' => 'Highlights from the 2025 Technical and Vocational Education and Training Games.',
                'image' => 'images/tvet_games_2025.jpg', // Replace with an actual image path
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '2025 - Graduation Ceremony',
                'slug' => Str::slug('2025 - Graduation Ceremony'),
                'category' => 'Graduation',
                'description' => 'Celebrating the graduating class of 2025.',
                'image' => 'images/graduation_2025.jpg', // Replace with an actual image path
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Art Exhibition - July 2025',
                'slug' => Str::slug('Art Exhibition - July 2025'),
                'category' => 'Arts',
                'description' => 'A showcase of student artwork from the July 2025 exhibition.',
                'image' => 'images/art_exhibition_july_2025.jpg', // Replace with an actual image path
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science Fair Projects 2025',
                'slug' => Str::slug('Science Fair Projects 2025'),
                'category' => 'Science',
                'description' => 'Innovative science projects presented at the 2025 science fair.',
                'image' => 'images/science_fair_2025.jpg', // Replace with an actual image path
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Campus Life Moments',
                'slug' => Str::slug('Campus Life Moments'),
                'category' => 'General',
                'description' => 'Snapshots of everyday life on campus.',
                'image' => 'images/campus_life.jpg', // Replace with an actual image path
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
