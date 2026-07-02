@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Edit Gallery Asset')

@section('content')
    <div class="glass-card rounded-2xl p-6 max-w-3xl mx-auto">
        <div class="mb-6">
            <h3 class="text-on-surface font-semibold text-lg">Modify Gallery Asset</h3>
            <p class="text-xs text-on-surface-variant">Update registry coordinates for gallery asset node
                #{{ $asset->id }}</p>
        </div>

        <form action="{{ route('admin.gallery.update', $asset) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label
                        class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Category</label>
                    <select name="category" required
                        class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                        <option value="Projects" {{ $asset->category === 'Projects' ? 'selected' : '' }}>Projects</option>
                        <option value="Events" {{ $asset->category === 'Events' ? 'selected' : '' }}>Events</option>
                        <option value="Team" {{ $asset->category === 'Team' ? 'selected' : '' }}>Team</option>
                        <option value="Innovation" {{ $asset->category === 'Innovation' ? 'selected' : '' }}>Innovation
                        </option>
                        <option value="Demos" {{ $asset->category === 'Demos' ? 'selected' : '' }}>Demos</option>
                        <option value="Awards & Recognition"
                            {{ $asset->category === 'Awards & Recognition' ? 'selected' : '' }}>Awards & Recognition
                        </option>
                    </select>
                </div>

                <div>
                    <label
                        class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Media
                        Type</label>
                    <input type="hidden" name="media_type" id="media_type_val" value="{{ $asset->media_type }}">
                    <div class="grid grid-cols-2 gap-3 p-1 rounded-xl bg-white/5 border border-white/5">
                        <button type="button" id="media_type_image"
                            class="py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all {{ $asset->media_type === 'image' ? 'bg-secondary text-white shadow-lg shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/5' }}"
                            onclick="setMediaType('image')">
                            <span class="material-symbols-outlined text-[18px]">image</span> Image
                        </button>
                        <button type="button" id="media_type_video"
                            class="py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all {{ $asset->media_type === 'video' ? 'bg-secondary text-white shadow-lg shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/5' }}"
                            onclick="setMediaType('video')">
                            <span class="material-symbols-outlined text-[18px]">smart_display</span> Video
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label
                        class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Upload
                        Method</label>
                    <input type="hidden" name="upload_method" id="upload_method_val" value="{{ $asset->upload_method }}">
                    <div class="grid grid-cols-2 gap-3 p-1 rounded-xl bg-white/5 border border-white/5">
                        <button type="button" id="upload_method_file"
                            class="py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all {{ $asset->upload_method === 'upload' ? 'bg-secondary text-white shadow-lg shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/5' }}"
                            onclick="setUploadMethod('upload')">
                            <span class="material-symbols-outlined text-[18px]">cloud_upload</span> Upload File
                        </button>
                        <button type="button" id="upload_method_link"
                            class="py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all {{ $asset->upload_method === 'link' ? 'bg-secondary text-white shadow-lg shadow-secondary/20' : 'text-on-surface-variant hover:bg-white/5' }}"
                            onclick="setUploadMethod('link')">
                            <span class="material-symbols-outlined text-[18px]">link</span> YouTube / Link
                        </button>
                    </div>
                </div>

                <div class="flex items-center mt-6">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" class="sr-only peer"
                            {{ $asset->is_featured ? 'checked' : '' }}>
                        <div
                            class="relative w-11 h-6 bg-surface-container peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary border border-white/10">
                        </div>
                        <span class="ms-3 text-sm font-medium text-on-surface">Feature on home canvas</span>
                    </label>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label
                        class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Asset
                        Title</label>
                    <input type="text" name="title" value="{{ $asset->title }}" required
                        placeholder="e.g. Cybernetic Threat Vector Analysis"
                        class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
                </div>

                <!-- Upload input field -->
                <div id="file_container" class="{{ $asset->upload_method === 'upload' ? '' : 'hidden' }} space-y-2">
                    <label id="file_label"
                        class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">{{ $asset->media_type === 'video' ? 'Replace Video File (Optional)' : 'Replace Image File (Optional)' }}</label>
                    <input type="file" name="file"
                        class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary-container/20 file:text-primary hover:file:bg-primary-container/30">
                    @if ($asset->file_path)
                        <p class="text-xs text-secondary mt-1">Active File: <a
                                href="{{ asset('storage/' . $asset->file_path) }}" target="_blank" class="underline">View
                                current asset file</a></p>
                    @endif
                </div>

                <!-- External link field -->
                <div id="url_container" class="{{ $asset->upload_method === 'link' ? '' : 'hidden' }} space-y-2">
                    <label id="url_label"
                        class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">{{ $asset->media_type === 'video' ? 'YouTube Video Embed URL' : 'External Image URL' }}</label>
                    <input type="url" name="external_url" value="{{ $asset->external_url }}"
                        placeholder="{{ $asset->media_type === 'video' ? 'https://www.youtube.com/embed/...' : 'https://images.unsplash.com/...' }}"
                        class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1">
                    <p id="url_help" class="text-[10px] text-on-surface-variant">
                        {{ $asset->media_type === 'video' ? 'Provide a valid YouTube embed link (e.g., https://www.youtube.com/embed/dQw4w9WgXcQ)' : 'Provide the direct image URL.' }}
                    </p>
                </div>

                <div>
                    <label
                        class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Asset
                        Description</label>
                    <!-- Hidden textarea to store the description HTML for server submission -->
                    <input type="hidden" name="description" id="description_input" value="{!! clean($asset->description) !!}">
                    <div id="description_editor" class="min-h-[200px]">{!! $asset->description !!}</div>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-white/10">
                <a href="{{ route('admin.gallery.index') }}"
                    class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">Cancel</a>
                <button type="submit"
                    class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all">Save
                    Changes</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function setMediaType(type) {
            const valInput = document.getElementById('media_type_val');
            const imgBtn = document.getElementById('media_type_image');
            const vidBtn = document.getElementById('media_type_video');
            const fileLabel = document.getElementById('file_label');
            const urlLabel = document.getElementById('url_label');
            const urlHelp = document.getElementById('url_help');
            const urlInput = document.getElementsByName('external_url')[0];

            valInput.value = type;
            if (type === 'image') {
                imgBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all bg-secondary text-white shadow-lg shadow-secondary/20';
                vidBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all text-on-surface-variant hover:bg-white/5';
                fileLabel.textContent = 'Replace Image File (Optional)';
                urlLabel.textContent = 'External Image URL';
                urlHelp.textContent = 'Provide the direct image URL.';
                urlInput.placeholder = 'https://images.unsplash.com/...';
            } else {
                vidBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all bg-secondary text-white shadow-lg shadow-secondary/20';
                imgBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all text-on-surface-variant hover:bg-white/5';
                fileLabel.textContent = 'Replace Video File (Optional)';
                urlLabel.textContent = 'YouTube Video Embed URL';
                urlHelp.textContent =
                'Provide a valid YouTube embed link (e.g., https://www.youtube.com/embed/dQw4w9WgXcQ)';
                urlInput.placeholder = 'https://www.youtube.com/embed/dQw4w9WgXcQ';
            }
        }

        function setUploadMethod(method) {
            const valInput = document.getElementById('upload_method_val');
            const fileBtn = document.getElementById('upload_method_file');
            const linkBtn = document.getElementById('upload_method_link');
            const fileContainer = document.getElementById('file_container');
            const urlContainer = document.getElementById('url_container');

            valInput.value = method;
            if (method === 'upload') {
                fileBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all bg-secondary text-white shadow-lg shadow-secondary/20';
                linkBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all text-on-surface-variant hover:bg-white/5';
                fileContainer.classList.remove('hidden');
                urlContainer.classList.add('hidden');
            } else {
                linkBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all bg-secondary text-white shadow-lg shadow-secondary/20';
                fileBtn.className =
                    'py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-1.5 transition-all text-on-surface-variant hover:bg-white/5';
                fileContainer.classList.add('hidden');
                urlContainer.classList.remove('hidden');
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Quill editor
            const quill = new Quill('#description_editor', {
                theme: 'snow',
                placeholder: 'Type description here...'
            });

            // Sync Quill HTML with hidden textarea on submit
            const form = document.querySelector('form:not(#logout-form)');
            form.onsubmit = function() {
                const descInput = document.getElementById('description_input');
                descInput.value = quill.root.innerHTML;
            };
        });
    </script>
@endsection
