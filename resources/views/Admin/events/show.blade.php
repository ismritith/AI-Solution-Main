@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Event Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-4xl mx-auto space-y-8">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Global Event Node Details</h3>
            <p class="text-xs text-on-surface-variant">Specifications for event node #{{ $event->id }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.events.edit', $event) }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-primary-container/20 hover:bg-primary-container/30 text-xs text-primary font-semibold flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">edit</span> Edit Event
            </a>
            <a href="{{ route('admin.events.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
            </a>
        </div>
    </div>

    <!-- Main Banner Image -->
    @if($event->main_image)
        <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-white/10">
            <img src="{{ asset($event->main_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent"></div>
        </div>
    @endif

    <!-- Metadata Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-1">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Event Title</span>
            <p class="text-sm font-semibold text-on-surface">{{ $event->title }}</p>
        </div>
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-1">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">System Category</span>
            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs bg-secondary/10 text-secondary border border-secondary/20 font-semibold uppercase">
                {{ $event->category }}
            </span>
        </div>
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-1">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Status Coordinates</span>
            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-semibold uppercase">
                {{ $event->status_badge }}
            </span>
        </div>
    </div>

    <!-- Additional Specifications -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 pt-4 border-t border-white/10">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Target Location</span>
            <p class="text-sm font-semibold text-on-surface">{{ $event->location ?? 'Virtual Matrix' }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Date Coordinates</span>
            <p class="text-sm font-semibold text-on-surface">{{ $event->date_text ?? 'TBA' }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Max Capacity</span>
            <p class="text-sm font-semibold text-on-surface">{{ $event->capacity ?? 'Unlimited' }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Ticket Value</span>
            <p class="text-sm font-semibold text-primary">{{ $event->ticket_price ?? 'Free Access' }}</p>
        </div>
    </div>

    <!-- Description -->
    <div class="pt-4 border-t border-white/10 space-y-2">
        <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Operational Description</span>
        <div class="prose prose-invert max-w-none text-on-surface-variant text-sm leading-relaxed p-4 rounded-xl bg-white/5 border border-white/5">
            {!! $event->description !!}
        </div>
    </div>

    <!-- Ticket Inclusions -->
    @if($event->ticket_inclusions)
        <div class="pt-4 border-t border-white/10 space-y-2">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Ticket Inclusions</span>
            <p class="text-sm text-on-surface-variant p-4 rounded-xl bg-white/5 border border-white/5">{{ $event->ticket_inclusions }}</p>
        </div>
    @endif

    <!-- Event Tracks -->
    @if($event->tracks && is_array($event->tracks) && count($event->tracks) > 0)
        <div class="pt-4 border-t border-white/10 space-y-4">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Operational Tracks</span>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($event->tracks as $track)
                    <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-label-mono text-tertiary uppercase">{{ $track['label'] ?? '' }}</span>
                            <span class="text-[10px] bg-white/5 border border-white/5 px-2 py-0.5 rounded text-on-surface-variant">{{ $track['tags'] ?? '' }}</span>
                        </div>
                        <h4 class="text-sm font-bold text-on-surface">{{ $track['name'] ?? '' }}</h4>
                        <p class="text-xs text-on-surface-variant leading-relaxed">{{ $track['desc'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Event Agenda -->
    @if($event->agenda && is_array($event->agenda) && count($event->agenda) > 0)
        <div class="pt-4 border-t border-white/10 space-y-4">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Summit Timeline (Agenda)</span>
            <div class="space-y-4">
                @foreach($event->agenda as $item)
                    <div class="flex flex-col md:flex-row gap-4 p-4 rounded-xl bg-white/5 border border-white/5">
                        <div class="md:w-32 flex-shrink-0">
                            <span class="inline-block px-2.5 py-0.5 rounded bg-primary/10 text-primary border border-primary/20 text-xs font-label-mono font-bold">{{ $item['time'] ?? '' }}</span>
                            @if(isset($item['stage']) && $item['stage'])
                                <span class="block text-[10px] text-on-surface-variant mt-1 font-label-mono uppercase">{{ $item['stage'] }}</span>
                            @endif
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-sm font-bold text-on-surface">{{ $item['session'] ?? '' }}</h4>
                            <p class="text-xs text-on-surface-variant leading-relaxed">{{ $item['summary'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
