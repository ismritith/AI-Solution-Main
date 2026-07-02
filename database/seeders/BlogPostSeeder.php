<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogPost::truncate();

        BlogPost::create([
            'title' => 'Orchestrating Autonomous AI Agents in Enterprise Sandbox Grids',
            'slug' => 'orchestrating-autonomous-ai-agents-in-enterprise-sandbox-grids',
            'category' => 'Engineering',
            'reading_time' => 8,
            'published_at' => Carbon::now(),
            'author_name' => 'Dr. Aris Thorne',
            'author_role' => 'CEO & FOUNDER',
            'author_avatar' => null,
            'banner_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAxR3DZ3pvj7Viuv0dRg5asdZ0QF0B2WFC_0Ii9djLCwNs60Pq9u11FB4SNZGzCmU2c-_8zLyrDQ_tPxAJ_MlUPvAqwJ2Z-eQASjSwKrXyhlpT9h1FVG3FOx1GZfnaXdp-gk2-1pEiXHMUm8qeDnoWGHbaQNszPJZtUrQ2p3F2c30LcVj_72aLNK5pKDzeQsCY0hZFBSiEyZiCAnKBk_-w9L6iiYIi_rEXOPo9cb8DaZEt2PC25Lfmg4qQch7T2sJLSHL4C3PNM1u9e',
            'excerpt' => 'An in-depth guide on deploying collaborative AI agent frameworks within strict SOC2 sandbox limits while maintaining sub-millisecond transaction penalties.',
            'body_content' => '<p>Autonomous orchestrations are rapidly changing the way modern companies scale. By packaging execution models inside isolated, highly secure sandbox layers, we permit agents to read logs, compile data, and repair software libraries without threat of database exposure.</p><h2>The Core Sandbox Architecture</h2><p>Our sandbox environment utilizes custom telemetry streams to guarantee safe boundaries. If an agent attempts to execute unauthorized commands or establish unverified outbound sessions, the orchestrator immediately halts the runtime and reverts system configurations to their last verified checkpoint.</p><p>We look forward to showcasing this robust orchestration paradigm during the upcoming AI Global Summit.</p>',
            'blockquote_text' => 'Deploying enterprise AI without strict, isolated sandbox boundaries is similar to running root-level scripts without authentication.',
            'blockquote_source' => 'Elena Vance, CTO',
            'technical_metrics' => [
                ['label' => 'SANDBOX LATENCY', 'val' => '0.12ms', 'desc' => 'Time to intercept unauthorized requests'],
                ['label' => 'THREAT DETECTED', 'val' => '0.00%', 'desc' => 'Historical vulnerability rating'],
                ['label' => 'SCALING RANGE', 'val' => '100x', 'desc' => 'Elastic growth boundaries'],
            ],
            'tags' => 'Sandboxing, Agents, Telemetry, Security',
            'status' => 'published',
        ]);

        BlogPost::create([
            'title' => 'Decentralized Intelligence: Resolving multi-database transactional conflicts using AI',
            'slug' => 'decentralized-intelligence-resolving-multi-database-transactional-conflicts-using-ai',
            'category' => 'Database Tech',
            'reading_time' => 5,
            'published_at' => Carbon::now()->subDays(2),
            'author_name' => 'Elena Vance',
            'author_role' => 'CTO',
            'author_avatar' => null,
            'banner_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsc6C1AKSAiGZL6EMB_oXGr7BnYqNWFSsj4Vs4-YC5_vhBepEIuGOHgIn2ShsKi3RPJoQnXpQk9wk3I1KL_qaSeLNy8KerG3Mbtgd0Aq2Fum2Y9zkB1VRPb_JaLZT6w0G5HPbEPJN4nvcC0BhbdVXsnAiSa_6KHx96MUsIa6GWtiXwf1vXBl1A1j3i3ajUibzfFLFQoC6PC5fe9v6AdruTSLY-LrLAZagqA11uxEasK7kdeyCSsAzObpT5qMzusqUZdZVVVI52Poc4',
            'excerpt' => 'How neural analytical loops are resolving operational transaction deadlocks across highly distributed network nodes without manual conflict-resolution steps.',
            'body_content' => '<p>Synchronizing complex database engines globally has traditionally required massive conflict-resolution overhead. By leveraging smart predictive algorithms, we predict data collisions before they happen and delay conflicting updates with micro-second accuracy.</p><h2>The Self-Healing Conflict Protocol</h2><p>Through persistent analysis of transaction graphs, the system recognizes overlapping write requests and schedules them in non-adjacent latency pockets. This results in optimal pipeline flow and zero transactional deadlocks.</p>',
            'blockquote_text' => 'AI is not just about prediction; it is about self-healing structures.',
            'blockquote_source' => 'Dr. Aris Thorne',
            'technical_metrics' => [
                ['label' => 'CONFLICTS AVOIDED', 'val' => '99.98%', 'desc' => 'Percentage of overlap solved natively'],
                ['label' => 'SYNC LATENCY', 'val' => '1.4ms', 'desc' => 'Average global consensus time'],
            ],
            'tags' => 'Database, Neural-Sync, Multi-Node',
            'status' => 'published',
        ]);
    }
}
