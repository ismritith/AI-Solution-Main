@extends('Front.layouts.app')

@section('title', 'About Us & Core Solutions | AI-Solutions')

@section('content')
<!-- Glowing background blur blobs -->
<div class="bg-glow-main top-[5%] left-[10%] opacity-50"></div>
<div class="bg-glow-secondary top-[30%] right-[10%] opacity-40"></div>
<div class="bg-glow-main top-[60%] left-[20%] opacity-45"></div>

<!-- Origin story banner -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden py-24">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover opacity-25" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsc6C1AKSAiGZL6EMB_oXGr7BnYqNWFSsj4Vs4-YC5_vhBepEIuGOHgIn2ShsKi3RPJoQnXpQk9wk3I1KL_qaSeLNy8KerG3Mbtgd0Aq2Fum2Y9zkB1VRPb_JaLZT6w0G5HPbEPJN4nvcC0BhbdVXsnAiSa_6KHx96MUsIa6GWtiXwf1vXBl1A1j3i3ajUibzfFLFQoC6PC5fe9v6AdruTSLY-LrLAZagqA11uxEasK7kdeyCSsAzObpT5qMzusqUZdZVVVI52Poc4"/>
        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 via-primary/70 to-primary"></div>
    </div>
    
    <div class="relative z-10 max-w-container-max mx-auto px-gutter text-center space-y-6" data-aos="zoom-out">
        <span class="font-mono text-xs text-secondary uppercase tracking-[0.2em] mb-4 block font-bold">Our Origin Story</span>
        <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight">
            Pioneering the <br/><span class="text-gradient-coral italic">Neural Frontier</span>
        </h1>
        <p class="max-w-2xl mx-auto text-on-surface-variant font-body text-base md:text-lg leading-relaxed">
            We are more than a technology partner. We are digital architects of intelligence, engineering structural bridges between human innovation and automated systems.
        </p>
    </div>
</section>

<!-- Mission & Vision: Bento Grid -->
<section class="py-16 max-w-container-max mx-auto px-gutter">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Mission Card -->
        <div class="md:col-span-8 glass-card p-10 md:p-12 rounded-3xl relative overflow-hidden group" data-aos="fade-up">
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-secondary/15 rounded-full filter blur-3xl pointer-events-none"></div>
            <div class="flex flex-col h-full space-y-6 relative z-10">
                <span class="material-symbols-outlined text-secondary text-5xl font-bold">rocket_launch</span>
                <h2 class="font-display text-3xl font-extrabold text-white">Our Mission</h2>
                <p class="text-on-surface-variant text-base leading-relaxed">
                    To democratize enterprise-grade intelligence by developing seamless, fully secure automated platforms. We strive to diminish structural overheads, mitigate operational complexity, and amplify organizational capability using fine-tuned neural models.
                </p>
            </div>
        </div>

        <!-- Fast Fact 1 -->
        <div class="md:col-span-4 glass-card p-8 rounded-3xl flex flex-col justify-center items-center text-center space-y-3 hover:border-secondary/50" data-aos="fade-up" data-aos-delay="100">
            <div class="text-secondary font-display text-5xl font-black">+99.9%</div>
            <div class="font-mono text-xs text-on-surface-variant uppercase tracking-widest font-bold">Uptime Reliability</div>
        </div>

        <!-- Fast Fact 2 -->
        <div class="md:col-span-4 glass-card p-8 rounded-3xl flex flex-col justify-center items-center text-center space-y-3 hover:border-accent/50" data-aos="fade-up" data-aos-delay="200">
            <div class="text-accent font-display text-5xl font-black">240+</div>
            <div class="font-mono text-xs text-on-surface-variant uppercase tracking-widest font-bold">Global Partners</div>
        </div>

        <!-- Vision Card -->
        <div class="md:col-span-8 glass-card p-10 md:p-12 rounded-3xl relative overflow-hidden group" data-aos="fade-up" data-aos-delay="300">
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-accent/15 rounded-full filter blur-3xl pointer-events-none"></div>
            <div class="flex flex-col h-full space-y-6 relative z-10">
                <span class="material-symbols-outlined text-accent text-5xl font-bold">visibility</span>
                <h2 class="font-display text-3xl font-extrabold text-white">Our Vision</h2>
                <p class="text-on-surface-variant text-base leading-relaxed">
                    An interconnected global future where every operational node is optimized by invisible, secure, and highly intelligent agents. We envision frictionless enterprise environments that proactively anticipate demand, allocate tasks, and secure data pipelines.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Integrated Core Solutions Detailed Section -->
