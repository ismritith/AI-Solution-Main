@extends('Front.layouts.app')

@section('title', 'Global AI Events & Summits | AI-Solutions')

@section('content')
<!-- Glowing background blur blobs -->
<div class="bg-glow-main top-[10%] left-[10%] opacity-55"></div>
<div class="bg-glow-secondary top-[60%] right-[10%] opacity-40"></div>

<!-- Banner Section -->
<section class="relative pt-24 pb-16 md:pt-36 md:pb-24 overflow-hidden">
    <div class="max-w-container-max mx-auto px-gutter relative z-10" data-aos="fade-up">
        <div class="max-w-3xl space-y-6">
            <span class="font-mono text-xs uppercase tracking-widest text-secondary px-3 py-1 bg-secondary/15 rounded-full border border-secondary/30 font-bold inline-block">Global Gatherings</span>
            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
                Uniting Global <span class="text-gradient-coral">Minds.</span>
            </h1>
            <p class="font-body text-base md:text-lg text-on-surface-variant max-w-xl leading-relaxed">
                Connect with our core engineering architects, platform partners, and other developer pioneers at our upcoming workshops, hackathons, and global summits.
            </p>
        </div>
    </div>
    
    <div class="absolute inset-0 -z-10 opacity-20 pointer-events-none">
        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFXW69K6xX5qG6BfB-n5s7wXoJp9u8Q4Y5qfSvTY73xrACRp49twzkpOgfwQSDT9RiofY72SJbzlX1OT17cQxWoajzzBMV-zWOFJvNZFOOYoBEFv_hFea2qlfekn-MbsnZCFbbm3DamiTU24XbYD8KXk5hafroK1ncKvpKNYXxIRSHGj1VYQpg4Em4VfhyNyzuW3f1xgoYdd9ML19dqqtRW3BMy5apqmDr3SIZuxsHZqJXcCPeb0KdvkHs5dSyq55irZA85AY8dMAm"/>
    </div>
</section>

