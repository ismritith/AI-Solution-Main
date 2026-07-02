<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        Project::create([
            'classification' => 'featured',
            'title' => 'Project Hyperion Grid',
            'sector' => 'FinTech',
            'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsc6C1AKSAiGZL6EMB_oXGr7BnYqNWFSsj4Vs4-YC5_vhBepEIuGOHgIn2ShsKi3RPJoQnXpQk9wk3I1KL_qaSeLNy8KerG3Mbtgd0Aq2Fum2Y9zkB1VRPb_JaLZT6w0G5HPbEPJN4nvcC0BhbdVXsnAiSa_6KHx96MUsIa6GWtiXwf1vXBl1A1j3i3ajUibzfFLFQoC6PC5fe9v6AdruTSLY-LrLAZagqA11uxEasK7kdeyCSsAzObpT5qMzusqUZdZVVVI52Poc4',
            'description' => 'A decentralized intelligence dashboard for financial high-frequency trades, managing over $1.2B daily with predictive mesh safety filters.',
            'rating' => 4.95,
            'tech_stack' => 'Laravel, MySQL, Redis, Python',
            'footer_stat' => '99.98% Accuracy Rate',
            'metric1_val' => '$1.2B+',
            'metric1_lbl' => 'Daily Transactions',
            'metric2_val' => '0.08ms',
            'metric2_lbl' => 'Decision Time',
            'metric3_val' => '99.9%',
            'metric3_lbl' => 'Uptime',
            'status_badge' => 'Operational',
            'project_code' => 'HYPERION v3',
            'estimated_date' => 'Completed Q1 2026',
            'icon' => 'insights',
        ]);

        Project::create([
            'classification' => 'present',
            'title' => 'Aegis Threat Sentinel',
            'sector' => 'Security',
            'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAxR3DZ3pvj7Viuv0dRg5asdZ0QF0B2WFC_0Ii9djLCwNs60Pq9u11FB4SNZGzCmU2c-_8zLyrDQ_tPxAJ_MlUPvAqwJ2Z-eQASjSwKrXyhlpT9h1FVG3FOx1GZfnaXdp-gk2-1pEiXHMUm8qeDnoWGHbaQNszPJZtUrQ2p3F2c30LcVj_72aLNK5pKDzeQsCY0hZFBSiEyZiCAnKBk_-w9L6iiYIi_rEXOPo9cb8DaZEt2PC25Lfmg4qQch7T2sJLSHL4C3PNM1u9e',
            'description' => 'AI-driven network scanner detecting buffer leaks and suspicious routing queries within sandbox structures in real-time.',
            'rating' => 4.88,
            'tech_stack' => 'Rust, Laravel, C++, SQLite',
            'footer_stat' => '0 Threat Breaches',
            'metric1_val' => '100%',
            'metric1_lbl' => 'Vulnerability Block',
            'metric2_val' => '24/7',
            'metric2_lbl' => 'Continuous Monitoring',
            'metric3_val' => 'Zero',
            'metric3_lbl' => 'Manual Config',
            'status_badge' => 'Scaling',
            'project_code' => 'AEGIS v1',
            'estimated_date' => 'Active Pipeline',
            'icon' => 'shield',
        ]);
    }
}
