@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Create Project')

@section('content')
<div class="glass-card rounded-2xl p-6 max-w-4xl mx-auto">
    <div class="mb-6">
        <h3 class="text-on-surface font-semibold text-lg">Define Project Deployment</h3>
        <p class="text-xs text-on-surface-variant">Inject a new project or R&D initiative registry node</p>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Project Title</label>
                <input type="text" name="title" required placeholder="e.g. Project Q-Stagger AI Model" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Classification</label>
                <select name="classification" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="featured">Featured Case Study</option>
                    <option value="present">Present Client Deployment</option>
                    <option value="legacy">Legacy Core Projects</option>
                    <option value="horizon">Horizon R&D Initiative</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Sector / Industry</label>
                <input type="text" name="sector" required placeholder="e.g. Fintech / Healthcare" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Rating Score (1.0 - 5.0)</label>
                <input type="number" name="rating" min="1.0" max="5.0" step="0.1" value="5.0" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Google Material Icon (Symbol)</label>
                <select name="icon" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="memory">Memory (Processor)</option>
                    <option value="neurology">Neurology (Brain)</option>
                    <option value="shield">Shield (Security)</option>
                    <option value="bolt">Bolt (Performance)</option>
                    <option value="database">Database (Storage)</option>
                    <option value="insights">Insights (Analytics)</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Project Reference Code (Optional)</label>
                <input type="text" name="project_code" placeholder="e.g. Q-STAGGER 1.0" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Status Badge Label (Optional)</label>
                <input type="text" name="status_badge" placeholder="e.g. Active Phase / In R&D" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Est. Release Date (Horizon Only)</label>
                <input type="text" name="estimated_date" placeholder="e.g. Est. Q4 2026" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Cover Banner Image (Optional)</label>
                <input type="file" name="banner" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary-container/20 file:text-primary hover:file:bg-primary-container/30">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Tech Stack Tags (Comma-separated)</label>
                <input type="text" name="tech_stack" placeholder="e.g. LLM, CUDA, GPU" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>
        </div>

        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-4">
            <div>
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-primary font-bold">Telemetry Statistics Overlay</h4>
                <p class="text-[10px] text-on-surface-variant mt-0.5">Specify core metrics and footer stats to highlight this project</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Footer Stat Highlight</label>
                    <input type="text" name="footer_stat" placeholder="e.g. 98.2% Accuracy Rate" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:ring-1">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="grid grid-cols-2 gap-2">
                    <input type="text" name="metric1_val" placeholder="Metric 1 Value" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                    <input type="text" name="metric1_lbl" placeholder="Metric 1 Label" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <input type="text" name="metric2_val" placeholder="Metric 2 Value" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                    <input type="text" name="metric2_lbl" placeholder="Metric 2 Label" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <input type="text" name="metric3_val" placeholder="Metric 3 Value" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                    <input type="text" name="metric3_lbl" placeholder="Metric 3 Label" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                </div>
            </div>
        </div>

        <div>
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Comprehensive Project Case Details</label>
            <!-- Hidden textarea to store the description HTML for server submission -->
            <input type="hidden" name="description" id="description_input">
            <div id="description_editor" class="min-h-[200px]"></div>
        </div>

        <div class="flex justify-end gap-4 pt-4 border-t border-white/10">
            <a href="{{ route('admin.projects.index') }}" class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">Cancel</a>
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all">Submit Project</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Quill editor
        const quill = new Quill('#description_editor', {
            theme: 'snow',
            placeholder: 'Type comprehensive description here...'
        });

        // Sync Quill HTML on submit
        const form = document.querySelector('form:not(#logout-form)');
        form.onsubmit = function() {
            const descInput = document.getElementById('description_input');
            descInput.value = quill.root.innerHTML;
        };
    });
</script>
@endsection
