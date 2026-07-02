@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Project Reviews Moderation')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Project-Specific Client Reviews</h3>
            <p class="text-xs text-on-surface-variant">Moderate feedback submitted by clients on specific project pages</p>
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
                    <th class="py-4 px-4">Project</th>
                    <th class="py-4 px-4">Client</th>
                    <th class="py-4 px-4">Role</th>
                    <th class="py-4 px-4">Contact</th>
                    <th class="py-4 px-4">Rating</th>
                    <th class="py-4 px-4">Status</th>
                    <th class="py-4 px-4">Review Text</th>
                    <th class="py-4 px-4 text-right">Moderation Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($reviews as $review)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4 font-semibold text-white">
                            @if($review->project)
                                <a href="/projects1?id={{ $review->project->id }}" target="_blank" class="hover:underline text-secondary">
                                    {{ $review->project->title }}
                                </a>
                            @else
                                <span class="text-on-surface-variant italic">Unknown Project</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-on-surface font-medium">
                            {{ $review->client_name }}
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant text-xs">
                            {{ $review->client_role }}
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant text-xs">
                            <div class="truncate max-w-[120px]" title="{{ $review->email }}">{{ $review->email ?? 'N/A' }}</div>
                            <div class="truncate max-w-[120px]" title="{{ $review->phone }}">{{ $review->phone }}</div>
                        </td>
                        <td class="py-4 px-4 text-xs font-label-mono text-amber-400">
                            {{ str_repeat('★', $review->rating) }}
                        </td>
                        <td class="py-4 px-4">
                            @if($review->status === 'approved')
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-bold uppercase">
                                    Approved
                                </span>
                            @elseif($review->status === 'rejected')
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] bg-error/10 text-error border border-error/20 font-bold uppercase">
                                    Rejected
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] bg-amber-500/10 text-amber-400 border border-amber-500/20 font-bold uppercase">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant italic max-w-xs truncate" title="{{ $review->quote_text }}">
                            "{{ $review->quote_text }}"
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if($review->status !== 'approved')
                                    <form action="{{ route('admin.project-reviews.approve', $review) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="py-1 px-2.5 rounded bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-400 border border-emerald-500/20 text-xs font-bold transition-all flex items-center gap-0.5">
                                            <span class="material-symbols-outlined text-xs">done</span> Accept
                                        </button>
                                    </form>
                                @endif
                                
                                @if($review->status !== 'rejected')
                                    <form action="{{ route('admin.project-reviews.reject', $review) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="py-1 px-2.5 rounded bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 border border-amber-500/20 text-xs font-bold transition-all flex items-center gap-0.5">
                                            <span class="material-symbols-outlined text-xs">close</span> Reject
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.project-reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Purge this project review node permanently?')" class="inline">
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
                            No project reviews registered on the local net.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($reviews->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $reviews->links() }}
        </div>
    @endif
</div>
@endsection