<section id="solutions" class="py-20 md:py-28 relative">
    <div class="max-w-container-max mx-auto px-gutter space-y-24">
        <div class="text-center space-y-4" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Solutions Overview</span>
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white">Core Architectural Modules</h2>
            <p class="font-body text-base text-on-surface-variant max-w-2xl mx-auto">
                Detailed insights into how our platform operates, automates, and optimizes organizational systems.
            </p>
        </div>

        <!-- Solution 1: BI -->
        <div id="bi" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center" data-aos="fade-up">
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                    <span class="font-mono text-xs text-on-surface uppercase">Business Intelligence</span>
                </div>
                <h3 class="font-display text-3xl md:text-4xl font-extrabold text-white">Real-Time Business Intelligence</h3>
                <p class="font-body text-base text-on-surface-variant leading-relaxed">
                    Aggregate complex live telemetry streams directly into a single system dashboard. Monitor transactions, infrastructure alerts, operational parameters, and resource workloads with sub-second sync latencies.
                </p>
                <ul class="space-y-3 font-body text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary text-base">check_circle</span> Customizable executive telemetry panels
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary text-base">check_circle</span> Multi-database synchronization nodes
                    </li>
                </ul>
            </div>
            <!-- Mock Dashboard Element -->
            <div class="lg:col-span-6 glass-card p-6 rounded-3xl border border-white/5 space-y-4 font-mono text-xs relative overflow-hidden">
                <div class="flex justify-between items-center pb-4 border-b border-white/10">
                    <span class="text-white font-bold">NEXUS SYSTEM MONITOR</span>
                    <span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded-full text-[10px] animate-pulse">LIVE NODE</span>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Transaction Bandwidth:</span>
                        <span class="text-white">41.2k req/sec</span>
                    </div>
                    <div class="w-full bg-white/5 h-2 rounded-full overflow-hidden">
                        <div class="bg-secondary h-full" style="width: 78%"></div>
                    </div>
                    <div class="flex justify-between pt-2">
                        <span class="text-on-surface-variant">Active Database Nodes:</span>
                        <span class="text-white">16/16 Sync</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Avg Latency Penalty:</span>
                        <span class="text-accent">0.14 ms</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Solution 2: Analytics -->
        <div id="analytics" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center lg:flex-row-reverse" data-aos="fade-up">
            <div class="lg:col-span-6 lg:order-2 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-accent/15 border border-accent/30 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
                    <span class="font-mono text-xs text-on-surface uppercase">Neural Analytics</span>
                </div>
                <h3 class="font-display text-3xl md:text-4xl font-extrabold text-white">Predictive Analytics Pipelines</h3>
                <p class="font-body text-base text-on-surface-variant leading-relaxed">
                    Look beyond standard reports. Our deep neural networks identify micro-trends, system decay loops, and market demand patterns weeks in advance with over 94% forecast precision scores.
                </p>
                <ul class="space-y-3 font-body text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent text-base">check_circle</span> Automated forecasting graphs
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent text-base">check_circle</span> System failure anomaly detectors
                    </li>
                </ul>
            </div>
            <!-- Mock Chart Element -->
            <div class="lg:col-span-6 lg:order-1 glass-card p-6 rounded-3xl border border-white/5 space-y-4 font-mono text-xs relative overflow-hidden">
                <div class="flex justify-between items-center pb-4 border-b border-white/10">
                    <span class="text-white font-bold">PREDICTIVE ANOMALY SCANNER</span>
                    <span class="text-accent font-bold">ACCURACY: 94.8%</span>
                </div>
                <div class="h-32 flex items-end gap-3 pt-4 justify-between">
                    <div class="bg-white/10 w-full h-12 rounded-t-md"></div>
                    <div class="bg-white/10 w-full h-20 rounded-t-md"></div>
                    <div class="bg-white/10 w-full h-16 rounded-t-md"></div>
                    <div class="bg-gradient-to-t from-secondary to-accent w-full h-28 rounded-t-md relative">
                        <span class="absolute -top-6 left-1/2 -translate-x-1/2 text-white font-bold">PEAK</span>
                    </div>
                </div>
                <p class="text-on-surface-variant text-[10px] text-center pt-2">PROJECTED SYSTEM SCALING CYCLE FOR Q3/Q4</p>
            </div>
        </div>

        <!-- Solution 3: AI Agents -->
        <div id="agents" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center" data-aos="fade-up">
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                    <span class="font-mono text-xs text-on-surface uppercase">Autonomous Units</span>
                </div>
                <h3 class="font-display text-3xl md:text-4xl font-extrabold text-white">Autonomous Task Orchestration</h3>
                <p class="font-body text-base text-on-surface-variant leading-relaxed">
                    Deploy secure AI Agents that communicate directly via isolated sandboxes to complete operations: update documentation, analyze product catalogs, check compliance schemas, or patch file buffers.
                </p>
                <ul class="space-y-3 font-body text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary text-base">check_circle</span> Multi-agent collaborative networks
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary text-base">check_circle</span> Strict isolated sandbox boundaries
                    </li>
                </ul>
            </div>
            <!-- Mock Agent Terminal Logs -->
            <div class="lg:col-span-6 glass-card p-6 rounded-3xl border border-white/5 space-y-3 font-mono text-xs relative overflow-hidden">
                <div class="flex gap-1.5 pb-2 border-b border-white/10">
                    <span class="text-white font-bold">AGENT WORKER TERMINAL #4</span>
                </div>
                <div class="space-y-1 text-on-surface-variant">
                    <p><span class="text-secondary">[08:44:12]</span> agent.init("catalog-sync")</p>
                    <p><span class="text-secondary">[08:44:13]</span> scanning product assets... (2,450 found)</p>
                    <p><span class="text-secondary">[08:44:15]</span> updating missing description strings...</p>
                    <p><span class="text-secondary">[08:44:19]</span> synchronizing catalogs across 3 channels...</p>
                    <p class="text-green-400 font-bold"><span class="text-on-surface-variant">[08:44:21]</span> SUCCESS: Sync completed. 0 errors.</p>
                </div>
            </div>
        </div>

        <!-- Solution 4: Automations -->
        <div id="automation" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center lg:flex-row-reverse" data-aos="fade-up">
            <div class="lg:col-span-6 lg:order-2 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-accent/15 border border-accent/30 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
                    <span class="font-mono text-xs text-on-surface uppercase">Workflows</span>
                </div>
                <h3 class="font-display text-3xl md:text-4xl font-extrabold text-white">Self-Healing Automations</h3>
                <p class="font-body text-base text-on-surface-variant leading-relaxed">
                    Create complex cross-stack operational flows. If an API fail is detected or an database connection timeout occurs, our engine automatically triggers fallback protocols to keep workloads moving without downtime.
                </p>
                <ul class="space-y-3 font-body text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent text-base">check_circle</span> Fallback self-healing algorithms
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent text-base">check_circle</span> Full audit trail trails logs
                    </li>
                </ul>
            </div>
            <!-- Mock healing element -->
            <div class="lg:col-span-6 lg:order-1 glass-card p-6 rounded-3xl border border-white/5 space-y-4 font-mono text-xs relative overflow-hidden">
                <div class="flex justify-between items-center pb-4 border-b border-white/10">
                    <span class="text-white font-bold">HEALING CONTROL CONSOLE</span>
                    <span class="text-accent font-bold">FALLBACK PROMPT ACTIVE</span>
                </div>
                <div class="space-y-2 text-on-surface-variant">
                    <div class="flex justify-between items-center bg-red-500/10 p-3 border border-red-500/20 rounded-xl">
                        <span class="text-red-400 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> API Node Fail</span>
                        <span class="text-[10px]">CRM Service (Timeout)</span>
                    </div>
                    <div class="text-center py-2"><span class="material-symbols-outlined text-accent animate-bounce">arrow_downward</span></div>
                    <div class="flex justify-between items-center bg-green-500/10 p-3 border border-green-500/20 rounded-xl">
                        <span class="text-green-400 font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">check_circle</span> Fallback Triggered</span>
                        <span class="text-[10px]">Cloud Backup Server v4</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- The Team Section -->
