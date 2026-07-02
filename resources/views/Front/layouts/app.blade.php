<!DOCTYPE html>
<html class="dark scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    
    <!-- SEO Best Practices -->
    <title>@yield('title', 'AI-Solutions | Next-Gen Enterprise Intelligence Platform')</title>
    <meta name="description" content="@yield('meta_description', 'Leverage autonomous AI agents, advanced analytics, and workflow automations to scale enterprise intelligence and grow your business.')"/>
    <meta name="keywords" content="AI, Artificial Intelligence, Business Intelligence, Automation, Analytics, AI Agents, Enterprise Analytics"/>
    <meta name="robots" content="index, follow"/>
    <link rel="canonical" href="{{ request()->url() }}"/>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- AOS Animation Library CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tailwind Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#080313",      // Deep space black-purple background
                        "secondary": "#a510b4",    // Brand purple
                        "accent": "#ff2e93",       // Vibrant hot-pink/magenta (matches second screenshot glow)
                        "error": "#ef4444",        // Standard error color
                        "surface-dark": "#0c061a", // Deep card base
                        "on-background": "#f1eaff",
                        "on-surface": "#eadaff",
                        "on-surface-variant": "#a79cb5",
                        "outline-variant": "rgba(255, 255, 255, 0.08)"
                    },
                    borderRadius: {
                        "DEFAULT": "0.375rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "3xl": "1.5rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "container-max": "1280px",
                        "gutter": "24px",
                        "section-gap": "100px"
                    },
                    fontFamily: {
                        "body": ["Inter", "sans-serif"],
                        "display": ["Outfit", "sans-serif"],
                        "mono": ["JetBrains Mono", "monospace"]
                    }
                }
            }
        }
    </script>

    <!-- Custom Premium Styles -->
    <style>
        body {
            background-color: #080313;
            color: #f1eaff;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        /* Glassmorphic elements with semi-transparent blurred backdrop */
        .glass-card {
            background: rgba(12, 6, 26, 0.45);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            border-color: rgba(165, 16, 180, 0.3);
            box-shadow: 0 20px 50px rgba(165, 16, 180, 0.15);
            transform: translateY(-2px);
        }

        /* Ambient Glowing Backgrounds */
        .bg-glow-main {
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(165, 16, 180, 0.12) 0%, rgba(255, 46, 147, 0.04) 50%, transparent 80%);
            filter: blur(80px);
            pointer-events: none;
            z-index: -1;
        }

        .bg-glow-secondary {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 46, 147, 0.08) 0%, rgba(165, 16, 180, 0.03) 60%, transparent 80%);
            filter: blur(90px);
            pointer-events: none;
            z-index: -1;
        }

        /* Modern Gradient Texts */
        .text-gradient-purple {
            background: linear-gradient(135deg, #ffffff 10%, #e879f9 50%, #a510b4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-coral {
            background: linear-gradient(135deg, #ff715b 0%, #ff2e93 50%, #a510b4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Glow buttons */
        .btn-gradient {
            background: linear-gradient(135deg, #a510b4 0%, #ff2e93 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ff2e93 0%, #a510b4 100%);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
        }

        .btn-gradient:hover::before {
            opacity: 1;
        }

        .btn-gradient:hover {
            box-shadow: 0 0 25px rgba(165, 16, 180, 0.5);
            transform: scale(1.02);
        }

        /* Material Icons custom rules */
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Hide scrollbars for sliders but retain functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-primary text-on-background antialiased font-body">

    <!-- Header Navigation -->
    <header class="fixed top-0 w-full z-50 bg-[#080313]/60 backdrop-blur-xl border-b border-white/10 shadow-lg">
        <div class="flex justify-between items-center max-w-container-max mx-auto px-gutter h-20">
            <!-- Logo Node -->
            <a href="/" class="flex items-center gap-3 group">
                <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-secondary to-accent flex items-center justify-center shadow-lg shadow-secondary/30 group-hover:scale-105 transition-all">
                    <span class="material-symbols-outlined text-white font-bold">hub</span>
                </span>
                <span class="font-display text-2xl font-black text-white tracking-tight group-hover:text-secondary transition-colors">
                    AI-Solutions
                </span>
            </a>

            <!-- Central Desktop Navigation links -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="/services" class="font-body text-sm font-medium transition-all duration-200 {{ request()->is('services*') || request()->is('service-details*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-on-surface-variant hover:text-white' }}">Services</a>
                <a href="/gallery" class="font-body text-sm font-medium transition-all duration-200 {{ request()->is('gallery*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-on-surface-variant hover:text-white' }}">Gallery</a>
                <a href="/insights" class="font-body text-sm font-medium transition-all duration-200 {{ request()->is('insights*') || request()->is('insights1*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-on-surface-variant hover:text-white' }}">Insights</a>
                <a href="/projects" class="font-body text-sm font-medium transition-all duration-200 {{ request()->is('projects*') || request()->is('projects1*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-on-surface-variant hover:text-white' }}">Projects</a>
                <a href="/events" class="font-body text-sm font-medium transition-all duration-200 {{ request()->is('events*') || request()->is('event1*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-on-surface-variant hover:text-white' }}">Events</a>
                <a href="/about" class="font-body text-sm font-medium transition-all duration-200 {{ request()->is('about*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-on-surface-variant hover:text-white' }}">About</a>
                <a href="/contact" class="font-body text-sm font-medium transition-all duration-200 {{ request()->is('contact*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-on-surface-variant hover:text-white' }}">Contact Us</a>
            </nav>

            <!-- Actions block -->
            <div class="flex items-center gap-2">
                
                <a href="/contact"
                class="inline-flex items-center justify-center font-body text-sm font-bold text-white btn-gradient px-6 py-2.5 rounded-xl">
                    Get Started
                </a>

                {{-- <a href="/admin_login"
                class="inline-flex items-center gap-2 font-body text-sm font-bold text-white glass-card px-6 py-2.5 rounded-xl hover:bg-white/10">
                    
                    <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-base">account_circle</span>
                    </span>

                    Admin Dashboard
                </a> --}}

            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="min-h-screen pt-20">
        @yield('content')
    </main>

    <!-- Global Footer -->
    <footer class="w-full bg-[#05020c] border-t border-outline-variant mt-20 relative overflow-hidden">
        <!-- Accent Glow behind footer content -->
        <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-96 h-96 bg-glow-secondary opacity-30"></div>

        <div class="max-w-container-max mx-auto px-gutter py-16 grid grid-cols-1 md:grid-cols-12 gap-10 relative z-10">
            <!-- Brand Info Column -->
            <div class="col-span-1 md:col-span-4 space-y-6">
                <a href="/" class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-secondary to-accent flex items-center justify-center">
                        <span class="material-symbols-outlined text-white font-bold">hub</span>
                    </span>
                    <span class="font-display text-2xl font-black text-white tracking-tight">
                        AI-Solutions
                    </span>
                </a>
                <p class="font-body text-on-surface-variant text-sm leading-relaxed max-w-sm">
                    Empowering modern organizations through fully autonomous agents, predictive pipelines, and secure enterprise intelligence.
                </p>

                <a href="/admin_login"
                class="inline-flex items-center gap-2 font-body text-sm font-bold text-white glass-card px-6 py-2.5 rounded-xl hover:bg-white/10">
                  
                    <span class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-base">account_circle</span>
                    </span>

                    Admin Dashboard
                </a>

                <div class="flex gap-4">
                    <a href="https://github.com/ismritith/AI-Solution" target="_blank" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-secondary/20 hover:border-secondary/40 transition-all text-on-surface hover:text-white" aria-label="Terminal Source Link">
                        <span class="material-symbols-outlined text-lg">code</span>
                    </a>
                    <a href="/about" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-secondary/20 hover:border-secondary/40 transition-all text-on-surface hover:text-white" aria-label="Groups Link">
                        <span class="material-symbols-outlined text-lg">groups</span>
                    </a>


                </div>
            </div>

            <!-- Solutions & Products links -->
            <div class="col-span-1 md:col-span-3 md:col-start-6">
                <h5 class="font-display text-xs font-bold text-white uppercase tracking-widest mb-6">Capabilities</h5>
                <ul class="space-y-4 font-body text-sm text-on-surface-variant">
                    <li><a href="/about#analytics" class="hover:text-secondary transition-colors">Business Analytics</a></li>
                    <li><a href="/about#automation" class="hover:text-secondary transition-colors">Workflow Automation</a></li>
                    <li><a href="/about#agents" class="hover:text-secondary transition-colors">Autonomous AI Agents</a></li>
                    <li><a href="/about#bi" class="hover:text-secondary transition-colors">Business Intelligence</a></li>
                </ul>
            </div>

            <!-- Company Info links -->
            <div class="col-span-1 md:col-span-2">
                <h5 class="font-display text-xs font-bold text-white uppercase tracking-widest mb-6">Company</h5>
                <ul class="space-y-4 font-body text-sm text-on-surface-variant">
                    <li><a href="/about" class="hover:text-secondary transition-colors">About Us</a></li>
                    <li><a href="/insights" class="hover:text-secondary transition-colors">Insights Hub</a></li>
                    <li><a href="/events" class="hover:text-secondary transition-colors">Global Events</a></li>
                    <li><a href="/contact" class="hover:text-secondary transition-colors">Contact Node</a></li>
                </ul>
            </div>

            <!-- Legal Info links -->
            <div class="col-span-1 md:col-span-2">
                <h5 class="font-display text-xs font-bold text-white uppercase tracking-widest mb-6">Security & legal</h5>
                <ul class="space-y-4 font-body text-sm text-on-surface-variant">
                    <li><a href="/about" class="hover:text-secondary transition-colors">Privacy Policy</a></li>
                    <li><a href="/about" class="hover:text-secondary transition-colors">Terms of Use</a></li>
                    <li><a href="/contact" class="hover:text-secondary transition-colors">Platform Support</a></li>

                </ul>

                
            </div>
        </div>

        <!-- Trademark bottom footer node -->
        <div class="max-w-container-max mx-auto px-gutter py-8 border-t border-outline-variant flex justify-center items-center relative z-10">
            <p class="font-body text-xs text-on-surface-variant text-center">
                 &copy; {{ date('Y') }} AI-Solutions Inc. Advancing Intelligence Through Innovation. | All rights reserved
            </p>
        </div>

            <p class="font-body text-xs text-on-surface-variant text-center">
                Developed by <a href="https://ismritith.com" target="_blank" class="text-secondary hover:text-white transition-colors">Ismritith</a> 
            </p>
    </footer>

    <!-- AOS Animation Library JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize Animate On Scroll with custom presets
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-cubic',
            delay: 100
        });
    </script>
    @include('Front.partials.chatbot')
    @yield('scripts')

    <!-- Global Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 z-[9999] hidden flex-col items-center justify-center bg-black/80 backdrop-blur-md pointer-events-auto">
        <div class="flex flex-col items-center gap-4 p-8 glass-card border-secondary/20 rounded-3xl max-w-sm text-center">
            <div class="w-16 h-16 border-4 border-secondary/20 border-t-secondary rounded-full animate-spin"></div>
            <p class="font-display text-lg font-bold text-white tracking-wide mt-2">Processing Transmission...</p>
            <p class="font-body text-xs text-on-surface-variant leading-relaxed">Securing nodes and sending mail confirmations. Please do not close this window.</p>
        </div>
    </div>

    <script>
        document.addEventListener('submit', function(e) {
            const form = e.target;
            if (form && form.getAttribute('data-ajax') === 'true') {
                if (!form.checkValidity()) {
                    return;
                }

                    // Prevent page refresh submit
                    e.preventDefault();

                    // Show loading overlay
                    const overlay = document.getElementById('loadingOverlay');
                    if (overlay) {
                        overlay.classList.remove('hidden');
                        overlay.classList.add('flex');
                    }

                    // Clear any previous alerts in this container
                    const prevAlerts = form.parentElement.querySelectorAll('.alert-box');
                    prevAlerts.forEach(alert => alert.remove());

                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        return response.json().then(data => {
                            if (!response.ok) {
                                throw new Error(data.message || (data.errors ? Object.values(data.errors).flat().join('\n') : 'An error occurred.'));
                            }
                            return data;
                        });
                    })
                    .then(data => {
                        // Success!
                        if (overlay) {
                            overlay.classList.add('hidden');
                            overlay.classList.remove('flex');
                        }

                        // Create success notification alert
                        const successAlert = document.createElement('div');
                        successAlert.className = 'alert-box bg-emerald-500/10 border border-emerald-500/30 rounded-xl p-4 flex items-center gap-3 text-emerald-400 text-sm mb-6';
                        successAlert.innerHTML = `
                            <span class="material-symbols-outlined">check_circle</span>
                            <span>${data.message || 'Transmission successful.'}</span>
                        `;
                        form.insertAdjacentElement('beforebegin', successAlert);

                        // Reset form fields
                        form.reset();

                        // Reset word count display if it exists in the form
                        const wordCount = form.querySelector('#word-count');
                        if (wordCount) {
                            wordCount.textContent = '0';
                        }

                        // Reset star rating to 5 if star rating button container exists
                        const starBtn5 = form.querySelector('.star-btn[data-rating="5"]');
                        if (starBtn5) {
                            starBtn5.click();
                        }
                    })
                    .catch(error => {
                        // Error!
                        if (overlay) {
                            overlay.classList.add('hidden');
                            overlay.classList.remove('flex');
                        }

                        // Create error notification alert
                        const errorAlert = document.createElement('div');
                        errorAlert.className = 'alert-box bg-error/10 border border-error/30 rounded-xl p-4 flex flex-col gap-2 text-error text-sm mb-6';
                        errorAlert.innerHTML = `
                            <div class="flex items-center gap-3 font-bold text-white">
                                <span class="material-symbols-outlined text-error">error</span>
                                Transmission Blocked
                            </div>
                            <div class="text-on-surface-variant whitespace-pre-line pl-8">${error.message}</div>
                        `;
                        form.insertAdjacentElement('beforebegin', errorAlert);
                    });
            }
        });
    </script>
</body>
</html>
