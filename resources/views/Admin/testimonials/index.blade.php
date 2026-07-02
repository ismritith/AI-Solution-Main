@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Testimonials Management')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Customer Testimonials & Feedback</h3>
            <p class="text-xs text-on-surface-variant">Manage verified feedback, scores, quotes and avatars displayed on about / home testimonials sections</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Add Feedback
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Avatar</th>
                    <th class="py-4 px-4">Client Name</th>
                    <th class="py-4 px-4">Role</th>
                    <th class="py-4 px-4">Verified</th>
                    <th class="py-4 px-4">Rating</th>
                    <th class="py-4 px-4">Quote Text</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4">
                            <img src="{{ asset($testimonial->client_avatar) }}" class="w-10 h-10 object-cover rounded-full border border-white/10" alt="Client avatar">
                        </td>
                        <td class="py-4 px-4 font-semibold text-on-surface">
                            {{ $testimonial->client_name }}
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant">
                            {{ $testimonial->client_role }}
                        </td>
                        <td class="py-4 px-4">
                            @if($testimonial->is_verified)
                                <span class="px-2.5 py-0.5 rounded-full text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-semibold">
                                    Verified
                                </span>
                            @else
                                <span class="text-xs text-on-surface-variant">Unverified</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-xs font-label-mono text-amber-400">
                            {{ str_repeat('★', $testimonial->rating) }}
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant italic max-w-xs truncate" title="{{ $testimonial->quote_text }}">
                            "{{ $testimonial->quote_text }}"
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">visibility</span> View
                                </a>
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Dismantle this client feedback permanently?')" class="inline">
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
                            No customer feedback nodes created yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($testimonials->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
