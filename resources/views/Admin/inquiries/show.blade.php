@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Inquiry Details')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-2xl mx-auto space-y-6">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Inquiry Transmission Details</h3>
            <p class="text-xs text-on-surface-variant">Incoming payload from customer node #{{ $inquiry->id }}</p>
        </div>
        <a href="{{ route('admin.inquiries') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
            <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Sender Name</span>
            <p class="text-sm font-semibold text-on-surface">{{ $inquiry->name }}</p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Email Node</span>
            <p class="text-sm font-semibold text-primary"><a href="mailto:{{ $inquiry->email }}" class="hover:underline">{{ $inquiry->email }}</a></p>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Target Department</span>
            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs bg-primary/10 text-primary border border-primary/20">
                {{ $inquiry->department }}
            </span>
        </div>
        <div>
            <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-1">Received Timestamp</span>
            <p class="text-sm font-semibold text-on-surface-variant">{{ $inquiry->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <div class="pt-4 border-t border-white/10">
        <span class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Message Payload</span>
        <div class="p-6 rounded-xl bg-white/5 border border-white/5 text-on-surface text-sm leading-relaxed whitespace-pre-wrap">
            {{ $inquiry->message }}
        </div>
    </div>

    <div class="flex justify-end pt-4 border-t border-white/10">
        <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Dismantle this inquiry permanently?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-error/20 hover:bg-error/30 text-error font-semibold text-sm transition-colors flex items-center gap-1.5 border border-error/30">
                <span class="material-symbols-outlined text-sm">delete</span> Purge Inquiry
            </button>
        </form>
    </div>
</div>
@endsection
