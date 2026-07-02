@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Overview')

@section('content')
<!-- Row 1: Key Metric Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-7 gap-4">
    <!-- Metric 1: Inquiries -->
    <div class="glass-card p-4 rounded-xl flex flex-col justify-between h-32">
        <div class="flex justify-between items-start">
            <span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">Inquiries</span>
            <span class="material-symbols-outlined text-secondary text-lg">forum</span>
        </div>
        <div>
            <h3 class="font-display text-2xl font-bold text-white leading-none">{{ $inquiriesCount }}</h3>
            <p class="text-[9px] text-on-surface-variant mt-1">contact messages</p>
        </div>
    </div>
    <!-- Metric 2: Events -->
    <div class="glass-card p-4 rounded-xl flex flex-col justify-between h-32">
        <div class="flex justify-between items-start">
            <span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">Events</span>
            <span class="material-symbols-outlined text-accent text-lg">event_available</span>
        </div>
        <div>
            <h3 class="font-display text-2xl font-bold text-white leading-none">{{ $eventsCount }}</h3>
            <p class="text-[9px] text-on-surface-variant mt-1">scheduled summits</p>
        </div>
    </div>
    <!-- Metric 3: Blogs -->
    <div class="glass-card p-4 rounded-xl flex flex-col justify-between h-32">
        <div class="flex justify-between items-start">
            <span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">Blogs</span>
            <span class="material-symbols-outlined text-purple-400 text-lg">article</span>
        </div>
        <div>
            <h3 class="font-display text-2xl font-bold text-white leading-none">{{ $blogsCount }}</h3>
            <p class="text-[9px] text-on-surface-variant mt-1">published articles</p>
        </div>
    </div>
    <!-- Metric 4: Services -->
    <div class="glass-card p-4 rounded-xl flex flex-col justify-between h-32">
        <div class="flex justify-between items-start">
            <span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">Services</span>
            <span class="material-symbols-outlined text-emerald-400 text-lg">settings_applications</span>
        </div>
        <div>
            <h3 class="font-display text-2xl font-bold text-white leading-none">{{ $servicesCount }}</h3>
            <p class="text-[9px] text-on-surface-variant mt-1">active offerings</p>
        </div>
    </div>
    <!-- Metric 5: Projects -->
    <div class="glass-card p-4 rounded-xl flex flex-col justify-between h-32">
        <div class="flex justify-between items-start">
            <span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">Projects</span>
            <span class="material-symbols-outlined text-amber-400 text-lg">folder_special</span>
        </div>
        <div>
            <h3 class="font-display text-2xl font-bold text-white leading-none">{{ $projectsCount }}</h3>
            <p class="text-[9px] text-on-surface-variant mt-1">portfolio cases</p>
        </div>
    </div>
    <!-- Metric 6: Registrations -->
    <div class="glass-card p-4 rounded-xl flex flex-col justify-between h-32 border-accent/25 shadow-[0_0_10px_rgba(255,46,147,0.05)]">
        <div class="flex justify-between items-start">
            <span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">Registrations</span>
            <span class="material-symbols-outlined text-pink-400 text-lg font-bold">how_to_reg</span>
        </div>
        <div>
            <h3 class="font-display text-2xl font-bold text-white leading-none">{{ $registrationsCount }}</h3>
            <p class="text-[9px] text-accent mt-1">event seats booked</p>
        </div>
    </div>
    <!-- Metric 7: Project Reviews -->
    <div class="glass-card p-4 rounded-xl flex flex-col justify-between h-32 relative group hover:border-cyan-400/30 transition-all">
        <div class="flex justify-between items-start">
            <span class="text-[10px] font-mono text-on-surface-variant uppercase tracking-widest">Reviews</span>
            <span class="material-symbols-outlined text-cyan-400 text-lg">rate_review</span>
        </div>
        <div>
            <h3 class="font-display text-2xl font-bold text-white leading-none">
                {{ $projectReviewsCount }}
                @if($pendingReviewsCount > 0)
                    <span class="text-xs text-error font-mono font-bold" title="Pending approval">+{{ $pendingReviewsCount }}</span>
                @endif
            </h3>
            <p class="text-[9px] text-on-surface-variant mt-1">project reviews</p>
        </div>
    </div>
</div>

