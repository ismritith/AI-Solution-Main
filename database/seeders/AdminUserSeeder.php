<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update or create the admin user
        User::updateOrCreate(
            ['email' => 'admin@enterprise.ai'],
            [
                'name' => 'Admin Node',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
