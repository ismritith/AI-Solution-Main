@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Publish Blog')

@section('content')
<div class="glass-card rounded-2xl p-6 max-w-4xl mx-auto">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Publish Intelligence Insight</h3>
            <p class="text-xs text-on-surface-variant">Inject a new knowledge article into the Insights center</p>
        </div>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Article Title</label>
                <input type="text" name="title" required placeholder="e.g. Cognitive Systems scaling parameters" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Category</label>
                <select name="category" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="Research">Research</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Telemetry">Telemetry</option>
                    <option value="AI Strategy">AI Strategy</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Reading Time (Minutes)</label>
                <input type="number" name="reading_time" required min="1" value="5" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Author Name</label>
                <input type="text" name="author_name" placeholder="Administrator" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[A-Za-z\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Author Role</label>
                <input type="text" name="author_role" placeholder="Systems Architect" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&,]/g, '')">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Banner Image (Optional)</label>
                <input type="file" name="banner" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary-container/20 file:text-primary hover:file:bg-primary-container/30">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Publication Status</label>
                <select name="status" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Excerpt (Short Summary)</label>
            <textarea name="excerpt" rows="2" placeholder="Provide a brief summary snippet of this intelligence insight..." class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1"></textarea>
        </div>

        <div>
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Article Body Content</label>
            <input type="hidden" name="body_content" id="body_content_input">
            <div id="body_content_editor" class="min-h-[250px]"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 rounded-xl bg-white/5 border border-white/5">
            <div class="md:col-span-2">
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-primary font-bold">Featured Blockquote Overlay</h4>
                <p class="text-[10px] text-on-surface-variant mt-0.5">Highlights a statement visually in the content block</p>
            </div>
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Quote Text</label>
                <textarea name="blockquote_text" rows="2" placeholder="e.g. Cognitive models are scaling exponentially, necessitating robust orchestration strategies." class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1"></textarea>
            </div>
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Quote Source</label>
                <input type="text" name="blockquote_source" placeholder="e.g. Dr. Jennifer Vance, AI Research Institute" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-\.,&]/g, '')">
            </div>
        </div>

        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-4">
            <div>
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-secondary font-bold">Technical Metrics (Optional)</h4>
                <p class="text-[10px] text-on-surface-variant mt-0.5">Custom telemetry stats to overlay on insights page</p>
            </div>
            <div id="metrics_repeater" class="space-y-3">
                <div class="grid grid-cols-3 gap-4 metric-row">
                    <input type="text" name="metric_lbl[]" placeholder="Metric Label (e.g. Precision)" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                    <input type="text" name="metric_val[]" placeholder="Metric Value (e.g. 99.8%)" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                    <select name="metric_icon[]" class="bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                        <option value="bolt">Bolt Icon</option>
                        <option value="speed">Speed Icon</option>
                        <option value="memory">Memory Icon</option>
                        <option value="database">Database Icon</option>
                    </select>
                </div>
            </div>
            <button type="button" onclick="addMetricRow()" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">add</span> Add Metric Field
            </button>
        </div>

        <div class="flex justify-end gap-4 pt-4 border-t border-white/10">
            <a href="{{ route('admin.blogs.index') }}" class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">Cancel</a>
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all">Submit Article</button>
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

        // Sync Quill HTML with hidden input on submit
        const form = document.querySelector('form:not(#logout-form)');
        form.onsubmit = function() {
            const bodyInput = document.getElementById('body_content_input');
            bodyInput.value = quill.root.innerHTML;
        };
    });
</script>
@endsection
