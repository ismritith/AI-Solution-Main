@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Service Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-3xl mx-auto space-y-6">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Core Service Capability Details</h3>
            <p class="text-xs text-on-surface-variant">Specifications for service capability node #{{ $service->id }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.services.edit', $service) }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-primary-container/20 hover:bg-primary-container/30 text-xs text-primary font-semibold flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">edit</span> Edit Service
            </a>
            <a href="{{ route('admin.services.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
            </a>
        </div>
    </div>

    <!-- Metadata Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Service Title</span>
            <p class="text-sm font-semibold text-on-surface">{{ $service->title }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">System Category</span>
            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs bg-primary/10 text-primary border border-primary/20 font-semibold uppercase">
                {{ $service->category }}
            </span>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Active Icon</span>
            <div class="flex items-center gap-2 mt-1">
                <span class="material-symbols-outlined text-secondary text-2xl bg-secondary/10 p-2 rounded-lg border border-secondary/20">
                    {{ $service->icon ?? 'settings' }}
                </span>
                <span class="text-xs font-label-mono text-on-surface-variant">{{ $service->icon ?? 'settings' }}</span>
            </div>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Specification Coordinates</span>
            <div class="flex gap-2 text-xs font-label-mono text-on-surface-variant mt-1">
                @if($service->step_number)
                    <span class="px-2 py-0.5 rounded bg-white/5 border border-white/5">Step {{ $service->step_number }}</span>
                @endif
                @if($service->is_featured)
                    <span class="px-2 py-0.5 rounded bg-accent/10 border border-accent/20 text-accent font-semibold uppercase">Featured</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Additional Specifications -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-white/10">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Metric Subtitle</span>
            <p class="text-sm font-semibold text-on-surface">{{ $service->metric_subtitle ?? 'N/A' }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Service Tags</span>
            <p class="text-sm font-semibold text-on-surface-variant">{{ $service->tags ?? 'N/A' }}</p>
        </div>
    </div>

    <!-- Description -->
    <div class="pt-4 border-t border-white/10 space-y-2">
        <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Narrative / Capabilities Details</span>
        <div class="prose prose-invert max-w-none text-on-surface-variant text-sm leading-relaxed p-4 rounded-xl bg-white/5 border border-white/5">
            {!! $service->description !!}
        </div>
    </div>
</div>
@endsection
