@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Project Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-4xl mx-auto space-y-8">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Project Deployment Details</h3>
            <p class="text-xs text-on-surface-variant">Specifications for project deployment node #{{ $project->id }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.projects.edit', $project) }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-primary-container/20 hover:bg-primary-container/30 text-xs text-primary font-semibold flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">edit</span> Edit Project
            </a>
            <a href="{{ route('admin.projects.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
            </a>
        </div>
    </div>

    <!-- Main Project Banner Image -->
    @if($project->cover_image)
        <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-white/10">
            <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent"></div>
        </div>
    @endif

    <!-- Metadata Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-1">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Project Title</span>
            <p class="text-sm font-semibold text-on-surface">{{ $project->title }}</p>
        </div>
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-1">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Sector</span>
            <p class="text-sm font-semibold text-on-surface">{{ $project->sector }}</p>
        </div>
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-1">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Classification</span>
            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs bg-secondary/10 text-secondary border border-secondary/20 font-semibold uppercase">
                {{ $project->classification }}
            </span>
        </div>
    </div>

    <!-- Technical Metrics Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4">
        @if($project->metric1_lbl && $project->metric1_val)
            <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-2">
                <span class="block text-xs font-label-mono text-tertiary uppercase tracking-wider">{{ $project->metric1_lbl }}</span>
                <div class="text-2xl font-bold text-on-surface">{{ $project->metric1_val }}</div>
            </div>
        @endif
        @if($project->metric2_lbl && $project->metric2_val)
            <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-2">
                <span class="block text-xs font-label-mono text-tertiary uppercase tracking-wider">{{ $project->metric2_lbl }}</span>
                <div class="text-2xl font-bold text-on-surface">{{ $project->metric2_val }}</div>
            </div>
        @endif
        @if($project->metric3_lbl && $project->metric3_val)
            <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-2">
                <span class="block text-xs font-label-mono text-tertiary uppercase tracking-wider">{{ $project->metric3_lbl }}</span>
                <div class="text-2xl font-bold text-on-surface">{{ $project->metric3_val }}</div>
            </div>
        @endif
    </div>

    <!-- Additional Specifications -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 pt-4 border-t border-white/10">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Status Badge</span>
            <p class="text-sm font-semibold text-on-surface">{{ $project->status_badge ?? 'Deployed' }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Project Code ID</span>
            <p class="text-sm font-semibold text-on-surface">{{ $project->project_code ?? 'TBA' }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Estimated Date</span>
            <p class="text-sm font-semibold text-on-surface">{{ $project->estimated_date ?? 'TBA' }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Impact Rating</span>
            <p class="text-sm font-semibold text-primary">{{ number_format($project->rating, 1) }} / 5.0</p>
        </div>
    </div>

    <!-- Tech Stack -->
    @if($project->tech_stack)
        <div class="pt-4 border-t border-white/10 space-y-2">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Core Technology Stack</span>
            <div class="flex flex-wrap gap-2 mt-1">
                @foreach(explode(',', $project->tech_stack) as $tech)
                    <span class="text-xs bg-surface-dark border border-white/5 text-on-surface-variant px-3 py-1.5 rounded-lg">{{ trim($tech) }}</span>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Description -->
    <div class="pt-4 border-t border-white/10 space-y-2">
        <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Operational Narrative / Scope</span>
        <div class="prose prose-invert max-w-none text-on-surface-variant text-sm leading-relaxed p-4 rounded-xl bg-white/5 border border-white/5">
            {!! $project->description !!}
        </div>
    </div>

    <!-- Footer Stat -->
    @if($project->footer_stat)
        <div class="pt-4 border-t border-white/10 space-y-2">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Key Telemetry Stat</span>
            <p class="text-sm text-on-surface-variant p-4 rounded-xl bg-white/5 border border-white/5 font-semibold">{{ $project->footer_stat }}</p>
        </div>
    @endif
</div>
@endsection
