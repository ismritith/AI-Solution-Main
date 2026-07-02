@extends('Front.layouts.app')

@section('title', 'AI-Solutions | Next-Gen Enterprise Intelligence Platform')

@section('content')
<!-- Glowing background blur blobs (Raycast style) -->
<div class="bg-glow-main top-[10%] left-[5%] opacity-60"></div>
<div class="bg-glow-secondary top-[40%] right-[5%] opacity-40"></div>
<div class="bg-glow-main top-[75%] left-[20%] opacity-50"></div>

<!-- Hero Section -->
<section class="relative pt-24 pb-20 md:py-36 overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Hero Text -->
        <div class="space-y-8" data-aos="fade-right">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Next-Gen Intelligence</span>
            </div>
            
            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
                Leveraging AI for <br/>
                <span class="text-gradient-coral">Business Growth</span>
            </h1>
            
            <p class="font-body text-base md:text-lg text-on-surface-variant max-w-xl leading-relaxed">
                Automate complex workflows, gain deep predictive insights, and deploy autonomous AI agents that work around the clock to scale your operations.
            </p>
            
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="/contact" class="btn-gradient text-white font-bold px-8 py-4 rounded-xl font-body text-base shadow-lg shadow-secondary/20">
                    Launch Deployment
                </a>
                <a href="/about#solutions" class="glass-card text-white font-semibold px-8 py-4 rounded-xl font-body text-base hover:bg-white/10">
                    Explore Capabilities
                </a>
            </div>
        </div>

        <!-- Hero Visuals -->
        <div class="relative" data-aos="zoom-in" data-aos-delay="200">
            <!-- Main visual card with elegant rotation -->
            <div class="glass-card rounded-3xl p-4 transform lg:rotate-3 shadow-2xl relative z-10">
                <img alt="AI Neural Mesh Structure" class="rounded-2xl w-full aspect-video object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxR3DZ3pvj7Viuv0dRg5asdZ0QF0B2WFC_0Ii9djLCwNs60Pq9u11FB4SNZGzCmU2c-_8zLyrDQ_tPxAJ_MlUPvAqwJ2Z-eQASjSwKrXyhlpT9h1FVG3FOx1GZfnaXdp-gk2-1pEiXHMUm8qeDnoWGHbaQNszPJZtUrQ2p3F2c30LcVj_72aLNK5pKDzeQsCY0hZFBSiEyZiCAnKBk_-w9L6iiYIi_rEXOPo9cb8DaZEt2PC25Lfmg4qQch7T2sJLSHL4C3PNM1u9e"/>
            </div>

            <!-- Stats Popups -->
            <div class="absolute -bottom-6 -left-6 glass-card p-6 rounded-2xl hidden md:block max-w-[200px] z-20" data-aos="fade-up" data-aos-delay="400">
                <div class="text-accent font-mono text-xs mb-2">Efficiency Gain</div>
                <div class="font-display text-4xl font-extrabold text-white">+84%</div>
            </div>

            <div class="absolute -top-6 -right-6 glass-card p-5 rounded-2xl hidden md:block max-w-[200px] z-20" data-aos="fade-down" data-aos-delay="500">
                <div class="text-secondary font-mono text-xs mb-2">Active Pipelines</div>
                <div class="font-display text-3xl font-extrabold text-white">4,200+</div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Teaser Section -->
