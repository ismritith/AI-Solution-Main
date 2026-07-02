@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Services Management')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Core & Vertical Capabilities</h3>
            <p class="text-xs text-on-surface-variant">Register and optimize capabilities and step progressions displayed on services grid</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Create Service
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Icon</th>
                    <th class="py-4 px-4">Title</th>
                    <th class="py-4 px-4">Category</th>
                    <th class="py-4 px-4">Metric/Subtitle</th>
                    <th class="py-4 px-4">Step Number</th>
                    <th class="py-4 px-4">Featured</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($services as $service)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4">
                            <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center border border-white/10">
                                <span class="material-symbols-outlined text-primary text-lg">{{ $service->icon ?? 'neurology' }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-semibold text-on-surface">
                            {{ $service->title }}
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs capitalize {{ $service->category === 'infrastructure' ? 'bg-secondary/10 text-secondary border border-secondary/20' : ($service->category === 'vertical' ? 'bg-tertiary/10 text-tertiary border border-tertiary/20' : 'bg-primary/10 text-primary border border-primary/20') }}">
                                {{ $service->category }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant">
                            {{ $service->metric_subtitle ?? '--' }}
                        </td>
                        <td class="py-4 px-4 text-xs font-label-mono text-on-surface-variant">
                            {{ $service->step_number ?? '--' }}
                        </td>
                        <td class="py-4 px-4">
                            @if($service->is_featured)
                                <span class="text-amber-400 font-semibold text-xs flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span> Yes
                                </span>
                            @else
                                <span class="text-on-surface-variant text-xs">No</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.services.show', $service) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">visibility</span> View
                                </a>
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Dismantle this core capability?')" class="inline">
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
                            No service capability nodes defined.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $services->links() }}
        </div>
    @endif
</div>
@endsection
