@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Blog Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-4xl mx-auto space-y-8">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Intelligence Insight Node details</h3>
            <p class="text-xs text-on-surface-variant">Active article #{{ $post->id }} telemetry & specifications</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.blogs.edit', $post) }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-primary-container/20 hover:bg-primary-container/30 text-xs text-primary font-semibold flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">edit</span> Edit Post
            </a>
            <a href="{{ route('admin.blogs.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
            </a>
        </div>
    </div>

    <!-- Banner & Header -->
    <div class="space-y-6">
        @if($post->banner_image)
            <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-white/10">
                <img src="{{ asset($post->banner_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent"></div>
            </div>
        @endif

        <div class="flex items-center gap-3">
            <span class="px-2.5 py-0.5 rounded-full text-xs bg-tertiary/10 text-tertiary border border-tertiary/20">
                {{ $post->category }}
            </span>
            <span class="text-on-surface-variant/60">•</span>
            <span class="text-xs font-label-mono text-on-surface-variant">{{ $post->reading_time }} min read</span>
            <span class="text-on-surface-variant/60">•</span>
            <span class="text-xs font-label-mono text-on-surface-variant">{{ $post->status === 'published' ? 'Published' : 'Draft' }}</span>
        </div>

        <h1 class="text-3xl font-extrabold text-on-surface">{{ $post->title }}</h1>

        <!-- Author Card -->
        <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5">
            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary border border-secondary/20">
                <span class="material-symbols-outlined">fingerprint</span>
            </div>
            <div>
                <p class="text-sm font-semibold text-on-surface">{{ $post->author_name }}</p>
                <p class="text-xs text-on-surface-variant font-label-mono">{{ $post->author_role }}</p>
            </div>
            <div class="ml-auto text-right">
                <p class="text-xs text-on-surface-variant font-label-mono">Dispatched Timestamp</p>
                <p class="text-xs text-on-surface font-semibold">{{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : 'Not Dispatched' }}</p>
            </div>
        </div>
    </div>

    <!-- Technical Metrics Bento -->
    @if($post->technical_metrics && is_array($post->technical_metrics))
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($post->technical_metrics as $metric)
                @if(isset($metric['label']) && isset($metric['val']))
                    <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-2">
                        <div class="flex items-center gap-1.5 text-xs text-tertiary font-label-mono">
                            <span class="material-symbols-outlined text-sm">{{ $metric['icon'] ?? 'bolt' }}</span>
                            <span>{{ $metric['label'] }}</span>
                        </div>
                        <div class="text-2xl font-bold text-on-surface">{{ $metric['val'] }}</div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    <!-- Body content -->
    <div class="space-y-6 pt-4 border-t border-white/10">
        <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Article Body Content</span>
        
        @if($post->excerpt)
            <div class="p-4 rounded-xl bg-white/5 border-l-4 border-secondary text-on-surface-variant text-sm italic">
                {{ $post->excerpt }}
            </div>
        @endif

        <div class="prose prose-invert max-w-none text-on-surface-variant text-sm leading-relaxed space-y-4">
            {!! $post->body_content !!}
        </div>

        @if($post->blockquote_text)
            <blockquote class="border-l-4 border-primary pl-6 py-2 italic text-on-surface font-medium bg-white/5 rounded-r-xl">
                "{!! $post->blockquote_text !!}"
                @if($post->blockquote_source)
                    <span class="block text-xs text-on-surface-variant mt-2 font-semibold">— {{ $post->blockquote_source }}</span>
                @endif
            </blockquote>
        @endif
    </div>

    <!-- Tags -->
    @if($post->tags)
        <div class="flex flex-wrap gap-2 pt-4 border-t border-white/10">
            @foreach(explode(',', $post->tags) as $tag)
                <span class="text-xs bg-surface-dark border border-white/5 text-on-surface-variant px-3 py-1.5 rounded-lg">#{{ trim($tag) }}</span>
            @endforeach
        </div>
    @endif
</div>
@endsection
