<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'AI-Solutions Admin | Dashboard')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Geist:wght@400;600;700;800&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Quill Rich Text Editor CDN -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Tailwind Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#d2bbff",      // Light lavender for active items/text
                        "primary-container": "#7c3aed", // Brand violet container
                        "secondary": "#a510b4",    // Brand purple
                        "accent": "#ff2e93",       // Vibrant hot-pink/magenta
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

        /* Premium dark-mode inputs global style */
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        select,
        textarea {
            background-color: rgba(23, 15, 45, 0.5) !important;
            border: 1px solid rgba(210, 187, 255, 0.15) !important;
            color: #f1eaff !important;
            border-radius: 0.75rem !important;
            transition: all 0.3s ease !important;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus,
        input[type="url"]:focus,
        input[type="file"]:focus,
        select:focus,
        textarea:focus {
            border-color: #ff2e93 !important;
            box-shadow: 0 0 12px rgba(255, 46, 147, 0.3) !important;
            outline: none !important;
        }

        /* Autofill Styling */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #f1eaff !important;
            -webkit-box-shadow: 0 0 0px 1000px rgba(12, 6, 26, 0.95) inset !important;
            transition: background-color 5000s ease-in-out 0s !important;
        }

        /* Quill Editor Custom Theme Overrides */
        .ql-toolbar.ql-snow {
            background-color: rgba(23, 15, 45, 0.6) !important;
            border: 1px solid rgba(210, 187, 255, 0.15) !important;
            border-top-left-radius: 0.75rem !important;
            border-top-right-radius: 0.75rem !important;
        }
        .ql-container.ql-snow {
            background-color: rgba(23, 15, 45, 0.4) !important;
            border: 1px solid rgba(210, 187, 255, 0.15) !important;
            border-bottom-left-radius: 0.75rem !important;
            border-bottom-right-radius: 0.75rem !important;
            color: #f1eaff !important;
            font-family: 'Inter', sans-serif !important;
            font-size: 0.875rem !important;
        }
        .ql-editor {
            min-height: 200px !important;
        }
        .ql-snow .ql-stroke {
            stroke: #a79cb5 !important;
        }
        .ql-snow .ql-fill {
            fill: #a79cb5 !important;
        }
        .ql-snow .ql-picker {
            color: #a79cb5 !important;
        }
        .ql-snow .ql-picker-options {
            background-color: #0c061a !important;
            border-color: rgba(210, 187, 255, 0.15) !important;
        }
    </style>
    
    @yield('styles')
