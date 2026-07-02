@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Inquiries')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Contact Form Transmissions</h3>
            <p class="text-xs text-on-surface-variant">Real-time inquiries routed from direct customer nodes</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Name</th>
                    <th class="py-4 px-4">Email</th>
                    <th class="py-4 px-4">Department</th>
                    <th class="py-4 px-4">Message</th>
                    <th class="py-4 px-4">Timestamp</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($inquiries as $inquiry)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4 font-semibold text-on-surface">{{ $inquiry->name }}</td>
                        <td class="py-4 px-4 text-on-surface-variant">{{ $inquiry->email }}</td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs bg-primary/10 text-primary border border-primary/20">
                                {{ $inquiry->department }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant italic max-w-xs truncate" title="{{ $inquiry->message }}">
                            "{{ $inquiry->message }}"
                        </td>
                        <td class="py-4 px-4 text-xs font-label-mono text-on-surface-variant">
                            {{ $inquiry->created_at->format('Y-m-d H:i') }}
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">visibility</span> View
                                </a>
                                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Purge this inquiry payload?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-error hover:text-red-300 font-medium text-xs flex items-center gap-0.5">
                                        <span class="material-symbols-outlined text-sm">delete</span> Purge
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 px-4 text-center text-on-surface-variant italic">
                            No active inquiries detected on the local net.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($inquiries->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $inquiries->links() }}
        </div>
    @endif
</div>
@endsection