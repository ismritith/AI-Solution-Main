@extends('admin.layouts.app')

@section('title', 'AI-Solutions Admin | Edit Registration')

@section('content')
<div class="glass-card rounded-2xl p-8 max-w-3xl mx-auto space-y-6">
    <div class="flex justify-between items-center pb-4 border-b border-white/10">
        <div>
            <h3 class="text-on-surface font-semibold text-lg">Edit Registration #{{ $registration->id }}</h3>
            <p class="text-xs text-on-surface-variant">Modify event registration specifications</p>
        </div>
        <a href="{{ route('admin.registrations.index') }}" class="py-1.5 px-3 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 text-xs text-on-surface flex items-center gap-1">
            <span class="material-symbols-outlined text-xs">arrow_back</span> Back to List
        </a>
    </div>

    <form action="{{ route('admin.registrations.update', $registration) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Registration Type Toggle -->
        <div class="space-y-2">
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Registration Type</label>
            <div class="flex gap-3">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="registration_type" value="team" {{ $registration->registration_type === 'team' ? 'checked' : '' }} onchange="toggleMode()" class="accent-primary">
                    <span class="text-sm text-on-surface font-medium">Team</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="registration_type" value="individual" {{ $registration->registration_type === 'individual' ? 'checked' : '' }} onchange="toggleMode()" class="accent-primary">
                    <span class="text-sm text-on-surface font-medium">Individual</span>
                </label>
            </div>
        </div>

        <!-- Team Name (Team mode only) -->
        <div id="teamNameField" class="space-y-2 {{ $registration->registration_type !== 'team' ? 'hidden' : '' }}">
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Team Name</label>
            <input type="text" name="team_name" value="{{ old('team_name', $registration->team_name) }}" placeholder="e.g. Cyberdyne Systems" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
        </div>

        <!-- Full Name (Individual mode only) -->
        <div id="fullNameField" class="space-y-2 {{ $registration->registration_type !== 'individual' ? 'hidden' : '' }}">
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Full Name</label>
            <input type="text" name="full_name" value="{{ old('full_name', $registration->full_name) }}" placeholder="John Connor" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Email</label>
                <input type="email" name="email" value="{{ old('email', $registration->email) }}" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
            </div>
            <div class="space-y-2">
                <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Event Name</label>
                <input type="text" name="event_name" value="{{ old('event_name', $registration->event_name) }}" required class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
            </div>
        </div>

        <!-- Team Size (Team mode only) -->
        <div id="teamSizeField" class="space-y-2 {{ $registration->registration_type !== 'team' ? 'hidden' : '' }}">
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Team Size</label>
            <input type="number" name="team_size" value="{{ old('team_size', $registration->team_size) }}" min="1" max="20" onchange="updateMemberRows(this.value)" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
        </div>

        <!-- Pass Type (Individual mode only) -->
        <div id="passTypeField" class="space-y-2 {{ $registration->registration_type !== 'individual' ? 'hidden' : '' }}">
            <label class="block text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Pass Type</label>
            <select name="pass_type" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                <option value="">Select Pass Type</option>
                <option value="Free Pass" {{ $registration->pass_type === 'Free Pass' ? 'selected' : '' }}>Free Pass (Limited)</option>
                <option value="Standard Delegate" {{ $registration->pass_type === 'Standard Delegate' ? 'selected' : '' }}>Standard Delegate</option>
                <option value="VIP All-Access" {{ $registration->pass_type === 'VIP All-Access' ? 'selected' : '' }}>VIP All-Access</option>
            </select>
        </div>

        <!-- Team Members Repeater -->
        <div id="memberSection" class="{{ $registration->registration_type !== 'team' ? 'hidden' : '' }} space-y-4">
            <div class="flex items-center gap-3 border-b border-white/5 pb-3">
                <span class="material-symbols-outlined text-secondary">groups</span>
                <span class="text-xs font-label-mono uppercase tracking-widest text-on-surface-variant">Team Member Roster</span>
            </div>
            <div id="memberRepeater" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @if($registration->members && is_array($registration->members))
                    @foreach($registration->members as $index => $member)
                        <div class="grid grid-cols-2 gap-3">
                            <div class="space-y-1">
                                <label class="text-[10px] font-label-mono text-on-surface-variant uppercase">Member #{{ $index + 1 }} Name</label>
                                <input type="text" name="members[{{ $index }}][name]" value="{{ $member['name'] ?? '' }}" placeholder="Full Name" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-label-mono text-on-surface-variant uppercase">Member #{{ $index + 1 }} Email</label>
                                <input type="email" name="members[{{ $index }}][email]" value="{{ $member['email'] ?? '' }}" placeholder="email@domain.com" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="flex justify-end gap-4 pt-4 border-t border-white/10">
            <a href="{{ route('admin.registrations.index') }}" class="py-2.5 px-5 rounded-xl bg-surface-container-highest/30 hover:bg-surface-container-highest text-sm text-on-surface-variant transition-colors">Cancel</a>
            <button type="submit" class="py-2.5 px-5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all">Save Changes</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function toggleMode() {
        const mode = document.querySelector('input[name="registration_type"]:checked').value;
        document.getElementById('teamNameField').classList.toggle('hidden', mode !== 'team');
        document.getElementById('fullNameField').classList.toggle('hidden', mode !== 'individual');
        document.getElementById('teamSizeField').classList.toggle('hidden', mode !== 'team');
        document.getElementById('passTypeField').classList.toggle('hidden', mode !== 'individual');
        document.getElementById('memberSection').classList.toggle('hidden', mode !== 'team');
    }

    function updateMemberRows(count) {
        const container = document.getElementById('memberRepeater');
        container.innerHTML = '';
        for (let i = 0; i < count; i++) {
            const div = document.createElement('div');
            div.className = 'grid grid-cols-2 gap-3';
            div.innerHTML = `
                <div class="space-y-1">
                    <label class="text-[10px] font-label-mono text-on-surface-variant uppercase">Member #${i + 1} Name</label>
                    <input type="text" name="members[${i}][name]" placeholder="Full Name" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-label-mono text-on-surface-variant uppercase">Member #${i + 1} Email</label>
                    <input type="email" name="members[${i}][email]" placeholder="email@domain.com" class="w-full bg-surface-container border border-white/10 rounded-xl px-4 py-2.5 text-sm text-on-surface">
                </div>
            `;
            container.appendChild(div);
        }
    }
</script>
@endsection
