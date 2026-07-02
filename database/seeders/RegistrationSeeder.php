<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registration::truncate();

        Registration::create([
            'registration_type' => 'individual',
            'full_name' => 'Alice Margatroid',
            'email' => 'alice@puppetmesh.net',
            'event_name' => 'AI Global Intelligence Summit 2026',
            'pass_type' => 'VIP Access',
        ]);

        Registration::create([
            'registration_type' => 'team',
            'team_name' => 'Cyberdyne Resistance',
            'email' => 'john.connor@cyberdyne.org',
            'event_name' => 'AI Global Intelligence Summit 2026',
            'team_size' => 4,
            'pass_type' => 'All-Access Pass',
            'members' => [
                'John Connor',
                'Sarah Connor',
                'Kyle Reese',
                'Marcus Wright'
            ],
        ]);
    }
}
