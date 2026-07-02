@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Projects Management')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Case Studies & R&D Projects</h3>
            <p class="text-xs text-on-surface-variant">Log, update, and manage case studies, tech stacks, and Horizon R&D initiatives</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Create Project
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Cover</th>
                    <th class="py-4 px-4">Title / Sector</th>
                    <th class="py-4 px-4">Classification</th>
                    <th class="py-4 px-4">Code / Status</th>
                    <th class="py-4 px-4">Rating</th>
                    <th class="py-4 px-4">Stats</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($projects as $project)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4">
                            <img src="{{ asset($project->cover_image) }}" class="w-16 h-10 object-cover rounded-lg border border-white/10" alt="Project preview">
                        </td>
                        <td class="py-4 px-4 font-semibold text-on-surface">
                            {{ $project->title }}
                            <p class="text-[10px] text-on-surface-variant font-label-mono mt-0.5">{{ $project->sector }}</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs uppercase {{ $project->classification === 'featured' ? 'bg-primary/10 text-primary border border-primary/20' : ($project->classification === 'horizon' ? 'bg-tertiary/10 text-tertiary border border-tertiary/20' : 'bg-white/5 text-on-surface-variant border border-white/10') }}">
                                {{ $project->classification }}
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <p class="text-xs font-semibold text-on-surface">{{ $project->project_code ?? '--' }}</p>
                            <p class="text-[10px] text-secondary mt-0.5">{{ $project->status_badge ?? '--' }}</p>
                        </td>
                        <td class="py-4 px-4 text-xs font-label-mono text-amber-400">
                            {{ $project->rating }} / 5.0
                        </td>
                        <td class="py-4 px-4 text-xs text-on-surface-variant font-label-mono">
                            {{ $project->footer_stat ?? '--' }}
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.projects.show', $project) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">visibility</span> View
                                </a>
                                <a href="{{ route('projects.detail', ['id' => $project->id]) }}" target="_blank" class="text-accent hover:text-pink-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">open_in_new</span> Preview
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Purge this project permanently?')" class="inline">
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
                            No project deployments defined.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($projects->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
