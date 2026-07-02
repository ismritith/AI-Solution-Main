@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Blogs Management')

@section('content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Blogs & Intelligence Insights</h3>
            <p class="text-xs text-on-surface-variant">Publish, update, and manage technical articles and insights</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Publish Blog
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/10 text-xs font-label-mono text-on-surface-variant uppercase tracking-widest">
                    <th class="py-4 px-4">Banner</th>
                    <th class="py-4 px-4">Title</th>
                    <th class="py-4 px-4">Category</th>
                    <th class="py-4 px-4">Author</th>
                    <th class="py-4 px-4">Status</th>
                    <th class="py-4 px-4">Published At</th>
                    <th class="py-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @forelse($posts as $post)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="py-4 px-4">
                            <img src="{{ asset($post->banner_image) }}" class="w-16 h-10 object-cover rounded-lg border border-white/10" alt="Banner preview">
                        </td>
                        <td class="py-4 px-4 font-semibold text-on-surface">
                            {{ $post->title }}
                            <p class="text-[10px] text-on-surface-variant font-label-mono mt-0.5">{{ $post->reading_time }} min read</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs bg-tertiary/10 text-tertiary border border-tertiary/20">
                                {{ $post->category }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-on-surface-variant font-medium">
                            {{ $post->author_name }}
                        </td>
                        <td class="py-4 px-4">
                            @if($post->status === 'published')
                                <span class="px-2.5 py-0.5 rounded-full text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-semibold uppercase tracking-wider">
                                    Published
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-xs bg-white/5 text-on-surface-variant border border-white/10 font-semibold uppercase tracking-wider">
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-xs font-label-mono text-on-surface-variant">
                            {{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : '--' }}
                        </td>
                        <td class="py-4 px-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.blogs.show', $post) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">visibility</span> View
                                </a>
                                <a href="{{ route('insights.detail', ['id' => $post->id]) }}" target="_blank" class="text-accent hover:text-pink-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">open_in_new</span> Preview
                                </a>
                                <a href="{{ route('admin.blogs.edit', $post) }}" class="text-primary hover:text-purple-300 font-medium text-xs flex items-center gap-0.5">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $post) }}" method="POST" onsubmit="return confirm('Dismantle this article post permanently?')" class="inline">
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
                            No blog posts published yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
        <div class="mt-6 pt-4 border-t border-white/10">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
