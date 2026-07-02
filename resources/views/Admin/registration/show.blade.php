@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Booking Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-3xl mx-auto space-y-6">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Booking Record Details</h3>
            <p class="text-xs text-on-surface-variant">Full specifications for booking node #{{ $registration->id }}</p>
        </div>
        <a href="{{ route('admin.registrations.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
            <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
        </a>
    </div>

    <!-- Booking Type Header Badge -->
    <div class="flex items-center gap-4">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $registration->registration_type === 'team' ? 'from-secondary/20 to-accent/10' : 'from-primary/20 to-secondary/10' }} flex items-center justify-center border {{ $registration->registration_type === 'team' ? 'border-secondary/20' : 'border-primary/20' }}">
            <span class="material-symbols-outlined text-2xl {{ $registration->registration_type === 'team' ? 'text-secondary' : 'text-primary' }}">
                {{ $registration->registration_type === 'team' ? 'groups' : 'person' }}
            </span>
        </div>
        <div>
            <h4 class="text-on-surface font-bold text-lg">
                {{ $registration->registration_type === 'team' ? $registration->team_name : $registration->full_name }}
            </h4>
            <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $registration->registration_type === 'team' ? 'bg-secondary/10 text-secondary border border-secondary/20' : 'bg-primary/10 text-primary border border-primary/20' }}">
                {{ ucfirst($registration->registration_type) }} Registration
            </span>
        </div>
    </div>

    <!-- Metadata Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-white/10">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Target Event</span>
            @if($registration->event)
                <a href="{{ route('admin.events.show', $registration->event) }}" class="text-sm font-semibold text-secondary hover:underline">
                    {{ $registration->event->title }}
                </a>
            @else
                <p class="text-sm font-semibold text-on-surface">{{ $registration->event_name }}</p>
            @endif
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Contact Email</span>
            <p class="text-sm font-semibold text-primary"><a href="mailto:{{ $registration->email }}" class="hover:underline">{{ $registration->email }}</a></p>
        </div>
        @if($registration->registration_type === 'team')
            <div>
                <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Team Name</span>
                <p class="text-sm font-semibold text-on-surface">{{ $registration->team_name }}</p>
            </div>
            <div>
                <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Team Size</span>
                <p class="text-sm font-semibold text-on-surface">{{ $registration->team_size ?? 'N/A' }} members</p>
            </div>
        @else
            <div>
                <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Full Name</span>
                <p class="text-sm font-semibold text-on-surface">{{ $registration->full_name }}</p>
            </div>
        @endif
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Pass Type</span>
            @if($registration->pass_type)
                <span class="inline-block px-2.5 py-0.5 rounded-full text-xs bg-amber-500/10 text-amber-400 border border-amber-500/20 font-semibold">
                    {{ $registration->pass_type }}
                </span>
            @else
                <p class="text-sm text-on-surface-variant">Not specified</p>
            @endif
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Booked On</span>
            <p class="text-sm font-semibold text-on-surface-variant">{{ $registration->created_at->format('M d, Y \a\t h:i A') }}</p>
        </div>
    </div>

    <!-- Team Members -->
    @if($registration->registration_type === 'team' && $registration->members && is_array($registration->members) && count($registration->members) > 0)
        <div class="pt-4 border-t border-white/10 space-y-4">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-base text-secondary">group</span>
                <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Team Member Roster ({{ count($registration->members) }} registered)</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($registration->members as $index => $member)
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5 hover:border-secondary/20 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-secondary/20 to-accent/10 flex items-center justify-center text-secondary font-bold text-sm border border-secondary/20">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-on-surface">{{ $member['name'] ?? 'Unnamed' }}</p>
                            <p class="text-xs text-on-surface-variant font-label-mono">{{ $member['email'] ?? 'No email provided' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Danger Zone -->
    <div class="flex justify-end pt-4 border-t border-white/10">
        <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Purge this booking record permanently? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-error/20 hover:bg-error/30 text-error font-semibold text-sm transition-colors flex items-center gap-1.5 border border-error/30">
                <span class="material-symbols-outlined text-sm">delete</span> Purge Booking Record
            </button>
        </form>
    </div>
</div>
@endsection
