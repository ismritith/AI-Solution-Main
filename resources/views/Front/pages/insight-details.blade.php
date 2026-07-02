@extends('Front.layouts.app')

@section('title', ($post->title ?? 'Insight Details') . ' | AI-Solutions')

@section('content')
<!-- Glowing background blur blobs -->
<div class="bg-glow-main top-[10%] left-[-5%] opacity-55"></div>
<div class="bg-glow-secondary top-[60%] right-[-5%] opacity-40"></div>

<!-- Main Content -->
<main class="relative pt-32 pb-24">
    <!-- Background Atmospheric Glows -->
    <div class="fixed top-[-10%] left-[-10%] w-[50%] h-[50%] glow-primary -z-10 blur-3xl opacity-40"></div>
    <div class="fixed bottom-[10%] right-[-5%] w-[40%] h-[40%] glow-tertiary -z-10 blur-3xl opacity-30"></div>

    @if($post)
        <article class="max-w-4xl mx-auto px-margin-mobile md:px-0">
            <!-- Header Section -->
            <header class="mb-16">
                <div class="flex items-center gap-3 mb-6">
                    <span class="font-label-mono text-label-mono px-3 py-1 glass-card rounded-full text-tertiary uppercase tracking-widest border-tertiary/20">{{ $post->category }}</span>
                    <span class="text-on-surface-variant/60">•</span>
                    <time class="font-label-mono text-label-mono text-on-surface-variant/80">{{ $post->published_at ? $post->published_at->format('F d, Y') : '' }}</time>
                </div>

                <h1 class="font-display text-3xl md:text-5xl font-extrabold text-secondary leading-tight mb-8">
                    {{ $post->title }} 
                </h1>
                
                <div class="flex items-center justify-between p-6 glass-card rounded-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full glass-card border-primary/20 overflow-hidden shrink-0">
                            @if($post->author_avatar)
                                <img src="{{ asset($post->author_avatar) }}" class="w-full h-full object-cover" alt="Author avatar">
                            @else
                                <div class="w-full h-full bg-secondary/10 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-2xl">fingerprint</span>
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="font-headline-md text-headline-md text-on-surface">{{ $post->author_name }}</div>
                            <div class="font-label-mono text-label-mono text-on-surface-variant">{{ $post->author_role }}</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Technical Metric Bento -->
            @if($post->technical_metrics && is_array($post->technical_metrics))
                <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                    @foreach($post->technical_metrics as $metric)
                        @if(isset($metric['label']) && isset($metric['val']))
                            <div class="glass-card p-6 rounded-xl border-white/5">
                                <div class="flex items-center gap-2 text-tertiary mb-2">
                                    <span class="material-symbols-outlined text-[20px]">bolt</span>
                                    <span class="font-label-caps text-label-caps">{{ $metric['label'] }}</span>
                                </div>
                                <div class="text-[32px] font-bold text-on-surface">{{ $metric['val'] }}</div>
                                @if(isset($metric['desc']))
                                    <p class="text-on-surface-variant text-sm mt-1">{{ $metric['desc'] }}</p>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </section>
            @endif

            <!-- Blog Body -->
            <div class="space-y-8 font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                @if($post->banner_image)
                    <div class="relative w-full aspect-video rounded-2xl overflow-hidden glass-card my-12 border-white/10">
                        <img alt="{{ $post->title }}" class="w-full h-full object-cover opacity-80" src="{{ asset($post->banner_image) }}"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent"></div>
                    </div>
                @endif

                <div class="prose prose-invert max-w-none">
                    {!! $post->body_content !!}
                </div>

                @if($post->blockquote_text)
                    <blockquote class="border-l-4 border-primary pl-8 py-4 glass-card rounded-r-xl italic my-8">
                        "{!! $post->blockquote_text !!}"
                        @if($post->blockquote_source)
                            <cite class="block mt-4 not-italic font-bold text-on-surface">— {{ $post->blockquote_source }}</cite>
                        @endif
                    </blockquote>
                @endif
            </div>

            <!-- Tags -->
            @if($post->tags)
                <div class="flex flex-wrap gap-3 mt-16 pb-16 border-b border-white/5">
                    @foreach(explode(',', $post->tags) as $tag)
                        <span class="font-label-mono text-label-mono bg-surface-container-high px-4 py-2 rounded-lg border border-white/5 text-on-surface-variant">#{{ trim($tag) }}</span>
                    @endforeach
                </div>
            @endif

            <!-- Author Card Large -->
            <section class="mt-16 p-8 glass-card rounded-2xl flex flex-col md:flex-row gap-8 items-center md:items-start">
                <div class="w-32 h-32 rounded-2xl overflow-hidden glass-card border-white/10 shrink-0">
                    @if($post->author_avatar)
                        <img src="{{ asset($post->author_avatar) }}" class="w-full h-full object-cover" alt="Author">
                    @else
                        <div class="w-full h-full bg-secondary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-5xl">fingerprint</span>
                        </div>
                    @endif
                </div>
                <div class="text-center md:text-left flex-1">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">About {{ $post->author_name }}</h3>
                    <p class="text-on-surface-variant mb-6 text-sm">
                        {{ $post->author_name }} is a leading contributor at AI-Solutions Labs. Specializing in next-generation intelligence, cognitive engineering, and decentralized neural networks.
                    </p>
                    <div class="flex gap-4 justify-center md:justify-start">
                        <button class="px-6 py-2 glass-card rounded-lg border-white/10 text-primary hover:border-primary/40 transition-colors font-body-md font-bold text-sm">Follow Research</button>
                    </div>
                </div>
            </section>

            <!-- Related Reading -->
            @if(count($recentPosts) > 0)
                <section class="mt-24">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-8">Related Insights</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($recentPosts as $recent)
                            <a class="group" href="/insights1?id={{ $recent->id }}">
                                <div class="glass-card rounded-2xl overflow-hidden border-white/5 group-hover:border-primary/30 transition-all duration-300">
                                    <div class="h-48 relative">
                                        <img alt="{{ $recent->title }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="{{ asset($recent->banner_image) }}"/>
                                        <div class="absolute inset-0 bg-background/20 group-hover:bg-transparent transition-all"></div>
                                    </div>
                                    <div class="p-6">
                                        <span class="font-label-mono text-label-mono text-primary mb-2 block">{{ $recent->category }}</span>
                                        <h4 class="font-headline-md text-on-surface group-hover:text-primary transition-colors line-clamp-1">{{ $recent->title }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </article>
    @else
        <div class="max-w-4xl mx-auto text-center py-20">
            <h2 class="text-white font-bold text-2xl">Insight Post Not Found</h2>
            <p class="text-on-surface-variant mt-2">The requested research node does not exist or has been archived.</p>
        </div>
    @endif
</main>
@endsection