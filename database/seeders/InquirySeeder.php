<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inquiry::truncate();

        Inquiry::create([
            'name' => 'Alexander Mercer',
            'email' => 'alex.mercer@aperture.io',
            'department' => 'Engineering',
            'message' => 'Hello team, we are evaluating your Quantum Neural Mesh solution for our multi-region distributed compute nodes. What is the maximum throughput supported under sub-millisecond latencies?',
        ]);

        Inquiry::create([
            'name' => 'Nora Fries',
            'email' => 'nora.fries@cryotech.org',
            'department' => 'Security',
            'message' => 'I would like to inquire about the compliance boundaries of your Aegis Threat Sentinel sandboxing setup. Does it support continuous logging to external SIEM tools under SOC2 frameworks?',
        ]);

        Inquiry::create([
            'name' => 'Victor Stone',
            'email' => 'v.stone@star-labs.com',
            'department' => 'General Support',
            'message' => 'We are interested in scheduled enterprise pilot sessions for autonomous agent swarms. Can you provide custom SLA details and pilot onboarding timelines?',
        ]);
    }
}
