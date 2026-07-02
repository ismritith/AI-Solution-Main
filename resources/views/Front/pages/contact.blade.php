@extends('Front.layouts.app')

@section('title', 'Contact Us | AI-Solutions')

@section('content')
<!-- Glowing background blur blobs -->
<div class="bg-glow-main top-[10%] left-[5%] opacity-55"></div>
<div class="bg-glow-secondary top-[50%] right-[5%] opacity-45"></div>

<!-- Banner Section -->
<section class="relative min-h-[50vh] flex items-center overflow-hidden py-20">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/60 to-transparent z-10"></div>
        <img class="w-full h-full object-cover opacity-30" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzB1MZRo0hdzYnkaz6xAfYxgitpxOsKBtSgS7_UkpczTxB_VMrEs6Gpzfl5Ne18kOhwZU_8Grf34A0-UxOmGNRQHLtgoesJPzMcjoTasozAizrhsKaLbR7a9XsZJIAmD93SNUkmHMMIk-tGsBAHaaUfrsFzwcponAXfG51-slQT-MIkP4kZezHVrLJrrMhHiu29JVwUe-JQMyhlB5ujyjNxGVw6A7zYkZrH3kZc39JnH0VyxnqTiJNLsXm-wETdPOwgjpTh7X-XmXD"/>
    </div>
    
    <div class="max-w-container-max mx-auto px-gutter relative z-20 w-full" data-aos="fade-up">
        <div class="max-w-3xl space-y-6">
            <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] mb-4 block font-bold">Connect with Excellence</span>
            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
                Let's build the <span class="text-gradient-purple">Intelligence</span> of tomorrow.
            </h1>
            <p class="font-body text-base md:text-lg text-on-surface-variant max-w-xl leading-relaxed">
                Our specialists are ready to architect your AI transformation. Reach out for technical inquiries, partnership opportunities, or system integration support.
            </p>
        </div>
    </div>
</section>

<!-- Content Section (Bento Grid Style) -->
<section class="max-w-container-max mx-auto px-gutter py-16 relative">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Contact Form (Left) -->
        <div class="lg:col-span-7 glass-card rounded-3xl p-8 md:p-12" data-aos="fade-right">
            @if(session('success'))
                <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-xl p-4 flex items-center gap-3 text-emerald-400 text-sm mb-6">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-error/10 border border-error/30 rounded-xl p-4 flex flex-col gap-2 text-error text-sm mb-6">
                    <div class="flex items-center gap-3 font-bold text-white">
                        <span class="material-symbols-outlined text-error">error</span>
                        Transmission Blocked
                    </div>
                    <ul class="list-disc pl-5 space-y-1 text-on-surface-variant">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2 class="font-display text-3xl font-extrabold text-white mb-8">Send a Transmission</h2>
