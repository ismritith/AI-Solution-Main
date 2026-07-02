@extends('Front.layouts.app')

@section('title', 'Visual Neural Gallery | AI-Solutions')

@section('content')
    <!-- Glowing background blur blobs -->
    <div class="bg-glow-main top-[10%] left-[10%] opacity-55"></div>
    <div class="bg-glow-secondary top-[60%] right-[10%] opacity-40"></div>

    <!-- Banner Section -->
    <section class="relative pt-24 pb-16 md:pt-36 md:pb-24 overflow-hidden">
        <div class="max-w-container-max mx-auto px-gutter relative z-10" data-aos="fade-up">
            <div class="max-w-3xl space-y-6">
                <div class="flex items-center gap-2">
                    <span
                        class="font-mono text-xs uppercase tracking-widest text-secondary px-3 py-1 bg-secondary/15 rounded-full border border-secondary/30 font-bold">Digital
                        Showroom</span>
                    <div class="h-[1px] w-12 bg-white/10"></div>
                </div>
                <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
                    Visualizing the <span class="text-gradient-purple">Future.</span>
                </h1>
                <p class="font-body text-base md:text-lg text-on-surface-variant max-w-xl leading-relaxed">
                    Explore our collection of AI-generated masterpieces and neural telemetry visualizations. Every pixel is
                    a testament to the seamless fusion of human creativity and advanced intelligence.
                </p>
            </div>
        </div>

        <!-- Background ribbons / visuals with soft opacity -->
        <div class="absolute top-0 right-0 w-full h-full -z-10 opacity-20 pointer-events-none">
            <img class="w-full h-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2JpNL0931zWLkqwtv2jEXkQ6PrU0w4o4fFsvnSY73irACRp49twzkpOgfwQSDT9RiofY72SJbzlX1OT17cQxWoajzzBMV-zWOFJvNZFOOYoBEFv_hFea2qlfekn-MbsnZCFbbm3DamiTU24XbYD8KXk5hafroK1ncKvpKNYXxIRSHGj1VYQpg4Em4VfhyNyzuW3f1xgoYdd9ML19dqqtRW3BMy5apqmDr3SIZuxsHZqJXcCPeb0KdvkHs5dSyq55irZA85AY8dMAm" />
        </div>
    </section>

    @php
        // Maps known gallery category labels (case-insensitive) to a Material Symbols icon,
        // so pills feel purpose-built rather than generic. Unrecognised categories fall back
        // to a neutral "label" icon, so this never breaks when new categories are added in the admin panel.
        // $categoryIconMap = [
        //     'events' => 'event', 'event' => 'event',
        //     'projects' => 'rocket_launch', 'project' => 'rocket_launch',
        //     'team' => 'groups', 'teams' => 'groups', 'our team' => 'groups',
        //     'workshops' => 'school', 'workshop' => 'school',
        //     'office' => 'apartment', 'office culture' => 'apartment',
        //     'awards' => 'trophy', 'award' => 'trophy', 'awards & recognition' => 'trophy',
        //     'conference' => 'mic', 'conferences' => 'mic',
        //     'product' => 'inventory_2', 'products' => 'inventory_2',
        //     'product launch' => 'rocket_launch', 'product launches' => 'rocket_launch',
        //     'demo' => 'play_circle', 'demos' => 'play_circle', 'product demos' => 'play_circle',
        //     'partnership' => 'handshake', 'partnerships' => 'handshake',
        //     'community' => 'diversity_3',
        // ];

        $categoryIconMap = [
            'projects' => 'rocket_launch',
            'events' => 'event',
            'team' => 'groups',
            'demos' => 'play_circle',
            'innovation' => 'psychology',
            'awards & recognition' => 'emoji_events',
        ];

        $resolveCategoryIcon = function ($cat) use ($categoryIconMap) {
            return $categoryIconMap[strtolower(trim($cat))] ?? 'label';
        };
    @endphp

    <!-- Images Section -->
    <section class="py-12 max-w-container-max mx-auto px-gutter">
        <div class="flex items-center gap-6 mb-8" data-aos="fade-right">
            <div>
                <h2 class="font-display text-3xl font-extrabold text-white">Neural Image Gallery</h2>
                <p class="text-xs text-on-surface-variant mt-1">Moments from our events, project deliveries, and the team
                    building the future of work</p>
            </div>
            <div class="h-px bg-white/10 flex-grow"></div>
        </div>

        {{-- Image Category Filter Pills --}}
        @if ($imageCategories->isNotEmpty())
            <div class="flex flex-wrap gap-2 mb-8">
                <a href="{{ request()->fullUrlWithQuery(['img_cat' => null, 'img_page' => null]) }}"
                    class="flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-mono font-bold uppercase tracking-widest transition-all border
                      {{ !$imgCatFilter ? 'bg-secondary text-white border-secondary shadow-lg shadow-secondary/30' : 'border-white/10 text-on-surface-variant hover:border-secondary/40 hover:text-white' }}">
                    <span class="material-symbols-outlined text-[14px]">apps</span>
                    All
                </a>
                @foreach ($imageCategories as $cat)
                    <a href="{{ request()->fullUrlWithQuery(['img_cat' => $cat, 'img_page' => null]) }}"
                        class="flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-mono font-bold uppercase tracking-widest transition-all border
                          {{ $imgCatFilter === $cat ? 'bg-secondary text-white border-secondary shadow-lg shadow-secondary/30' : 'border-white/10 text-on-surface-variant hover:border-secondary/40 hover:text-white' }}">
                        <span class="material-symbols-outlined text-[14px]">{{ $resolveCategoryIcon($cat) }}</span>
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($images as $image)
                @php
                    $imageUrl =
                        $image->upload_method === 'upload'
                            ? asset('storage/' . $image->file_path)
                            : $image->external_url;
                @endphp
                <div class="relative group overflow-hidden rounded-2xl glass-card h-[26rem] md:h-[30rem] flex flex-col justify-end cursor-pointer"
                    data-aos="fade-up"
                    onclick="openImageModal('{{ $imageUrl }}', '{{ addslashes($image->title) }}', '{{ addslashes(strip_tags($image->description)) }}')">
                    <div class="absolute inset-0 z-0 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            src="{{ $imageUrl }}" alt="{{ $image->title }}" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-primary via-primary/40 to-transparent pointer-events-none">
                        </div>
                    </div>

                    <!-- Zoom Overlay -->
                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                        <div
                            class="w-14 h-14 rounded-full bg-secondary/20 border border-secondary/40 flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white group-hover:shadow-[0_0_20px_rgba(165,16,180,0.6)] transition-all duration-300">
                            <span class="material-symbols-outlined text-2xl leading-none">zoom_in</span>
                        </div>
                    </div>

                    <div class="relative z-10 p-7 space-y-1.5 pointer-events-none">
                        <span
                            class="font-mono text-[10px] text-secondary uppercase font-bold tracking-widest flex items-center gap-1.5">
                            <span
                                class="material-symbols-outlined text-[13px]">{{ $resolveCategoryIcon($image->category) }}</span>
                            {{ $image->category }}
                        </span>
                        <h4 class="text-white font-display font-bold text-xl">{{ $image->title }}</h4>
                        <div class="text-xs text-on-surface-variant leading-relaxed line-clamp-2 mt-1">
                            {!! strip_tags($image->description) !!}
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full py-12 flex flex-col items-center justify-center text-center text-on-surface-variant border border-dashed border-white/10 rounded-2xl">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant/40 mb-2">image</span>
                    <p class="text-sm">
                        {{ $imgCatFilter ? "No images found in \"$imgCatFilter\" category." : 'No image assets registered yet.' }}
                    </p>
                </div>
            @endforelse
        </div>

        @if ($images->hasPages())
            <div class="mt-10 flex justify-center">
                <div class="flex items-center gap-2 flex-wrap">
                    {{-- Previous --}}
                    @if ($images->onFirstPage())
                        <span
                            class="px-4 py-2 rounded-xl bg-white/5 text-on-surface-variant/40 text-sm font-mono cursor-not-allowed">←
                            Prev</span>
                    @else
                        <a href="{{ $images->previousPageUrl() }}"
                            class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 text-on-surface-variant hover:text-white hover:bg-white/10 text-sm font-mono transition-all">←
                            Prev</a>
                    @endif

                    {{-- Pages --}}
                    @foreach ($images->getUrlRange(1, $images->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="w-9 h-9 flex items-center justify-center rounded-xl text-sm font-mono transition-all
                        {{ $page == $images->currentPage() ? 'bg-secondary text-white shadow-lg shadow-secondary/30' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10 hover:text-white' }}">
                            {{ $page }}
                        </a>
                    @endforeach

                    {{-- Next --}}
                    @if ($images->hasMorePages())
                        <a href="{{ $images->nextPageUrl() }}"
                            class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 text-on-surface-variant hover:text-white hover:bg-white/10 text-sm font-mono transition-all">Next
                            →</a>
                    @else
                        <span
                            class="px-4 py-2 rounded-xl bg-white/5 text-on-surface-variant/40 text-sm font-mono cursor-not-allowed">Next
                            →</span>
                    @endif
                </div>
            </div>
        @endif
    </section>

    <!-- Videos Section -->
    <section class="py-12 max-w-container-max mx-auto px-gutter">
        <div class="flex items-center gap-6 mb-8" data-aos="fade-right">
            <div>
                <h2 class="font-display text-3xl font-extrabold text-white">Neural Video Showcase</h2>
                <p class="text-xs text-on-surface-variant mt-1">Dynamic recordings, interactive telemetry demos, and
                    explainer nodes</p>
            </div>
            <div class="h-px bg-white/10 flex-grow"></div>
        </div>

        {{-- Video Category Filter Pills --}}
        @if ($videoCategories->isNotEmpty())
            <div class="flex flex-wrap gap-2 mb-8">
                <a href="{{ request()->fullUrlWithQuery(['vid_cat' => null, 'vid_page' => null]) }}"
                    class="px-4 py-1.5 rounded-full text-xs font-mono font-bold uppercase tracking-widest transition-all border
                      {{ !$vidCatFilter ? 'bg-accent text-white border-accent shadow-lg shadow-accent/30' : 'border-white/10 text-on-surface-variant hover:border-accent/40 hover:text-white' }}">
                    All
                </a>
                @foreach ($videoCategories as $cat)
                    <a href="{{ request()->fullUrlWithQuery(['vid_cat' => $cat, 'vid_page' => null]) }}"
                        class="px-4 py-1.5 rounded-full text-xs font-mono font-bold uppercase tracking-widest transition-all border
                          {{ $vidCatFilter === $cat ? 'bg-accent text-white border-accent shadow-lg shadow-accent/30' : 'border-white/10 text-on-surface-variant hover:border-accent/40 hover:text-white' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($videos as $video)
                @php
                    $videoUrl =
                        $video->upload_method === 'upload'
                            ? asset('storage/' . $video->file_path)
                            : $video->external_url;
                @endphp
                <div class="relative group overflow-hidden rounded-2xl glass-card flex flex-col justify-end min-h-[260px] cursor-pointer"
                    data-aos="fade-up" onclick="openVideoModal('{{ $videoUrl }}', '{{ addslashes($video->title) }}')">
                    <div class="absolute inset-0 z-0 overflow-hidden bg-gradient-to-br from-[#120626] to-[#05020c]">
                        <div
                            class="absolute inset-0 bg-[radial-gradient(circle_at_center,_rgba(165,16,180,0.15)_0%,_transparent_70%)]">
                        </div>

                        <!-- Play Overlay Button -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-16 h-16 rounded-full bg-secondary/20 border border-secondary/40 flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white group-hover:scale-110 group-hover:shadow-[0_0_20px_rgba(165,16,180,0.6)] transition-all duration-300">
                                <span class="material-symbols-outlined text-4xl leading-none pl-1">play_arrow</span>
                            </div>
                        </div>

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-primary via-primary/50 to-transparent pointer-events-none">
                        </div>
                    </div>

                    <div class="relative z-10 p-6 space-y-1 pointer-events-none">
                        <span
                            class="font-mono text-[10px] text-accent uppercase font-bold tracking-widest">{{ $video->category }}</span>
                        <h4 class="text-white font-display font-bold text-lg flex items-center gap-1.5">
                            {{ $video->title }}
                            <span class="material-symbols-outlined text-sm text-accent">smart_display</span>
                        </h4>
                        <div class="text-[11px] text-on-surface-variant leading-relaxed line-clamp-2 mt-1">
                            {!! strip_tags($video->description) !!}
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full py-12 flex flex-col items-center justify-center text-center text-on-surface-variant border border-dashed border-white/10 rounded-2xl">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant/40 mb-2">smart_display</span>
                    <p class="text-sm">
                        {{ $vidCatFilter ? "No videos found in \"$vidCatFilter\" category." : 'No video assets registered yet.' }}
                    </p>
                </div>
            @endforelse
        </div>

        @if ($videos->hasPages())
            <div class="mt-10 flex justify-center">
                <div class="flex items-center gap-2 flex-wrap">
                    @if ($videos->onFirstPage())
                        <span
                            class="px-4 py-2 rounded-xl bg-white/5 text-on-surface-variant/40 text-sm font-mono cursor-not-allowed">←
                            Prev</span>
                    @else
                        <a href="{{ $videos->previousPageUrl() }}"
                            class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 text-on-surface-variant hover:text-white hover:bg-white/10 text-sm font-mono transition-all">←
                            Prev</a>
                    @endif

                    @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="w-9 h-9 flex items-center justify-center rounded-xl text-sm font-mono transition-all
                        {{ $page == $videos->currentPage() ? 'bg-accent text-white shadow-lg shadow-accent/30' : 'bg-white/5 border border-white/10 text-on-surface-variant hover:bg-white/10 hover:text-white' }}">
                            {{ $page }}
                        </a>
                    @endforeach

                    @if ($videos->hasMorePages())
                        <a href="{{ $videos->nextPageUrl() }}"
                            class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 text-on-surface-variant hover:text-white hover:bg-white/10 text-sm font-mono transition-all">Next
                            →</a>
                    @else
                        <span
                            class="px-4 py-2 rounded-xl bg-white/5 text-on-surface-variant/40 text-sm font-mono cursor-not-allowed">Next
                            →</span>
                    @endif
                </div>
            </div>
        @endif
    </section>

    <!-- CTA Waitlist early access Section — last block of page content, so it renders directly above the shared footer in Front.layouts.app -->
    <section class="py-20 max-w-container-max mx-auto px-gutter">
        <div class="glass-card rounded-[40px] p-12 text-center relative overflow-hidden" data-aos="zoom-in">
            <div
                class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-96 h-96 bg-glow-secondary opacity-40 pointer-events-none">
            </div>

            <div class="max-w-2xl mx-auto space-y-8 relative z-10">
                <h2 class="font-display text-3xl md:text-5xl font-extrabold text-white">
                    Want to see more of the <span class="text-gradient-coral italic">invisible?</span>
                </h2>
                <p class="font-body text-base text-on-surface-variant leading-relaxed">
                    Our proprietary generative engines are constantly evolving. Join our exclusive waitlist to get early
                    access to the next generation of AI visualization tools.
                </p>

                <form action="#" class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto pt-2">
                    <input
                        class="flex-1 bg-[#05020c] border border-white/5 focus:border-secondary px-5 py-3 rounded-xl text-white outline-none focus:ring-0 text-sm placeholder-on-surface-variant/40"
                        placeholder="Your developer email" type="email" required />
                    <a href="#" role="button" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="btn-gradient text-white px-8 py-3 rounded-xl font-body font-bold text-sm shadow-md shadow-secondary/15">
                        Join Early Access
                    </a>
                </form>
            </div>
        </div>
    </section>

    <!-- Glassmorphic Image Lightbox Modal -->
    <div id="imageModal"
        class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[#05020c]/90 backdrop-blur-md p-4 transition-all duration-300 opacity-0">
        <div class="absolute inset-0" onclick="closeImageModal()"></div>
        <div
            class="relative w-full max-w-4xl glass-card rounded-3xl overflow-hidden border border-white/10 z-10 transform scale-95 transition-all duration-300">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 bg-white/5 border-b border-white/5">
                <h4 id="imageModalTitle" class="text-white font-display font-bold text-lg">Gallery Asset</h4>
                <a href="javascript:void(0)" role="button" onclick="closeImageModal(); return false;"
                    class="text-on-surface-variant hover:text-white transition-colors flex items-center justify-center w-8 h-8 rounded-full bg-white/5 hover:bg-white/10">
                    <span class="material-symbols-outlined text-xl">close</span>
                </a>
            </div>
            <!-- Image container -->
            <div class="relative w-full max-h-[65vh] bg-black flex items-center justify-center overflow-hidden">
                <img id="imageModalImg" class="w-full h-full object-contain" src="" alt="" />
            </div>
            <p id="imageModalDesc" class="text-on-surface-variant text-sm leading-relaxed p-5"></p>
        </div>
    </div>

    <!-- Glassmorphic Video Lightbox Modal -->
    <div id="videoModal"
        class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[#05020c]/90 backdrop-blur-md p-4 transition-all duration-300 opacity-0">
        <div class="absolute inset-0" onclick="closeVideoModal()"></div>
        <div
            class="relative w-full max-w-4xl glass-card rounded-3xl overflow-hidden border border-white/10 z-10 transform scale-95 transition-all duration-300">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 bg-white/5 border-b border-white/5">
                <h4 id="videoModalTitle" class="text-white font-display font-bold text-lg">Video Preview</h4>
                <a href="javascript:void(0)" role="button" onclick="closeVideoModal(); return false;"
                    class="text-on-surface-variant hover:text-white transition-colors flex items-center justify-center w-8 h-8 rounded-full bg-white/5 hover:bg-white/10">
                    <span class="material-symbols-outlined text-xl">close</span>
                </a>
            </div>
            <!-- Aspect ratio container -->
            <div class="relative w-full aspect-video bg-black flex items-center justify-center">
                <div id="videoContainer" class="w-full h-full"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function openImageModal(url, title, description) {
            const modal = document.getElementById('imageModal');
            const modalTitle = document.getElementById('imageModalTitle');
            const modalDesc = document.getElementById('imageModalDesc');
            const img = document.getElementById('imageModalImg');

            modalTitle.textContent = title || 'Gallery Asset';
            modalDesc.textContent = description || '';
            img.src = url;
            img.alt = title || 'Gallery Asset';

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modal.querySelector('.transform').classList.remove('scale-95');
                modal.querySelector('.transform').classList.add('scale-100');
            }, 10);
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('imageModalImg');

            modal.classList.remove('opacity-100');
            modal.querySelector('.transform').classList.add('scale-95');
            modal.querySelector('.transform').classList.remove('scale-100');

            setTimeout(() => {
                modal.classList.add('hidden');
                img.src = '';
            }, 300);
        }

        function openVideoModal(url, title) {
            const modal = document.getElementById('videoModal');
            const modalTitle = document.getElementById('videoModalTitle');
            const container = document.getElementById('videoContainer');

            modalTitle.textContent = title || 'Video Node Registry';
            container.innerHTML = '';

            let html = '';
            // Check if it is a YouTube URL
            if (url.includes('youtube.com') || url.includes('youtu.be')) {
                // Ensure URL is using embed format
                let embedUrl = url;
                if (url.includes('watch?v=')) {
                    const videoId = url.split('v=')[1].split('&')[0];
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                } else if (url.includes('youtu.be/')) {
                    const videoId = url.split('youtu.be/')[1].split('?')[0];
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
                html =
                    `<iframe class="w-full h-full" src="${embedUrl}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            } else {
                // Local video file
                html =
                    `<video class="w-full h-full" controls autoplay><source src="${url}" type="video/mp4">Your browser does not support the video tag.</video>`;
            }

            container.innerHTML = html;
            modal.classList.remove('hidden');
            // Trigger reflow for animation
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modal.querySelector('.transform').classList.remove('scale-95');
                modal.querySelector('.transform').classList.add('scale-100');
            }, 10);
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const container = document.getElementById('videoContainer');

            modal.classList.remove('opacity-100');
            modal.querySelector('.transform').classList.add('scale-95');
            modal.querySelector('.transform').classList.remove('scale-100');

            setTimeout(() => {
                modal.classList.add('hidden');
                container.innerHTML = '';
            }, 300);
        }
    </script>
@endsection
