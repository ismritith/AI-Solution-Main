<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::truncate();

        Service::create([
            'category' => 'infrastructure',
            'title' => 'Quantum Neural Mesh',
            'description' => 'A sub-millisecond telemetry backbone coordinating distributed AI workloads across high-performance execution nodes.',
            'icon' => 'memory',
            'tags' => 'AI Infrastructure, Real-time, Mesh',
            'metric_subtitle' => 'Ultra-low latency processing',
            'is_featured' => true,
        ]);

        Service::create([
            'category' => 'infrastructure',
            'title' => 'Cognitive Data Fabric',
            'description' => 'Unified and secure data pipelines enabling seamless integration, transformation, and real-time AI-ready data flow.',
            'icon' => 'database',
            'tags' => 'Data, Integration, AI Pipelines',
            'metric_subtitle' => '99.9% data reliability',
            'is_featured' => true,
        ]);

        Service::create([
            'category' => 'step',
            'title' => 'Define AI Objective',
            'description' => 'Translate business goals into measurable AI targets, system scope, and data requirements.',
            'icon' => 'flag',
            'step_number' => '1',
            'is_featured' => false,
        ]);

        Service::create([
            'category' => 'step',
            'title' => 'Build & Orchestrate Data Systems',
            'description' => 'Integrate secure data pipelines and prepare structured environments for AI processing and model training.',
            'icon' => 'analytics',
            'step_number' => '2',
            'is_featured' => false,
        ]);

        Service::create([
            'category' => 'step',
            'title' => 'Deploy Intelligent Systems',
            'description' => 'Launch AI models into production with real-time monitoring, automation, and performance tracking.',
            'icon' => 'bolt',
            'step_number' => '3',
            'is_featured' => false,
        ]);

        Service::create([
            'category' => 'step',
            'title' => 'Continuous Learning & Optimization',
            'description' => 'Continuously improve AI models using feedback loops, retraining, and performance evaluation.',
            'icon' => 'refresh',
            'step_number' => '4',
            'is_featured' => false,
        ]);

        Service::create([
            'category' => 'step',
            'title' => 'Scale & Govern AI Systems',
            'description' => 'Scale AI capabilities across infrastructure while ensuring security, compliance, and ethical governance.',
            'icon' => 'shield',
            'step_number' => '5',
            'is_featured' => false,
        ]);
    }
}