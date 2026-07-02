@extends('Front.layouts.app')

@section('title', 'Our Projects | AI-Solutions')

@section('content')
{{-- Glowing background blur blobs --}}
<div class="bg-glow-main top-[10%] left-[5%] opacity-55"></div>
<div class="bg-glow-secondary top-[60%] right-[5%] opacity-45"></div>
<div class="bg-glow-main bottom-[10%] left-[40%] opacity-25"></div>

{{-- ─────────────────────────────────────────────────────────
     BANNER SECTION
────────────────────────────────────────────────────────── --}}
<section class="relative min-h-[50vh] flex items-center overflow-hidden py-20">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/60 to-transparent z-10"></div>
        <img
            class="w-full h-full object-cover opacity-30"
            src="https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=1600&q=80"
            alt="AI Solutions Projects"
        />
    </div>

    <div class="max-w-container-max mx-auto px-gutter relative z-20 w-full" data-aos="fade-up">
        <div class="max-w-3xl space-y-6">
            <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] mb-4 block font-bold">
                Deployed Intelligence
            </span>
            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
                Solutions built for the <span class="text-gradient-purple">real world.</span>
            </h1>
            <p class="font-body text-base md:text-lg text-on-surface-variant max-w-xl leading-relaxed">
                From autonomous supply chains to predictive diagnostics — explore the AI systems we've architected for industry leaders across the globe.
            </p>

            {{-- Stats bar --}}
            <div class="flex flex-wrap gap-8 pt-4">
                @foreach([
                    ['value' => '40+',  'label' => 'Projects Delivered'],
                    ['value' => '18',   'label' => 'Industries Served'],
                    ['value' => '99.4%','label' => 'Uptime SLA'],
                    ['value' => '$2.1B','label' => 'Client Value Generated'],
                ] as $stat)
                <div>
                    <p class="font-display text-3xl font-extrabold text-white">{{ $stat['value'] }}</p>
                    <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest mt-1">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ─────────────────────────────────────────────────────────
     PROJECT SHOWCASE — PAST / PRESENT / UPCOMING TABS
────────────────────────────────────────────────────────── --}}
@php
// Map the passed collections to the expected names for the view logic
$pastProjects = $legacyProjects ?? collect();
// $presentProjects is already passed as a variable
$upcomingProjects = $horizonProjects ?? collect();

$tabs = [
    ['id' => 'present',  'label' => 'Active Projects',  'icon' => 'radio_button_checked', 'count' => count($presentProjects),  'accent' => 'secondary'],
    ['id' => 'past',     'label' => 'Past Projects',    'icon' => 'history',          'count' => count($pastProjects),     'accent' => 'accent'],
    ['id' => 'upcoming', 'label' => 'Upcoming',         'icon' => 'rocket_launch',    'count' => count($upcomingProjects), 'accent' => 'accent'],
];

$statusStyles = [
    'Completed'       => ['bg' => 'bg-white/10',         'border' => 'border-white/20',        'text' => 'text-on-surface-variant'],
    'Live'            => ['bg' => 'bg-secondary/20',     'border' => 'border-secondary/30',    'text' => 'text-secondary'],
    'In Development'  => ['bg' => 'bg-accent/20',        'border' => 'border-accent/30',       'text' => 'text-accent'],
    'Research Phase'  => ['bg' => 'bg-white/5',          'border' => 'border-white/10',        'text' => 'text-on-surface-variant'],
];
$defaultStyle = ['bg' => 'bg-white/10', 'border' => 'border-white/20', 'text' => 'text-on-surface-variant'];
@endphp

