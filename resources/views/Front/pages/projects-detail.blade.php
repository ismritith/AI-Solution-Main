@extends('Front.layouts.app')

@section('title')
{{ $project->title ?? 'Project Details' }} | AI-Solutions
@endsection

@section('styles')
    <style>
        .accent-glow-purple {
            background: radial-gradient(circle, rgba(165, 16, 180, 0.15) 0%, rgba(8, 3, 19, 0) 70%);
        }
        .accent-glow-cyan {
            background: radial-gradient(circle, rgba(3, 181, 211, 0.1) 0%, rgba(8, 3, 19, 0) 70%);
        }
    </style>
@endsection

@section('content')
@if($project)
    <!-- Hero Section -->
    <section class="max-w-container-max mx-auto px-gutter py-10 relative">
        <div class="relative overflow-hidden rounded-3xl h-[500px] mb-12 border border-white/10 shadow-2xl">
            @if($project->cover_image)
                <img class="w-full h-full object-cover" alt="{{ $project->title }}" src="{{ asset($project->cover_image) }}"/>
            @else
                <div class="w-full h-full bg-gradient-to-br from-primary to-surface-dark flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-8xl opacity-20">widgets</span>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-[#080313] via-[#080313]/30 to-transparent"></div>
        </div>
        
        <div class="max-w-3xl space-y-6">
            <span class="inline-block px-4 py-1.5 rounded-full bg-secondary/15 border border-secondary/30 text-secondary font-mono text-xs uppercase font-bold">{{ $project->sector ?? 'Enterprise' }}</span>
            <h1 class="font-display text-4xl md:text-6xl font-extrabold text-white leading-tight">{{ $project->title }}</h1>
            @if($project->project_code)
                <div class="text-sm font-mono text-accent">PROJECT NODE: {{ $project->project_code }}</div>
            @endif
        </div>
    </section>

    <!-- Project Overview & Sidebar -->
    <section class="max-w-container-max mx-auto px-gutter pb-24 grid grid-cols-1 lg:grid-cols-12 gap-12 relative">
        <div class="absolute -left-48 top-0 w-96 h-96 accent-glow-purple -z-10"></div>
        
        <div class="lg:col-span-8 space-y-8">
            <h2 class="font-display text-3xl font-extrabold text-white">Project Overview</h2>
            <div class="space-y-6 text-on-surface-variant leading-relaxed font-body text-base">
                {!! $project->description !!}
            </div>
        </div>
        
        <aside class="lg:col-span-4">
            <div class="glass-card p-8 rounded-2xl sticky top-28 space-y-6">
                <h3 class="font-mono text-xs text-secondary uppercase tracking-widest font-bold">Metadata Specs</h3>
                
                <div class="space-y-4">
                    <div>
                        <span class="text-xs uppercase text-on-surface-variant/50 font-bold block mb-1">Sector / Category</span>
                        <span class="text-white font-display text-lg font-bold">{{ $project->sector }}</span>
                    </div>
                    
                    @if($project->footer_stat)
                        <div class="h-px bg-white/5"></div>
                        <div>
                            <span class="text-xs uppercase text-on-surface-variant/50 font-bold block mb-1">Impact Highlight</span>
                            <span class="text-white font-display text-lg font-bold">{{ $project->footer_stat }}</span>
                        </div>
                    @endif

                    @if($project->rating)
                        <div class="h-px bg-white/5"></div>
                        <div>
                            <span class="text-xs uppercase text-on-surface-variant/50 font-bold block mb-1">Efficacy Rating</span>
                            <div class="flex items-center gap-1.5 text-accent">
                                <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="font-mono font-bold">{{ $project->rating }} / 5.00</span>
                            </div>
                        </div>
                    @endif

                    @if($project->estimated_date)
                        <div class="h-px bg-white/5"></div>
                        <div>
                            <span class="text-xs uppercase text-on-surface-variant/50 font-bold block mb-1">Timeline / Target</span>
                            <span class="text-white font-display text-lg font-bold">{{ $project->estimated_date }}</span>
                        </div>
                    @endif

                    @if($project->tech_stack)
                        <div class="h-px bg-white/5"></div>
                        <div>
                            <span class="text-xs uppercase text-on-surface-variant/50 font-bold block mb-1">Technologies</span>
                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach(explode(',', $project->tech_stack) as $tech)
                                    <span class="px-3 py-1.5 rounded-xl bg-white/5 border border-white/10 text-xs font-mono text-on-surface-variant">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </aside>
    </section>

    <!-- Key Results / Metrics -->
    @if($project->metric1_lbl || $project->metric2_lbl || $project->metric3_lbl)
        <section class="max-w-container-max mx-auto px-gutter pb-24">
            <div class="text-center mb-16">
                <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] font-bold block mb-2">Metrics Observed</span>
                <h2 class="font-display text-3xl md:text-5xl font-extrabold text-white">Performance Efficacy</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @if($project->metric1_lbl)
                    <div class="glass-card p-10 rounded-2xl text-center group hover:border-secondary/40 transition-all">
                        <span class="text-secondary font-display text-5xl font-bold mb-4 block group-hover:scale-105 transition-transform">{{ $project->metric1_val }}</span>
                        <h4 class="font-display text-xl font-bold text-white mb-2">{{ $project->metric1_lbl }}</h4>
                    </div>
                @endif
                
                @if($project->metric2_lbl)
                    <div class="glass-card p-10 rounded-2xl text-center group hover:border-accent/40 transition-all">
                        <span class="text-accent font-display text-5xl font-bold mb-4 block group-hover:scale-105 transition-transform">{{ $project->metric2_val }}</span>
                        <h4 class="font-display text-xl font-bold text-white mb-2">{{ $project->metric2_lbl }}</h4>
                    </div>
                @endif
                
                @if($project->metric3_lbl)
                    <div class="glass-card p-10 rounded-2xl text-center group hover:border-white/20 transition-all">
                        <span class="text-white font-display text-5xl font-bold mb-4 block group-hover:scale-105 transition-transform">{{ $project->metric3_val }}</span>
                        <h4 class="font-display text-xl font-bold text-white mb-2">{{ $project->metric3_lbl }}</h4>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Review CTA & Approved Reviews Section -->
    <section class="max-w-container-max mx-auto px-gutter pb-24" data-aos="fade-up">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-stretch">
            
            <!-- Left: Review CTA Button -->
            <div class="glass-card rounded-3xl p-8 md:p-10 border-secondary/20 flex flex-col justify-between" id="review-cta-card">
                <div>
                    <h3 class="font-display text-2xl font-extrabold text-white mb-2">Share Your Feedback</h3>
                    <p class="text-on-surface-variant text-xs mb-8">Deploy your experience and insights regarding this project node.</p>

                    @if(session('success'))
                        <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-xl p-4 flex items-center gap-3 text-emerald-400 text-sm mb-6 animate-pulse">
                            <span class="material-symbols-outlined">check_circle</span>
                            {{ session('success') }}
                        </div>
                    @endif

                    <button onclick="openReviewModal()" class="w-full btn-gradient py-4 rounded-xl font-display text-sm text-white font-bold shadow-lg shadow-secondary/15 transform hover:scale-[1.02] transition-transform flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">rate_review</span> Transmit Review Node
                    </button>
                </div>
            </div>
            
            <!-- Right: Approved Testimonials Carousel -->
            <div class="glass-card rounded-3xl p-8 md:p-10 border-accent/20 flex flex-col justify-between min-h-[350px]">
                <div class="h-full flex flex-col justify-between relative">
                    <div>
                        <h3 class="font-display text-2xl font-extrabold text-white mb-2">Efficacy Records</h3>
                        <p class="text-on-surface-variant text-xs mb-6">Verified client telemetry for this deployment node.</p>
                        
                        @if($approvedReviews->isEmpty())
                            <div class="h-48 flex items-center justify-center text-center text-on-surface-variant italic text-sm border border-dashed border-white/10 rounded-2xl">
                                No telemetry records approved for this node yet.
                            </div>
                        @else
                            <!-- Slides Container -->
                            <div class="relative overflow-hidden min-h-[220px]" id="review-carousel">
                                @foreach($approvedReviews as $review)
                                    <div class="review-slide transition-all duration-500 absolute inset-x-0 top-0 {{ $loop->first ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none' }}" data-index="{{ $loop->index }}">
                                        <span class="material-symbols-outlined text-accent/10 text-7xl absolute -top-4 -right-4 font-bold select-none pointer-events-none">format_quote</span>
                                        <p class="font-body text-on-surface-variant italic text-sm md:text-base leading-relaxed mb-6 pr-6 relative z-10">
                                            "{!! strip_tags($review->quote_text) !!}"
                                        </p>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center shrink-0 border border-accent/20">
                                                <span class="material-symbols-outlined text-accent text-xl">account_circle</span>
                                            </div>
                                            <div>
                                                <div class="font-display text-sm font-bold text-white flex items-center gap-1">
                                                    {{ $review->client_name }}
                                                    <span class="material-symbols-outlined text-emerald-400 text-xs font-bold" title="Verified Efficacy">check_circle</span>
                                                </div>
                                                <div class="font-mono text-[10px] text-on-surface-variant">{{ $review->client_role }}</div>
                                                <div class="text-[9px] text-amber-400 font-label-mono mt-0.5">{{ str_repeat('★', $review->rating) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    @if($approvedReviews->count() > 1)
                        <div class="flex items-center justify-between mt-8 pt-4 border-t border-white/5">
                            <div class="flex gap-1.5">
                                @foreach($approvedReviews as $review)
                                    <button class="carousel-dot w-2 h-2 rounded-full transition-all duration-300 {{ $loop->first ? 'bg-accent w-4' : 'bg-white/20' }}" data-index="{{ $loop->index }}"></button>
                                @endforeach
                            </div>
                            <div class="flex gap-2">
                                <button id="prev-review-btn" class="w-8 h-8 rounded-full border border-white/10 hover:border-accent/50 flex items-center justify-center text-on-surface-variant hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                                </button>
                                <button id="next-review-btn" class="w-8 h-8 rounded-full border border-white/10 hover:border-accent/50 flex items-center justify-center text-on-surface-variant hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>

    <!-- Review Modal Popup -->
    <div id="reviewModal" class="fixed inset-0 z-50 hidden overflow-y-auto flex items-center justify-center p-4">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/80 backdrop-blur-md" onclick="closeReviewModal()"></div>
        
        <!-- Modal Body -->
        <div class="glass-card w-full max-w-2xl rounded-3xl p-8 md:p-10 relative z-10 max-h-[90vh] overflow-y-auto border-secondary/20">
            <button onclick="closeReviewModal()" class="absolute top-6 right-6 text-on-surface-variant hover:text-white transition-colors">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>

            <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white mb-2">Share Your Feedback</h3>
            <p class="text-on-surface-variant text-sm mb-6">Deploy your experience regarding <span class="text-secondary font-semibold">{{ $project->title }}</span></p>

            @if($errors->any())
                <div class="bg-error/10 border border-error/30 rounded-xl p-4 flex flex-col gap-2 text-error text-sm mb-6">
                    <div class="flex items-center gap-3 font-bold text-white">
                        <span class="material-symbols-outlined text-error">error</span>
                        Transmission Blocked
                    </div>
                    <ul class="list-disc pl-5 space-y-1 text-on-surface-variant">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('project.review') }}" method="POST" class="space-y-6" data-ajax="true">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider block font-bold">Identity (Name) <span class="text-error">*</span></label>
                        <input type="text" name="client_name" required maxlength="255" placeholder="Sarah Connor" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all" pattern="^[A-Za-z\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                    </div>
                    <div class="space-y-2">
                        <label class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider block font-bold">Professional Role <span class="text-error">*</span></label>
                        <input type="text" name="client_role" required maxlength="255" placeholder="Lead Architect, Cyberdyne" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&,]/g, '')">
                    </div>
                    <div class="space-y-2">
                        <label class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider block font-bold">Email Address <span class="text-error">*</span></label>
                        <input type="email" name="email" required maxlength="255" placeholder="sarah@cyberdyne.com" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider block font-bold">Phone Number (Optional)</label>
                        <input type="text" name="phone" maxlength="20" placeholder="+1 (555) 012-3456" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all" pattern="^[\+\d\s\-\(\)]+$" title="Only phone numbers allowed" oninput="this.value = this.value.replace(/[^\+\d\s\-\(\)]/g, '')">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider block font-bold">Efficacy Rating <span class="text-error">*</span></label>
                    <div class="flex items-center gap-1.5" id="star-rating-container">
                        <input type="hidden" name="rating" id="rating-input-value" value="5">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="star-btn cursor-pointer transition-all focus:outline-none" data-rating="{{ $i }}">
                                <span class="material-symbols-outlined text-accent text-3xl transition-colors duration-150" style="font-variation-settings: 'FILL' 1;">star</span>
                            </button>
                        @endfor
                    </div>
                </div>

                <div class="space-y-2 relative">
                    <div class="flex justify-between items-end mb-1">
                        <label class="font-mono text-[10px] text-on-surface-variant uppercase tracking-wider block font-bold">Detailed Review <span class="text-error">*</span></label>
                        <span id="word-count-display" class="font-mono text-[10px] text-on-surface-variant"><span id="word-count">0</span> / 250 words</span>
                    </div>
                    <textarea id="quote-textarea" name="quote_text" rows="4" required placeholder="Describe the performance, reliability, and deployment outcome..." class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all"></textarea>
                    <div id="word-limit-warning" class="text-error text-xs hidden mt-1">Maximum word limit (250) reached.</div>
                </div>

                <div class="pt-4 flex justify-end gap-4 border-t border-white/5">
                    <button type="button" onclick="closeReviewModal()" class="px-6 py-3 rounded-xl font-medium text-sm text-on-surface-variant hover:bg-white/5 transition-all">Cancel</button>
                    <button type="submit" class="px-8 py-3 rounded-xl font-bold text-sm text-white btn-gradient">Submit Review</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Review Modal
        function openReviewModal() {
            const modal = document.getElementById('reviewModal');
            if(modal) {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        }

        function closeReviewModal() {
            const modal = document.getElementById('reviewModal');
            if(modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if($errors->any())
                openReviewModal();
            @endif

            // Word counter
            const textarea = document.getElementById('quote-textarea');
            const wordCountDisplay = document.getElementById('word-count');
            const warningDisplay = document.getElementById('word-limit-warning');
            
            if(textarea) {
                textarea.addEventListener('input', function() {
                    const words = this.value.match(/\S+/g);
                    const wordCount = words ? words.length : 0;
                    
                    wordCountDisplay.textContent = wordCount;
                    
                    if (wordCount > 250) {
                        warningDisplay.classList.remove('hidden');
                        wordCountDisplay.parentElement.classList.add('text-error');
                        wordCountDisplay.parentElement.classList.remove('text-on-surface-variant');
                        this.value = words.slice(0, 250).join(' ') + ' ';
                        wordCountDisplay.textContent = 250;
                    } else {
                        warningDisplay.classList.add('hidden');
                        wordCountDisplay.parentElement.classList.remove('text-error');
                        wordCountDisplay.parentElement.classList.add('text-on-surface-variant');
                    }
                });
            }

            // Star Rating
            const starContainer = document.getElementById('star-rating-container');
            if (starContainer) {
                const starBtns = starContainer.querySelectorAll('.star-btn');
                const ratingInput = document.getElementById('rating-input-value');
                
                function updateStars(rating) {
                    starBtns.forEach(btn => {
                        const btnRating = parseInt(btn.getAttribute('data-rating'));
                        const starIcon = btn.querySelector('span');
                        if (btnRating <= rating) {
                            starIcon.className = 'material-symbols-outlined text-accent text-3xl transition-colors duration-150';
                            starIcon.style.fontVariationSettings = "'FILL' 1";
                        } else {
                            starIcon.className = 'material-symbols-outlined text-on-surface-variant/40 text-3xl transition-colors duration-150';
                            starIcon.style.fontVariationSettings = "'FILL' 0";
                        }
                    });
                }

                starBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const rating = parseInt(this.getAttribute('data-rating'));
                        ratingInput.value = rating;
                        updateStars(rating);
                    });

                    btn.addEventListener('mouseenter', function() {
                        const rating = parseInt(this.getAttribute('data-rating'));
                        updateStars(rating);
                    });
                });

                starContainer.addEventListener('mouseleave', function() {
                    const currentRating = parseInt(ratingInput.value);
                    updateStars(currentRating);
                });

                updateStars(parseInt(ratingInput.value));
            }

            // Review Carousel
            const slides = document.querySelectorAll('.review-slide');
            const dots = document.querySelectorAll('.carousel-dot');
            const prevBtn = document.getElementById('prev-review-btn');
            const nextBtn = document.getElementById('next-review-btn');
            let currentIndex = 0;
            
            function showSlide(index) {
                slides.forEach((slide, i) => {
                    if (i === index) {
                        slide.classList.remove('opacity-0', 'z-0', 'pointer-events-none');
                        slide.classList.add('opacity-100', 'z-10');
                    } else {
                        slide.classList.remove('opacity-100', 'z-10');
                        slide.classList.add('opacity-0', 'z-0', 'pointer-events-none');
                    }
                });
                
                dots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.remove('bg-white/20');
                        dot.classList.add('bg-accent', 'w-4');
                    } else {
                        dot.classList.remove('bg-accent', 'w-4');
                        dot.classList.add('bg-white/20');
                    }
                });
                currentIndex = index;
            }
            
            if(prevBtn && nextBtn) {
                prevBtn.addEventListener('click', () => {
                    let nextIdx = currentIndex - 1;
                    if (nextIdx < 0) nextIdx = slides.length - 1;
                    showSlide(nextIdx);
                });
                
                nextBtn.addEventListener('click', () => {
                    let nextIdx = currentIndex + 1;
                    if (nextIdx >= slides.length) nextIdx = 0;
                    showSlide(nextIdx);
                });
            }
            
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const idx = parseInt(dot.getAttribute('data-index'));
                    showSlide(idx);
                });
            });
            
            if (slides.length > 1) {
                setInterval(() => {
                    let nextIdx = currentIndex + 1;
                    if (nextIdx >= slides.length) nextIdx = 0;
                    showSlide(nextIdx);
                }, 6000);
            }
        });
    </script>
@else
    <div class="max-w-4xl mx-auto text-center py-20">
        <h2 class="text-white font-bold text-2xl">Project Record Offline</h2>
        <p class="text-on-surface-variant mt-2">The requested case study could not be located in our active nodes.</p>
    </div>
@endif
@endsection