<section class="py-20 md:py-28 relative overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid md:grid-cols-2 gap-20 items-center">
            <!-- Left Info column -->
            <div class="space-y-6" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                    <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Who We Are</span>
                </div>
                <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white leading-tight">
                    Architecting the Future of Automation
                </h2>
                <p class="font-body text-base text-on-surface-variant leading-relaxed">
                    At AI-Solutions, we don't just build tools; we build ecosystems. Our platform integrates seamlessly into your existing infrastructure, turning raw data into strategic assets.
                </p>
                
                <ul class="space-y-4 pt-4">
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary font-bold">check_circle</span>
                        <span class="font-body text-on-surface text-base">Enterprise-grade security and SOC2 compliance</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary font-bold">check_circle</span>
                        <span class="font-body text-on-surface text-base">Sub-millisecond latency decision engines</span>
                    </li>
                </ul>

                <div class="pt-6">
                    <a href="/about" class="text-secondary font-body font-bold hover:text-accent transition-colors flex items-center gap-2">
                        Learn about our architecture <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- Right Visual Stats Grid -->
            <div class="grid grid-cols-2 gap-6" data-aos="fade-left" data-aos-delay="200">
                <div class="glass-card aspect-square rounded-3xl flex flex-col items-center justify-center p-8 text-center space-y-4 hover:border-secondary/50">
                    <span class="material-symbols-outlined text-4xl text-secondary">diversity_3</span>
                    <div class="font-display text-3xl md:text-4xl font-extrabold text-white">500+</div>
                    <div class="font-mono text-xs text-on-surface-variant uppercase tracking-widest">Partners</div>
                </div>
                <div class="glass-card aspect-square rounded-3xl flex flex-col items-center justify-center p-8 text-center space-y-4 translate-y-8 hover:border-accent/50">
                    <span class="material-symbols-outlined text-4xl text-accent">memory</span>
                    <div class="font-display text-3xl md:text-4xl font-extrabold text-white">1.2B</div>
                    <div class="font-mono text-xs text-on-surface-variant uppercase tracking-widest font-medium">Requests/Day</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bento Grid Capabilities / Services Section -->
<section class="py-20 md:py-28 relative">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-16 space-y-4" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Platform Core</span>
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white">Our Core Capabilities</h2>
            <p class="font-body text-base text-on-surface-variant max-w-2xl mx-auto">
                Scalable, high-impact modules engineered to solve complex operational challenges.
            </p>
        </div>

        <!-- Bento Layout -->
        <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
            @forelse($services as $index => $service)
                @if($index == 2)
                    <!-- Special large box for 3rd service -->
                    <a href="/services" class="md:col-span-6 glass-card rounded-3xl p-8 flex flex-col md:flex-row items-center gap-10 group hover:no-underline" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex-1 space-y-6">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-secondary to-accent flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg shadow-secondary/20 text-white">
                                <span class="material-symbols-outlined text-white text-3xl">{{ $service->icon ?? 'neurology' }}</span>
                            </div>
                            <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white">{{ $service->title }}</h3>
                            <p class="font-body text-sm text-on-surface-variant leading-relaxed">
                                {!! strip_tags($service->description) !!}
                            </p>
                            @if($service->tags)
                                <div class="flex flex-wrap gap-2">
                                    @foreach(explode(',', $service->tags) as $tag)
                                        <span class="px-2.5 py-0.5 rounded bg-white/5 border border-white/10 text-[10px] text-on-surface-variant font-mono uppercase tracking-wider">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div>
                                <span class="inline-flex items-center gap-2 text-secondary font-body text-sm font-semibold group-hover:text-white transition-colors">
                                    Explore all services <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                </span>
                            </div>
                        </div>
                        <div class="w-full md:w-2/5 bg-[#05020c] rounded-2xl p-6 border border-white/5 font-mono text-xs space-y-2 text-on-surface-variant relative overflow-hidden">
                            <div class="flex gap-1.5 pb-4 border-b border-white/5">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-500/80"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-green-500/80"></span>
                            </div>
                            <p class="text-secondary"><span class="text-white">// Telemetry Active</span></p>
                            <p><span class="text-accent">metric:</span> <span class="text-yellow-400">"{{ $service->metric_subtitle ?? 'Verified' }}"</span></p>
                            <p class="text-green-400"><span class="text-on-surface-variant">>></span> NODE INTEGRITY: OPTIMAL</p>
                        </div>
                    </a>
                @else
                    <a href="/services" class="md:col-span-3 glass-card rounded-3xl p-8 flex flex-col justify-between group hover:no-underline" data-aos="fade-up" data-aos-delay="100">
                        <div class="space-y-6">
                            <div class="w-14 h-14 rounded-2xl {{ $index == 1 ? 'bg-accent/10 text-accent' : 'bg-secondary/10 text-secondary' }} flex items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-3xl">{{ $service->icon ?? 'insights' }}</span>
                            </div>
                            <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white">{{ $service->title }}</h3>
                            <p class="font-body text-sm text-on-surface-variant leading-relaxed">
                                {!! strip_tags($service->description) !!}
                            </p>
                            @if($service->tags)
                                <div class="flex flex-wrap gap-2">
                                    @foreach(explode(',', $service->tags) as $tag)
                                        <span class="px-2 py-0.5 rounded bg-white/5 border border-white/10 text-[10px] text-on-surface-variant font-mono uppercase">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="mt-8">
                            <span class="flex items-center gap-2 text-secondary font-body text-sm font-semibold group-hover:text-white transition-colors">
                                Explore <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </span>
                        </div>
                    </a>
                @endif
            @empty
                <!-- Fallback defaults if empty database -->
                <a href="/services" class="md:col-span-3 glass-card rounded-3xl p-8 flex flex-col justify-between group hover:no-underline">
                    <div class="space-y-6">
                        <div class="w-14 h-14 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined text-3xl">insights</span>
                        </div>
                        <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white">Advanced Analytics</h3>
                        <p class="font-body text-sm text-on-surface-variant leading-relaxed">
                            Transform complex enterprise datasets into actionable strategies using customized mathematical predictive neural models.
                        </p>
                    </div>
                    <div class="mt-8">
                        <span class="flex items-center gap-2 text-secondary font-body text-sm font-semibold group-hover:text-white transition-colors">Learn more</span>
                    </div>
                </a>
            @endforelse
        </div>
    </div>