<section class="max-w-container-max mx-auto px-gutter pt-14 pb-4 relative" data-aos="fade-up">

    {{-- Section header --}}
    <div class="mb-10">
        <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] font-bold">Project Showcase</span>
        <h2 class="font-display text-3xl md:text-4xl font-extrabold text-white mt-3 leading-tight">
            Intelligence across <span class="text-gradient-purple">every stage</span>
        </h2>
    </div>

    {{-- Tab bar --}}
    <div class="flex flex-wrap gap-3 mb-10" role="tablist">
        @foreach($tabs as $tab)
        <button
            role="tab"
            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
            aria-controls="panel-{{ $tab['id'] }}"
            id="tab-{{ $tab['id'] }}"
            class="showcase-tab flex items-center gap-2 px-5 py-3 rounded-2xl border font-mono text-xs uppercase tracking-wider transition-all
                   {{ $loop->first
                       ? 'bg-secondary/20 border-secondary text-white'
                       : 'bg-white/5 border-white/10 text-on-surface-variant hover:border-secondary/40 hover:text-white' }}"
            data-tab="{{ $tab['id'] }}"
        >
            <span class="material-symbols-outlined text-sm" aria-hidden="true">{{ $tab['icon'] }}</span>
            <span>{{ $tab['label'] }}</span>
            <span class="ml-1 bg-white/10 text-on-surface-variant px-2 py-0.5 rounded-full text-[9px] font-bold">{{ $tab['count'] }}</span>
        </button>
        @endforeach
    </div>

    {{-- ── PAST PROJECTS PANEL ── --}}
    <div id="panel-past" role="tabpanel" aria-labelledby="tab-past" class="showcase-panel hidden">

        {{-- Featured past (horizontal hero card) --}}
        @php $feat = $pastProjects->first(); @endphp
        @if($feat)
        <a href="{{ route('projects.detail', ['id' => $feat->id]) }}" class="glass-card rounded-3xl overflow-hidden mb-8 block hover:no-underline">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative min-h-[280px] lg:min-h-[380px] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-primary/70 z-10 hidden lg:block"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10 lg:hidden"></div>
                    <img class="w-full h-full object-cover" src="{{ asset($feat->cover_image) }}" alt="{{ $feat->title }}" />
                    <div class="absolute top-5 left-5 z-20 flex items-center gap-2">
                        <span class="bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1 rounded-full font-mono text-[9px] font-bold text-on-surface-variant uppercase tracking-widest">Completed</span>
                        <span class="bg-secondary/20 backdrop-blur-md border border-secondary/30 px-3 py-1 rounded-full font-mono text-[9px] font-bold text-secondary uppercase tracking-widest">Featured</span>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex flex-col justify-center space-y-5">
                    <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest">{{ $feat->sector }} · {{ $feat->estimated_date }}</p>
                    <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white leading-tight">{{ $feat->title }}</h3>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">{!! Str::limit(strip_tags($feat->description), 150) !!}</p>
                    <div class="grid grid-cols-3 gap-3">
                        @if($feat->metric1_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric1_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric1_lbl }}</p>
                        </div>
                        @endif
                        @if($feat->metric2_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric2_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric2_lbl }}</p>
                        </div>
                        @endif
                        @if($feat->metric3_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric3_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric3_lbl }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if($feat->tech_stack)
                        @foreach(explode(',', $feat->tech_stack) as $t)
                        <span class="font-mono text-[9px] bg-white/5 border border-white/10 text-on-surface-variant px-2 py-1 rounded-lg uppercase tracking-wider">{{ trim($t) }}</span>
                        @endforeach
                        @endif
                    </div>
                    <span class="inline-flex items-center gap-2 font-mono text-[10px] text-secondary uppercase tracking-widest group-hover:gap-3 transition-all">
                        <span>View Case Study</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </div>
        </a>
        @endif

        {{-- Non-featured past grid --}}
        @if($pastProjects->isEmpty() && !$feat)
            <div class="glass-card p-10 text-center text-on-surface-variant italic rounded-3xl">No projects found.</div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($pastProjects as $project)
            @if($project->id !== ($feat->id ?? null))
            @php $ss = $statusStyles[$project->status_badge] ?? $defaultStyle; @endphp
            <a href="{{ route('projects.detail', ['id' => $project->id]) }}" class="glass-card rounded-3xl overflow-hidden flex flex-col group hover:no-underline">
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10"></div>
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" />
                    <div class="absolute top-4 left-4 z-20 flex items-center gap-2 flex-wrap">
                        <span class="{{ $ss['bg'] }} backdrop-blur-md border {{ $ss['border'] }} px-3 py-1 rounded-full font-mono text-[9px] font-bold {{ $ss['text'] }} uppercase tracking-widest">{{ $project->status_badge }}</span>
                        <span class="bg-white/5 backdrop-blur-md border border-white/10 px-3 py-1 rounded-full font-mono text-[9px] text-on-surface-variant uppercase tracking-widest">{{ $project->sector }}</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 space-y-4">
                    <p class="font-mono text-[9px] text-on-surface-variant uppercase tracking-widest">{{ $project->sector }} · {{ $project->estimated_date }}</p>
                    <h3 class="font-display text-base font-extrabold text-white leading-snug">{{ $project->title }}</h3>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed flex-1">{!! Str::limit(strip_tags($project->description), 120) !!}</p>
                    <div class="grid grid-cols-3 gap-2">
                        @if($project->metric1_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric1_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric1_lbl }}</p>
                        </div>
                        @endif
                        @if($project->metric2_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric2_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric2_lbl }}</p>
                        </div>
                        @endif
                        @if($project->metric3_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric3_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric3_lbl }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if($project->tech_stack)
                        @foreach(explode(',', $project->tech_stack) as $t)
                        <span class="font-mono text-[9px] bg-white/5 border border-white/10 text-on-surface-variant px-2 py-1 rounded-lg uppercase tracking-wider">{{ trim($t) }}</span>
                        @endforeach
                        @endif
                    </div>
                    <span class="inline-flex items-center gap-2 font-mono text-[10px] text-secondary uppercase tracking-widest group-hover:gap-3 transition-all pt-1">
                        <span>Case Study</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </a>
            @endif
            @endforeach
        </div>
        @endif
    </div>

    {{-- ── PRESENT / ACTIVE PANEL ── --}}
    <div id="panel-present" role="tabpanel" aria-labelledby="tab-present" class="showcase-panel">

        @php $feat = $presentProjects->first(); @endphp
        @if($feat)
        <a href="{{ route('projects.detail', ['id' => $feat->id]) }}" class="glass-card rounded-3xl overflow-hidden mb-8 border border-secondary/20 block hover:no-underline">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative min-h-[280px] lg:min-h-[380px] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-primary/70 z-10 hidden lg:block"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10 lg:hidden"></div>
                    <img class="w-full h-full object-cover" src="{{ asset($feat->cover_image) }}" alt="{{ $feat->title }}" />
                    <div class="absolute top-5 left-5 z-20 flex items-center gap-2">
                        {{-- Live pulse indicator --}}
                        <span class="flex items-center gap-2 bg-secondary/20 backdrop-blur-md border border-secondary/30 px-3 py-1 rounded-full font-mono text-[9px] font-bold text-secondary uppercase tracking-widest">
                            <span class="w-1.5 h-1.5 bg-secondary rounded-full animate-pulse inline-block"></span>
                            Live
                        </span>
                        <span class="bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1 rounded-full font-mono text-[9px] font-bold text-on-surface-variant uppercase tracking-widest">Featured</span>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex flex-col justify-center space-y-5">
                    <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest">{{ $feat->sector }} · {{ $feat->estimated_date }}</p>
                    <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white leading-tight">{{ $feat->title }}</h3>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">{!! Str::limit(strip_tags($feat->description), 150) !!}</p>
                    <div class="grid grid-cols-3 gap-3">
                        @if($feat->metric1_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric1_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric1_lbl }}</p>
                        </div>
                        @endif
                        @if($feat->metric2_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric2_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric2_lbl }}</p>
                        </div>
                        @endif
                        @if($feat->metric3_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric3_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric3_lbl }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if($feat->tech_stack)
                        @foreach(explode(',', $feat->tech_stack) as $t)
                        <span class="font-mono text-[9px] bg-white/5 border border-white/10 text-on-surface-variant px-2 py-1 rounded-lg uppercase tracking-wider">{{ trim($t) }}</span>
                        @endforeach
                        @endif
                    </div>
                    <span class="inline-flex items-center gap-2 font-mono text-[10px] text-secondary uppercase tracking-widest group-hover:gap-3 transition-all">
                        <span>View Live Dashboard</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </div>
        </a>
        @endif

        @if($presentProjects->isEmpty() && !$feat)
            <div class="glass-card p-10 text-center text-on-surface-variant italic rounded-3xl">No projects found.</div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($presentProjects as $project)
            @if($project->id !== ($feat->id ?? null))
            @php $ss = $statusStyles[$project->status_badge] ?? $defaultStyle; @endphp
            <a href="{{ route('projects.detail', ['id' => $project->id]) }}" class="glass-card rounded-3xl overflow-hidden flex flex-col group border border-secondary/10 hover:no-underline">
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10"></div>
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" />
                    <div class="absolute top-4 left-4 z-20 flex items-center gap-2">
                        <span class="flex items-center gap-1.5 {{ $ss['bg'] }} backdrop-blur-md border {{ $ss['border'] }} px-3 py-1 rounded-full font-mono text-[9px] font-bold {{ $ss['text'] }} uppercase tracking-widest">
                            <span class="w-1.5 h-1.5 bg-secondary rounded-full animate-pulse inline-block"></span>
                            {{ $project->status_badge }}
                        </span>
                        <span class="bg-white/5 backdrop-blur-md border border-white/10 px-3 py-1 rounded-full font-mono text-[9px] text-on-surface-variant uppercase tracking-widest">{{ $project->sector }}</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 space-y-4">
                    <p class="font-mono text-[9px] text-on-surface-variant uppercase tracking-widest">{{ $project->sector }} · {{ $project->estimated_date }}</p>
                    <h3 class="font-display text-base font-extrabold text-white leading-snug">{{ $project->title }}</h3>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed flex-1">{!! Str::limit(strip_tags($project->description), 120) !!}</p>
                    <div class="grid grid-cols-3 gap-2">
                        @if($project->metric1_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric1_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric1_lbl }}</p>
                        </div>
                        @endif
                        @if($project->metric2_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric2_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric2_lbl }}</p>
                        </div>
                        @endif
                        @if($project->metric3_lbl)
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric3_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric3_lbl }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if($project->tech_stack)
                        @foreach(explode(',', $project->tech_stack) as $t)
                        <span class="font-mono text-[9px] bg-white/5 border border-white/10 text-on-surface-variant px-2 py-1 rounded-lg uppercase tracking-wider">{{ trim($t) }}</span>
                        @endforeach
                        @endif
                    </div>
                    <span class="inline-flex items-center gap-2 font-mono text-[10px] text-secondary uppercase tracking-widest group-hover:gap-3 transition-all pt-1">
                        <span>Live Details</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </a>
            @endif
            @endforeach
        </div>
        @endif
    </div>

    {{-- ── UPCOMING PANEL ── --}}
    <div id="panel-upcoming" role="tabpanel" aria-labelledby="tab-upcoming" class="showcase-panel hidden">

        @php $feat = $upcomingProjects->first(); @endphp
        @if($feat)
        <a href="{{ route('contact') }}" class="glass-card rounded-3xl overflow-hidden mb-8 border border-accent/20 block hover:no-underline">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative min-h-[280px] lg:min-h-[380px] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-primary/70 z-10 hidden lg:block"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10 lg:hidden"></div>
                    {{-- Frosted overlay to signal "upcoming" / not yet live --}}
                    <div class="absolute inset-0 bg-primary/30 z-10 backdrop-blur-[2px]"></div>
                    <img class="w-full h-full object-cover" src="{{ asset($feat->cover_image) }}" alt="{{ $feat->title }}" />
                    <div class="absolute top-5 left-5 z-20 flex items-center gap-2">
                        <span class="bg-accent/20 backdrop-blur-md border border-accent/30 px-3 py-1 rounded-full font-mono text-[9px] font-bold text-accent uppercase tracking-widest">In Development</span>
                        <span class="bg-white/10 backdrop-blur-md border border-white/20 px-3 py-1 rounded-full font-mono text-[9px] font-bold text-on-surface-variant uppercase tracking-widest">{{ $feat->estimated_date }}</span>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex flex-col justify-center space-y-5">
                    <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest">{{ $feat->sector }} · {{ $feat->estimated_date }}</p>
                    <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white leading-tight">{{ $feat->title }}</h3>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">{!! Str::limit(strip_tags($feat->description), 150) !!}</p>
                    {{-- Projected metrics (labelled as estimates) --}}
                    <div class="grid grid-cols-3 gap-3">
                        @if($feat->metric1_lbl)
                        <div class="bg-accent/5 rounded-xl p-3 border border-accent/10 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric1_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric1_lbl }}</p>
                        </div>
                        @endif
                        @if($feat->metric2_lbl)
                        <div class="bg-accent/5 rounded-xl p-3 border border-accent/10 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric2_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric2_lbl }}</p>
                        </div>
                        @endif
                        @if($feat->metric3_lbl)
                        <div class="bg-accent/5 rounded-xl p-3 border border-accent/10 text-center">
                            <p class="font-display text-xl font-extrabold text-white">{{ $feat->metric3_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $feat->metric3_lbl }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if($feat->tech_stack)
                        @foreach(explode(',', $feat->tech_stack) as $t)
                        <span class="font-mono text-[9px] bg-white/5 border border-white/10 text-on-surface-variant px-2 py-1 rounded-lg uppercase tracking-wider">{{ trim($t) }}</span>
                        @endforeach
                        @endif
                    </div>
                    <span class="inline-flex items-center gap-2 font-mono text-[10px] text-accent uppercase tracking-widest group-hover:gap-3 transition-all">
                        <span>Express Interest</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </div>
        </a>
        @endif

        @if($upcomingProjects->isEmpty() && !$feat)
            <div class="glass-card p-10 text-center text-on-surface-variant italic rounded-3xl">No projects found.</div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($upcomingProjects as $project)
            @if($project->id !== ($feat->id ?? null))
            @php $ss = $statusStyles[$project->status_badge] ?? $defaultStyle; @endphp
            <a href="{{ route('contact') }}" class="glass-card rounded-3xl overflow-hidden flex flex-col group border border-accent/10 hover:no-underline">
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 bg-primary/40 backdrop-blur-[2px] z-10"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10"></div>
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" />
                    <div class="absolute top-4 left-4 z-20 flex items-center gap-2">
                        <span class="{{ $ss['bg'] }} backdrop-blur-md border {{ $ss['border'] }} px-3 py-1 rounded-full font-mono text-[9px] font-bold {{ $ss['text'] }} uppercase tracking-widest">{{ $project->status_badge }}</span>
                        <span class="bg-accent/10 backdrop-blur-md border border-accent/20 px-3 py-1 rounded-full font-mono text-[9px] text-accent uppercase tracking-widest">{{ $project->estimated_date }}</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 space-y-4">
                    <p class="font-mono text-[9px] text-on-surface-variant uppercase tracking-widest">{{ $project->sector }} · {{ $project->estimated_date }}</p>
                    <h3 class="font-display text-base font-extrabold text-white leading-snug">{{ $project->title }}</h3>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed flex-1">{!! Str::limit(strip_tags($project->description), 120) !!}</p>
                    <div class="grid grid-cols-3 gap-2">
                        @if($project->metric1_lbl)
                        <div class="bg-accent/5 rounded-xl p-3 border border-accent/10 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric1_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric1_lbl }}</p>
                        </div>
                        @endif
                        @if($project->metric2_lbl)
                        <div class="bg-accent/5 rounded-xl p-3 border border-accent/10 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric2_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric2_lbl }}</p>
                        </div>
                        @endif
                        @if($project->metric3_lbl)
                        <div class="bg-accent/5 rounded-xl p-3 border border-accent/10 text-center">
                            <p class="font-display text-base font-extrabold text-white">{{ $project->metric3_val }}</p>
                            <p class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider mt-0.5 leading-tight">{{ $project->metric3_lbl }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if($project->tech_stack)
                        @foreach(explode(',', $project->tech_stack) as $t)
                        <span class="font-mono text-[9px] bg-white/5 border border-white/10 text-on-surface-variant px-2 py-1 rounded-lg uppercase tracking-wider">{{ trim($t) }}</span>
                        @endforeach
                        @endif
                    </div>
                    <span class="inline-flex items-center gap-2 font-mono text-[10px] text-accent uppercase tracking-widest group-hover:gap-3 transition-all pt-1">
                        <span>Express Interest</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </a>
            @endif
            @endforeach
        </div>
        @endif
    </div>

</section>

{{-- ─────────────────────────────────────────────────────────
     INDUSTRY COVERAGE STRIP
────────────────────────────────────────────────────────── --}}
<section class="max-w-container-max mx-auto px-gutter py-16 relative" data-aos="fade-up">
    <div class="glass-card rounded-3xl p-8 md:p-12">
        <div class="flex flex-col md:flex-row md:items-center gap-8">
            <div class="md:w-1/3 space-y-3">
                <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] font-bold">Industry Reach</span>
                <h2 class="font-display text-3xl font-extrabold text-white leading-tight">
                    Built across <span class="text-gradient-purple">18 sectors</span>
                </h2>
                <p class="font-body text-sm text-on-surface-variant leading-relaxed">
                    Our solutions adapt to the regulatory, data, and operational constraints of each vertical — not the other way around.
                </p>
            </div>
            <div class="md:w-2/3 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-3">
                @foreach([
                    ['local_hospital',    'Healthcare'],
                    ['account_balance',   'Finance'],
                    ['precision_manufacturing', 'Manufacturing'],
                    ['storefront',        'Retail'],
                    ['gavel',             'Legal'],
                    ['local_shipping',    'Logistics'],
                    ['energy_savings_leaf','Agriculture'],
                    ['article',           'Media'],
                    ['science',           'Pharma'],
                    ['school',            'EdTech'],
                    ['bolt',              'Energy'],
                    ['apartment',         'Real Estate'],
                ] as $ind)
                <div class="flex flex-col items-center gap-2 bg-white/5 border border-white/5 rounded-2xl p-4 hover:border-secondary/30 hover:bg-secondary/5 transition-all group">
                    <span class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors text-xl">{{ $ind[0] }}</span>
                    <span class="font-mono text-[8px] text-on-surface-variant uppercase tracking-wider text-center leading-tight">{{ $ind[1] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ─────────────────────────────────────────────────────────
     PROCESS STRIP
────────────────────────────────────────────────────────── --}}
<section class="max-w-container-max mx-auto px-gutter pb-16 relative">
    <div class="text-center mb-10" data-aos="fade-up">
        <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] font-bold">How We Work</span>
        <h2 class="font-display text-3xl md:text-4xl font-extrabold text-white mt-3">
            From brief to <span class="text-gradient-purple">production</span>
        </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach([
            ['search_insights',   '01', 'Discovery & Scoping',      'We map your data landscape, success metrics, and integration constraints before a single model is trained.'],
            ['model_training',    '02', 'Architecture Design',       'Our engineers select the optimal model class, training strategy, and deployment topology for your use case.'],
            ['data_object',       '03', 'Build & Validation',        'Iterative training cycles with rigorous offline and shadow-mode evaluation before any production traffic.'],
            ['rocket_launch',     '04', 'Deploy & Monitor',          'CI/CD pipelines, drift detection, and 24/7 SLA monitoring — we stay on after go-live.'],
        ] as $step)
        <div class="glass-card rounded-3xl p-6 space-y-4 group hover:border-secondary/30 transition-all border border-white/5" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="flex items-center justify-between">
                <div class="w-12 h-12 rounded-xl bg-secondary/10 border border-secondary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-secondary">{{ $step[0] }}</span>
                </div>
                <span class="font-mono text-3xl font-extrabold text-white/10 group-hover:text-white/20 transition-colors">{{ $step[1] }}</span>
            </div>
            <h3 class="font-display text-base font-extrabold text-white">{{ $step[2] }}</h3>
            <p class="font-body text-sm text-on-surface-variant leading-relaxed">{{ $step[3] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- ─────────────────────────────────────────────────────────
     CTA BANNER
────────────────────────────────────────────────────────── --}}
<section class="max-w-container-max mx-auto px-gutter pb-24 relative" data-aos="fade-up">
    <div class="glass-card rounded-3xl p-10 md:p-16 text-center space-y-6 border border-secondary/10 relative overflow-hidden">
        <div class="bg-glow-secondary absolute top-0 left-1/2 -translate-x-1/2 opacity-30 pointer-events-none"></div>
        <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] font-bold">Start a Project</span>
        <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white leading-tight relative z-10">
            Have a problem that needs <span class="text-gradient-purple">AI to solve it?</span>
        </h2>
        <p class="font-body text-base text-on-surface-variant max-w-xl mx-auto leading-relaxed relative z-10">
            Tell us about your challenge — we'll scope a solution, no commitment required. Most engagements begin with a free 90-minute technical discovery call.
        </p>
        <div class="flex flex-wrap gap-4 justify-center relative z-10">
            <a href="{{ route('contact') }}" class="btn-gradient px-8 py-4 rounded-xl font-display text-sm text-white font-bold shadow-lg shadow-secondary/15">
                Start a Conversation
            </a>
            <a href="{{ route('insights') }}" class="px-8 py-4 rounded-xl font-display text-sm text-white font-bold border border-white/10 hover:border-secondary/40 hover:bg-secondary/5 transition-all">
                Read Our Insights
            </a>
        </div>
    </div>
</section>

{{-- ─────────────────────────────────────────────────────────
     TAB SWITCHING JS
────────────────────────────────────────────────────────── --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs   = document.querySelectorAll('.showcase-tab');
    const panels = document.querySelectorAll('.showcase-panel');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const target = this.dataset.tab;

            // Update tab styles
            tabs.forEach(t => {
                t.classList.remove('bg-secondary/20', 'border-secondary', 'text-white');
                t.classList.add('bg-white/5', 'border-white/10', 'text-on-surface-variant');
                t.setAttribute('aria-selected', 'false');
            });
            this.classList.add('bg-secondary/20', 'border-secondary', 'text-white');
            this.classList.remove('bg-white/5', 'border-white/10', 'text-on-surface-variant');
            this.setAttribute('aria-selected', 'true');

            // Show the matching panel, hide the rest
            panels.forEach(panel => {
                panel.id === 'panel-' + target
                    ? panel.classList.remove('hidden')
                    : panel.classList.add('hidden');
            });
        });
    });
});
</script>
@endsection
