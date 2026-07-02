@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Edit Event')

@section('content')
<div class="glass-card rounded-2xl p-6 max-w-4xl mx-auto">
    <div class="mb-6">
        <h3 class="text-on-surface font-semibold text-lg">Modify Global System Event</h3>
        <p class="text-xs text-on-surface-variant">Update schedule registry coordinates for event #{{ $event->id }}</p>
    </div>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Event Title</label>
                <input type="text" name="title" value="{{ $event->title }}" required placeholder="e.g. Global AI Summit 2026" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Category</label>
                <select name="category" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
                    <option value="summit" {{ $event->category === 'summit' ? 'selected' : '' }}>Summit</option>
                    <option value="hackathon" {{ $event->category === 'hackathon' ? 'selected' : '' }}>Hackathon</option>
                    <option value="webinar" {{ $event->category === 'webinar' ? 'selected' : '' }}>Webinar</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Status Badge Text</label>
                <input type="text" name="status_badge" value="{{ $event->status_badge }}" required placeholder="e.g. Registrations Open" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Date</label>
                <input type="date" name="date_text" value="{{ $event->date_text }}" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Capacity</label>
                <input type="text" name="capacity" value="{{ $event->capacity }}" placeholder="e.g. 2,500 Nodes" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Location Node / Platform</label>
                <input type="text" name="location" value="{{ $event->location }}" required placeholder="e.g. San Francisco Tech Center / Zoom" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1" pattern="^[^<>_=|]+$" title="Cannot contain < > _ = |" oninput="this.value = this.value.replace(/[<>_=|]/g, '')">
            </div>

            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Replace Cover Banner Image (Optional)</label>
                <input type="file" name="banner" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface focus:ring-primary focus:border-primary focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary-container/20 file:text-primary hover:file:bg-primary-container/30">
                @if($event->main_image)
                    <p class="text-xs text-secondary mt-1">Active Cover: <a href="{{ asset($event->main_image) }}" target="_blank" class="underline">View current banner</a></p>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4 rounded-xl bg-white/5 border border-white/5">
            <div class="md:col-span-3">
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-primary font-bold">Ticket Registry Configuration</h4>
            </div>
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Primary Ticket Tier</label>
                <input type="text" name="ticket_tier" value="{{ $event->ticket_tier }}" placeholder="e.g. Full Pass" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1">
            </div>
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Price Label</label>
                <input type="text" name="ticket_price" value="{{ $event->ticket_price }}" placeholder="e.g. $299 / Free Entry" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1">
            </div>
            <div>
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Inclusions (Comma-separated)</label>
                <input type="text" name="ticket_inclusions" value="{{ $event->ticket_inclusions }}" placeholder="e.g. Dev Pack, Lunch, T-Shirt" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:ring-primary focus:border-primary focus:ring-1">
            </div>
        </div>

        <div>
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant mb-2">Event Scope & Details</label>
            <!-- Hidden textarea to store the description HTML for server submission -->
            <input type="hidden" name="description" id="description_input" value="{!! clean($event->description) !!}">
            <div id="description_editor" class="min-h-[200px]">{!! $event->description !!}</div>
        </div>

        <!-- Dynamic tracks repeater -->
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-4">
            <div>
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-secondary font-bold">Event Tracks (Optional)</h4>
                <p class="text-[10px] text-on-surface-variant mt-0.5">Specify specialized tracks for this summit or hackathon</p>
            </div>
            <div id="tracks_repeater" class="space-y-4">
                @if(!empty($event->tracks))
                    @foreach($event->tracks as $track)
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-3 rounded-lg border border-white/5 bg-white/5">
                            <input type="text" name="track_lbl[]" value="{{ $track['label'] ?? '' }}" placeholder="Track Tag" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                            <input type="text" name="track_name[]" value="{{ $track['name'] ?? '' }}" placeholder="Track Name" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                            <input type="text" name="track_desc[]" value="{{ $track['desc'] ?? '' }}" placeholder="Summary" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface md:col-span-2">
                            <input type="hidden" name="track_tags[]" value="">
                        </div>
                    @endforeach
                @else
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-3 rounded-lg border border-white/5 bg-white/5">
                        <input type="text" name="track_lbl[]" placeholder="Track Tag (e.g. 01)" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                        <input type="text" name="track_name[]" placeholder="Track Name" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                        <input type="text" name="track_desc[]" placeholder="Summary" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface md:col-span-2">
                        <input type="hidden" name="track_tags[]" value="">
                    </div>
                @endif
            </div>
            <button type="button" onclick="addTrackRow()" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">add</span> Add Track Row
            </button>
        </div>

        <!-- Dynamic agenda repeater -->
        <div class="p-4 rounded-xl bg-white/5 border border-white/5 space-y-4">
            <div>
                <h4 class="text-xs font-label-mono uppercase tracking-widest text-tertiary font-bold">Agenda Schedule (Optional)</h4>
                <p class="text-[10px] text-on-surface-variant mt-0.5">Schedule hours, sessions, stages and summaries</p>
            </div>
            <div id="agenda_repeater" class="space-y-4">
                @if(!empty($event->agenda))
                    @foreach($event->agenda as $slot)
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-3 rounded-lg border border-white/5 bg-white/5">
                            <input type="text" name="agenda_time[]" value="{{ $slot['time'] ?? '' }}" placeholder="Time Frame" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                            <input type="text" name="agenda_session[]" value="{{ $slot['session'] ?? '' }}" placeholder="Session Title" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                            <input type="text" name="agenda_stage[]" value="{{ $slot['stage'] ?? '' }}" placeholder="Stage Room" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                            <input type="text" name="agenda_summary[]" value="{{ $slot['summary'] ?? '' }}" placeholder="Session details..." class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                        </div>
                    @endforeach
                @else
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-3 rounded-lg border border-white/5 bg-white/5">
                        <input type="text" name="agenda_time[]" placeholder="Time Frame" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                        <input type="text" name="agenda_session[]" placeholder="Session Title" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                        <input type="text" name="agenda_stage[]" placeholder="Stage Room" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                        <input type="text" name="agenda_summary[]" placeholder="Session details..." class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
                    </div>
                @endif
            </div>
            <button type="button" onclick="addAgendaRow()" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">add</span> Add Agenda Slot
            </button>
        </div>

        <div class="flex justify-end gap-4 pt-4 border-t border-white/10">
            <a href="{{ route('admin.events.index') }}" class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">Cancel</a>
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all">Save Changes</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function addTrackRow() {
        const repeater = document.getElementById('tracks_repeater');
        const newRow = document.createElement('div');
        newRow.className = 'grid grid-cols-1 md:grid-cols-4 gap-4 p-3 rounded-lg border border-white/5 bg-white/5 mt-3';
        newRow.innerHTML = `
            <input type="text" name="track_lbl[]" placeholder="Track Tag" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
            <input type="text" name="track_name[]" placeholder="Track Name" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
            <input type="text" name="track_desc[]" placeholder="Summary" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface md:col-span-2">
            <input type="hidden" name="track_tags[]" value="">
        `;
        repeater.appendChild(newRow);
    }

    function addAgendaRow() {
        const repeater = document.getElementById('agenda_repeater');
        const newRow = document.createElement('div');
        newRow.className = 'grid grid-cols-1 md:grid-cols-4 gap-4 p-3 rounded-lg border border-white/5 bg-white/5 mt-3';
        newRow.innerHTML = `
            <input type="text" name="agenda_time[]" placeholder="Time Frame" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
            <input type="text" name="agenda_session[]" placeholder="Session Title" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
            <input type="text" name="agenda_stage[]" placeholder="Stage Room" class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
            <input type="text" name="agenda_summary[]" placeholder="Session details..." class="bg-surface-container border border-white/10 rounded-xl px-3 py-2 text-xs text-on-surface">
        `;
        repeater.appendChild(newRow);
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Quill editor
        const quill = new Quill('#description_editor', {
            theme: 'snow',
            placeholder: 'Type complete event scope description here...'
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
