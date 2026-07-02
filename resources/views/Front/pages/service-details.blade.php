@extends('Front.layouts.app')

@section('title')
{{ $service->title ?? 'Service Details' }} | AI-Solutions
@endsection

@section('content')
    @if($service)
        <!-- Glowing background blur blobs -->
        <div class="bg-glow-main top-[5%] left-[-5%] opacity-50"></div>
        <div class="bg-glow-secondary top-[55%] right-[-5%] opacity-35"></div>

        <!-- Hero Section -->
        <section class="relative pt-24 pb-16 md:pt-36 md:pb-24 overflow-hidden">
            <div class="max-w-container-max mx-auto px-gutter relative z-10" data-aos="fade-up">
                <div class="max-w-4xl space-y-6">
                    <!-- Breadcrumb -->
                    <div class="flex items-center gap-2 text-on-surface-variant text-sm font-mono">
                        <a href="/services" class="hover:text-secondary transition-colors">Services</a>
                        <span class="material-symbols-outlined text-xs">chevron_right</span>
                        <span class="text-white">{{ $service->title }}</span>
                    </div>

                    <!-- Category Badge -->
                    <span class="font-mono text-xs uppercase tracking-widest text-secondary px-3 py-1 bg-secondary/15 rounded-full border border-secondary/30 font-bold inline-block">
                        {{ ucfirst($service->category) }} Service
                    </span>

                    <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
                        {{ $service->title }}
                    </h1>

                    @if($service->metric_subtitle)
                        <p class="font-mono text-sm text-accent uppercase tracking-wider font-bold">
                            {{ $service->metric_subtitle }}
                        </p>
                    @endif
                </div>
            </div>
        </section>

        <!-- Service Info Bento Grid -->
        <section class="py-10 max-w-container-max mx-auto px-gutter">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12" data-aos="fade-up">
                <!-- Icon Card -->
                <div class="glass-card rounded-3xl p-8 flex flex-col items-center justify-center gap-4 text-center">
                    <div class="w-20 h-20 rounded-2xl bg-secondary/10 border border-secondary/25 flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary text-4xl">{{ $service->icon ?? 'settings_applications' }}</span>
                    </div>
                    <div>
                        <span class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest">Service Icon</span>
                        <p class="text-white font-display font-bold text-lg mt-1">{{ $service->icon ?? 'settings_applications' }}</p>
                    </div>
                </div>

                <!-- Category Card -->
                <div class="glass-card rounded-3xl p-8 flex flex-col items-center justify-center gap-4 text-center">
                    <div class="w-20 h-20 rounded-2xl bg-accent/10 border border-accent/25 flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent text-4xl">category</span>
                    </div>
                    <div>
                        <span class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest">Category</span>
                        <p class="text-white font-display font-bold text-lg mt-1 capitalize">{{ $service->category }}</p>
                    </div>
                </div>

                <!-- Status Card -->
                <div class="glass-card rounded-3xl p-8 flex flex-col items-center justify-center gap-4 text-center">
                    <div class="w-20 h-20 rounded-2xl bg-secondary/10 border border-secondary/25 flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary text-4xl">{{ $service->is_featured ? 'star' : 'verified' }}</span>
                    </div>
                    <div>
                        <span class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest">Status</span>
                        <p class="text-white font-display font-bold text-lg mt-1">{{ $service->is_featured ? 'Featured Service' : 'Active Service' }}</p>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="glass-card rounded-3xl p-8 md:p-12 mb-12" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-secondary/10 border border-secondary/25 flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary">description</span>
                    </div>
                    <h2 class="font-display text-2xl md:text-3xl font-extrabold text-white">Service Overview</h2>
                </div>
                <div class="prose prose-invert max-w-none text-on-surface-variant text-base leading-relaxed">
                    {!! $service->description !!}
                </div>
            </div>

            <!-- Tags Section -->
            @php $tags = $service->tags ? array_map('trim', explode(',', $service->tags)) : []; @endphp
            @if(count($tags))
                <div class="glass-card rounded-3xl p-8 md:p-12 mb-12" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-accent/10 border border-accent/25 flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent">sell</span>
                        </div>
                        <h2 class="font-display text-xl font-extrabold text-white">Technology Tags</h2>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        @foreach($tags as $tag)
                            <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-full font-mono text-xs text-on-surface uppercase tracking-wide hover:border-secondary/40 transition-colors">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Additional Metadata -->
            @if($service->step_number || $service->metric_subtitle)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12" data-aos="fade-up">
                    @if($service->step_number)
                        <div class="glass-card rounded-3xl p-8">
                            <span class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest block mb-3">Step Number</span>
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-full bg-secondary/10 border border-secondary/25 flex items-center justify-center">
                                    <span class="font-display text-2xl font-extrabold text-secondary">{{ $service->step_number }}</span>
                                </div>
                                <p class="text-white font-display font-bold text-lg">Step {{ $service->step_number }} in the delivery process</p>
                            </div>
                        </div>
                    @endif
                    @if($service->metric_subtitle)
                        <div class="glass-card rounded-3xl p-8">
                            <span class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest block mb-3">Key Metric</span>
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-full bg-accent/10 border border-accent/25 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-accent text-2xl">trending_up</span>
                                </div>
                                <p class="text-white font-display font-bold text-lg">{{ $service->metric_subtitle }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </section>

        <!-- Related Services Section -->
        @if($relatedServices->count())
            <section class="py-16 bg-[#05020c]/60 border-t border-white/5">
                <div class="max-w-container-max mx-auto px-gutter">
                    <div class="mb-12" data-aos="fade-up">
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full mb-4">
                            <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Explore More</span>
                        </div>
                        <h2 class="font-display text-3xl md:text-4xl font-extrabold text-white">Other Services</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedServices as $index => $related)
                            @php
                                $color = $index % 2 === 0 ? 'secondary' : 'accent';
                                $relTags = $related->tags ? array_map('trim', explode(',', $related->tags)) : [];
                            @endphp
                            <a href="/service-details?id={{ $related->id }}" class="glass-card rounded-3xl p-8 flex flex-col justify-between group border-{{ $color }}/20 hover:border-{{ $color }}/50 hover:no-underline" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-{{ $color }}/10 border border-{{ $color }}/25 flex items-center justify-center group-hover:border-{{ $color }}/50 group-hover:scale-105 transition-all text-{{ $color }}">
                                            <span class="material-symbols-outlined text-2xl">{{ $related->icon ?? 'settings_applications' }}</span>
                                        </div>
                                        <span class="px-2.5 py-0.5 bg-{{ $color }}/20 text-{{ $color }} font-mono text-[10px] uppercase rounded-full font-bold capitalize">{{ $related->category }}</span>
                                    </div>

                                    <h3 class="font-display text-xl font-bold text-white group-hover:text-secondary transition-colors">
                                        {{ $related->title }}
                                    </h3>

                                    <p class="font-body text-xs text-on-surface-variant leading-relaxed line-clamp-3">
                                        {!! strip_tags($related->description) !!}
                                    </p>

                                    @if(count($relTags))
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach(array_slice($relTags, 0, 3) as $tag)
                                                <span class="px-2 py-0.5 bg-white/5 border border-white/10 rounded-full font-mono text-[9px] text-on-surface-variant uppercase">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-6 pt-4 border-t border-white/5 flex justify-between items-center">
                                    <span class="font-mono text-[10px] text-on-surface-variant">{{ $related->metric_subtitle ?? 'Learn More' }}</span>
                                    <span class="btn-gradient text-white px-4 py-2 rounded-xl text-[10px] font-bold shadow-md shadow-secondary/10 flex items-center gap-1">
                                        View Details <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- CTA Section -->
        <section class="py-20 max-w-container-max mx-auto px-gutter">
            <div class="glass-card rounded-[40px] p-12 text-center relative overflow-hidden" data-aos="zoom-in">
                <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-96 h-96 bg-glow-secondary opacity-40 pointer-events-none"></div>

                <div class="max-w-2xl mx-auto space-y-8 relative z-10">
                    <h2 class="font-display text-3xl md:text-5xl font-extrabold text-white">
                        Interested in <span class="text-gradient-coral">{{ $service->title }}?</span>
                    </h2>
                    <p class="font-body text-base text-on-surface-variant leading-relaxed">
                        Talk to a solutions architect about how this service can be tailored to your specific business needs and infrastructure requirements.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center pt-2">
                        <a href="/contact" class="btn-gradient text-white font-bold px-8 py-4 rounded-xl text-base shadow-lg shadow-secondary/20 inline-flex items-center gap-2">
                            Discuss This Service
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </a>
                        <a href="/services" class="glass-card text-white font-semibold px-8 py-4 rounded-xl text-base hover:bg-white/10 transition-colors inline-flex items-center gap-2">
                            Browse All Services
                            <span class="material-symbols-outlined text-base">arrow_back</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    @else
        <!-- Empty State -->
        <section class="py-40 max-w-4xl mx-auto text-center px-gutter">
            <div class="glass-card rounded-3xl p-12 space-y-6" data-aos="fade-up">
                <span class="material-symbols-outlined text-6xl text-on-surface-variant/30">search_off</span>
                <h2 class="font-display text-3xl font-extrabold text-white">Service Not Found</h2>
                <p class="text-on-surface-variant text-base leading-relaxed max-w-md mx-auto">
                    The requested service details are currently unavailable. Please browse our full service catalog.
                </p>
                <a href="/services" class="btn-gradient text-white font-bold px-8 py-3 rounded-xl text-sm inline-flex items-center gap-2 shadow-lg shadow-secondary/20">
                    Browse All Services
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>
        </section>
    @endif
@endsection
