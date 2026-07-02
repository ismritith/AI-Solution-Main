@extends('Front.layouts.app')

@section('title', 'AI Services & Solutions | AI-Solutions')

@section('content')

<!-- Ambient glows -->
<div class="bg-glow-main top-[5%] left-[-5%] opacity-50"></div>
<div class="bg-glow-secondary top-[55%] right-[-5%] opacity-35"></div>
<div class="bg-glow-main top-[85%] left-[30%] opacity-30"></div>

<!-- ══════════════════════════════════════════════
     HERO
══════════════════════════════════════════════ -->
<section class="relative pt-44 pb-28 overflow-hidden">
    <div class="absolute inset-0 grid-pattern pointer-events-none opacity-40"></div>

    <div class="relative z-10 max-w-container-max mx-auto px-gutter">
        <div class="max-w-4xl" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 mb-10 rounded-full border border-secondary/30 bg-secondary/10 font-mono text-[10px] text-on-surface uppercase tracking-widest">
                <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                Our Services
            </span>

            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-[1.08] mb-8">
                Intelligent solutions<br/>
                <span class="text-gradient-coral">built for your business.</span>
            </h1>

            <p class="font-body text-lg text-on-surface-variant max-w-2xl leading-relaxed mb-12">
                From strategic AI consulting to full-scale model deployment, we deliver end-to-end artificial intelligence services that drive measurable business outcomes — across every industry and function.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="/contact" class="btn-gradient text-white font-bold px-8 py-4 rounded-xl font-body text-base shadow-lg shadow-secondary/20 inline-flex items-center gap-2">
                    Book a Free Consultation
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
                <a href="#services" class="glass-card text-white font-semibold px-8 py-4 rounded-xl font-body text-base hover:bg-white/10 transition-colors inline-flex items-center gap-2">
                    Browse Services
                    <span class="material-symbols-outlined text-base">expand_more</span>
                </a>
            </div>
        </div>

        <!-- Trust metrics bar -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-px mt-24 border border-white/5 rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            @php
                $metrics = [
                    ['value' => '500+',    'label' => 'Enterprise Clients',        'icon' => 'corporate_fare'],
                    ['value' => '99.97%',  'label' => 'Platform Uptime SLA',       'icon' => 'verified'],
                    ['value' => '1.2B+',   'label' => 'AI Requests Processed Daily','icon' => 'bolt'],
                    ['value' => 'SOC 2',   'label' => 'Type II Certified',         'icon' => 'enhanced_encryption'],
                ];
            @endphp
            @foreach($metrics as $m)
                <div class="bg-white/3 px-8 py-7 flex items-center gap-5 hover:bg-white/6 transition-colors">
                    <span class="material-symbols-outlined text-secondary text-2xl shrink-0">{{ $m['icon'] }}</span>
                    <div>
                        <div class="font-display text-2xl font-extrabold text-white">{{ $m['value'] }}</div>
                        <div class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest mt-0.5">{{ $m['label'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════
     SERVICE OFFERINGS — CORE SERVICES (FILTERABLE)
