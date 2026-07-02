@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Gallery Asset Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-3xl mx-auto space-y-6">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Visual Node Gallery Asset Details</h3>
            <p class="text-xs text-on-surface-variant">Telemetry for gallery asset node #{{ $asset->id }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.gallery.edit', $asset) }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-primary-container/20 hover:bg-primary-container/30 text-xs text-primary font-semibold flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">edit</span> Edit Asset
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
            </a>
        </div>
    </div>

    <!-- Media Display Canvas -->
    <div class="space-y-4">
        <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Visual Output Preview</span>
        <div class="relative w-full overflow-hidden rounded-xl border border-white/10 bg-black/40 flex items-center justify-center min-h-[300px]">
            @php
                $imageUrl = $asset->upload_method === 'upload' ? asset('storage/' . $asset->file_path) : $asset->external_url;
            @endphp

            @if($asset->media_type === 'image')
                <img src="{{ $imageUrl }}" alt="{{ $asset->title }}" class="w-full max-h-[450px] object-contain">
            @else
                @if($asset->upload_method === 'upload')
                    <video src="{{ $imageUrl }}" controls class="w-full max-h-[450px]"></video>
                @else
                    @if(str_contains($imageUrl, 'youtube.com/embed') || str_contains($imageUrl, 'youtu.be') || str_contains($imageUrl, 'youtube.com/watch'))
                        @php
                            // Format YouTube link into embed url if not already formatted
                            $embedUrl = $imageUrl;
                            if (str_contains($imageUrl, 'watch?v=')) {
                                $parts = parse_url($imageUrl);
                                parse_str($parts['query'] ?? '', $query);
                                $embedUrl = 'https://www.youtube.com/embed/' . ($query['v'] ?? '');
                            } elseif (str_contains($imageUrl, 'youtu.be/')) {
                                $videoId = substr(strrchr($imageUrl, "/"), 1);
                                $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                            }
                        @endphp
                        <iframe class="w-full aspect-video" src="{{ $embedUrl }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                        <!-- General Link/Video fallback -->
                        <div class="text-center p-8 space-y-4">
                            <span class="material-symbols-outlined text-secondary text-5xl opacity-45">smart_display</span>
                            <p class="text-sm text-on-surface">External video source cannot be embedded directly.</p>
                            <a href="{{ $imageUrl }}" target="_blank" class="inline-flex items-center gap-1.5 py-2 px-4 rounded-lg bg-secondary/20 hover:bg-secondary/30 text-secondary border border-secondary/30 font-semibold text-xs transition-colors">
                                <span class="material-symbols-outlined text-sm">open_in_new</span> Open Video Link
                            </a>
                        </div>
                    @endif
                @endif
            @endif
        </div>
    </div>

    <!-- Metadata Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-white/10">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Asset Title</span>
            <p class="text-sm font-semibold text-on-surface">{{ $asset->title }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">System Category</span>
            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs bg-secondary/10 text-secondary border border-secondary/20 font-semibold">
                {{ $asset->category }}
            </span>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Specification Coordinates</span>
            <div class="flex gap-2 text-xs font-label-mono text-on-surface-variant mt-1">
                <span class="px-2 py-0.5 rounded bg-white/5 border border-white/5 uppercase">{{ $asset->media_type }}</span>
                <span class="px-2 py-0.5 rounded bg-white/5 border border-white/5 uppercase">{{ $asset->upload_method }}</span>
                @if($asset->is_featured)
                    <span class="px-2 py-0.5 rounded bg-accent/10 border border-accent/20 text-accent font-semibold uppercase">Featured</span>
                @endif
            </div>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Media Source URL / File Coordinate</span>
            @if($asset->upload_method === 'upload')
                <p class="text-xs font-label-mono text-on-surface truncate" title="{{ $asset->file_path }}">
                    storage/{{ $asset->file_path }}
                </p>
            @else
                <p class="text-xs font-label-mono text-primary truncate hover:underline" title="{{ $asset->external_url }}">
                    <a href="{{ $asset->external_url }}" target="_blank">{{ $asset->external_url }}</a>
                </p>
            @endif
        </div>
    </div>

    <!-- Description -->
    @if($asset->description)
        <div class="pt-4 border-t border-white/10 space-y-2">
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Asset Narrative</span>
            <div class="prose prose-invert max-w-none text-on-surface-variant text-sm leading-relaxed p-4 rounded-xl bg-white/5 border border-white/5">
                {!! $asset->description !!}
            </div>
        </div>
    @endif
</div>
@endsection
