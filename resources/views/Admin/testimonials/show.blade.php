@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Testimonial Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-2xl mx-auto space-y-6">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Customer Feedback Details</h3>
            <p class="text-xs text-on-surface-variant">Specifications for testimonial node #{{ $testimonial->id }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-primary-container/20 hover:bg-primary-container/30 text-xs text-primary font-semibold flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">edit</span> Edit Feedback
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
            </a>
        </div>
    </div>

    <!-- Client Header -->
    <div class="flex items-center gap-6 p-6 rounded-xl bg-white/5 border border-white/5">
        <img src="{{ asset($testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="w-16 h-16 rounded-full border border-white/10 object-cover">
        <div class="space-y-1">
            <h4 class="text-lg font-bold text-on-surface flex items-center gap-2">
                {{ $testimonial->client_name }}
                @if($testimonial->is_verified)
                    <span class="material-symbols-outlined text-sm text-secondary" style="font-variation-settings: 'FILL' 1;">verified</span>
                @endif
            </h4>
            <p class="text-xs text-on-surface-variant font-label-mono">{{ $testimonial->client_role }}</p>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-white/10">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Feedback Rating</span>
            <div class="flex text-amber-400 mt-1">
                @for($i = 0; $i < $testimonial->rating; $i++)
                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                @endfor
                @for($i = $testimonial->rating; $i < 5; $i++)
                    <span class="material-symbols-outlined text-sm text-on-surface-variant/30">star</span>
                @endfor
            </div>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Status coordinates</span>
            <div class="flex gap-2 mt-1">
                @if($testimonial->is_verified)
                    <span class="px-2 py-0.5 rounded text-[10px] font-label-mono bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 font-semibold uppercase">Verified</span>
                @else
                    <span class="px-2 py-0.5 rounded text-[10px] font-label-mono bg-white/5 border border-white/10 text-on-surface-variant uppercase">Standard</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Quote text -->
    <div class="pt-4 border-t border-white/10 space-y-2">
        <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Client Testimonial Quote</span>
        <div class="p-6 rounded-xl bg-white/5 border border-white/5 text-on-surface italic text-sm leading-relaxed">
            "{!! $testimonial->quote_text !!}"
        </div>
    </div>
</div>
@endsection