══════════════════════════════════════════════ -->
<section id="services" class="py-24 md:py-32">
    <div class="max-w-container-max mx-auto px-gutter">

        <div class="text-center mb-14" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full mb-6">
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">What We Offer</span>
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-4">Our Core Services</h2>
            <p class="text-on-surface-variant max-w-2xl mx-auto text-base leading-relaxed">
                Specialised practices. One integrated platform. Built to take AI from proof-of-concept to production at enterprise scale.
            </p>
        </div>

        @php
            // Merge infrastructure + vertical services for the "Core Services" section
            $dbCoreServices = collect()->merge($infrastructureServices)->merge($verticalServices);
            $useStatic = $dbCoreServices->isEmpty();

            // Simple slugger so we don't need a Str:: import in the view
            $slugify = function ($value) {
                $value = strtolower(trim($value ?? ''));
                $value = preg_replace('/[^a-z0-9]+/', '-', $value);
                return trim($value, '-');
            };

            // Static fallback data matching the current UI fields
            $staticCoreServices = [
                ['index' => 0, 'icon' => 'psychology', 'color' => 'secondary', 'category' => 'infrastructure',
                 'title' => 'Artificial Intelligence Solutions',
                 'summary' => 'End-to-end AI systems engineered for production environments.',
                 'desc' => 'We design, develop, and deploy bespoke AI systems tailored to your operational context. From autonomous decision engines and intelligent recommendation systems to multi-agent orchestration frameworks — our solutions integrate directly into your existing infrastructure without disrupting live workflows.',
                 'tags' => ['Deep Learning', 'Reinforcement Learning', 'Multi-Agent Systems', 'AutoML', 'Model Governance'],
                 'stat' => '+84% average efficiency gain'],
                ['index' => 1, 'icon' => 'model_training', 'color' => 'accent', 'category' => 'vertical',
                 'title' => 'Machine Learning Model Development',
                 'summary' => 'Custom ML models built on your data, validated against your business goals.',
                 'desc' => 'We build supervised, unsupervised, and semi-supervised models across regression, classification, clustering, and ranking tasks. Our process starts with a rigorous data audit and ends with a production-ready model packaged with benchmarks and a monitoring plan.',
                 'tags' => ['XGBoost', 'PyTorch', 'TensorFlow', 'Feature Engineering', 'Drift Detection'],
                 'stat' => 'Avg. 4× faster time-to-production'],
                ['index' => 2, 'icon' => 'bar_chart', 'color' => 'secondary', 'category' => 'infrastructure',
                 'title' => 'Data Analytics & Business Intelligence',
                 'summary' => 'Turn raw operational data into decisions your leadership can act on.',
                 'desc' => 'We build modern data stacks — ingestion, transformation, and visualisation — that give your teams a single source of truth. From real-time dashboards and KPI reporting to cohort analysis and attribution modelling.',
                 'tags' => ['dbt', 'Snowflake', 'BigQuery', 'Looker', 'Power BI', 'Airflow'],
                 'stat' => null],
                ['index' => 3, 'icon' => 'chat', 'color' => 'accent', 'category' => 'vertical',
                 'title' => 'Natural Language Processing (NLP) Solutions',
                 'summary' => 'Extract meaning, automate language tasks, and deploy LLM-powered applications at scale.',
                 'desc' => 'Our NLP practice covers the full spectrum — from classical text classification and named entity recognition to retrieval-augmented generation (RAG) systems and domain-specific LLM fine-tuning.',
                 'tags' => ['LLM Fine-Tuning', 'RAG', 'LangChain', 'Transformers', 'Named Entity Recognition', 'Vector DBs'],
                 'stat' => null],
                ['index' => 4, 'icon' => 'image_search', 'color' => 'secondary', 'category' => 'vertical',
                 'title' => 'Computer Vision Applications',
                 'summary' => 'Real-time visual intelligence for manufacturing, logistics, and document processing.',
                 'desc' => 'We develop and deploy computer vision systems for object detection, defect classification, image segmentation, and optical character recognition — at the edge or in the cloud.',
                 'tags' => ['YOLO', 'OpenCV', 'Edge Inference', 'OCR', 'Image Segmentation', 'TensorRT'],
                 'stat' => null],
                ['index' => 5, 'icon' => 'account_tree', 'color' => 'accent', 'category' => 'infrastructure',
                 'title' => 'AI Automation & Workflow Optimisation',
                 'summary' => 'Replace manual, rule-based processes with intelligent, self-improving pipelines.',
                 'desc' => 'We map your operational workflows, identify automation candidates, and build AI-powered systems that reduce manual effort, eliminate bottlenecks, and flag exceptions that require human review.',
                 'tags' => ['RPA Integration', 'IDP', 'Predictive Scheduling', 'Event-Driven Architecture', 'Kafka'],
                 'stat' => 'Up to 70% reduction in manual processing'],
                ['index' => 6, 'icon' => 'lightbulb', 'color' => 'secondary', 'category' => 'vertical',
                 'title' => 'AI Consulting & Digital Transformation',
                 'summary' => 'Strategic guidance to build your AI capability from the ground up.',
                 'desc' => 'Our consulting practice helps leadership teams assess AI readiness, prioritise use cases by ROI and feasibility, and design a phased transformation roadmap they can actually execute.',
                 'tags' => ['AI Readiness Assessment', 'Use Case Prioritisation', 'Roadmapping', 'Change Management', 'AI Ethics'],
                 'stat' => null],
            ];

            // Build the list of categories actually present, so pills never show an empty bucket
            $coreServiceCategories = $useStatic
                ? collect($staticCoreServices)->pluck('category')->filter()->unique()->values()
                : $dbCoreServices->pluck('category')->filter()->unique()->values();
        @endphp

        {{-- Core Service Category Filter Pills --}}
        @if($coreServiceCategories->isNotEmpty())
            <div class="flex flex-wrap justify-center gap-3 mb-14" id="core-service-filters" data-aos="fade-up" data-aos-delay="100">
                <button type="button" data-filter="all"
                    class="core-filter-btn flex items-center gap-2 px-4 py-2 rounded-xl font-mono text-xs uppercase tracking-wider border transition-all duration-200 bg-secondary text-white border-secondary shadow-lg shadow-secondary/20 active">
                    <span class="material-symbols-outlined text-sm">apps</span>
                    All Services
                </button>
                @foreach($coreServiceCategories as $cat)
                    <button type="button" data-filter="{{ $slugify($cat) }}"
                        class="core-filter-btn flex items-center gap-2 px-4 py-2 rounded-xl font-mono text-xs uppercase tracking-wider border transition-all duration-200 glass-card text-on-surface-variant border-white/10 hover:border-secondary/40 hover:text-white">
                        <span class="material-symbols-outlined text-sm">{{ strtolower($cat) === 'infrastructure' ? 'dns' : 'domain' }}</span>
                        {{ ucfirst($cat) }}
                    </button>
                @endforeach
            </div>

            <div class="text-center mb-8">
                <span id="core-service-count" class="font-mono text-xs text-on-surface-variant/60 uppercase tracking-widest"></span>
            </div>
        @endif

        <div class="space-y-6" id="core-service-grid">
            @if($useStatic)
                {{-- Render static fallback --}}
                @foreach($staticCoreServices as $svc)
                    @php $isEven = $svc['index'] % 2 === 0; @endphp
                    <a href="/contact"
                         data-category="{{ $slugify($svc['category']) }}"
                         class="core-service-card glass-card rounded-3xl p-8 md:p-12 group hover:border-{{ $svc['color'] }}/30 transition-all duration-300 block hover:no-underline"
                         data-aos="fade-up" data-aos-delay="{{ $svc['index'] * 50 }}">
                        <div class="flex flex-col md:flex-row gap-10 {{ $isEven ? '' : 'md:flex-row-reverse' }} items-start">
                            <div class="shrink-0 flex flex-row md:flex-col items-center md:items-start gap-5">
                                <div class="w-16 h-16 rounded-2xl bg-{{ $svc['color'] }}/10 border border-{{ $svc['color'] }}/25 flex items-center justify-center group-hover:border-{{ $svc['color'] }}/50 group-hover:scale-105 transition-all text-{{ $svc['color'] }}">
                                    <span class="material-symbols-outlined text-3xl">{{ $svc['icon'] }}</span>
                                </div>
                                <span class="font-mono text-[11px] text-on-surface-variant/50 tracking-widest">
                                    0{{ $svc['index'] + 1 }} / {{ str_pad(count($staticCoreServices), 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>
                            <div class="flex-1 space-y-5">
                                <div>
                                    @if(isset($svc['category']) && $svc['category'] !== 'step')
                                        <span class="inline-flex items-center gap-1.5 mb-2 px-2.5 py-1 rounded-full bg-{{ $svc['color'] }}/10 border border-{{ $svc['color'] }}/20 font-mono text-[9px] text-{{ $svc['color'] }} uppercase tracking-widest">
                                            <span class="material-symbols-outlined text-[12px]">{{ $svc['category'] === 'infrastructure' ? 'dns' : 'domain' }}</span>
                                            {{ $svc['category'] }}
                                        </span>
                                    @endif
                                    <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white mb-2">{{ $svc['title'] }}</h3>
                                    <p class="font-mono text-xs text-{{ $svc['color'] }} uppercase tracking-wider">{{ $svc['summary'] }}</p>
                                </div>
                                <p class="font-body text-sm text-on-surface-variant leading-relaxed max-w-3xl">{{ $svc['desc'] }}</p>
                                <div class="flex flex-wrap gap-2 pt-2">
                                    @foreach($svc['tags'] as $tag)
                                        <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full font-mono text-[10px] text-on-surface-variant uppercase tracking-wide">{{ $tag }}</span>
                                    @endforeach
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-4 gap-4 border-t border-white/5">
                                    @if($svc['stat'])
                                        <div class="flex items-center gap-2">
                                            <span class="material-symbols-outlined text-secondary text-base">trending_up</span>
                                            <span class="font-mono text-xs text-secondary font-bold">{{ $svc['stat'] }}</span>
                                        </div>
                                    @else
                                        <div></div>
                                    @endif
                                    <span class="inline-flex items-center gap-2 text-{{ $svc['color'] }} font-body text-sm font-bold group-hover:text-white transition-colors">
                                        Discuss this service
                                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                {{-- Render dynamic services from DB --}}
                @foreach($dbCoreServices as $index => $svc)
                    @php
                        $isEven = $index % 2 === 0;
                        $color = $isEven ? 'secondary' : 'accent';
                        $tags = $svc->tags ? array_map('trim', explode(',', $svc->tags)) : [];
                    @endphp
                    <a href="/service-details?id={{ $svc->id }}"
                         data-category="{{ $slugify($svc->category) }}"
                         class="core-service-card glass-card rounded-3xl p-8 md:p-12 group hover:border-{{ $color }}/30 transition-all duration-300 block hover:no-underline"
                         data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <div class="flex flex-col md:flex-row gap-10 {{ $isEven ? '' : 'md:flex-row-reverse' }} items-start">
                            <div class="shrink-0 flex flex-row md:flex-col items-center md:items-start gap-5">
                                <div class="w-16 h-16 rounded-2xl bg-{{ $color }}/10 border border-{{ $color }}/25 flex items-center justify-center group-hover:border-{{ $color }}/50 group-hover:scale-105 transition-all text-{{ $color }}">
                                    <span class="material-symbols-outlined text-3xl">{{ $svc->icon ?? 'settings_applications' }}</span>
                                </div>
                                <span class="font-mono text-[11px] text-on-surface-variant/50 tracking-widest">
                                    0{{ $index + 1 }} / {{ str_pad($dbCoreServices->count(), 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>
                            <div class="flex-1 space-y-5">
                                <div>
                                    @if($svc->category && $svc->category !== 'step')
                                        <span class="inline-flex items-center gap-1.5 mb-2 px-2.5 py-1 rounded-full bg-{{ $color }}/10 border border-{{ $color }}/20 font-mono text-[9px] text-{{ $color }} uppercase tracking-widest">
                                            <span class="material-symbols-outlined text-[12px]">{{ $svc->category === 'infrastructure' ? 'dns' : 'domain' }}</span>
                                            {{ $svc->category }}
                                        </span>
                                    @endif
                                    <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white mb-2">{{ $svc->title }}</h3>
                                    <p class="font-mono text-xs text-{{ $color }} uppercase tracking-wider">{{ $svc->metric_subtitle ?? $svc->category }}</p>
                                </div>
                                <div class="font-body text-sm text-on-surface-variant leading-relaxed max-w-3xl">{!! strip_tags($svc->description) !!}</div>
                                @if(count($tags))
                                    <div class="flex flex-wrap gap-2 pt-2">
                                        @foreach($tags as $tag)
                                            <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full font-mono text-[10px] text-on-surface-variant uppercase tracking-wide">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-4 gap-4 border-t border-white/5">
                                    @if($svc->is_featured)
                                        <div class="flex items-center gap-2">
                                            <span class="material-symbols-outlined text-secondary text-base">star</span>
                                            <span class="font-mono text-xs text-secondary font-bold">Featured Service</span>
                                        </div>
                                    @else
                                        <div></div>
                                    @endif
                                    <span class="inline-flex items-center gap-2 text-{{ $color }} font-body text-sm font-bold group-hover:text-white transition-colors">
                                        View Details
                                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>

        <!-- Empty state for core services filter -->
        <div id="core-service-empty" class="hidden text-center py-20">
            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-4 block">search_off</span>
            <p class="font-mono text-sm text-on-surface-variant/50 uppercase tracking-widest">No services match the selected filter.</p>
        </div>
    </div>
</section>

<script>
(function () {
    const filterBtns = document.querySelectorAll('.core-filter-btn');
    const cards       = document.querySelectorAll('.core-service-card');
    const countEl     = document.getElementById('core-service-count');
    const emptyEl     = document.getElementById('core-service-empty');

    if (!filterBtns.length || !cards.length) return;

    function updateCount(visible) {
        if (!countEl) return;
        countEl.textContent = visible === cards.length
            ? `Showing all ${visible} services`
            : `Showing ${visible} of ${cards.length} services`;
    }

    function filterCards(active) {
        let visible = 0;
        cards.forEach(card => {
            const match = active === 'all' || card.dataset.category === active;
            if (match) {
                card.style.display = '';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, visible * 40);
                visible++;
            } else {
                card.style.opacity = '0';
                card.style.transform = 'translateY(12px)';
                setTimeout(() => { card.style.display = 'none'; }, 200);
            }
        });
        if (emptyEl) emptyEl.classList.toggle('hidden', visible > 0);
        updateCount(visible);
    }

    cards.forEach(c => {
        c.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
    });

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => {
                b.classList.remove('bg-secondary', 'text-white', 'border-secondary', 'shadow-lg', 'shadow-secondary/20', 'active');
                b.classList.add('glass-card', 'text-on-surface-variant', 'border-white/10');
            });
            btn.classList.add('bg-secondary', 'text-white', 'border-secondary', 'shadow-lg', 'shadow-secondary/20', 'active');
            btn.classList.remove('glass-card', 'text-on-surface-variant', 'border-white/10');
            filterCards(btn.dataset.filter);
        });
    });

    updateCount(cards.length);
})();
</script>


