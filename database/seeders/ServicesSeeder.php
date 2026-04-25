<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/services.json');
        $services = json_decode(file_get_contents($path), true);

        foreach ($services as $service) {

            $parentId = DB::table('services')->insertGetId([
                'title' => $service['title'],
                'icon' => $service['icon'],
                'color' => $service['color'],
                'desc' => $service['desc'] ?? null,
                'slug' => Str::slug($service['title']) . '-services',
                'parent_id' => null,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            if (!empty($service['children'])) {
                foreach ($service['children'] as $child) {
                    DB::table('services')->insert([
                        'title' => $child['title'],
                        'icon' => null,
                        'color' => null,
                        'desc' => null,
                        'slug' => Str::slug($child['title']),
                        'parent_id' => $parentId,
                        'is_active' => true,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
