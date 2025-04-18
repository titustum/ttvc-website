<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSlideContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hero_slide_contents')->insert([
            [
                'image' => 'hero_slide_images/happy-tetutvc-food-student.jpg',
                'title' => 'Welcome to Tetu Technical Vocational College',
                'subtitle' => 'Empowering Futures Through Quality Education',
                'slogan' => 'Join us to shape your career and future.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'hero_slide_images/tetu-tvc-ict-practicals.jpg',
                'title' => 'Modern computer labs & innovation hubs',
                'subtitle' => 'Cutting-edge technology to prepare for future',
                'slogan' => 'Learn with the best tools available here.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'hero_slide_images/student-leaders-swearring-in.jpg',
                'title' => 'Build Your Leadership Skills in Tetu',
                'subtitle' => 'Here, you have an audacity to be compete and with other leaders in fairness.',
                'slogan' => 'Learn leadership with better mentorship',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'hero_slide_images/principal-shows-thropies.jpg',
                'title' => 'Excellence Beyond the Classroom',
                'subtitle' => 'We nurture talents in sports, clubs, innovations and societies.',
                'slogan' => 'Achieve a balanced and vibrant student life.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
