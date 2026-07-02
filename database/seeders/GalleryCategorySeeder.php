<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GalleryCategory;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
        ['name' => 'Projects', 'slug' => 'projects'],
        ['name' => 'Events', 'slug' => 'events'],
        ['name' => 'Innovation', 'slug' => 'innovation'],
        ['name' => 'Awards & Recognition', 'slug' => 'awards'],
        ['name' => 'Demos', 'slug' => 'demos'],
    ];

    foreach ($categories as $cat) {
        GalleryCategory::create($cat);
    }   
    }
}

