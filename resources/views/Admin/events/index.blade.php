@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Events Management')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Global Hackathons & Summits</h3>
            <p class="text-xs text-on-surface-variant">Schedule, publish, and manage system events, ticket pricing, tracks and agendas</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Create Event
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Banner</th>
                    <th class="py-4 px-4">Event Title</th>
                    <th class="py-4 px-4">Category</th>
                    <th class="py-4 px-4">Status</th>
                    <th class="py-4 px-4">Date / Capacity</th>
                    <th class="py-4 px-4">Price</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($events as $event)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4">
                            <img src="{{ asset($event->main_image) }}" class="w-16 h-10 object-cover rounded-lg border border-white/10" alt="Event preview">
                        </td>
                        <td class="py-4 px-4 font-semibold text-on-surface">
                            {{ $event->title }}
                            <p class="text-[10px] text-on-surface-variant font-label-mono mt-0.5">{{ $event->location }}</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs uppercase bg-secondary/10 text-secondary border border-secondary/20">
                                {{ $event->category }}
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                {{ $event->status_badge }}
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <p class="text-xs text-on-surface font-medium">{{ $event->date_text }}</p>
                            <p class="text-[10px] text-on-surface-variant mt-0.5">{{ $event->capacity }} capacity</p>
                        </td>
                        <td class="py-4 px-4 font-semibold text-on-surface">
                            {{ $event->ticket_price }}
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.events.show', $event) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">visibility</span> View
                                </a>
                                <a href="{{ route('events.detail', ['id' => $event->id]) }}" target="_blank" class="text-accent hover:text-pink-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">open_in_new</span> Preview
                                </a>
                                <a href="{{ route('admin.events.edit', $event) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Purge this event from index permanently?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-error hover:text-red-300 font-medium text-xs flex items-center gap-0.5">
                                        <span class="material-symbols-outlined text-sm">delete</span> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-8 px-4 text-center text-on-surface-variant italic">
                            No upcoming events configured on the local node.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($events->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $events->links() }}
        </div>
    @endif
</div>
@endsection
