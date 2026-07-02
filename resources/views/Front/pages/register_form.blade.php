@extends('Front.layouts.app')

@section('title', 'Insights Hub | AI-Solutions')

@section('content')
<!-- Glowing background blur blobs -->
<div class="bg-glow-main top-[10%] left-[-5%] opacity-55"></div>
<div class="bg-glow-secondary top-[60%] right-[-5%] opacity-40"></div>

<!-- Main Content -->
<main class="relative pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Column: Registration Form -->
<div class="lg:col-span-8">
<header class="mb-12">
<h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
    Registration <span class="text-gradient-purple">Phase.</span>
</h1>
<br>

<h1 class="font-display text-5xl md:text-4xl font-extrabold text-gradient-purple leading-tight">
    Autonomous Agents Hackathon.
</h1>
<br>

<p class="font-body-lg text-on-surface-variant max-w-2xl">Shape the future of cognitive computing. Assemble your team and pitch your vision for the next generation of autonomous digital entities.</p>
</header>
<!-- Progress Indicator -->
<div class="flex items-center space-x-4 mb-12">
<div class="step-dot flex flex-col items-center group cursor-pointer" onclick="goToStep(1)">
<div class="w-10 h-10 rounded-full flex items-center justify-center glass-panel border-primary text-primary transition-all duration-300" id="dot-1">1</div>
<span class="font-label-caps text-on-surface-variant mt-2">Team</span>
</div>
<div class="h-px flex-1 bg-white/10 mb-6"></div>
<div class="step-dot flex flex-col items-center group cursor-pointer" onclick="goToStep(2)">
<div class="w-10 h-10 rounded-full flex items-center justify-center glass-panel text-on-surface-variant transition-all duration-300" id="dot-2">2</div>
<span class="font-label-caps text-on-surface-variant mt-2">Members</span>
</div>
<div class="h-px flex-1 bg-white/10 mb-6"></div>
<div class="step-dot flex flex-col items-center group cursor-pointer" onclick="goToStep(3)">
<div class="w-10 h-10 rounded-full flex items-center justify-center glass-panel text-on-surface-variant transition-all duration-300" id="dot-3">3</div>
<span class="font-label-caps text-on-surface-variant mt-2">Concept</span>
</div>
</div>
<!-- Form Container -->
<form class="glass-panel rounded-xl p-8 md:p-12 relative overflow-hidden" id="registrationForm">
<div class="step-transition" id="form-step-1">
<h2 class="font-headline-md text-on-surface mb-8 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">groups</span> Step 1: Team Information
                        </h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="space-y-2">
<label class="font-label-caps text-on-surface-variant">Team Name</label>
<input class="w-full bg-black/20 border border-white/10 rounded-lg p-4 font-body-md text-on-surface focus:ring-1 focus:ring-tertiary transition-all" placeholder="e.g. Neural Nexus" type="text" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&]/g, '')" />
</div>
<div class="space-y-2">
<label class="font-label-caps text-on-surface-variant">Lead Developer Email</label>
<input class="w-full bg-black/20 border border-white/10 rounded-lg p-4 font-body-md text-on-surface focus:ring-1 focus:ring-tertiary transition-all" placeholder="lead@agent-hack.io" type="email"/>
</div>
<div class="md:col-span-2 space-y-2">
<label class="font-label-caps text-on-surface-variant">Primary Organization (Optional)</label>
<input class="w-full bg-black/20 border border-white/10 rounded-lg p-4 font-body-md text-on-surface focus:ring-1 focus:ring-tertiary transition-all" placeholder="University, Startup, or Research Lab" type="text" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\-&]/g, '')" />
</div>
</div>
<div class="mt-12 flex justify-end">
<button class="bg-gradient-to-r from-primary-container to-secondary text-white px-8 py-3 rounded-lg font-bold hover:scale-105 transition-transform" onclick="goToStep(2)" type="button">Next: Add Members</button>
</div>
</div>
<div class="step-transition hidden opacity-0 translate-x-8" id="form-step-2">
<h2 class="font-headline-md text-on-surface mb-8 flex items-center gap-2">
<span class="material-symbols-outlined text-tertiary">person_add</span> Step 2: Member Details
                        </h2>
