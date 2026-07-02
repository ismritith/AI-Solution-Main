<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        $this->call([
            AdminUserSeeder::class,
            ServiceSeeder::class,
            BlogPostSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
            EventSeeder::class,
            GalleryAssetSeeder::class,
            InquirySeeder::class,
            ProjectReviewSeeder::class,
            RegistrationSeeder::class,
        ]);

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
