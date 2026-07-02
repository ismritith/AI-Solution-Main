@extends('Front.layouts.app')

@section('title', 'Insights Hub | AI-Solutions')

@section('content')
    <!-- Glowing background blur blobs -->
    <div class="bg-glow-main top-[10%] left-[-5%] opacity-55"></div>
    <div class="bg-glow-secondary top-[60%] right-[-5%] opacity-40"></div>

    <!-- Hero Banner Section -->
    <section class="relative py-20 px-gutter overflow-hidden">
        <div class="max-w-container-max mx-auto text-center relative z-10 space-y-6" data-aos="fade-up">
            <span class="font-mono text-xs uppercase tracking-[0.2em] text-secondary mb-6 block font-bold">Intelligence
                Unveiled</span>
            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white max-w-4xl mx-auto leading-tight">
                Future-Forward <span class="text-gradient-coral">AI Insights</span>
            </h1>
            <p class="font-body text-base md:text-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                Deep neural exploration, operational security models, and the ongoing structural evolution of AI in modern
                enterprise environments.
            </p>
        </div>
    </section>

    <!-- Featured & Bento Grid Content -->
    <section class="pb-24 px-gutter max-w-container-max mx-auto">
        @php
            $featuredPost = $posts->first();
            $remainingPosts = $posts->slice(1);
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-12">
            <!-- Main Featured Post (Left) -->
            @if ($featuredPost)
                <a href="/insights1?id={{ $featuredPost->id }}" class="lg:col-span-8 group cursor-pointer hover:no-underline" data-aos="fade-right">
                    <div class="glass-card rounded-3xl h-full flex flex-col p-5 space-y-6">
                        <div class="relative rounded-2xl overflow-hidden aspect-[16/9]">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-103 grayscale group-hover:grayscale-0"
                                src="{{ asset($featuredPost->banner_image) }}" alt="{{ $featuredPost->title }}" />
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span
                                    class="bg-secondary/20 backdrop-blur-md border border-secondary/30 text-secondary font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">{{ $featuredPost->category }}</span>
                                <span
                                    class="bg-primary/60 backdrop-blur-md border border-white/10 text-white font-mono text-[10px] px-3 py-1 rounded-full">{{ $featuredPost->reading_time }}
                                    min read</span>
                            </div>
                        </div>

                        <div class="space-y-4 px-2 pb-2 flex-1 flex flex-col justify-between">
                            <div>
                                <h2
                                    class="font-display text-2xl md:text-3xl font-extrabold text-white group-hover:text-secondary transition-colors leading-tight">
                                    {{ $featuredPost->title }}
                                </h2>
                                <p class="text-on-surface-variant font-body text-sm leading-relaxed mt-3">
                                    {{ $featuredPost->excerpt }}
                                </p>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-white/5 mt-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center shrink-0 border border-secondary/20">
                                        <span class="material-symbols-outlined text-secondary text-lg">fingerprint</span>
                                    </div>
                                    <div>
                                        <p class="font-display text-sm font-bold text-white">
                                            {{ $featuredPost->author_name }}</p>
                                        <p
                                            class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest font-bold">
                                            {{ $featuredPost->author_role }}</p>
                                    </div>
                                </div>
                                <span
                                    class="text-xs text-on-surface-variant font-label-mono">{{ $featuredPost->published_at ? $featuredPost->published_at->format('M d, Y') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @else
                <div class="lg:col-span-8 glass-card rounded-3xl p-8 flex items-center justify-center">
                    <p class="text-on-surface-variant italic">No insights published yet.</p>
                </div>
            @endif

            <!-- Side Bento Stack (Right) -->
            <div class="lg:col-span-4 flex flex-col gap-8" data-aos="fade-left" data-aos-delay="200">
                @forelse($remainingPosts->take(2) as $sidePost)
                    <a href="/insights1?id={{ $sidePost->id }}" class="glass-card rounded-3xl p-8 group cursor-pointer flex flex-col justify-between h-full hover:no-underline">
                        <div class="space-y-4">
                            <span
                                class="bg-accent/15 border border-accent/30 text-accent font-mono text-[10px] px-2.5 py-0.5 rounded-full font-bold uppercase inline-block">{{ $sidePost->category }}</span>
                            <h3
                                class="font-display text-xl font-bold text-white leading-snug group-hover:text-secondary transition-colors">
                                {{ $sidePost->title }}
                            </h3>
                            <p class="text-on-surface-variant font-body text-xs leading-relaxed line-clamp-3">
                                {{ $sidePost->excerpt }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-6 border-t border-white/5 mt-6">
                            <span
                                class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest font-bold">{{ $sidePost->published_at ? $sidePost->published_at->format('M d, Y') : '' }}</span>
                            <span
                                class="material-symbols-outlined text-secondary group-hover:translate-x-1 transition-transform">
                                arrow_forward
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="glass-card rounded-3xl p-8 flex items-center justify-center h-full">
                        <p class="text-on-surface-variant italic text-xs">No additional posts scheduled.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Remaining Grid Stack -->
        @if ($remainingPosts->count() > 2)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($remainingPosts->skip(2) as $post)
                    <a href="/insights1?id={{ $post->id }}"
                        class="glass-card rounded-3xl overflow-hidden group cursor-pointer flex flex-col justify-between hover:no-underline"
                        data-aos="fade-up">
                        <div>
                            <div class="aspect-video relative overflow-hidden">
                                <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                                    src="{{ asset($post->banner_image) }}" alt="{{ $post->title }}" />
                            </div>
                            <div class="p-8 space-y-4">
                                <div class="flex gap-3">
                                    <span
                                        class="font-mono text-[10px] text-secondary font-bold uppercase tracking-wider">{{ $post->category }}</span>
                                    <span class="font-mono text-[10px] text-on-surface-variant">{{ $post->reading_time }}
                                        MIN READ</span>
                                </div>
                                <h4
                                    class="font-display text-xl font-bold text-white group-hover:text-secondary transition-colors line-clamp-2">
                                    {{ $post->title }}
                                </h4>
                                <p class="text-on-surface-variant font-body text-xs leading-relaxed line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>
                            </div>
                        </div>
                        <div class="px-8 pb-8 pt-2">
                            <span class="flex items-center gap-2 text-secondary font-body text-xs font-bold group-hover:text-white transition-colors">
                                Read Article <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        @if ($posts->hasPages())
            <div class="mt-12 pt-6 border-t border-white/5">
                {{ $posts->links() }}
            </div>
        @endif
    </section>

    <!-- Category Filter & Newsletter Section with Coding Terminal Block -->
    <section class="py-20 px-gutter bg-[#05020c]/60 relative border-t border-white/5">
        <div class="max-w-container-max mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-16 glass-card p-10 md:p-12 rounded-[40px] relative overflow-hidden"
                data-aos="zoom-in">
                <div class="absolute -bottom-1/2 -left-1/4 w-full h-full bg-glow-secondary opacity-30 pointer-events-none">
                </div>

                <div class="max-w-xl relative z-10 space-y-6">
                    <h2 class="font-display text-3xl md:text-4xl font-extrabold text-white">Stay at the cutting edge.</h2>
                    <p class="text-on-surface-variant font-body text-sm leading-relaxed">
                        Receive bi-weekly deep insights into AI orchestrations, case studies from our sandbox labs, and
                        early alerts on newly published terminal scripts.
                    </p>
                    <form action="#" class="flex flex-col sm:flex-row gap-4">
                        <input
                            class="flex-1 bg-[#05020c] border border-white/5 rounded-xl px-5 py-4 focus:outline-none focus:border-secondary text-white text-sm placeholder-on-surface-variant/40"
                            placeholder="Your engineering email" type="email" required />
                        <button
                            class="btn-gradient text-white font-bold px-8 py-4 rounded-xl shadow-md shadow-secondary/15 transition-all whitespace-nowrap">
                            Subscribe Now
                        </button>
                    </form>
                </div>

                <!-- Terminal code block -->
                <div class="hidden lg:block w-full max-w-sm relative z-10" data-aos="fade-left" data-aos-delay="200">
                    <div class="bg-[#05020c] p-6 rounded-2xl border border-white/5 shadow-2xl font-mono text-xs space-y-3">
                        <div class="flex gap-1.5 pb-3 border-b border-white/5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-500/80"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-green-500/80"></span>
                        </div>
                        <code class="block text-on-surface-variant">
                            <span class="text-secondary">const</span> subscriber = {<br />
                            &nbsp;&nbsp;topic: <span class="text-accent">'ai-insights'</span>,<br />
                            &nbsp;&nbsp;frequency: <span class="text-accent">'real-time'</span>,<br />
                            &nbsp;&nbsp;status: <span class="text-green-400">'active'</span><br />
                            };<br /><br />
                            <span class="text-secondary">await</span> solutions.sync(subscriber);
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Research Node Detail Modal (Premium Glassmorphic Overlay) -->
    <div id="insightModal"
        class="fixed inset-0 z-[100] hidden items-center justify-center p-4 md:p-10 transition-all duration-300">
        <!-- Modal Backdrop -->
        <div id="modalBackdrop"
            class="absolute inset-0 bg-[#05020c]/85 backdrop-blur-xl opacity-0 transition-opacity duration-300"></div>

        <!-- Modal Card Container -->
        <div id="modalContent"
            class="relative w-full max-w-4xl max-h-[85vh] bg-[#0d071d]/90 border border-white/10 rounded-[32px] overflow-hidden shadow-2xl flex flex-col transform scale-95 opacity-0 transition-all duration-300 z-10">
            <!-- Close Button -->
            <a href="javascript:void(0)" role="button" id="closeModalBtn"
                class="absolute top-6 right-6 w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-white/15 hover:border-white/20 transition-all z-50 cursor-pointer"
                aria-label="Close modal">
                <span class="material-symbols-outlined text-xl">close</span>
            </a>

            <!-- Scrollable content area -->
            <div id="modalBody" class="flex-1 overflow-y-auto p-6 md:p-12 custom-scrollbar">
                <!-- Skeleton Loader -->
                <div id="modalSkeleton" class="space-y-8 animate-pulse">
                    <div class="flex items-center gap-3">
                        <div class="h-6 w-24 bg-white/5 rounded-full"></div>
                        <div class="h-4 w-4 bg-white/5 rounded-full"></div>
                        <div class="h-6 w-32 bg-white/5 rounded-full"></div>
                    </div>
                    <div class="h-10 bg-white/5 rounded-xl w-3/4"></div>
                    <div
                        class="h-20 bg-white/5 rounded-xl w-full text-on-surface/50 text-xs flex items-center justify-center font-mono">
                        RETRIEVING NEURAL ARCHIVE NODE...</div>
                    <div class="w-full aspect-video bg-white/5 rounded-2xl"></div>
                    <div class="space-y-3">
                        <div class="h-4 bg-white/5 rounded w-full"></div>
                        <div class="h-4 bg-white/5 rounded w-full"></div>
                        <div class="h-4 bg-white/5 rounded w-2/3"></div>
                    </div>
                </div>
                <!-- Main Content Insertion -->
                <div id="modalArticleContent" class="hidden"></div>
            </div>
        </div>
    </div>

    <style>
        /* Custom styled scrollbar for premium look */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('insightModal');
            const backdrop = document.getElementById('modalBackdrop');
            const content = document.getElementById('modalContent');
            const body = document.getElementById('modalBody');
            const skeleton = document.getElementById('modalSkeleton');
            const articleContainer = document.getElementById('modalArticleContent');
            const closeBtn = document.getElementById('closeModalBtn');

            function openModal(url) {
                // Prevent body scroll
                document.body.style.overflow = 'hidden';

                // Reset classes to initial state before showing
                backdrop.className =
                    'absolute inset-0 bg-[#05020c]/85 backdrop-blur-xl opacity-0 transition-opacity duration-300';
                content.className =
                    'relative w-full max-w-4xl max-h-[85vh] bg-[#0d071d]/90 border border-white/10 rounded-[32px] overflow-hidden shadow-2xl flex flex-col transform scale-95 opacity-0 transition-all duration-300 z-10';

                // Show modal
                modal.classList.remove('hidden');
                modal.classList.add('flex');

                // Trigger reflow for transition
                void modal.offsetWidth;

                // Animate in
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');

                // Show skeleton, hide previous content
                skeleton.classList.remove('hidden');
                articleContainer.classList.add('hidden');
                articleContainer.innerHTML = '';

                // Fetch article content
                fetch(url)
                    .then(response => {
                        if (!response.ok) throw new Error('Network response error');
                        return response.text();
                    })
                    .then(html => {
                        // Parse HTML and extract the <article> tag
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const article = doc.querySelector('article');

                        if (article) {
                            // Extract only the inner content or specific blocks to fit nicely in our modal
                            articleContainer.innerHTML = article.innerHTML;

                            // Hide skeleton and reveal loaded article
                            skeleton.classList.add('hidden');
                            articleContainer.classList.remove('hidden');
                        } else {
                            // Fallback redirect if structure mismatch
                            window.location.href = url;
                        }
                    })
                    .catch(err => {
                        console.error('Error loading insight node details:', err);
                        // Fallback to direct navigation on error
                        window.location.href = url;
                    });
            }

            function closeModal() {
                document.body.style.overflow = '';

                // Animate out
                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0');
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');

                setTimeout(() => {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }, 300);
            }

            // Ensure inline handlers can call this function if needed
            window.closeModal = closeModal;

            // Intercept clicks on links pointing to insights1
            document.body.addEventListener('click', function(e) {
                const link = e.target.closest('a[href*="/insights1"]');
                if (link) {
                    e.preventDefault();
                    openModal(link.getAttribute('href'));
                }
            });

            // Close button click
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closeModal();
            });

            // Click on backdrop / outside the modal card to close
            modal.addEventListener('click', function(e) {
                // Only close if the click target is the modal overlay itself or the backdrop,
                // NOT the modal card or any of its children
                if (e.target === modal || e.target === backdrop) {
                    closeModal();
                }
            });

            // Escape key to close
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });

            // Support deep linking on page load
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            if (id && window.location.pathname.includes('/insights')) {
                openModal(`/insights1?id=${id}`);
            }
        });
    </script>
@endsection