<!-- ══════════════════════════════════════════════
     SECTORS WE SERVE — FILTERABLE
══════════════════════════════════════════════ -->
<section class="py-24 md:py-32 bg-[#05020c]/50 border-t border-white/5" id="sectors">
    <div class="max-w-container-max mx-auto px-gutter">

        <!-- Header -->
        <div class="text-center mb-14" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full mb-6">
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Sectors We Serve</span>
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-4">Where AI-Solutions Delivers</h2>
            <p class="text-on-surface-variant max-w-2xl mx-auto text-base leading-relaxed">
                We embed domain expertise into every engagement. Filter by sector to see the specific AI capabilities, compliance considerations, and project examples relevant to your industry.
            </p>
        </div>

        <!-- Filter tabs -->
        <div class="flex flex-wrap justify-center gap-3 mb-12" id="sector-filters" data-aos="fade-up" data-aos-delay="100">
            @php
                $filterTabs = [
                    ['key' => 'all',            'label' => 'All Sectors',    'icon' => 'grid_view'],
                    ['key' => 'healthcare',     'label' => 'Healthcare',     'icon' => 'health_and_safety'],
                    ['key' => 'finance',        'label' => 'Finance',        'icon' => 'account_balance'],
                    ['key' => 'it',             'label' => 'IT & SaaS',      'icon' => 'cloud'],
                    ['key' => 'cybersecurity',  'label' => 'Cybersecurity',  'icon' => 'security'],
                    ['key' => 'research',       'label' => 'Research',       'icon' => 'biotech'],
                    ['key' => 'manufacturing',  'label' => 'Manufacturing',  'icon' => 'factory'],
                    ['key' => 'logistics',      'label' => 'Logistics',      'icon' => 'local_shipping'],
                    ['key' => 'energy',         'label' => 'Energy',         'icon' => 'energy_savings_leaf'],
                    ['key' => 'legal',          'label' => 'Legal & Gov',    'icon' => 'gavel'],
                ];
            @endphp
            @foreach($filterTabs as $tab)
                <button
                    data-filter="{{ $tab['key'] }}"
                    class="sector-filter-btn flex items-center gap-2 px-4 py-2 rounded-xl font-mono text-xs uppercase tracking-wider border transition-all duration-200
                           {{ $tab['key'] === 'all'
                               ? 'bg-secondary text-white border-secondary shadow-lg shadow-secondary/20 active'
                               : 'glass-card text-on-surface-variant border-white/10 hover:border-secondary/40 hover:text-white' }}">
                    <span class="material-symbols-outlined text-sm">{{ $tab['icon'] }}</span>
                    {{ $tab['label'] }}
                </button>
            @endforeach
        </div>

        <!-- Result count -->
        <div class="text-center mb-8">
            <span id="sector-count" class="font-mono text-xs text-on-surface-variant/60 uppercase tracking-widest"></span>
        </div>

        <!-- Sector cards grid -->
        @php
            $sectorCards = [
                // Healthcare
                ['sector' => 'healthcare', 'icon' => 'health_and_safety', 'title' => 'Healthcare & Life Sciences',
                 'badge' => 'HIPAA · GxP · FDA 21 CFR',
                 'desc'  => 'Clinical NLP for medical record extraction, diagnostic imaging AI, patient outcome prediction, and pharmacovigilance signal detection — all engineered under HIPAA and GxP compliance frameworks.',
                 'projects' => ['Clinical NLP Platform', 'Radiology AI Triage', 'Drug Safety Signal Detection'],
                 'stat'  => '94% diagnostic accuracy on benchmark datasets'],

                ['sector' => 'healthcare', 'icon' => 'psychology', 'title' => 'Mental Health & Behavioural Analytics',
                 'badge' => 'HIPAA · Ethics Board Reviewed',
                 'desc'  => 'Behavioural pattern modelling, early risk stratification for patient deterioration, and NLP-driven therapy session analysis to support clinical decision-making at scale.',
                 'projects' => ['Patient Risk Stratification', 'Therapy Session Summariser'],
                 'stat'  => null],

                // Finance
                ['sector' => 'finance', 'icon' => 'account_balance', 'title' => 'Banking & Financial Services',
                 'badge' => 'SOC 2 · PCI DSS · Basel III',
                 'desc'  => 'Real-time fraud detection, credit risk underwriting models, AML transaction monitoring, and algorithmic trading signal generation — built to meet Basel III and PCI DSS requirements.',
                 'projects' => ['Real-Time Fraud Engine', 'Credit Underwriting Model', 'AML Monitoring Pipeline'],
                 'stat'  => '99.2% fraud detection precision at <12ms latency'],

                ['sector' => 'finance', 'icon' => 'trending_up', 'title' => 'Insurance & InsurTech',
                 'badge' => 'IFRS 17 · Solvency II',
                 'desc'  => 'Automated claims triage, actuarial loss modelling, telematics-based risk scoring, and NLP document extraction for policy underwriting — designed for high-volume, regulated environments.',
                 'projects' => ['Claims Triage Automation', 'Telematics Risk Scoring'],
                 'stat'  => null],

                // IT & SaaS
                ['sector' => 'it', 'icon' => 'cloud', 'title' => 'Enterprise IT & SaaS Platforms',
                 'badge' => 'ISO 27001 · Multi-Tenant',
                 'desc'  => 'AI-powered feature development for SaaS products — including intelligent search, personalisation engines, churn prediction, and usage anomaly detection — deployable on AWS, GCP, or Azure.',
                 'projects' => ['SaaS Churn Predictor', 'Intelligent Search Layer', 'Usage Anomaly Detector'],
                 'stat'  => '4× faster feature time-to-market'],

                ['sector' => 'it', 'icon' => 'code', 'title' => 'Developer Tools & DevOps Intelligence',
                 'badge' => 'CI/CD · GitHub · GitLab',
                 'desc'  => 'AI-assisted code review, automated test generation, incident prediction from observability signals, and LLM-powered documentation generation integrated directly into developer workflows.',
                 'projects' => ['AI Code Review Bot', 'Incident Prediction System'],
                 'stat'  => null],

                // Cybersecurity
                ['sector' => 'cybersecurity', 'icon' => 'security', 'title' => 'Threat Detection & SOC Automation',
                 'badge' => 'MITRE ATT&CK · SIEM · SOAR',
                 'desc'  => 'ML-based anomaly detection across network traffic, endpoint telemetry, and identity logs. Automated alert triage, threat hunting assistance, and SOAR playbook generation to reduce analyst fatigue.',
                 'projects' => ['Network Anomaly Detector', 'SOC Alert Triage Engine', 'Threat Hunt Copilot'],
                 'stat'  => '73% reduction in mean time to detect (MTTD)'],

                ['sector' => 'cybersecurity', 'icon' => 'manage_accounts', 'title' => 'Identity & Access Intelligence',
                 'badge' => 'Zero Trust · UEBA',
                 'desc'  => 'User and Entity Behaviour Analytics (UEBA) for insider threat detection, privilege escalation monitoring, and continuous authentication risk scoring in Zero Trust architectures.',
                 'projects' => ['UEBA Risk Scoring', 'Privilege Escalation Monitor'],
                 'stat'  => null],

                // Research
                ['sector' => 'research', 'icon' => 'biotech', 'title' => 'Scientific Research & Academia',
                 'badge' => 'IRB · Open Science · FAIR Data',
                 'desc'  => 'Literature mining and meta-analysis automation, genomics data processing pipelines, research data curation tools, and LLM-assisted grant writing and systematic review — all FAIR-data compliant.',
                 'projects' => ['Genomics Pipeline', 'Literature Mining Engine', 'Systematic Review Assistant'],
                 'stat'  => '10× faster literature review cycles'],

                ['sector' => 'research', 'icon' => 'science', 'title' => 'Drug Discovery & Computational Biology',
                 'badge' => 'GxP · EMA · FDA',
                 'desc'  => 'Molecular property prediction, protein structure analysis, clinical trial patient matching, and adverse event signal detection — accelerating R&D timelines in pharma and biotech.',
                 'projects' => ['Molecular Property Predictor', 'Trial Patient Matching'],
                 'stat'  => null],

                // Manufacturing
                ['sector' => 'manufacturing', 'icon' => 'factory', 'title' => 'Smart Manufacturing & Industry 4.0',
                 'badge' => 'OPC-UA · IEC 62443 · ISO 9001',
                 'desc'  => 'Predictive maintenance on production equipment, computer vision quality inspection, OEE optimisation, and supply chain disruption forecasting — integrated with MES and SCADA systems.',
                 'projects' => ['Predictive Maintenance System', 'Vision QA Pipeline', 'OEE Optimiser'],
                 'stat'  => '62% reduction in unplanned downtime'],

                // Logistics
                ['sector' => 'logistics', 'icon' => 'local_shipping', 'title' => 'Logistics, Retail & Supply Chain',
                 'badge' => 'EDI · API-First · Real-Time',
                 'desc'  => 'Probabilistic demand forecasting, dynamic pricing engines, last-mile route optimisation, warehouse slotting automation, and returns propensity modelling for omnichannel retail.',
                 'projects' => ['Demand Forecasting Engine', 'Route Optimisation API', 'Dynamic Pricing Model'],
                 'stat'  => '+18% on-time delivery rate improvement'],

                // Energy
                ['sector' => 'energy', 'icon' => 'energy_savings_leaf', 'title' => 'Energy, Utilities & Sustainability',
                 'badge' => 'NERC CIP · ISO 50001 · ESG',
                 'desc'  => 'Grid anomaly detection, renewable energy output forecasting, consumption pattern analysis, predictive asset maintenance for substations, and automated ESG reporting pipelines.',
                 'projects' => ['Grid Anomaly Detector', 'Renewable Forecasting Model', 'ESG Reporting Automation'],
                 'stat'  => null],

                // Legal
                ['sector' => 'legal', 'icon' => 'gavel', 'title' => 'Legal Tech & Government',
                 'badge' => 'GDPR · FedRAMP · ATO',
                 'desc'  => 'Contract intelligence and clause extraction, regulatory change monitoring, case outcome prediction, e-discovery document review acceleration, and public sector data analysis — built for data sovereignty requirements.',
                 'projects' => ['Contract Intelligence Platform', 'Regulatory Monitor', 'e-Discovery Accelerator'],
                 'stat'  => '85% reduction in contract review time'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" id="sector-grid">
            @foreach($sectorCards as $card)
                <a href="/contact" class="sector-card glass-card rounded-3xl p-8 flex flex-col justify-between group hover:border-secondary/40 transition-all duration-300 opacity-100 hover:no-underline"
                     data-sector="{{ $card['sector'] }}">

                    <!-- Card header -->
                    <div>
                        <div class="flex items-start justify-between mb-6 gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-secondary/10 border border-secondary/20 flex items-center justify-center text-secondary group-hover:border-secondary/50 group-hover:scale-105 transition-all shrink-0">
                                <span class="material-symbols-outlined text-2xl">{{ $card['icon'] }}</span>
                            </div>
                            <span class="font-mono text-[9px] text-on-surface-variant/60 uppercase tracking-wider text-right leading-relaxed pt-1">
                                {{ $card['badge'] }}
                            </span>
                        </div>

                        <h4 class="font-display font-extrabold text-lg text-white mb-3 group-hover:text-secondary transition-colors">
                            {{ $card['title'] }}
                        </h4>
                        <p class="text-xs text-on-surface-variant leading-relaxed mb-6">
                            {{ $card['desc'] }}
                        </p>

                        <!-- Project examples -->
                        <div class="space-y-2 mb-6">
                            <div class="font-mono text-[9px] text-on-surface-variant/50 uppercase tracking-widest mb-3">Delivered Projects</div>
                            @foreach($card['projects'] as $proj)
                                <div class="flex items-center gap-2">
                                    <span class="w-1 h-1 rounded-full bg-secondary shrink-0"></span>
                                    <span class="font-mono text-[10px] text-on-surface-variant">{{ $proj }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Card footer -->
                    <div class="pt-5 border-t border-white/5 flex items-center justify-between gap-4">
                        @if($card['stat'])
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-secondary text-sm">trending_up</span>
                                <span class="font-mono text-[9px] text-secondary font-bold leading-tight">{{ $card['stat'] }}</span>
                            </div>
                        @else
                            <div></div>
                        @endif
                        <span class="inline-flex items-center gap-1 text-on-surface-variant group-hover:text-white transition-colors font-mono text-[10px] uppercase tracking-wider group/btn shrink-0">
                            Learn more
                            <span class="material-symbols-outlined text-sm group-hover/btn:translate-x-0.5 transition-transform">arrow_forward</span>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Empty state -->
        <div id="sector-empty" class="hidden text-center py-20">
            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-4 block">search_off</span>
            <p class="font-mono text-sm text-on-surface-variant/50 uppercase tracking-widest">No sectors match the selected filter.</p>
        </div>

    </div>
</section>

<script>
(function () {
    const filterBtns  = document.querySelectorAll('.sector-filter-btn');
    const cards       = document.querySelectorAll('.sector-card');
    const countEl     = document.getElementById('sector-count');
    const emptyEl     = document.getElementById('sector-empty');

    function updateCount(visible) {
        countEl.textContent = visible === cards.length
            ? `Showing all ${visible} sectors`
            : `Showing ${visible} of ${cards.length} sectors`;
    }

    function filterCards(active) {
        let visible = 0;
        cards.forEach(card => {
            const match = active === 'all' || card.dataset.sector === active;
            if (match) {
                card.style.display = '';
                // small stagger
                setTimeout(() => {
                    card.style.opacity  = '1';
                    card.style.transform = 'translateY(0)';
                }, visible * 40);
                visible++;
            } else {
                card.style.opacity  = '0';
                card.style.transform = 'translateY(12px)';
                setTimeout(() => { card.style.display = 'none'; }, 200);
            }
        });
        emptyEl.classList.toggle('hidden', visible > 0);
        updateCount(visible);
    }

    // Initialise transitions on cards
    cards.forEach(c => {
        c.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
    });

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => {
                b.classList.remove('bg-secondary', 'text-white', 'border-secondary', 'shadow-lg', 'shadow-secondary/20', 'active');
                b.classList.add('glass-card', 'text-on-surface-variant', 'border-white/10');
            });
            btn.classList.add('bg-secondary', 'text-white', 'border-secondary', 'shadow-lg', 'shadow-secondary/20', 'active');
            btn.classList.remove('glass-card', 'text-on-surface-variant', 'border-white/10');
            filterCards(btn.dataset.filter);
        });
    });

    // Set initial count
    updateCount(cards.length);
})();
</script>


<!-- ══════════════════════════════════════════════
     DELIVERY PROCESS
══════════════════════════════════════════════ -->
<section class="py-24 md:py-32 max-w-container-max mx-auto px-gutter">
    <div class="mb-20" data-aos="fade-right">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full mb-6">
            <span class="font-mono text-xs text-on-surface uppercase tracking-widest">How We Work</span>
        </div>
        <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-4">Our Delivery Process</h2>
        <p class="text-on-surface-variant max-w-xl text-base leading-relaxed">
            A structured, milestone-driven process designed to keep your stakeholders informed and your engineers unblocked at every stage.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-10 relative">
        <div class="hidden md:block absolute top-10 left-0 w-full h-[1px] bg-gradient-to-r from-white/0 via-secondary/20 to-white/0 pointer-events-none"></div>

        @forelse($stepServices as $service)
            <div class="relative group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-20 h-20 rounded-full bg-[#0e0816] border border-white/10 flex items-center justify-center mb-8 relative z-10 group-hover:border-secondary/50 group-hover:scale-105 transition-all">
                    <span class="text-secondary font-display font-extrabold text-xl">0{{ $service->step_number }}</span>
                </div>
                <h3 class="font-display text-xl font-extrabold text-white mb-3">{{ $service->title }}</h3>
                <div class="text-on-surface-variant text-sm leading-relaxed">{!! $service->description !!}</div>
            </div>
        @empty
            @php
                $steps = [
                    ['n' => 1, 'title' => 'Discovery & Scoping',     'desc' => 'We audit your data assets, map existing infrastructure, and define measurable success criteria with your technical and business leads before a line of code is written.'],
                    ['n' => 2, 'title' => 'Prototype & Validate',    'desc' => 'A time-boxed sprint produces a working proof-of-concept against a representative data slice. We surface blockers and validate assumptions before they compound.'],
                    ['n' => 3, 'title' => 'Production Engineering',  'desc' => 'Full-stack build-out with automated testing, CI/CD pipelines, and observability. We deliver architecture decision records and runbooks alongside every system.'],
                    ['n' => 4, 'title' => 'Operate & Optimise',      'desc' => 'Post-launch, we monitor model performance, alert on data drift, and run quarterly optimisation cycles — so the system improves as your business evolves.'],
                ];
            @endphp
            @foreach($steps as $i => $step)
                <div class="relative group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="w-20 h-20 rounded-full bg-[#0e0816] border border-white/10 flex items-center justify-center mb-8 relative z-10 group-hover:border-secondary/50 group-hover:scale-105 transition-all">
                        <span class="text-secondary font-display font-extrabold text-xl">0{{ $step['n'] }}</span>
                    </div>
                    <h3 class="font-display text-xl font-extrabold text-white mb-3">{{ $step['title'] }}</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        @endforelse
    </div>
</section>


<!-- ══════════════════════════════════════════════
     ENGAGEMENT MODELS
══════════════════════════════════════════════ -->
<section class="py-24 md:py-32 bg-[#08050c] border-t border-white/5">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full mb-6">
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Engagement Models</span>
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-4">How engagements are structured</h2>
            <p class="text-on-surface-variant max-w-xl mx-auto text-base leading-relaxed">
                Three commercial models depending on your team's maturity, timeline, and the scope of work.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $engagements = [
                    ['icon' => 'rocket_launch',          'title' => 'Accelerator Sprint',     'duration' => '6–10 weeks',       'highlight' => false,
                     'ideal'    => 'Teams with a defined problem and clean data who need to validate an AI approach quickly.',
                     'includes' => ['Problem framing & data audit', 'Baseline model + working prototype', 'Architecture decision record', 'Handover documentation for internal team']],

                    ['icon' => 'precision_manufacturing', 'title' => 'Full-Build Programme',  'duration' => '3–9 months',       'highlight' => true,
                     'ideal'    => 'Organisations building a net-new AI capability that needs to reach production.',
                     'includes' => ['End-to-end ML platform build', 'Model development, testing & validation', 'Production deployment with CI/CD', '90-day post-launch support included']],

                    ['icon' => 'support_agent',           'title' => 'Embedded Partnership',  'duration' => 'Ongoing retainer', 'highlight' => false,
                     'ideal'    => 'Scaling teams that need senior AI engineers working inside existing product squads.',
                     'includes' => ['Dedicated engineers in your sprints', 'Continuous model monitoring & tuning', 'On-demand architecture reviews', 'Quarterly roadmap alignment sessions']],
                ];
            @endphp
            @foreach($engagements as $i => $e)
                <div class="glass-card rounded-3xl p-8 flex flex-col justify-between relative {{ $e['highlight'] ? 'border-secondary/40' : '' }}"
                     data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    @if($e['highlight'])
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 bg-secondary text-white font-mono text-[9px] uppercase tracking-widest rounded-full whitespace-nowrap">
                            Most Popular
                        </div>
                    @endif
                    <div>
                        <div class="w-12 h-12 rounded-xl {{ $e['highlight'] ? 'bg-secondary/20 border-secondary/40 text-secondary' : 'bg-white/5 border-white/10 text-on-surface-variant' }} border flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-2xl">{{ $e['icon'] }}</span>
                        </div>
                        <h3 class="font-display text-xl font-extrabold text-white mb-1">{{ $e['title'] }}</h3>
                        <div class="font-mono text-[10px] text-secondary uppercase tracking-widest mb-4">{{ $e['duration'] }}</div>
                        <p class="text-on-surface-variant text-sm leading-relaxed mb-6">{{ $e['ideal'] }}</p>
                        <ul class="space-y-3">
                            @foreach($e['includes'] as $item)
                                <li class="flex items-start gap-3 text-sm text-on-surface">
                                    <span class="material-symbols-outlined text-secondary text-base mt-0.5 shrink-0">check_circle</span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-8 pt-6 border-t border-white/5">
                        <a href="/contact"
                           class="{{ $e['highlight'] ? 'btn-gradient shadow-lg shadow-secondary/20' : 'glass-card hover:bg-white/10' }} text-white font-bold px-6 py-3 rounded-xl text-sm inline-flex items-center gap-2 w-full justify-center transition-colors">
                            Discuss This Model
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════
     WHY AI-SOLUTIONS
