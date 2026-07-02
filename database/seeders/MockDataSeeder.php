<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\GalleryAsset;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MockDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Services
        Service::truncate();
        Service::create([
            'category' => 'infrastructure',
            'title' => 'Quantum Neural Mesh',
            'description' => 'A sub-millisecond telemetry backbone coordinating distributed neural workloads across isolated sandboxed execution nodes.',
            'icon' => 'memory',
            'tags' => 'Telemetry, Real-time, Mesh',
            'metric_subtitle' => '0.14ms latency reduction',
            'is_featured' => true,
        ]);
        Service::create([
            'category' => 'infrastructure',
            'title' => 'Cognitive Storage Nodes',
            'description' => 'Self-healing, multi-database synchronization indexes powered by threat-detection monitoring scripts.',
            'icon' => 'database',
            'tags' => 'Database, Sync, AI-Indexes',
            'metric_subtitle' => '99.999% Sync Consistency',
            'is_featured' => true,
        ]);
        Service::create([
            'category' => 'vertical',
            'title' => 'Autonomous Agent Swarms',
            'description' => 'Deploy collaborative sandboxed agent swarms specialized in updating product assets, resolving threat buffers, and managing pipelines.',
            'icon' => 'neurology',
            'tags' => 'Orchestrator, Sandboxing, Swarms',
            'metric_subtitle' => '84% operation gain',
            'is_featured' => true,
        ]);
        Service::create([
            'category' => 'step',
            'title' => 'Define Objective Node',
            'description' => 'Configure core optimization models, latency rules, and compliance sandboxes.',
            'icon' => 'flag',
            'step_number' => '1',
            'is_featured' => false,
        ]);
        Service::create([
            'category' => 'step',
            'title' => 'Orchestrate Telemetry',
            'description' => 'Establish safe datastreams between operational database clusters and AI sandboxes.',
            'icon' => 'analytics',
            'step_number' => '2',
            'is_featured' => false,
        ]);
        Service::create([
            'category' => 'step',
            'title' => 'Launch Auto-Pilot',
            'description' => 'Activate self-healing logic nodes, monitoring agents, and executive dashboards.',
            'icon' => 'bolt',
            'step_number' => '3',
            'is_featured' => false,
        ]);

        // 2. Blog Posts
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

        // 3. Projects
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

        // 4. Testimonials
        Testimonial::truncate();
        Testimonial::create([
            'client_name' => 'Sarah Vance',
            'client_role' => 'VP of Infrastructure, CloudScale',
            'is_verified' => true,
            'rating' => 5,
            'quote_text' => 'AI-Solutions has transformed our multi-database synchronization workflows completely. The Quantum Neural Mesh works flawlessly and sub-millisecond delays are real!',
            'client_avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZOMpbR1qDj3ExFCXR4MCv7q_igsj3hn5b6aXp5jLL47Qj_ybceO5bd4kbHctYzIOXdOAX82rVXFVGouaoM30iZ7QhC-NdQVjLWruBfPtwU68RX_bfj6CtKMmaMW_CAquAoJU0BKjVw0VbNNcEhiWm4Q5x19Qi2hVTx4dLGsJnpp3tlX2rQi9_KLQU6HPGP_LkrGKmDylFRYHlmR2nVOI_XEkIN3UcS_QL3iiaz5NgF3MNxMaNR7lWK7odHduM8OcxiO-7b9jlCKKx',
        ]);
        Testimonial::create([
            'client_name' => 'Michael Chen',
            'client_role' => 'Director of Security, FinGrid',
            'is_verified' => true,
            'rating' => 5,
            'quote_text' => 'The Aegis Sentinel dashboard is incredible. Having continuous threat evaluation logs within sandboxed agents gave our compliance team peace of mind.',
            'client_avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCdNgFxYrnQnolDvKBrAMf7VMRGvd0KoDgGQbA80olloDoYS87F2zZN9m8KQ2RoGEktkK8x-Q7M3BL2aQUbOhhV8Yo8mWGJGBxrRpu4uWbIcRHBd-UuxIg3_BIiJNy2yRlEHTkdiRIkB_CIDAWECT1zq4V0zTFp6uhQivsNxhxhDXEpfl1XAtpTsm-7xJbR0-RGYPamlW8b510X5ljrYBsrL8C9XiSk4ahwc9kA1D3hB4xiP4Tv9hocjFJZnF687fqyGdopdOXGroY9',
        ]);

        // 5. Events
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

        // 6. Gallery Assets
        GalleryAsset::truncate();
        GalleryAsset::create([
            'category' => 'Research',
            'media_type' => 'image',
            'upload_method' => 'link',
            'external_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAxR3DZ3pvj7Viuv0dRg5asdZ0QF0B2WFC_0Ii9djLCwNs60Pq9u11FB4SNZGzCmU2c-_8zLyrDQ_tPxAJ_MlUPvAqwJ2Z-eQASjSwKrXyhlpT9h1FVG3FOx1GZfnaXdp-gk2-1pEiXHMUm8qeDnoWGHbaQNszPJZtUrQ2p3F2c30LcVj_72aLNK5pKDzeQsCY0hZFBSiEyZiCAnKBk_-w9L6iiYIi_rEXOPo9cb8DaZEt2PC25Lfmg4qQch7T2sJLSHL4C3PNM1u9e',
            'title' => 'Decentralized Neural Fabric Mockup',
            'description' => 'Architectural visual of collaborative sandboxed agent pools syncing database workloads.',
            'is_featured' => true,
        ]);
        GalleryAsset::create([
            'category' => 'Telemetry',
            'media_type' => 'image',
            'upload_method' => 'link',
            'external_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsc6C1AKSAiGZL6EMB_oXGr7BnYqNWFSsj4Vs4-YC5_vhBepEIuGOHgIn2ShsKi3RPJoQnXpQk9wk3I1KL_qaSeLNy8KerG3Mbtgd0Aq2Fum2Y9zkB1VRPb_JaLZT6w0G5HPbEPJN4nvcC0BhbdVXsnAiSa_6KHx96MUsIa6GWtiXwf1vXBl1A1j3i3ajUibzfFLFQoC6PC5fe9v6AdruTSLY-LrLAZagqA11uxEasK7kdeyCSsAzObpT5qMzusqUZdZVVVI52Poc4',
            'title' => 'Multi-Database Telemetry Cluster',
            'description' => 'Continuous integrity monitoring graphs displaying latency peaks and automated failovers.',
            'is_featured' => true,
        ]);
    }
}