<div class="space-y-6">
<div class="space-y-4" id="member-container">
<!-- Member Row 1 -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 rounded-lg bg-white/5 border border-white/5">
<input class="bg-black/20 border border-white/10 rounded-lg p-3 font-body-md text-on-surface" placeholder="Full Name" type="text" pattern="^[A-Za-z\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')" />
<select class="bg-black/20 border border-white/10 rounded-lg p-3 font-body-md text-on-surface">
<option>Lead Engineer</option>
<option>AI Researcher</option>
<option>Product Designer</option>
<option>Full-stack Dev</option>
</select>
<input class="bg-black/20 border border-white/10 rounded-lg p-3 font-body-md text-on-surface" placeholder="GitHub Handle" type="text"/>
</div>
<!-- Placeholder for more members -->
<div id="extra-members"></div>
</div>
<button class="flex items-center gap-2 font-label-mono text-tertiary hover:text-primary transition-colors" onclick="addMember()" type="button">
<span class="material-symbols-outlined text-sm">add_circle</span> Add Member (Up to 4)
                            </button>
</div>
<div class="mt-12 flex justify-between">
<button class="border border-white/10 text-on-surface px-8 py-3 rounded-lg font-bold hover:bg-white/5 transition-colors" onclick="goToStep(1)" type="button">Back</button>
<button class="bg-gradient-to-r from-primary-container to-secondary text-white px-8 py-3 rounded-lg font-bold hover:scale-105 transition-transform" onclick="goToStep(3)" type="button">Next: Project Pitch</button>
</div>
</div>
<div class="step-transition hidden opacity-0 translate-x-8" id="form-step-3">
<h2 class="font-headline-md text-on-surface mb-8 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary">lightbulb</span> Step 3: Project Concept
                        </h2>
<div class="space-y-8">
<div class="space-y-2">
<label class="font-label-caps text-on-surface-variant">The 140-Character Elevator Pitch</label>
<textarea class="w-full bg-black/20 border border-white/10 rounded-lg p-4 font-body-md text-on-surface resize-none" placeholder="Building a swarm of task-oriented agents that manage cross-chain DeFi liquidity..." rows="2"></textarea>
</div>
<div class="space-y-2">
<label class="font-label-caps text-on-surface-variant">Core Technology Stack</label>
<div class="flex flex-wrap gap-3">
<span class="px-4 py-2 rounded-full glass-panel border-white/10 text-tertiary font-label-mono text-xs cursor-pointer hover:bg-tertiary/10">LangChain</span>
<span class="px-4 py-2 rounded-full glass-panel border-white/10 text-tertiary font-label-mono text-xs cursor-pointer hover:bg-tertiary/10">AutoGPT</span>
<span class="px-4 py-2 rounded-full glass-panel border-white/10 text-tertiary font-label-mono text-xs cursor-pointer hover:bg-tertiary/10">BabyAGI</span>
<span class="px-4 py-2 rounded-full glass-panel border-white/10 text-tertiary font-label-mono text-xs cursor-pointer hover:bg-tertiary/10">Rust</span>
<span class="px-4 py-2 rounded-full glass-panel border-white/10 text-tertiary font-label-mono text-xs cursor-pointer hover:bg-tertiary/10">Python</span>
<input class="bg-transparent border-none p-0 px-2 font-label-mono text-xs text-on-surface-variant w-24" placeholder="+ Add custom" type="text"/>
</div>
</div>
</div>
<div class="mt-12 flex justify-between">
<button class="border border-white/10 text-on-surface px-8 py-3 rounded-lg font-bold hover:bg-white/5 transition-colors" onclick="goToStep(2)" type="button">Back</button>
<button class="bg-gradient-to-r from-primary-container to-secondary text-white px-10 py-4 rounded-lg font-bold shadow-lg shadow-primary-container/20 hover:scale-105 active:scale-95 transition-all" type="submit">Submit Registration</button>
</div>
</div>
</form>
</div>
<!-- Right Column: KPIs and Details -->
<div class="lg:col-span-4 space-y-gutter">
<!-- Event Stats -->
<div class="glass-panel rounded-xl p-8 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-secondary opacity-5 blur-3xl -mr-16 -mt-16 group-hover:opacity-10 transition-opacity"></div>
<h3 class="font-label-caps text-on-surface-variant mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">analytics</span> Event Specifications
        </h3>