══════════════════════════════════════════════ -->
<section class="py-24 md:py-32 max-w-container-max mx-auto px-gutter">
    <div class="grid md:grid-cols-2 gap-20 items-center">
        <div data-aos="fade-right">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full mb-8">
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Why AI-Solutions</span>
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-10 leading-tight">
                What separates an AI project<br/>from an <span class="text-gradient-coral">AI product.</span>
            </h2>

            <div class="space-y-8">
                @php
                    $reasons = [
                        ['icon' => 'schema',      'color' => 'text-secondary', 'title' => 'Systems thinking, not model-first',
                         'desc' => 'Most AI failures are integration failures. We design data contracts, APIs, and fallback logic before touching a model architecture.'],
                        ['icon' => 'monitoring',  'color' => 'text-accent',    'title' => 'Observability built in from day one',
                         'desc' => 'Every deployment ships with structured logging, latency dashboards, and automated drift alerts. You always know how your models are performing.'],
                        ['icon' => 'groups',      'color' => 'text-secondary', 'title' => 'Embedded, not outsourced',
                         'desc' => 'Our engineers work inside your sprint cadence, attend standups, and write code in your repositories. Knowledge stays with your team after we leave.'],
                        ['icon' => 'policy',      'color' => 'text-accent',    'title' => 'Responsible AI by default',
                         'desc' => 'Bias audits, explainability reports, and EU AI Act readiness reviews are standard — not upsells. We help regulated industries operate AI defensibly.'],
                    ];
                @endphp
                @foreach($reasons as $r)
                    <div class="flex gap-6 group">
                        <div class="w-12 h-12 shrink-0 bg-white/5 rounded-xl border border-white/10 flex items-center justify-center group-hover:border-secondary/30 transition-colors">
                            <span class="material-symbols-outlined {{ $r['color'] }}">{{ $r['icon'] }}</span>
                        </div>
                        <div>
                            <h4 class="font-display font-bold text-lg text-white mb-1">{{ $r['title'] }}</h4>
                            <p class="text-on-surface-variant text-sm leading-relaxed">{{ $r['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Stats grid -->
        <div class="grid grid-cols-2 gap-5" data-aos="fade-left" data-aos-delay="150">
            @php
                $stats = [
                    ['value' => '+31%',  'label' => 'Median operating margin improvement at 12 months post-launch',   'icon' => 'trending_up',   'color' => 'secondary'],
                    ['value' => '6 wks', 'label' => 'Average time to compliance-ready AI governance framework',        'icon' => 'policy',        'color' => 'accent'],
                    ['value' => '92%',   'label' => 'Of clients report production deployment within agreed timeline',   'icon' => 'task_alt',      'color' => 'secondary'],
                    ['value' => '4×',    'label' => 'Faster model time-to-production vs. in-house team benchmarks',    'icon' => 'speed',         'color' => 'accent'],
                ];
            @endphp
            @foreach($stats as $i => $s)
                <div class="glass-card rounded-2xl p-7 flex flex-col gap-4 {{ $i === 1 ? 'translate-y-6' : ($i === 3 ? 'translate-y-6' : '') }} hover:border-{{ $s['color'] }}/40 transition-all group">
                    <span class="material-symbols-outlined text-{{ $s['color'] }} text-2xl">{{ $s['icon'] }}</span>
                    <div class="font-display text-3xl font-extrabold text-white">{{ $s['value'] }}</div>
                    <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wide leading-relaxed">{{ $s['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════
     CTA
══════════════════════════════════════════════ -->
<section class="py-24 md:py-32 relative bg-[#05020c]/60 border-t border-white/5">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="glass-card rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden" data-aos="zoom-in">
            <div class="absolute top-0 right-0 w-80 h-80 bg-glow-secondary opacity-25 -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-glow-main opacity-20 translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

            <div class="relative z-10 max-w-2xl mx-auto space-y-6">
                <span class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full font-mono text-xs text-on-surface uppercase tracking-widest">
                    Get Started
                </span>
                <h2 class="font-display text-4xl md:text-6xl font-extrabold text-white leading-tight">
                    Ready to move from<br/>pilot to production?
                </h2>
                <p class="font-body text-base md:text-lg text-on-surface-variant leading-relaxed">
                    Most AI initiatives stall between prototype and deployment. We specialise in closing that gap. Talk to a solutions architect about your specific challenge — no pitch deck, just a technical conversation.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="/contact" class="btn-gradient text-white font-bold px-10 py-4 rounded-xl text-base shadow-xl shadow-secondary/20 inline-flex items-center gap-2">
                        Book a Free Architecture Review
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </a>
                    <a href="/projects" class="glass-card text-white font-semibold px-10 py-4 rounded-xl text-base hover:bg-white/10 transition-colors inline-flex items-center gap-2">
                        See Client Deployments
                        <span class="material-symbols-outlined text-base">arrow_outward</span>
                    </a>
                </div>
                <p class="font-mono text-xs text-on-surface-variant/60 pt-2">45-minute session with a senior engineer. No commitment required.</p>
            </div>
        </div>
    </div>
</section>

@endsection