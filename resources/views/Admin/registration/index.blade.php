@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Event Bookings')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Event Booking Registry</h3>
            <p class="text-xs text-on-surface-variant">Manage registrations submitted by attendees on event pages</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1.5 rounded-full text-[10px] bg-primary/10 text-primary border border-primary/20 font-bold uppercase">
                {{ $registrations->total() }} Total Bookings
            </span>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm flex items-center gap-3">
            <span class="material-symbols-outlined text-base">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Type</th>
                    <th class="py-4 px-4">Name / Team</th>
                    <th class="py-4 px-4">Email</th>
                    <th class="py-4 px-4">Event</th>
                    <th class="py-4 px-4">Pass</th>
                    <th class="py-4 px-4">Members</th>
                    <th class="py-4 px-4">Booked On</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($registrations as $registration)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4">
                            @if($registration->registration_type === 'team')
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] bg-secondary/10 text-secondary border border-secondary/20 font-bold uppercase">
                                    Team
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] bg-primary/10 text-primary border border-primary/20 font-bold uppercase">
                                    Individual
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-4 font-semibold text-white">
                            {{ $registration->registration_type === 'team' ? $registration->team_name : $registration->full_name }}
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant text-xs">
                            <div class="truncate max-w-[160px]" title="{{ $registration->email }}">{{ $registration->email }}</div>
                        </td>
                        <td class="py-4 px-4 font-medium text-white">
                            @if($registration->event)
                                <a href="{{ route('admin.events.show', $registration->event) }}" class="hover:underline text-secondary">
                                    {{ $registration->event->title }}
                                </a>
                            @else
                                <span class="text-on-surface-variant">{{ $registration->event_name }}</span>
                            @endif
                        </td>
                        <td class="py-4 px-4">
                            @if($registration->pass_type)
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] bg-amber-500/10 text-amber-400 border border-amber-500/20 font-bold">
                                    {{ $registration->pass_type }}
                                </span>
                            @else
                                <span class="text-on-surface-variant text-xs">—</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-xs font-label-mono text-on-surface-variant">
                            @if($registration->registration_type === 'team' && $registration->members)
                                {{ count($registration->members) }} / {{ $registration->team_size ?? '?' }}
                            @else
                                —
                            @endif
                        </td>
                        <td class="py-4 px-4 text-xs text-on-surface-variant">
                            {{ $registration->created_at->format('M d, Y') }}
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.registrations.show', $registration) }}" class="py-1 px-2.5 rounded bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 text-xs font-bold transition-all flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-xs">visibility</span> View
                                </a>

                                <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Purge this booking record permanently?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-1 px-2.5 rounded bg-error/10 hover:bg-error/20 text-error border border-error/20 text-xs font-bold transition-all flex items-center gap-0.5">
                                        <span class="material-symbols-outlined text-xs">delete</span> Purge
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-8 px-4 text-center text-on-surface-variant italic">
                            No event bookings registered on the system yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($registrations->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $registrations->links() }}
        </div>
    @endif
</div>
@endsection