</head>
<body class="bg-background text-on-background font-body-base">

    <!-- SideNavBar -->
    <aside class="fixed left-0 top-0 h-screen w-72 flex flex-col py-base bg-surface-container/50 backdrop-blur-3xl border-r border-white/10 z-50">
        <div class="px-gutter mb-10 mt-4">
            <h1 class="font-headline-md text-headline-md font-bold text-primary tracking-tight">AI-Solutions</h1>
            <p class="text-on-surface-variant text-xs mt-1">Admin_SmritiTh</p>
        </div>
        <nav class="flex-1 space-y-1 px-4 overflow-y-auto no-scrollbar">
            <!-- Analytics -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.dashboard*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.dashboard*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">monitoring</span>
                <span class="font-body-base text-body-base">Analytics</span>
            </a>
            <!-- Inquiries -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.inquiries*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.inquiries') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.inquiries*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">chat_bubble</span>
                <span class="font-body-base text-body-base">Inquiries</span>
            </a>
            <!-- Gallery -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.gallery.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.gallery.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.gallery.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">collections</span>
                <span class="font-body-base text-body-base">Gallery</span>
            </a>
            <!-- Blogs -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.blogs.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.blogs.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.blogs.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">edit_note</span>
                <span class="font-body-base text-body-base">Blogs</span>
            </a>
            <!-- Services -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.services.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.services.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.services.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">settings_applications</span>
                <span class="font-body-base text-body-base">Services</span>
            </a>
            <!-- Events -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.events.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.events.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.events.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">event</span>
                <span class="font-body-base text-body-base">Events</span>
            </a>
            <!-- Projects -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.projects.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.projects.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.projects.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">folder_special</span>
                <span class="font-body-base text-body-base">Projects</span>
            </a>
            <!-- Testimonials -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.testimonials.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.testimonials.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.testimonials.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">rate_review</span>
                <span class="font-body-base text-body-base">Feedback</span>
            </a>
            <!-- Project Reviews -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.project-reviews.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.project-reviews.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.project-reviews.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">reviews</span>
                <span class="font-body-base text-body-base">Project Reviews</span>
            </a>
            <!-- Registrations -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.registrations.*') ? 'bg-gradient-to-r from-secondary/20 to-accent/10 border-l-4 border-accent text-white font-bold shadow-[0_0_15px_rgba(165,16,180,0.15)]' : 'text-on-surface-variant hover:bg-white/5' }}" href="{{ route('admin.registrations.index') }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.registrations.*') ? 'text-accent' : 'text-on-surface-variant group-hover:text-accent' }}">how_to_reg</span>
                <span class="font-body-base text-body-base">Registrations</span>
            </a>
        </nav>
        <div class="mt-auto px-4 space-y-1 pb-6">
            <a href="/" class="w-full mb-6 py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all active:scale-95 text-center block">
                View Site Node
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg cursor-pointer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="material-symbols-outlined text-error">logout</span>
                <span class="font-body-base text-body-base">Log Out</span>
            </a>
        </div>
    </aside>

    <!-- TopNavBar -->
    <header class="fixed top-0 right-0 left-72 h-16 bg-background/80 backdrop-blur-2xl border-b border-white/10 flex justify-between items-center px-gutter z-40">
        <div class="flex items-center flex-1 max-w-xl">
            <h2 class="font-headline-md text-headline-md font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary hidden lg:block text-2xl">AI-Solutions</h2>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-4">
                <button class="relative text-on-surface-variant hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <div class="h-6 w-[1px] bg-white/10"></div>
                <div class="flex items-center gap-3">
                    <img alt="Administrator Profile" class="w-8 h-8 rounded-full border border-primary/30" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0GE3uYB8ML1QAP1uXOJ3LBxQtvt819qXE4EXjyU0axsz-iH1MzQ11UOIsRw2Kz5zANIBljEzDxo4sRxAyk6rW3hmptJdqpBioH80sxF7Vn9rROntYf3AU9QGwF1aINHNqOJIyibLWtlJRPQeukmd4hvtGWPE1wLbalNg5YcsVPpaNSutNQtcGpvsVUSuMvpA1cQB0AcEUByK-Otp4snmPWs5W8Q5Non31KKf6Z5Smu64h2Qzcn4DF8EYYgndNJlJjKBZq5G0ARfj2"/>
                    <span class="text-sm font-medium hidden lg:block text-on-surface-variant">Admin.01</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Canvas -->
    <main class="ml-72 pt-16 p-gutter relative min-h-screen">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] glow-accent pointer-events-none -z-10" style="background: radial-gradient(circle at center, rgba(210, 187, 255, 0.08) 0%, transparent 70%);"></div>
        <div class="max-w-container-max mx-auto space-y-gutter py-6">
            
            <!-- Toast notification messages -->
            @if(session('success'))
                <div class="glass-card p-4 rounded-xl border-emerald-500/30 bg-emerald-500/10 flex items-center justify-between text-sm text-emerald-400 mb-6">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="material-symbols-outlined hover:text-white transition-colors">close</button>
                </div>
            @endif

            @if($errors->any())
                <div class="glass-card p-4 rounded-xl border-red-500/30 bg-red-500/10 text-sm text-red-400 mb-6">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined">error</span>
                        <span class="font-bold">Please fix the following errors:</span>
                    </div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    @yield('scripts')
</body>
</html>