<form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" data-ajax="true">
    @csrf

    {{-- Row 1: Name + Email --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Identity</label>
            <input name="name" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-white placeholder-on-surface-variant/40" placeholder="Your Name" type="text" value="{{ old('name') }}" pattern="^[A-Za-z\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')" required/>
        </div>
        <div class="space-y-2">
            <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Interface (Email)</label>
            <input name="email" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-white placeholder-on-surface-variant/40" placeholder="Email Address" type="email" value="{{ old('email') }}" required/>
        </div>
    </div>

    {{-- Row 2: Phone + Company --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Phone Number</label>
            <input name="phone" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-white placeholder-on-surface-variant/40" placeholder="+1 (555) 000-0000" type="tel" value="{{ old('phone') }}" pattern="^[\+\d\s\-\(\)]+$" title="Only phone numbers allowed" oninput="this.value = this.value.replace(/[^\+\d\s\-\(\)]/g, '')" required/>
        </div>
        <div class="space-y-2">
            <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Company Name</label>
            <input name="company" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-white placeholder-on-surface-variant/40" placeholder="Your Company" type="text" value="{{ old('company') }}" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&]/g, '')" required/>
        </div>
    </div>

    {{-- Row 3: Job Title + Country --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Job Title</label>
            <input name="job_title" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-white placeholder-on-surface-variant/40" placeholder="e.g. CTO, Software Engineer" type="text" value="{{ old('job_title') }}" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&,]/g, '')" required/>
        </div>
        <div class="space-y-2">
            <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Country</label>
            <select name="country" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-on-surface-variant appearance-none" required>
                <option value="" disabled {{ old('country') ? '' : 'selected' }}>Select your country</option>
                @php
                    $countries = ['Afghanistan','Albania','Algeria','Andorra','Angola','Argentina','Armenia','Australia','Austria','Azerbaijan','Bahrain','Bangladesh','Belarus','Belgium','Belize','Bolivia','Brazil','Cambodia','Canada','Chile','China','Colombia','Croatia','Cuba','Czech Republic','Denmark','Ecuador','Egypt','Estonia','Ethiopia','Finland','France','Germany','Ghana','Greece','Guatemala','Hungary','India','Indonesia','Iran','Iraq','Ireland','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kuwait','Latvia','Lebanon','Lithuania','Luxembourg','Malaysia','Mexico','Morocco','Myanmar','Nepal','Netherlands','New Zealand','Nigeria','Norway','Pakistan','Panama','Peru','Philippines','Poland','Portugal','Qatar','Romania','Russia','Saudi Arabia','Singapore','South Africa','South Korea','Spain','Sri Lanka','Sweden','Switzerland','Taiwan','Thailand','Turkey','Ukraine','United Arab Emirates','United Kingdom','United States','Venezuela','Vietnam','Other'];
                @endphp
                @foreach($countries as $country)
                    <option value="{{ $country }}" {{ old('country') === $country ? 'selected' : '' }}>{{ $country }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Department --}}
    <div class="space-y-2">
        <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Department</label>
        <select name="department" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-on-surface-variant appearance-none">
            <option {{ old('department') === 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
            <option {{ old('department') === 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
            <option {{ old('department') === 'Partnership Request' ? 'selected' : '' }}>Partnership Request</option>
            <option {{ old('department') === 'API Cloud Integration' ? 'selected' : '' }}>API Cloud Integration</option>
        </select>
    </div>

    {{-- Job Details --}}
    <div class="space-y-2 relative">
        <div class="flex justify-between items-end mb-1">
            <label class="font-mono text-xs text-on-surface-variant uppercase tracking-wider block">Job Details / Message Payload</label>
            <span id="word-count-display" class="font-mono text-[10px] text-on-surface-variant"><span id="word-count">0</span> / 250 words</span>
        </div>
        <textarea id="message-textarea" name="message" class="w-full bg-[#05020c] border border-white/5 focus:border-secondary px-4 py-3 text-body text-sm outline-none transition-all rounded-xl text-white placeholder-on-surface-variant/40" placeholder="Describe your requirements, project scope, or message in detail..." rows="5" required>{{ old('message') }}</textarea>
        <div id="word-limit-warning" class="text-error text-xs hidden mt-1">Maximum word limit (250) reached.</div>
    </div>

    <button class="w-full btn-gradient py-4 rounded-xl font-display text-sm text-white font-bold shadow-lg shadow-secondary/15 transform active:scale-98" type="submit">
        Initiate Connection
    </button>
</form>
            
        </div>
        
        <!-- Contact Info (Right Side Column) -->
        <div class="lg:col-span-5 space-y-8" data-aos="fade-left" data-aos-delay="200">
            <!-- Direct Info -->
            <div class="glass-card rounded-3xl p-8 space-y-6">
                <h3 class="font-display text-2xl font-bold text-white">Direct Nodes</h3>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center shrink-0 border border-secondary/20">
                            <span class="material-symbols-outlined text-secondary">mail</span>
                        </div>
                        <div>
                            <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest font-bold">PRIMARY MAILBOX</p>
                            <p class="font-body text-sm text-white pt-1">nexus@ai-solutions.tech</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center shrink-0 border border-accent/20">
                            <span class="material-symbols-outlined text-accent">location_on</span>
                        </div>
                        <div>
                            <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest font-bold">HQ LOCATION</p>
                            <p class="font-body text-sm text-white pt-1">Quantum Plaza, San Francisco, CA</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center shrink-0 border border-secondary/20">
                            <span class="material-symbols-outlined text-secondary">call</span>
                        </div>
                        <div>
                            <p class="font-mono text-[10px] text-on-surface-variant uppercase tracking-widest font-bold">VOICE LINK</p>
                            <p class="font-body text-sm text-white pt-1">+1 (888) AI-TRANSFORM</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map/Visual Element -->
            <div class="glass-card rounded-3xl overflow-hidden h-[240px] relative group border border-white/5">
                <div class="absolute inset-0 bg-primary/45 group-hover:bg-primary/25 transition-colors z-10"></div>
                <img class="w-full h-full object-cover grayscale brightness-75 group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCu0d9GU0-2LMqTr2Xtt7WOtlAutUolqIu2_zyDmniKM3fHjLaN_4MgKD-JD69LTqwJi7Wgt05vOCbmbcB3T9UcuY6ot6IMpQt7V_RC1GO1yd6y9QFa9OqNyl1kqsYhI-GU7eKM3dvcpECWcfhkuUCEHyLQz3CBqQkyvcYD0dTaE5590y_wbiI_ys-SWo1r6B08O98KXgu0KAKfDS6Rk9qV-HdmSd4MmIxtP6y0wt7pTQY1CYUP612hsn5QQd1Onki9kmEum9I9cN8d"/>
                <div class="absolute bottom-4 left-4 z-20">
                    <span class="bg-secondary/20 backdrop-blur-md border border-secondary/30 px-3 py-1 rounded-full font-mono text-[10px] font-bold text-secondary uppercase">Global HQ Node</span>
                </div>
            </div>
            
            <!-- Social Connectivity -->
            <div class="glass-card rounded-3xl p-8 space-y-4">
                <h3 class="font-mono text-xs text-on-surface-variant uppercase tracking-widest font-bold">Social Network</h3>
                <div class="flex gap-4">
                    <a class="w-12 h-12 rounded-xl border border-white/5 bg-white/5 flex items-center justify-center hover:bg-secondary/20 hover:border-secondary/40 transition-all text-on-surface-variant hover:text-white" href="#" aria-label="Share Link">
                        <span class="material-symbols-outlined">share</span>
                    </a>
                    <a class="w-12 h-12 rounded-xl border border-white/5 bg-white/5 flex items-center justify-center hover:bg-secondary/20 hover:border-secondary/40 transition-all text-on-surface-variant hover:text-white" href="#" aria-label="RSS Link">
                        <span class="material-symbols-outlined">rss_feed</span>
                    </a>
                    <a class="w-12 h-12 rounded-xl border border-white/5 bg-white/5 flex items-center justify-center hover:bg-secondary/20 hover:border-secondary/40 transition-all text-on-surface-variant hover:text-white" href="#" aria-label="Terminal Code Link">
                        <span class="material-symbols-outlined">code</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('message-textarea');
        const wordCountDisplay = document.getElementById('word-count');
        const warningDisplay = document.getElementById('word-limit-warning');
        
        if(textarea) {
            textarea.addEventListener('input', function() {
                const words = this.value.match(/\S+/g);
                const wordCount = words ? words.length : 0;
                
                wordCountDisplay.textContent = wordCount;
                
                if (wordCount > 250) {
                    warningDisplay.classList.remove('hidden');
                    wordCountDisplay.parentElement.classList.add('text-error');
                    wordCountDisplay.parentElement.classList.remove('text-on-surface-variant');
                    this.value = words.slice(0, 250).join(' ') + ' ';
                    wordCountDisplay.textContent = 250;
                } else {
                    warningDisplay.classList.add('hidden');
                    wordCountDisplay.parentElement.classList.remove('text-error');
                    wordCountDisplay.parentElement.classList.add('text-on-surface-variant');
                }
            });
            // trigger on load in case of old value
            textarea.dispatchEvent(new Event('input'));
        }
    });
</script>
@endsection
