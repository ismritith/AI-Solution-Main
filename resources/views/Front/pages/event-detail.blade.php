@extends('Front.layouts.app')

@section('title')
{{ $event->title ?? 'AI Global Summit' }} | AI-Solutions
@endsection

@section('styles')
    <style>
        .bg-glow-violet {
            background: radial-gradient(circle at center, rgba(124, 58, 237, 0.15) 0%, rgba(124, 58, 237, 0) 70%);
        }
        .bg-glow-cyan {
            background: radial-gradient(circle at center, rgba(76, 215, 246, 0.15) 0%, rgba(76, 215, 246, 0) 70%);
        }
        .btn-primary {
            background: linear-gradient(135deg, #7c3aed 0%, #03b5d3 100%);
            transition: all 200ms cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-primary:hover {
            box-shadow: 0 0 20px rgba(124, 58, 237, 0.5);
            transform: translateY(-1px);
        }
    </style>
@endsection

@section('content')
    @if(session('success'))
        <div class="max-w-container-max mx-auto px-gutter pt-8">
            <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-xl p-4 flex items-center gap-3 text-emerald-400 text-sm">
                <span class="material-symbols-outlined">check_circle</span>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if($event)
        <!-- Hero Section -->
        <section class="relative min-h-[600px] flex flex-col items-center justify-center px-gutter text-center py-section-gap overflow-hidden">
            <!-- Background Elements -->
            @if($event->main_image)
            <div class="absolute inset-0 -z-20 opacity-30">
                <img src="{{ asset($event->main_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
            </div>
            @endif
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-glow-violet -z-10"></div>
            <div class="absolute top-1/4 right-0 w-[600px] h-[600px] bg-glow-cyan -z-10"></div>
            
            <div class="max-w-4xl mx-auto space-y-8">
                <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-primary/10 border border-primary/20 text-secondary font-mono text-xs uppercase font-bold">
                    <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                    {{ $event->date_text }}
                </div>
                <h1 class="font-display text-4xl md:text-6xl font-extrabold text-white tracking-tighter leading-tight">
                    {{ $event->title }}
                </h1>
                <div class="font-body text-base md:text-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                    {!! $event->description !!}
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mt-12">
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-secondary text-3xl">location_on</span>
                        <span class="font-mono text-xs text-on-surface-variant uppercase tracking-widest">Venue</span>
                        <span class="font-body font-bold text-on-surface">{{ $event->location }}</span>
                    </div>
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-secondary text-3xl">event</span>
                        <span class="font-mono text-xs text-on-surface-variant uppercase tracking-widest">Date & Time</span>
                        <span class="font-body font-bold text-on-surface">{{ $event->date_text }}</span>
                    </div>
                    <div class="glass-card p-6 rounded-xl flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-accent text-3xl">hub</span>
                        <span class="font-mono text-xs text-on-surface-variant uppercase tracking-widest">Capacity Limit</span>
                        <span class="font-body font-bold text-on-surface">{{ $event->capacity }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Deep Dive Section (Bento Grid) -->
        @if($event->tracks && is_array($event->tracks))
            <section class="max-w-container-max mx-auto px-gutter py-16">
                <div class="mb-16">
                    <h2 class="font-display text-3xl font-extrabold text-white mb-4">Summit Core Tracks</h2>
                    <div class="h-1 w-24 bg-gradient-to-r from-secondary to-accent rounded-full"></div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    @foreach($event->tracks as $index => $track)
                        @php
                            $isWide = ($index % 3 === 0);
                            $colSpan = $isWide ? 'lg:col-span-8' : 'lg:col-span-4';
                        @endphp
                        <div class="{{ $colSpan }} glass-card p-8 rounded-2xl flex flex-col justify-between min-h-[300px]">
                            <div>
                                <div class="text-secondary font-mono text-xs mb-4">TRACK 0{{ $index + 1 }} // {{ strtoupper(is_array($track) ? ($track['category'] ?? $track['name'] ?? 'CORE') : 'CORE') }}</div>
                                <h3 class="font-display text-2xl font-extrabold text-white mb-6">{{ is_array($track) ? ($track['label'] ?? '') : $track }}</h3>
                                <p class="text-on-surface-variant font-body text-sm leading-relaxed">
                                    {{ is_array($track) ? ($track['desc'] ?? '') : '' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Agenda Section-->
        @if($event->agenda && is_array($event->agenda))
            <section class="py-16 bg-[#05020c]/60">
                <div class="max-w-container-max mx-auto px-gutter">
                    <div class="text-center mb-16">
                        <h2 class="font-display text-3xl md:text-5xl font-extrabold text-white mb-4">Summit Timeline</h2>
                        <p class="text-on-surface-variant font-body text-base">Schedule breakdown for core interactions and slots.</p>
                    </div>
                    
                    <div class="space-y-4">
                        @foreach($event->agenda as $slot)
                            <div class="group">
                                <div class="flex flex-col md:flex-row gap-6 p-8 glass-card rounded-2xl hover:bg-white/5 transition-all cursor-default">
                                    <div class="md:w-32 flex-shrink-0">
                                        <span class="font-mono text-secondary text-lg font-bold">{{ $slot['time'] }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-xl font-bold text-white mb-2">{{ $slot['title'] ?? $slot['session'] ?? '' }}</h4>
                                        <p class="text-on-surface-variant text-sm leading-relaxed">{{ $slot['desc'] ?? $slot['summary'] ?? '' }}</p>
                                    </div>
                                    @if(isset($slot['stage']))
                                        <div class="flex items-center">
                                            <span class="px-4 py-1 rounded-full border border-white/10 text-xs font-mono text-on-surface-variant">{{ strtoupper($slot['stage']) }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Pricing/CTA Section -->
        <section class="relative py-20 px-gutter overflow-hidden">
            <div class="absolute inset-0 bg-glow-violet opacity-30 -z-10"></div>
            <div class="max-w-4xl mx-auto glass-card p-12 rounded-3xl text-center border-secondary/20 bg-surface-dark/80">
                <div class="font-mono text-secondary mb-6 uppercase tracking-widest text-xs font-bold">JOIN THE CONVERGENCE</div>
                <h2 class="font-display text-3xl md:text-4xl font-extrabold text-white mb-8">Secure your seat at the summit.</h2>
                <div class="max-w-md mx-auto bg-[#05020c]/60 p-8 rounded-2xl border border-white/5 mb-10">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-on-surface-variant font-medium text-sm">Admission Fee</span>
                        <span class="text-secondary font-bold text-2xl">{{ $event->ticket_price }}</span>
                    </div>
                    <ul class="text-left space-y-3 mb-8">
                        @if($event->ticket_inclusions)
                            @foreach(explode("\n", $event->ticket_inclusions) as $inclusion)
                                @if(trim($inclusion))
                                    <li class="flex items-center gap-2 text-on-surface-variant text-sm">
                                        <span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        {{ trim($inclusion) }}
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <li class="flex items-center gap-2 text-on-surface-variant text-sm">
                                <span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                Full access pass to scheduled agendas
                            </li>
                            <li class="flex items-center gap-2 text-on-surface-variant text-sm">
                                <span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                Architect workshop credentials
                            </li>
                        @endif
                    </ul>
                    @php
                        $canBook = false;
                        try {
                            $eventDate = \Carbon\Carbon::parse($event->date_text);
                            if ($eventDate->isAfter(now())) {
                                $canBook = true;
                            }
                        } catch (\Exception $e) {
                            $canBook = str_contains(strtolower($event->status_badge ?? ''), 'open') || str_contains(strtolower($event->status_badge ?? ''), 'upcoming');
                        }
                    @endphp

                    @if($canBook)
                        <button onclick="openRegistrationModal()" class="block w-full btn-gradient text-white py-4 rounded-xl font-bold text-center text-lg">Reserve Attendance Pass</button>
                    @else
                        <button disabled class="block w-full bg-white/10 text-on-surface-variant/40 py-4 rounded-xl font-bold text-center text-lg cursor-not-allowed">Registration Closed (Event Passed)</button>
                    @endif
                </div>
            </div>
        </section>

        <!-- Registration Modal Popup -->
        <div id="registrationModal" class="fixed inset-0 z-50 hidden overflow-y-auto flex items-center justify-center p-4">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black/80 backdrop-blur-md" onclick="closeRegistrationModal()"></div>
            
            <!-- Modal Body -->
            <div class="glass-card w-full max-w-2xl rounded-3xl p-8 md:p-10 relative z-10 max-h-[90vh] overflow-y-auto border-secondary/20">
                <h3 class="font-display text-2xl md:text-3xl font-extrabold text-white mb-2">Reserve Attendance Pass</h3>
                <p class="text-on-surface-variant text-sm mb-6">Complete the registration protocol for <span class="text-secondary font-semibold">{{ $event->title }}</span></p>

                                @if($errors->any())
                    <div class="bg-error/10 border border-error/30 rounded-xl p-4 flex flex-col gap-2 text-error text-sm mb-6">
                        <div class="flex items-center gap-3 font-bold text-white">
                            <span class="material-symbols-outlined text-error">error</span>
                            Registration Blocked
                        </div>
                        <ul class="list-disc pl-5 space-y-1 text-on-surface-variant">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('event.register') }}" method="POST" class="space-y-6" data-ajax="true">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="event_name" value="{{ $event->title }}">

                    <!-- Registration Type -->
                    <div class="space-y-2">
                        <label class="block font-mono text-[11px] text-on-surface-variant uppercase tracking-widest">Registration Type</label>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2 cursor-pointer text-sm text-white font-medium">
                                <input type="radio" name="registration_type" value="individual" checked onchange="toggleRegType('individual')" class="accent-secondary bg-black border-white/10">
                                Individual Pass
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-sm text-white font-medium">
                                <input type="radio" name="registration_type" value="team" onchange="toggleRegType('team')" class="accent-secondary bg-black border-white/10">
                                Team Registration
                            </label>
                        </div>
                    </div>

                    <!-- Individual Fields -->
                    <div id="individualFields" class="space-y-4">
                        <div class="space-y-2">
                            <label class="block font-mono text-[11px] text-on-surface-variant uppercase tracking-widest">Full Name</label>
                            <input type="text" name="full_name" placeholder="John Connor" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all" pattern="^[A-Za-z\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                        </div>
                        <div class="space-y-2">
                            <label class="block font-mono text-[11px] text-on-surface-variant uppercase tracking-widest">Pass Selection</label>
                            <select name="pass_type" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-on-surface-variant outline-none transition-all cursor-pointer">
                                <option value="Standard Delegate">Standard Delegate</option>
                                <option value="VIP All-Access">VIP All-Access</option>
                                <option value="Free Pass">Free Pass (Limited)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Team Fields -->
                    <div id="teamFields" class="space-y-4 hidden">
                        <div class="space-y-2">
                            <label class="block font-mono text-[11px] text-on-surface-variant uppercase tracking-widest">Team Name</label>
                            <input type="text" name="team_name" placeholder="e.g. Cyberdyne Systems" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&]/g, '')">
                        </div>
                        <div class="space-y-2">
                            <label class="block font-mono text-[11px] text-on-surface-variant uppercase tracking-widest">Team Size</label>
                            <input type="number" name="team_size" value="3" min="1" max="10" onchange="generatePublicMemberRows(this.value)" class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white outline-none transition-all">
                        </div>
                        <div class="space-y-3">
                            <label class="block font-mono text-[11px] text-on-surface-variant uppercase tracking-widest">Team Members</label>
                            <div id="publicMemberRepeater" class="space-y-3 max-h-[200px] overflow-y-auto pr-2">
                                <!-- Dynamic rows -->
                            </div>
                        </div>
                    </div>

                    <!-- Common Contact Email -->
                    <div class="space-y-2">
                        <label id="emailInputLabel" class="block font-mono text-[11px] text-on-surface-variant uppercase tracking-widest">Contact Email</label>
                        <input type="email" name="email" placeholder="email@domain.com" required class="w-full bg-[#05020c] border border-white/10 focus:border-secondary px-4 py-3 text-sm rounded-xl text-white placeholder-on-surface-variant/40 outline-none transition-all">
                    </div>

                    <!-- Form Actions -->
                    <div class="pt-4 flex justify-end gap-4 border-t border-white/5">
                        <button type="button" onclick="closeRegistrationModal()" class="px-6 py-3 rounded-xl font-medium text-sm text-on-surface-variant hover:bg-white/5 transition-all">Cancel</button>
                        <button type="submit" class="px-8 py-3 rounded-xl font-bold text-sm text-white btn-gradient">Confirm Pass</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="max-w-4xl mx-auto text-center py-20">
            <h2 class="text-white font-bold text-2xl">Event Registry Node Empty</h2>
            <p class="text-on-surface-variant mt-2">The requested summit details are currently offline.</p>
        </div>
    @endif
@endsection

@section('scripts')
<script>
    function openRegistrationModal() {
        const modal = document.getElementById('registrationModal');
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        
        const checkedRadio = document.querySelector('input[name="registration_type"]:checked');
        toggleRegType(checkedRadio ? checkedRadio.value : 'individual');
    }

    function closeRegistrationModal() {
        const modal = document.getElementById('registrationModal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function toggleRegType(type) {
        const individualFields = document.getElementById('individualFields');
        const teamFields = document.getElementById('teamFields');
        const emailLabel = document.getElementById('emailInputLabel');
        
        const fullNameInput = individualFields.querySelector('input[name="full_name"]');
        const teamNameInput = teamFields.querySelector('input[name="team_name"]');

        if (type === 'individual') {
            individualFields.classList.remove('hidden');
            teamFields.classList.add('hidden');
            emailLabel.textContent = 'Contact Email';
            
            fullNameInput.required = true;
            teamNameInput.required = false;
            teamNameInput.value = '';
            
            document.getElementById('publicMemberRepeater').innerHTML = '';
        } else {
            individualFields.classList.add('hidden');
            teamFields.classList.remove('hidden');
            emailLabel.textContent = 'Team Lead Email';
            
            fullNameInput.required = false;
            fullNameInput.value = '';
            teamNameInput.required = true;
            
            const teamSizeInput = document.querySelector('input[name="team_size"]');
            generatePublicMemberRows(teamSizeInput ? teamSizeInput.value : 3);
        }
    }

    function generatePublicMemberRows(count) {
        const container = document.getElementById('publicMemberRepeater');
        container.innerHTML = '';
        for (let i = 0; i < count; i++) {
            const div = document.createElement('div');
            div.className = 'grid grid-cols-2 gap-3';
            div.innerHTML = `
                <input type="text" name="members[${i}][name]" placeholder="Member #${i+1} Name" required class="bg-[#05020c] border border-white/10 focus:border-secondary px-3 py-2 text-xs rounded-lg text-white" pattern="^[A-Za-z\\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\\s]/g, '')">
                <input type="email" name="members[${i}][email]" placeholder="Member #${i+1} Email" required class="bg-[#05020c] border border-white/10 focus:border-secondary px-3 py-2 text-xs rounded-lg text-white">
            `;
            container.appendChild(div);
        }
    }

        document.addEventListener('DOMContentLoaded', function() {
        if(window.location.hash === '#register' || {{ $errors->any() ? 'true' : 'false' }}) {
            openRegistrationModal();
        }
    });
</script>
@endsection