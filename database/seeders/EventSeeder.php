<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::truncate();

        Event::create([
            'category' => 'summit',
            'title' => 'AI Global Intelligence Summit 2026',
            'status_badge' => 'Registrations Open',
            'main_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsc6C1AKSAiGZL6EMB_oXGr7BnYqNWFSsj4Vs4-YC5_vhBepEIuGOHgIn2ShsKi3RPJoQnXpQk9wk3I1KL_qaSeLNy8KerG3Mbtgd0Aq2Fum2Y9zkB1VRPb_JaLZT6w0G5HPbEPJN4nvcC0BhbdVXsnAiSa_6KHx96MUsIa6GWtiXwf1vXBl1A1j3i3ajUibzfFLFQoC6PC5fe9v6AdruTSLY-LrLAZagqA11uxEasK7kdeyCSsAzObpT5qMzusqUZdZVVVI52Poc4',
            'description' => 'The premier gathering of neural engineers, security architects, and enterprise decision makers looking to deploy autonomous pipelines.',
            'location' => 'San Francisco Innovation Lab',
            'date_text' => 'June 18, 2026',
            'capacity' => '500 Seats Available',
            'ticket_tier' => 'All-Access Pass',
            'ticket_price' => '$299',
            'ticket_inclusions' => 'Catered Launch, Exclusive Sandbox Lab access, Digital Node badge.',
            'tracks' => [
                ['label' => 'Sandbox Security', 'name' => 'Sandbox Security', 'desc' => 'Explore collaborative sandboxed execution grids.', 'tags' => 'security'],
                ['label' => 'Self-Healing Workflows', 'name' => 'Self-Healing Workflows', 'desc' => 'Auto-trigger fallback routes on transaction timeouts.', 'tags' => 'healing'],
                ['label' => 'Telemetry Mesh', 'name' => 'Telemetry Mesh', 'desc' => 'Monitor latency variations and global data integrity.', 'tags' => 'telemetry'],
            ],
            'agenda' => [
                ['time' => '09:00 AM', 'title' => 'Keynote: Engineering Frictionless Systems', 'session' => 'Keynote: Engineering Frictionless Systems', 'desc' => 'Dr. Aris Thorne is showcasing sandbox safety configurations.', 'summary' => 'Dr. Aris Thorne is showcasing sandbox safety configurations.', 'stage' => 'Main Stage'],
                ['time' => '11:00 AM', 'title' => 'Security Sandboxing Deep Dive', 'session' => 'Security Sandboxing Deep Dive', 'desc' => 'Elena Vance deep dives into isolated database synchronizations.', 'summary' => 'Elena Vance deep dives into isolated database synchronizations.', 'stage' => 'Cyber Stage'],
                ['time' => '02:00 PM', 'title' => 'Live Demo: Multi-Agent Conflict Solvers', 'session' => 'Live Demo: Multi-Agent Conflict Solvers', 'desc' => 'Marcus Chen demonstrates real-time transaction deadlocks recovery.', 'summary' => 'Marcus Chen demonstrates real-time transaction deadlocks recovery.', 'stage' => 'Labs Stage'],
            ],
            'speakers' => [
                ['name' => 'Dr. Aris Thorne', 'role' => 'CEO, AI-Solutions', 'avatar' => null],
                ['name' => 'Elena Vance', 'role' => 'CTO, AI-Solutions', 'avatar' => null],
            ],
        ]);
    }
}
