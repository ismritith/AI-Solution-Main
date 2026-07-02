@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Edit Feedback')

@section('content')
<div class="glass-card rounded-2xl p-6 max-w-3xl mx-auto">
    <div class="mb-6">
        <h3 class="text-on-surface font-semibold text-lg">Modify Customer Feedback</h3>
        <p class="text-xs text-on-surface-variant">Update client review node #{{ $testimonial->id }} details</p>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Client Name</label>
                <input type="text" name="client_name" value="{{ $testimonial->client_name }}" required placeholder="e.g. Marcus Vance" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[A-Za-z\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Client Role / Company</label>
                <input type="text" name="client_role" value="{{ $testimonial->client_role }}" required placeholder="e.g. CTO, Neural Networks Corp" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Replace Avatar Image (Optional)</label>
                <input type="file" name="avatar" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary-container/20 file:text-primary hover:file:bg-primary-container/30">
                @if($testimonial->client_avatar)
                    <p class="text-xs text-secondary mt-1">Active Avatar: <a href="{{ asset($testimonial->client_avatar) }}" target="_blank" class="underline">View avatar image</a></p>
                @endif
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Rating (1 to 5 Stars)</label>
                <select name="rating" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="5" {{ $testimonial->rating === 5 ? 'selected' : '' }}>5 Stars</option>
                    <option value="4" {{ $testimonial->rating === 4 ? 'selected' : '' }}>4 Stars</option>
                    <option value="3" {{ $testimonial->rating === 3 ? 'selected' : '' }}>3 Stars</option>
                    <option value="2" {{ $testimonial->rating === 2 ? 'selected' : '' }}>2 Stars</option>
                    <option value="1" {{ $testimonial->rating === 1 ? 'selected' : '' }}>1 Star</option>
                </select>
            </div>

            <div class="flex items-center mt-6">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_verified" class="sr-only peer" {{ $testimonial->is_verified ? 'checked' : '' }}>
                    <div class="relative w-11 h-6 bg-surface-container peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary border border-white/10"></div>
                    <span class="ms-3 text-sm font-medium text-on-surface">Verified Customer</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Client Quote Text</label>
            <!-- Hidden input to store Quill value -->
            <input type="hidden" name="quote_text" id="quote_text_input" value="{!! clean($testimonial->quote_text) !!}">
            <div id="quote_text_editor" class="min-h-[150px]">{!! $testimonial->quote_text !!}</div>
        </div>

        <div class="flex justify-end gap-4 pt-4 border-t border-white/10">
            <a href="{{ route('admin.testimonials.index') }}" class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">Cancel</a>
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all">Save Changes</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Quill editor
        const quill = new Quill('#quote_text_editor', {
            theme: 'snow',
            placeholder: 'Type client quote here...'
        });

        // Sync Quill HTML on submit
        const form = document.querySelector('form:not(#logout-form)');
        form.onsubmit = function() {
            const quoteInput = document.getElementById('quote_text_input');
            quoteInput.value = quill.root.innerHTML;
        };
    });
</script>
@endsection