<div class="space-y-6">
<div class="flex items-center justify-between border-b border-white/5 pb-4">
<div>
<p class="font-headline-md text-primary">$50,000</p>
<p class="font-label-caps text-on-surface-variant text-[14px]">Total Prize Pool</p>
</div>
<span class="material-symbols-outlined text-primary-container/40">payments</span>
</div>
<div class="flex items-center justify-between border-b border-white/5 pb-4">
<div>
<p class="font-headline-md text-tertiary">48 Hours</p>
<p class="font-label-caps text-on-surface-variant text-[10px]">Development Sprint</p>
</div>
<span class="material-symbols-outlined text-tertiary/40">timer</span>
</div>
<div class="flex items-center justify-between">
<div>
<p class="font-headline-md text-secondary">Global</p>
<p class="font-label-caps text-on-surface-variant text-[10px]">Participation Access</p>
</div>
<span class="material-symbols-outlined text-secondary/40">public</span>
</div>
</div>
</div>
<!-- Featured Image -->
<div class="glass-panel rounded-xl overflow-hidden group">
<img class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700" data-alt="A futuristic and sophisticated visualization of autonomous AI agents represented as glowing nodes and ethereal connections within a dark, deep space void. The scene is illuminated by intense coral and purple light trails that suggest high-speed data transfer and computational energy. The aesthetic is clean and professional, using glassmorphism effects and sharp specular highlights to convey a premium tech-focused atmosphere suitable for an elite developer hackathon." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA73mijYDI2mFpPqcAT0R8-afhASiSO1JgWIM885Aesz86X3iBg5qlx2RzIMJtJpjS8VFtSIHWAqzVxo1bgeyJjnrb6AeDUyMjdx5ezoM3qM7RgQD_zT-PlYTsnJLKjm7Xac6RqoWk_WP4qsfaP54M2TadMpycXr9g54OGmq8Cpk7Vu33hgH5qN5Ne2eO2AydwJ7tChaPiWmU7InwDRK7SLg0_QDUgcWuzqvCAy7QWV6L0LftnMs0JIKVzUTqUqLC3TnFfM7uawxUyb"/>
<div class="p-6">
<h4 class="font-headline-md text-on-surface text-lg mb-2">Hackathon Theme: Synergistic Autonomy</h4>
<p class="font-body-md text-on-surface-variant text-sm">We are looking for agents that don't just solve tasks, but collaborate with other digital entities to create emergent value.</p>
</div>
</div>
<!-- Support Card -->
<div class="glass-panel rounded-xl p-8 border-tertiary/10">
<h3 class="font-headline-md text-lg mb-4">Need Help?</h3>
<p class="font-body-md text-on-surface-variant mb-6 text-sm">Our technical mentors are available 24/7 on Discord to help you refine your concept or find teammates.</p>
<button class="w-full border border-tertiary text-tertiary py-3 rounded-lg font-bold hover:bg-tertiary/10 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined">forum</span> Join Hackathon Discord
                    </button>
</div>
</div>
</div>
</main>
@endsection
<script>
        let currentStep = 1;
        const totalSteps = 3;
        let memberCount = 1;

        function goToStep(step) {
            // Hide all steps
            for (let i = 1; i <= totalSteps; i++) {
                const el = document.getElementById(`form-step-${i}`);
                const dot = document.getElementById(`dot-${i}`);
                
                if (i === step) {
                    el.classList.remove('hidden');
                    setTimeout(() => {
                        el.classList.remove('opacity-0', 'translate-x-8');
                    }, 50);
                    dot.classList.add('border-primary', 'text-primary');
                    dot.classList.remove('text-on-surface-variant');
                } else {
                    el.classList.add('hidden', 'opacity-0', 'translate-x-8');
                    if (i > step) {
                        dot.classList.remove('border-primary', 'text-primary');
                        dot.classList.add('text-on-surface-variant');
                    }
                }
            }
            currentStep = step;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function addMember() {
            if (memberCount < 4) {
                memberCount++;
                const container = document.getElementById('extra-members');
                const row = document.createElement('div');
                row.className = 'grid grid-cols-1 md:grid-cols-3 gap-4 p-4 rounded-lg bg-white/5 border border-white/5 mt-4 opacity-0 transition-opacity duration-300';
                row.innerHTML = `
                    <input type="text" placeholder="Full Name" class="bg-black/20 border border-white/10 rounded-lg p-3 font-body-md text-on-surface" pattern="^[A-Za-z\\s]+$" title="Only letters and spaces are allowed" oninput="this.value = this.value.replace(/[^A-Za-z\\s]/g, '')">
                    <select class="bg-black/20 border border-white/10 rounded-lg p-3 font-body-md text-on-surface">
                        <option>Contributor</option>
                        <option>Designer</option>
                        <option>Full-stack Dev</option>
                        <option>AI Engineer</option>
                    </select>
                    <input type="text" placeholder="GitHub Handle" class="bg-black/20 border border-white/10 rounded-lg p-3 font-body-md text-on-surface">
                `;
                container.appendChild(row);
                setTimeout(() => row.classList.remove('opacity-0'), 10);
            } else {
                alert("Max 4 members per team.");
            }
        }

        document.getElementById('registrationForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert("Registration successful! Redirecting to dashboard...");
        });
    </script>
</body></html>