<section class="py-20 md:py-28 bg-[#05020c]/60 border-y border-white/5">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-20 space-y-4" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/15 border border-secondary/30 rounded-full">
                <span class="font-mono text-xs text-on-surface uppercase tracking-widest">Architects</span>
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white">The Neural Architects</h2>
            <p class="text-on-surface-variant font-body max-w-xl mx-auto">Diverse scientific minds, singular strategic focus: Engineering the future of automation.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="glass-card rounded-3xl overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
                <div class="h-80 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZOMpbR1qDj3ExFCXR4MCv7q_igsj3hn5b6aXp5jLL47Qj_ybceO5bd4kbHctYzIOXdOAX82rVXFVGouaoM30iZ7QhC-NdQVjLWruBfPtwU68RX_bfj6CtKMmaMW_CAquAoJU0BKjVw0VbNNcEhiWm4Q5x19Qi2hVTx4dLGsJnpp3tlX2rQi9_KLQU6HPGP_LkrGKmDylFRYHlmR2nVOI_XEkIN3UcS_QL3iiaz5NgF3MNxMaNR7lWK7odHduM8OcxiO-7b9jlCKKx"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-6 space-y-2">
                    <h3 class="font-display text-xl font-bold text-white">Dr. Aris Thorne</h3>
                    <p class="font-mono text-xs text-secondary font-bold">CEO & Founder</p>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="glass-card rounded-3xl overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                <div class="h-80 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAr_dWuNvlQKeaFL9ahsqm9EQg-ROpQBBzNFrt3E3a0DH54BWnVDTyxcEqbenocoEmq8lSz7zVmA54GW4tJNinbndoN4FhYVtMuqY2_oCgheRe1wsW-3dVVmfocFe5ip3z-ZWkge-kGLD4GmiJTT2UzJctlcnTLhqCCMcoC07ugoOkFEtgPwfF_EK3J-pYemcXZvNu8qAMc6Nvb-lTBpyLKVGM6iYLOavRDBRBgz10ZPhjLGdis2_jBiy-2k0XhA-0TJi4fP77g5g5n"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-6 space-y-2">
                    <h3 class="font-display text-xl font-bold text-white">Elena Vance</h3>
                    <p class="font-mono text-xs text-secondary font-bold">CTO</p>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="glass-card rounded-3xl overflow-hidden group" data-aos="fade-up" data-aos-delay="300">
                <div class="h-80 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdNgFxYrnQnolDvKBrAMf7VMRGvd0KoDgGQbA80olloDoYS87F2zZN9m8KQ2RoGEktkK8x-Q7M3BL2aQUbOhhV8Yo8mWGJGBxrRpu4uWbIcRHBd-UuxIg3_BIiJNy2yRlEHTkdiRIkB_CIDAWECT1zq4V0zTFp6uhQivsNxhxhDXEpfl1XAtpTsm-7xJbR0-RGYPamlW8b510X5ljrYBsrL8C9XiSk4ahwc9kA1D3hB4xiP4Tv9hocjFJZnF687fqyGdopdOXGroY9"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-6 space-y-2">
                    <h3 class="font-display text-xl font-bold text-white">Marcus Chen</h3>
                    <p class="font-mono text-xs text-secondary font-bold">Head of UX</p>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="glass-card rounded-3xl overflow-hidden group" data-aos="fade-up" data-aos-delay="400">
                <div class="h-80 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_Cf9EO_Vwt7WHUuSzLhr5zudz035rSbNaGDuhyLhQ4UnLi3MO5IP4KaBAubJL2WMgk-s16uJv7cWOVccXxAdDmSl0xv1SCiOUgZEEfB4TJQ_0zVgrgGfjq43cTQeHBalCnaIAakpto3FNCat4cL9KPI-MEHHe4NFpr4bFgFuztVGqQl_rtkS9sXDg8t8l9rReQuXd5S2CEZwXZ-Qgu1_D3sDtl8yPQkBBEbguFspbRdat1ehi_6Kz4BugSKqm4y6-sYSRmEDauhZ-"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent opacity-60"></div>
                </div>
                <div class="p-6 space-y-2">
                    <h3 class="font-display text-xl font-bold text-white">Sarah Jenkins</h3>
                    <p class="font-mono text-xs text-secondary font-bold">Neural Lead</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 md:py-28 relative">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="glass-card p-12 md:p-16 rounded-[40px] text-center relative overflow-hidden" data-aos="zoom-in">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-glow-secondary opacity-30 pointer-events-none"></div>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white mb-6">Ready to Evolve?</h2>
            <p class="text-on-surface-variant text-base md:text-lg mb-10 max-w-2xl mx-auto">
                Join forward-thinking enterprise leaders and optimize your processes with the absolute power of AI-Solutions.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn-gradient text-white px-8 py-3.5 rounded-xl font-body font-bold shadow-lg shadow-secondary/15">
                    Consult our Experts
                </a>
                <a href="/insights" class="glass-card text-on-surface px-8 py-3.5 rounded-xl font-body font-semibold hover:bg-white/10">
                    Browse Documentation
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