<!-- Row 2: Recent Lists -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
    <!-- Recent Inquiries -->
    <div class="glass-card rounded-2xl p-6">
        <h4 class="text-white font-semibold text-base mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-secondary">forum</span>
            Recent Contact Submissions
        </h4>
        <div class="space-y-3 max-h-[450px] overflow-y-auto pr-1">
            @forelse($latestInquiries as $inquiry)
                <div class="p-3.5 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-all text-xs">
                    <div class="flex justify-between items-start gap-2">
                        <span class="font-bold text-white block">{{ $inquiry->name }}</span>
                        <span class="text-[9px] text-on-surface-variant font-mono">{{ $inquiry->created_at->diffForHumans() }}</span>
                    </div>
                    <span class="text-[9px] text-secondary font-mono tracking-wider block mt-0.5">{{ $inquiry->email }}</span>
                    <span class="inline-block mt-2 px-2 py-0.5 rounded-full bg-secondary/10 text-secondary border border-secondary/20 text-[9px] font-bold uppercase">{{ $inquiry->department }}</span>
                    <p class="text-on-surface-variant italic mt-2 line-clamp-2">"{{ $inquiry->message }}"</p>
                </div>
            @empty
                <p class="text-xs text-on-surface-variant italic">No inquiry transmissions intercepted.</p>
            @endforelse
        </div>
    </div>

    <!-- Recent Event Bookings -->
    <div class="glass-card rounded-2xl p-6 border-accent/20">
        <h4 class="text-white font-semibold text-base mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-accent">how_to_reg</span>
            Recent Event Bookings
        </h4>
        <div class="space-y-3 max-h-[450px] overflow-y-auto pr-1">
            @forelse($latestRegistrations as $reg)
                <div class="p-3.5 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-all text-xs">
                    <div class="flex justify-between items-start gap-2">
                        <span class="font-bold text-white block">
                            {{ $reg->registration_type === 'team' ? ($reg->team_name ?? 'Team') : ($reg->full_name ?? 'Delegate') }}
                        </span>
                        <span class="text-[9px] text-on-surface-variant font-mono">{{ $reg->created_at->diffForHumans() }}</span>
                    </div>
                    <span class="text-[9px] text-accent font-mono tracking-wider block mt-0.5">{{ $reg->email }}</span>
                    <span class="text-[10px] text-white font-medium block mt-2">Event: <span class="text-accent">{{ $reg->event_name }}</span></span>
                    
                    <div class="flex gap-2 mt-2">
                        <span class="px-2 py-0.5 rounded-full bg-accent/15 text-accent border border-accent/25 text-[9px] font-bold uppercase">{{ $reg->registration_type }}</span>
                        @if($reg->pass_type)
                            <span class="px-2 py-0.5 rounded-full bg-white/5 text-on-surface-variant border border-white/10 text-[9px] font-mono">{{ $reg->pass_type }}</span>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-xs text-on-surface-variant italic">No event bookings received yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Recent Project Reviews -->
    <div class="glass-card rounded-2xl p-6 border-cyan-400/10">
        <h4 class="text-white font-semibold text-base mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-cyan-400">rate_review</span>
            Recent Project Reviews
        </h4>
        <div class="space-y-3 max-h-[450px] overflow-y-auto pr-1">
            @forelse($latestProjectReviews as $review)
                <div class="p-3.5 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-all text-xs">
                    <div class="flex justify-between items-start gap-2">
                        <span class="font-bold text-white block">{{ $review->client_name }}</span>
                        <span class="text-[9px] text-on-surface-variant font-mono">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                    <span class="text-[9px] text-cyan-400 font-mono tracking-wider block mt-0.5">{{ $review->client_role }}</span>
                    @if($review->project)
                        <span class="text-[9px] text-on-surface-variant font-mono mt-1 block">Project: <strong class="text-white">{{ $review->project->title }}</strong></span>
                    @endif
                    
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center gap-1 text-amber-400">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' {{ $i <= $review->rating ? 1 : 0 }};">star</span>
                            @endfor
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[8px] font-bold uppercase {{ $review->status === 'approved' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : ($review->status === 'rejected' ? 'bg-error/10 text-error border border-error/20' : 'bg-amber-500/10 text-amber-400 border border-amber-500/20') }}">
                            {{ $review->status }}
                        </span>
                    </div>
                    <p class="text-on-surface-variant italic mt-2 line-clamp-2">"{{ $review->quote_text }}"</p>
                </div>
            @empty
                <p class="text-xs text-on-surface-variant italic">No project reviews submitted yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection