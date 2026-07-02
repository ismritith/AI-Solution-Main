@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Gallery Management')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Visual Neural Gallery</h3>
            <p class="text-xs text-on-surface-variant">Manage and index immersive visual assets for the frontend Bento grid</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Create Asset
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Preview</th>
                    <th class="py-4 px-4">Title</th>
                    <th class="py-4 px-4">Category</th>
                    <th class="py-4 px-4">Media Type</th>
                    <th class="py-4 px-4">Featured</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($assets as $asset)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4">
                            @if($asset->media_type === 'image')
                                <img src="{{ $asset->upload_method === 'upload' ? asset('storage/' . $asset->file_path) : $asset->external_url }}" class="w-12 h-12 object-cover rounded-lg border border-white/10" alt="Asset preview">
                            @else
                                <div class="w-12 h-12 bg-white/5 flex items-center justify-center rounded-lg border border-white/10">
                                    <span class="material-symbols-outlined text-secondary text-lg">play_circle</span>
                                </div>
                            @endif
                        </td>
                        <td class="py-4 px-4 font-semibold text-on-surface">
                            {{ $asset->title }}
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs bg-secondary/10 text-secondary border border-secondary/20">
                                {{ $asset->category }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant capitalize">
                            {{ $asset->media_type }} ({{ $asset->upload_method }})
                        </td>
                        <td class="py-4 px-4">
                            @if($asset->is_featured)
                                <span class="text-amber-400 font-semibold text-xs flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span> Yes
                                </span>
                            @else
                                <span class="text-on-surface-variant text-xs">No</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.gallery.show', $asset) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">visibility</span> View
                                </a>
                                <a href="{{ route('admin.gallery.edit', $asset) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $asset) }}" method="POST" onsubmit="return confirm('Dismantle this gallery node permanently?')" class="inline">
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
                        <td colspan="6" class="py-8 px-4 text-center text-on-surface-variant italic">
                            No gallery nodes established.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($assets->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $assets->links() }}
        </div>
    @endif
</div>
@endsection