<!-- Events Grid Section -->
<section class="py-10 max-w-container-max mx-auto px-gutter">
    @php
        $featuredEvent   = $events->first();
        $remainingEvents = $events->slice(1);
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Featured Event (first item on current page) -->
        @if($featuredEvent)
            <a href="/event1?id={{ $featuredEvent->id }}" class="glass-card rounded-3xl p-8 md:p-10 flex flex-col justify-between group border-secondary/20 hover:border-secondary/50 relative overflow-hidden md:col-span-2 hover:no-underline" data-aos="fade-up">
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-secondary/10 rounded-full filter blur-3xl pointer-events-none"></div>
                
                <div class="space-y-6 relative z-10">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-2 text-accent font-mono text-xs font-bold">
                            <span class="material-symbols-outlined text-base">event</span>
                            {{ strtoupper($featuredEvent->status_badge) }}
                        </div>
                        <span class="inline-flex items-center justify-center font-body text-sm font-bold text-white btn-gradient px-6 py-2.5 rounded-xl">
                            Register Now
                        </span>
                    </div>
                    
                    <h2 class="font-display text-3xl md:text-4xl font-extrabold text-white leading-tight">
                        {{ $featuredEvent->title }}
                    </h2>
                    
                    <div class="font-body text-base text-on-surface-variant max-w-3xl leading-relaxed">
                        {!! strip_tags($featuredEvent->description) !!}
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4 max-w-2xl">
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/5 font-mono text-xs">
                            <span class="text-on-surface-variant block mb-1">LOCATION:</span>
                            <span class="text-white font-bold">{{ $featuredEvent->location }}</span>
                        </div>
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/5 font-mono text-xs">
                            <span class="text-on-surface-variant block mb-1">DATE & TIME:</span>
                            <span class="text-white font-bold">{{ $featuredEvent->date_text }}</span>
                        </div>
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/5 font-mono text-xs">
                            <span class="text-on-surface-variant block mb-1">CAPACITY LIMIT:</span>
                            <span class="text-white font-bold">{{ $featuredEvent->capacity }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-10 pt-6 border-t border-white/5 flex flex-col sm:flex-row justify-between items-center gap-4 relative z-10">
                    <div class="font-mono text-sm text-on-surface-variant">Ticket Tier Pricing: <strong class="text-white">{{ $featuredEvent->ticket_price }}</strong></div>
                </div>
            </a>
        @else
            <div class="md:col-span-2 glass-card rounded-3xl p-10 text-center text-on-surface-variant italic">
                No events currently scheduled.
            </div>
        @endif
        
        <!-- Remaining Events Grid -->
        @foreach($remainingEvents as $event)
            <a href="/event1?id={{ $event->id }}" class="glass-card rounded-3xl p-8 flex flex-col justify-between group border-accent/20 hover:border-accent/50 hover:no-underline" data-aos="fade-up">
                <div class="space-y-6">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2 text-accent font-mono text-xs font-bold">
                            <span class="material-symbols-outlined text-base">calendar_today</span>
                            {{ strtoupper($event->status_badge) }}
                        </div>
                        <span class="px-2.5 py-0.5 bg-accent/20 text-accent font-mono text-[10px] uppercase rounded-full font-bold">{{ $event->ticket_price }}</span>
                    </div>
                    
                    <h3 class="font-display text-2xl font-extrabold text-white">
                        {{ $event->title }}
                    </h3>
                    
                    <div class="font-body text-sm text-on-surface-variant leading-relaxed line-clamp-3">
                        {!! strip_tags($event->description) !!}
                    </div>
                    
                    <div class="p-4 bg-white/5 rounded-2xl border border-white/5 space-y-2 font-mono text-xs">
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
                
                <div class="mt-8 pt-6 border-t border-white/5 flex justify-between items-center">
                    <span class="font-mono text-xs text-on-surface-variant">{{ $event->capacity }}</span>
                    <span class="btn-gradient text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-md shadow-secondary/10 flex items-center gap-1">
                        Register Now <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </span>
                </div>
            </a>
        @endforeach
        
    </div>

    {{-- Custom Paginator --}}
    @if($events->hasPages())
        <div class="mt-12 flex justify-center">
            <div class="flex items-center gap-2 flex-wrap">
                @if($events->onFirstPage())
                    <span class="px-4 py-2 rounded-xl bg-white/5 text-on-surface-variant/40 text-sm font-mono cursor-not-allowed">← Prev</span>
                @else
                    <a href="{{ $events->previousPageUrl() }}" class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 text-on-surface-variant hover:text-white hover:bg-white/10 text-sm font-mono transition-all">← Prev</a>
                @endif

                @foreach($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="w-9 h-9 flex items-center justify-center rounded-xl text-sm font-mono transition-all
                        {{ $page == $events->currentPage() ? 'bg-secondary text-white shadow-lg shadow-secondary/30' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10 hover:text-white' }}">
                        {{ $page }}
                    </a>
                @endforeach

                @if($events->hasMorePages())
                    <a href="{{ $events->nextPageUrl() }}" class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 text-on-surface-variant hover:text-white hover:bg-white/10 text-sm font-mono transition-all">Next →</a>
                @else
                    <span class="px-4 py-2 rounded-xl bg-white/5 text-on-surface-variant/40 text-sm font-mono cursor-not-allowed">Next →</span>
                @endif
            </div>
        </div>
    @endif
</section>

<!-- Newsletter / CTA section -->
<section class="py-20 max-w-container-max mx-auto px-gutter">
    <div class="glass-card rounded-[40px] p-12 text-center relative overflow-hidden" data-aos="zoom-in">
        <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-96 h-96 bg-glow-secondary opacity-40 pointer-events-none"></div>
        
        <div class="max-w-2xl mx-auto space-y-8 relative z-10">
            <h2 class="font-display text-3xl md:text-5xl font-extrabold text-white">
                Never miss an <span class="text-gradient-purple">interaction.</span>
            </h2>
            <p class="font-body text-base text-on-surface-variant leading-relaxed">
                Subscribe to our events feed to receive early ticketing notifications, call-for-papers submissions, and private developer community meetups.
            </p>
            
            <form action="#" class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto pt-2">
                <input class="flex-1 bg-[#05020c] border border-white/5 focus:border-secondary px-5 py-3 rounded-xl text-white outline-none focus:ring-0 text-sm placeholder-on-surface-variant/40" placeholder="Enter developer email" type="email" required/>
                <button class="btn-gradient text-white px-8 py-3 rounded-xl font-body font-bold text-sm shadow-md shadow-secondary/15">
                    Subscribe Feed
                </button>
            </form>
        </div>
    </div>
</section>
@endsection