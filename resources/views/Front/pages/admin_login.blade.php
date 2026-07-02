<!DOCTYPE html>
<html class="dark" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AI-Solutions Admin | Secure Gateway</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Geist:wght@400;600;700;800&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#d2bbff",
                    "primary-container": "#7c3aed",
                    "secondary": "#a510b4",
                    "accent": "#ff2e93",
                    "surface-dark": "#0c061a",
                    "surface-container": "#171f33",
                    "on-background": "#f1eaff",
                    "on-surface": "#eadaff",
                    "on-surface-variant": "#a79cb5",
                    "outline-variant": "rgba(255, 255, 255, 0.08)",
                    "error": "#ffb4ab"
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
                    "display": ["Geist", "sans-serif"],
                    "mono": ["JetBrains Mono", "monospace"]
                }
            }
        }
    }
</script>

<style>
    body {
        background-color: #080313;
        color: #f1eaff;
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
        position: relative;
    }

    .glass-card {
        background: rgba(12, 6, 26, 0.45);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .bg-glow-main {
        position: fixed;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(165, 16, 180, 0.16) 0%, rgba(255, 46, 147, 0.05) 50%, transparent 80%);
        filter: blur(80px);
        pointer-events: none;
        z-index: -1;
        top: -20%;
        left: -15%;
    }

    .bg-glow-secondary {
        position: fixed;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 46, 147, 0.1) 0%, rgba(165, 16, 180, 0.04) 60%, transparent 80%);
        filter: blur(90px);
        pointer-events: none;
        z-index: -1;
        bottom: -20%;
        right: -15%;
    }

    .text-gradient-purple {
        background: linear-gradient(135deg, #ffffff 10%, #e879f9 50%, #a510b4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

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

    .btn-gradient:hover::before { opacity: 1; }
    .btn-gradient:hover {
        box-shadow: 0 0 25px rgba(165, 16, 180, 0.5);
        transform: scale(1.02);
    }
    .btn-gradient:active { transform: scale(0.98); }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    input[type="email"],
    input[type="password"] {
        background-color: rgba(23, 15, 45, 0.5) !important;
        border: 1px solid rgba(210, 187, 255, 0.15) !important;
        color: #f1eaff !important;
        border-radius: 0.75rem !important;
        transition: all 0.3s ease !important;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #ff2e93 !important;
        box-shadow: 0 0 12px rgba(255, 46, 147, 0.3) !important;
        outline: none !important;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus {
        -webkit-text-fill-color: #f1eaff !important;
        -webkit-box-shadow: 0 0 0px 1000px rgba(12, 6, 26, 0.95) inset !important;
        transition: background-color 5000s ease-in-out 0s !important;
    }

    .terminal-cursor {
        display: inline-block;
        width: 6px;
        height: 1.1em;
        background: #ff2e93;
        vertical-align: middle;
        animation: blink 1s step-end infinite;
        margin-left: 4px;
    }
    @keyframes blink { 50% { opacity: 0; } }

    .scan-line {
        width: 100%;
        height: 4px;
        background: linear-gradient(to right, transparent, rgba(255, 46, 147, 0.12), transparent);
        position: absolute;
        top: 0;
        animation: scan 6s linear infinite;
        z-index: 10;
        pointer-events: none;
    }
    @keyframes scan {
        from { top: -10%; }
        to { top: 110%; }
    }

    .toggle-btn {
        width: 2.5rem;
        height: 1.25rem;
        background-color: rgba(167, 156, 181, 0.25);
        border-radius: 9999px;
        position: relative;
        transition: background-color 0.3s ease;
    }
    .toggle-btn.bg-active {
        background: linear-gradient(135deg, #a510b4 0%, #ff2e93 100%);
    }
    .toggle-dot {
        position: absolute;
        left: 0.25rem;
        top: 0.25rem;
        width: 0.75rem;
        height: 0.75rem;
        background: white;
        border-radius: 9999px;
        transition: transform 0.3s ease;
    }
</style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-4 md:p-gutter relative">

<div class="bg-glow-main"></div>
<div class="bg-glow-secondary"></div>

<div class="w-full max-w-md flex flex-col items-center z-10">

    <!-- Branding -->
    <header class="mb-8 text-center">
        <div class="flex items-center justify-center space-x-3 mb-3">
            <div class="p-2.5 rounded-xl bg-gradient-to-br from-primary-container/30 to-accent/10 border border-primary/20 backdrop-blur-md">
                <span class="material-symbols-outlined text-primary text-3xl leading-none">hub</span>
            </div>
            <h1 class="font-display text-3xl md:text-4xl font-extrabold text-gradient-purple tracking-tight">AI-Solutions</h1>
        </div>
        <p class="text-on-surface-variant font-mono text-[10px] tracking-[0.3em] opacity-60 uppercase">Enterprise Admin Console</p>
    </header>

    <!-- Login Card -->
    <main class="w-full relative group">
        <div class="absolute -inset-0.5 bg-gradient-to-r from-secondary/30 to-accent/30 rounded-[2rem] blur-xl opacity-30 group-hover:opacity-50 transition duration-1000"></div>

        <div class="glass-card rounded-[1.5rem] overflow-hidden relative">
            <div class="scan-line"></div>

            <!-- Terminal header -->
            <div class="bg-white/5 px-8 py-4 flex items-center justify-between border-b border-white/10">
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-error/60"></span>
                    <span class="w-3 h-3 rounded-full bg-accent/60"></span>
                    <span class="w-3 h-3 rounded-full bg-secondary/60"></span>
                </div>
                <div class="font-mono text-[11px] text-on-surface-variant/80 flex items-center">
                    <span class="material-symbols-outlined text-[14px] mr-2">security</span>
                    SECURE_GATEWAY.V3
                    <span class="terminal-cursor"></span>
                </div>
            </div>

            <!-- Login content -->
            <div class="p-10 space-y-7">

                @if (session('error'))
                    <div class="p-4 rounded-xl bg-error/10 border border-error/20 text-error text-xs font-mono flex items-center space-x-2">
                        <span class="material-symbols-outlined text-[16px]">warning</span>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="p-4 rounded-xl bg-error/10 border border-error/20 text-error text-xs font-mono flex flex-col space-y-1">
                        @foreach ($errors->all() as $error)
                            <div class="flex items-center space-x-2">
                                <span class="material-symbols-outlined text-[16px]">error_outline</span>
                                <span>{{ $error }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                <form class="space-y-7" action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <!-- Admin ID -->
                    <div class="space-y-3">
                        <label class="font-mono text-xs text-primary/80 flex items-center tracking-wider uppercase">
                            <span class="material-symbols-outlined text-[16px] mr-2">alternate_email</span>
                            Admin Identifier
                        </label>
                        <input class="w-full px-4 py-4 text-on-surface placeholder:text-on-surface-variant/40 font-mono text-sm"
                               name="email" value="{{ old('email') }}" placeholder="admin@ai-solutions.io"
                               type="email" required autocomplete="email"/>
                    </div>

                    <!-- Access Key -->
                    <div class="space-y-3">
                        <label class="font-mono text-xs text-primary/80 flex items-center tracking-wider uppercase">
                            <span class="material-symbols-outlined text-[16px] mr-2">lock</span>
                            Access Key
                        </label>
                        <input class="w-full px-4 py-4 text-on-surface placeholder:text-on-surface-variant/40 font-mono text-sm tracking-widest"
                               name="password" placeholder="••••••••••••••••" type="password" required autocomplete="current-password"/>
                    </div>

                    <!-- Security toggles -->
                    <div class="grid grid-cols-1 gap-3">
                        <div class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition-colors cursor-pointer" onclick="toggleSwitch(this)">
                            <div class="flex items-center space-x-3">
                                <span class="material-symbols-outlined text-secondary/80">verified_user</span>
                                <span class="text-sm font-medium text-on-surface/90">Two-Factor Authentication</span>
                            </div>
                            <button class="toggle-btn" type="button">
                                <span class="toggle-dot"></span>
                            </button>
                        </div>
                        <div class="flex items-center justify-between p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition-colors cursor-pointer" onclick="toggleSwitch(this)">
                            <div class="flex items-center space-x-3">
                                <span class="material-symbols-outlined text-on-surface-variant/70">key</span>
                                <span class="text-sm font-medium text-on-surface/90">Hardware Key Activation</span>
                            </div>
                            <button class="toggle-btn" type="button">
                                <span class="toggle-dot"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-2">
                        <button type="submit" class="btn-gradient w-full py-4 text-white font-display font-bold rounded-xl shadow-[0_10px_30px_-10px_rgba(165,16,180,0.5)] flex items-center justify-center space-x-3">
                            <span class="tracking-widest">LOG IN </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="bg-black/20 px-10 py-5 flex items-center justify-between border-t border-white/5">
                <div class="flex items-center space-x-3">
                    <div class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </div>
                    <span class="font-mono text-[10px] text-emerald-400/70 tracking-tighter uppercase">Encryption Active: AES-256</span>
                </div>
                <a class="font-mono text-[10px] text-on-surface-variant/60 hover:text-accent transition-colors uppercase tracking-widest" href="#">Forgot Access?</a>
            </div>
        </div>
    </main>

</div>

<script>
    function toggleSwitch(container) {
        const btn = container.querySelector('.toggle-btn');
        const dot = container.querySelector('.toggle-dot');
        const isActive = btn.classList.toggle('bg-active');
        dot.style.transform = isActive ? 'translateX(20px)' : 'translateX(0)';
    }

    document.addEventListener('mousemove', (e) => {
        const glow1 = document.querySelector('.bg-glow-main');
        const glow2 = document.querySelector('.bg-glow-secondary');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        glow1.style.transform = `translate(${x * 50}px, ${y * 50}px)`;
        glow2.style.transform = `translate(${x * -50}px, ${y * -50}px)`;
    });
</script>

</body>
</html>