@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Edit Blog')

@section('content')
<div class="glass-card rounded-2xl p-6 max-w-4xl mx-auto">
    <div class="mb-6">
        <h3 class="text-on-surface font-semibold text-lg">Modify Intelligence Insight</h3>
        <p class="text-xs text-on-surface-variant">Update article post #{{ $post->id }} coordinates and contents</p>
    </div>

    <form action="{{ route('admin.blogs.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Article Title</label>
                <input type="text" name="title" value="{{ $post->title }}" required placeholder="e.g. Cognitive Systems scaling parameters" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Category</label>
                <select name="category" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="Research" {{ $post->category === 'Research' ? 'selected' : '' }}>Research</option>
                    <option value="Engineering" {{ $post->category === 'Engineering' ? 'selected' : '' }}>Engineering</option>
                    <option value="Telemetry" {{ $post->category === 'Telemetry' ? 'selected' : '' }}>Telemetry</option>
                    <option value="AI Strategy" {{ $post->category === 'AI Strategy' ? 'selected' : '' }}>AI Strategy</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Reading Time (Minutes)</label>
                <input type="number" name="reading_time" value="{{ $post->reading_time }}" required min="1" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Author Name</label>
                <input type="text" name="author_name" value="{{ $post->author_name }}" placeholder="Administrator" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[A-Za-z\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Author Role</label>
                <input type="text" name="author_role" value="{{ $post->author_role }}" placeholder="Systems Architect" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&,]/g, '')">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Replace Banner Image (Optional)</label>
                <input type="file" name="banner" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary-container/20 file:text-primary hover:file:bg-primary-container/30">
                @if($post->banner_image)
                    <p class="text-xs text-secondary mt-1">Current Banner: <a href="{{ asset($post->banner_image) }}" target="_blank" class="underline">View current image</a></p>
                @endif
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Publication Status</label>
                <select name="status" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Excerpt (Short Summary)</label>
            <textarea name="excerpt" rows="2" placeholder="Provide a brief summary snippet of this intelligence insight..." class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1">{{ $post->excerpt }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Article Body Content</label>
            <input type="hidden" name="body_content" id="body_content_input" value="{!! clean($post->body_content) !!}">
            <div id="body_content_editor" class="min-h-[250px]">{!! $post->body_content !!}</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 rounded-xl bg-white/5 border border-white/5">
            <div class="md:col-span-2">
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-primary font-bold">Featured Blockquote Overlay</h4>
                <p class="text-[10px] text-on-surface-variant mt-0.5">Highlights a statement visually in the content block</p>
            </div>
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Quote Text</label>
                <textarea name="blockquote_text" rows="2" placeholder="e.g. Cognitive models are scaling exponentially..." class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1">{{ $post->blockquote_text }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Quote Source</label>
                <input type="text" name="blockquote_source" value="{{ $post->blockquote_source }}" placeholder="e.g. Dr. Jennifer Vance, AI Research Institute" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-\.,&]/g, '')">
            </div>
        </div>

        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-4">
            <div>
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-secondary font-bold">Technical Metrics (Optional)</h4>
                <p class="text-[10px] text-on-surface-variant mt-0.5">Custom telemetry stats to overlay on insights page</p>
            </div>
            <div id="metrics_repeater" class="space-y-3">
                @if(!empty($post->technical_metrics))
                    @foreach($post->technical_metrics as $metric)
                        <div class="grid grid-cols-3 gap-4 metric-row">
                            <input type="text" name="metric_lbl[]" value="{{ $metric['label'] ?? '' }}" placeholder="Metric Label" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                            <input type="text" name="metric_val[]" value="{{ $metric['val'] ?? '' }}" placeholder="Metric Value" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                            <select name="metric_icon[]" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                                <option value="bolt" {{ ($metric['icon'] ?? '') === 'bolt' ? 'selected' : '' }}>Bolt Icon</option>
                                <option value="speed" {{ ($metric['icon'] ?? '') === 'speed' ? 'selected' : '' }}>Speed Icon</option>
                                <option value="memory" {{ ($metric['icon'] ?? '') === 'memory' ? 'selected' : '' }}>Memory Icon</option>
                                <option value="database" {{ ($metric['icon'] ?? '') === 'database' ? 'selected' : '' }}>Database Icon</option>
                            </select>
                        </div>
                    @endforeach
                @else
                    <div class="grid grid-cols-3 gap-4 metric-row">
                        <input type="text" name="metric_lbl[]" placeholder="Metric Label" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                        <input type="text" name="metric_val[]" placeholder="Metric Value" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                        <select name="metric_icon[]" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                            <option value="bolt">Bolt Icon</option>
                            <option value="speed">Speed Icon</option>
                            <option value="memory">Memory Icon</option>
                            <option value="database">Database Icon</option>
                        </select>
                    </div>
                @endif
            </div>
            <button type="button" onclick="addMetricRow()" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">add</span> Add Metric Field
            </button>
        </div>

        <div class="flex justify-end gap-4 pt-4 border-t border-white/10">
            <a href="{{ route('admin.blogs.index') }}" class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">Cancel</a>
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all">Save Changes</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function addMetricRow() {
        const repeater = document.getElementById('metrics_repeater');
        const newRow = document.createElement('div');
        newRow.className = 'grid grid-cols-3 gap-4 metric-row mt-3';
        newRow.innerHTML = `
            <input type="text" name="metric_lbl[]" placeholder="Metric Label" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
            <input type="text" name="metric_val[]" placeholder="Metric Value" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
            <select name="metric_icon[]" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                <option value="bolt">Bolt Icon</option>
                <option value="speed">Speed Icon</option>
                <option value="memory">Memory Icon</option>
                <option value="database">Database Icon</option>
            </select>
        `;
        repeater.appendChild(newRow);
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Quill editor
        const quill = new Quill('#body_content_editor', {
            theme: 'snow',
            placeholder: 'Type article content here...'
        });

        // Sync Quill HTML on submit
        const form = document.querySelector('form:not(#logout-form)');
        form.onsubmit = function() {
            const bodyInput = document.getElementById('body_content_input');
            bodyInput.value = quill.root.innerHTML;
        };
    });
</script>
@endsection
