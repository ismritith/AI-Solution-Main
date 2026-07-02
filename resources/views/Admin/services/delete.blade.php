@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Delete Service')

@section('content')
<div class="glass-card rounded-2xl p-6 max-w-3xl mx-auto">

    <div class="mb-6">
        <h3 class="text-red-400 font-semibold text-lg">
            Delete Service Capability Node
        </h3>
        <p class="text-xs text-on-surface-variant">
            You are about to permanently remove capability #{{ $service->id }}
        </p>
    </div>

    <div class="space-y-6">

        <div class="p-5 rounded-xl bg-red-500/10 border border-red-500/20">
            <h4 class="font-semibold text-red-300 mb-2">
                Warning: Permanent Deletion
            </h4>

            <p class="text-sm text-on-surface-variant">
                This action will permanently remove the selected capability
                from the system registry. This operation cannot be undone.
            </p>
        </div>

        <div class="p-5 rounded-xl bg-surface-container border border-white/10">
            <div class="space-y-3">

                <div>
                    <span class="text-xs uppercase tracking-widest text-on-surface-variant">
                        Service Title
                    </span>

                    <p class="text-on-surface font-medium">
                        {{ $service->title }}
                    </p>
                </div>

                <div>
                    <span class="text-xs uppercase tracking-widest text-on-surface-variant">
                        Category
                    </span>

                    <p class="text-on-surface">
                        {{ ucfirst($service->category) }}
                    </p>
                </div>

                <div>
                    <span class="text-xs uppercase tracking-widest text-on-surface-variant">
                        Featured Status
                    </span>

                    <p class="text-on-surface">
                        {{ $service->is_featured ? 'Featured Capability' : 'Standard Capability' }}
                    </p>
                </div>

            </div>
        </div>

        <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-4 pt-4 border-t border-white/10">

                <a href="{{ route('admin.services.index') }}"
                   class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">
                    Cancel
                </a>

                <button type="submit"
                    class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-red-600 to-red-500 text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(239,68,68,0.4)] transition-all">
                    Delete Permanently
                </button>

            </div>
        </form>

    </div>
</div>
@endsection