</section>

<!-- Latest Projects Section -->
<section class="py-20 md:py-28 relative overflow-hidden bg-[#05020c]/40 border-t border-white/5">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-16 gap-6">
            <div class="space-y-4" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                    <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Case Studies</span>
                </div>
                <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white">Latest Deployments</h2>
                <p class="font-body text-base text-on-surface-variant">Explore our recently finalized neural networks and automated client ecosystems.</p>
            </div>
            <div data-aos="fade-left">
                <a href="/projects" class="btn-gradient text-white text-sm font-bold px-6 py-3 rounded-xl inline-flex items-center gap-2 shadow-lg shadow-secondary/15">
                    Browse All Projects <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <a href="/projects1?id={{ $project->id }}" class="glass-card rounded-3xl p-6 flex flex-col group h-full relative z-10 hover:border-primary/30 transition-all duration-300 hover:no-underline" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($project->cover_image)
                        <div class="rounded-2xl overflow-hidden mb-6 h-48 border border-white/10 relative">
                            <img alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ asset($project->cover_image) }}"/>
                            <div class="absolute top-4 left-4">
                                <span class="bg-[#1a0b26]/80 backdrop-blur-md px-3 py-1.5 rounded-full font-label-mono text-[9px] text-tertiary border border-tertiary/20 uppercase font-bold">{{ $project->sector }}</span>
                            </div>
                        </div>
                    @else
                        <div class="rounded-2xl overflow-hidden mb-6 h-48 border border-white/10 bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center text-white relative">
                            <span class="material-symbols-outlined text-5xl opacity-20">folder_special</span>
                            <div class="absolute top-4 left-4">
                                <span class="bg-[#1a0b26]/80 backdrop-blur-md px-3 py-1.5 rounded-full font-label-mono text-[9px] text-tertiary border border-tertiary/20 uppercase font-bold">{{ $project->sector }}</span>
                            </div>
                        </div>
                    @endif
                    <div class="flex-grow space-y-4">
                        <h3 class="font-display text-xl font-bold text-white group-hover:text-secondary transition-colors">
                            {{ $project->title }}
                        </h3>
                        <div class="text-on-surface-variant/80 text-xs leading-relaxed line-clamp-3">
                            {!! strip_tags($project->description) !!}
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-white/5 flex justify-between items-center">
                        <div class="text-primary font-bold text-xs tracking-wide">{{ $project->footer_stat }}</div>
                        <span class="text-on-surface-variant hover:text-white transition-colors flex items-center gap-1.5 group/btn font-semibold text-xs">
                            View Specs <span class="material-symbols-outlined text-[16px] group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-on-surface-variant italic py-10">
                    No projects deployed.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="py-20 md:py-28 relative overflow-hidden bg-[#080313] border-t border-white/5">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-16 gap-6">
            <div class="space-y-4" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                    <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Gatherings</span>
                </div>
                <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white">Upcoming Summits & Events</h2>
                <p class="font-body text-base text-on-surface-variant">Register to lock in your delegate pass for workshops, summits, and panels.</p>
            </div>
            <div data-aos="fade-left">
                <a href="/events" class="btn-gradient text-white text-sm font-bold px-6 py-3 rounded-xl inline-flex items-center gap-2 shadow-lg shadow-secondary/15">
                    Browse All Events <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($events as $event)
                <a href="/event1?id={{ $event->id }}" class="glass-card rounded-3xl p-6 flex flex-col justify-between group border-accent/20 hover:border-accent/50 transition-all duration-300 hover:no-underline" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-1.5 text-accent font-mono text-[10px] font-bold">
                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                {{ strtoupper($event->status_badge) }}
                            </div>
                            <span class="px-2 py-0.5 bg-accent/20 text-accent font-mono text-[9px] uppercase rounded-full font-bold">{{ $event->ticket_price }}</span>
                        </div>
                        
                        <h3 class="font-display text-xl font-bold text-white group-hover:text-secondary transition-colors">
                            {{ $event->title }}
                        </h3>
                        
                        <p class="font-body text-xs text-on-surface-variant leading-relaxed line-clamp-3">
                            {!! strip_tags($event->description) !!}
                        </p>
                        
                        <div class="p-3 bg-white/5 rounded-xl border border-white/5 space-y-1 font-mono text-[10px]">
                            <div class="flex justify-between">
                                <span class="text-on-surface-variant">DATE:</span>
                                <span class="text-white">{{ $event->date_text }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-on-surface-variant">LOCATION:</span>
                                <span class="text-white">{{ $event->location }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-white/5 flex justify-between items-center">
                        <span class="font-mono text-[10px] text-on-surface-variant">Cap: {{ $event->capacity }}</span>
                        <span class="btn-gradient text-white px-4 py-2 rounded-xl text-[10px] font-bold shadow-md shadow-secondary/10 flex items-center gap-1">
                            Register Node <span class="material-symbols-outlined text-xs">arrow_forward</span>
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-on-surface-variant italic py-10">
                    No summits scheduled.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Latest Insights Section -->
<section class="py-20 md:py-28 relative overflow-hidden bg-[#05020c]/60 border-t border-b border-white/5">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-16 gap-6">
            <div class="space-y-4" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                    <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Intelligence Hub</span>
                </div>
                <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white">Insights & Discoveries</h2>
                <p class="font-body text-base text-on-surface-variant">The latest in deep neural modeling, algorithmic findings, and platform expansions.</p>
            </div>
            <div data-aos="fade-left">
                <a href="/insights" class="btn-gradient text-white text-sm font-bold px-6 py-3 rounded-xl inline-flex items-center gap-2 shadow-lg shadow-secondary/15">
                    Browse All Insights <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <a href="/insights1?id={{ $post->id }}" class="glass-card rounded-3xl overflow-hidden group flex flex-col justify-between hover:border-secondary/50 transition-all duration-300 hover:no-underline" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div>
                        @if($post->banner_image)
                            <div class="aspect-video overflow-hidden relative border-b border-white/5">
                                <img alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 grayscale group-hover:grayscale-0" src="{{ asset($post->banner_image) }}"/>
                            </div>
                        @else
                            <div class="aspect-video overflow-hidden relative bg-[#131b2e] flex items-center justify-center border-b border-white/5">
                                <span class="material-symbols-outlined text-4xl text-on-surface-variant">article</span>
                            </div>
                        @endif
                        <div class="p-6 space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="px-2 py-0.5 bg-secondary/20 text-secondary font-mono text-[9px] uppercase rounded-full font-bold">{{ $post->category }}</span>
                                <span class="text-on-surface-variant font-mono text-[9px]">{{ $post->reading_time }} MIN READ</span>
                            </div>
                            <h4 class="font-display text-lg font-bold text-white group-hover:text-secondary transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h4>
                            <p class="font-body text-xs text-on-surface-variant line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-2">
                        <span class="flex items-center gap-1.5 text-secondary font-body text-xs font-bold group-hover:text-white transition-colors">
                            Read Insights <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-on-surface-variant italic py-10">
                    No insights posted yet.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Premium Testimonials Carousel Grid -->
<section class="py-20 md:py-28 relative overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter">
        <h2 class="font-display text-4xl md:text-5xl font-extrabold text-center text-white mb-16" data-aos="fade-up">
            Trusted by Innovators
        </h2>
        
        <!-- Horizontally scrollable slider (premium responsive layout) -->
        <div class="flex flex-nowrap gap-8 overflow-x-auto pb-10 snap-x no-scrollbar" data-aos="fade-up" data-aos-delay="200">
            @forelse($combinedTestimonials as $item)
                <div class="min-w-[300px] md:min-w-[450px] glass-card p-8 md:p-10 rounded-3xl snap-center relative flex flex-col justify-between">
                    <span class="material-symbols-outlined text-secondary/15 text-8xl absolute top-6 right-6 font-bold select-none pointer-events-none">format_quote</span>
                    
                    <div>
                        @if(isset($item->project))
                            <div class="mb-4">
                                <span class="px-2.5 py-1 text-[9px] font-mono uppercase rounded bg-primary/10 text-primary border border-primary/20">
                                    Deployment: {{ $item->project->title }}
                                </span>
                            </div>
                        @endif
                        <p class="font-body text-on-surface-variant italic text-sm md:text-base leading-relaxed mb-8 relative z-10">
                            "{!! strip_tags($item->quote_text) !!}"
                        </p>
                    </div>

                    <div class="flex items-center gap-4 relative z-10">
                        <div class="w-14 h-14 rounded-full bg-secondary/20 overflow-hidden border border-white/10 shrink-0 flex items-center justify-center">
                            @if(isset($item->client_avatar) && $item->client_avatar)
                                <img alt="{{ $item->client_name }}" class="w-full h-full object-cover" src="{{ asset($item->client_avatar) }}"/>
                            @else
                                <span class="material-symbols-outlined text-secondary text-2xl">account_circle</span>
                            @endif
                        </div>
                        <div>
                            <div class="font-display text-base font-bold text-white flex items-center gap-1.5">
                                {{ $item->client_name }}
                                @if($item->is_verified || isset($item->project))
                                    <span class="material-symbols-outlined text-emerald-400 text-xs font-bold" title="Verified Customer">check_circle</span>
                                @endif
                            </div>
                            <div class="font-mono text-xs text-on-surface-variant">{{ $item->client_role }}</div>
                            <div class="text-[10px] text-amber-400 mt-1 font-label-mono">{{ str_repeat('★', $item->rating) }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="min-w-[300px] md:min-w-[450px] glass-card p-8 md:p-10 rounded-3xl">
                    <p class="text-sm text-on-surface-variant">Testimonials will be synced shortly.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action Newsletter section -->
<section class="py-20 md:py-28 relative">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="glass-card rounded-[40px] p-10 md:p-24 text-center relative overflow-hidden" data-aos="zoom-in">
            <div class="absolute top-0 right-0 w-96 h-96 bg-glow-secondary opacity-30 -translate-y-1/2 translate-x-1/2"></div>
            
            <div class="relative z-10 max-w-2xl mx-auto space-y-8">
                <h2 class="font-display text-4xl md:text-6xl font-extrabold text-white leading-tight">
                    Ready to Evolve?
                </h2>
                <p class="font-body text-base md:text-lg text-on-surface-variant leading-relaxed">
                    Join 2,000+ industry pioneers receiving our weekly briefs on enterprise intelligence.
                </p>
                
                <form action="#" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto pt-2">
                    <input class="flex-1 bg-[#05020c] border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-secondary transition-colors placeholder-on-surface-variant/40" placeholder="Enter business email" type="email" required/>
                    <button class="btn-gradient text-white font-bold px-8 py-4 rounded-xl whitespace-nowrap shadow-lg shadow-secondary/15" type="submit">
                        Subscribe Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
