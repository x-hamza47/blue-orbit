<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Hamza Aamir',
                'slug' => Str::slug('Hamza Aamir'),
                'image' => null,
                'designation' => 'Full Stack Web Developer',
                'company' => 'Blue Orbit Digital Agency',
                'bio' => 'Hamza is a full stack web developer specializing in Laravel, PHP, MySQL, React, and modern UI systems. He also works in cybersecurity and builds scalable, performance-focused web applications.',
                'linkedin_url' => 'https://linkedin.com/in/hamza-aamir',
                'twitter_url' => 'https://twitter.com/hamza_aamir',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zain Ali',
                'slug' => Str::slug('Zain Ali'),
                'image' => null,
                'designation' => 'Backend Developer',
                'company' => 'Freelance Developer',
                'bio' => 'Zain is a backend-focused developer skilled in Laravel and API development. He enjoys building clean architectures, optimizing databases, and working on scalable backend systems.',
                'linkedin_url' => 'https://linkedin.com/in/zain-ali',
                'twitter_url' => 'https://twitter.com/zain_ali_dev',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayesha Khan',
                'slug' => Str::slug('Ayesha Khan'),
                'image' => null,
                'designation' => 'UI/UX Designer',
                'company' => 'Creative Studio',
                'bio' => 'Ayesha is a UI/UX designer focused on creating modern, user-friendly interfaces and conversion-driven design systems using Figma and Adobe XD.',
                'linkedin_url' => 'https://linkedin.com/in/ayesha-khan',
                'twitter_url' => 'https://twitter.com/ayesha_designs',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Umar Farooq',
                'slug' => Str::slug('Umar Farooq'),
                'image' => null,
                'designation' => 'DevOps Engineer',
                'company' => 'Cloud Systems',
                'bio' => 'Umar is a DevOps engineer specializing in AWS, Docker, CI/CD pipelines, and scalable infrastructure deployment.',
                'linkedin_url' => 'https://linkedin.com/in/umar-farooq',
                'twitter_url' => 'https://twitter.com/umar_devops',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
