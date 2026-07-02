<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AI-Solutions | Content Management</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Geist:wght@600;700;800&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Shared Components & Style Guidance Integration -->
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#eaddff",
                        "secondary-container": "#03b5d3",
                        "on-primary-fixed": "#25005a",
                        "surface-container-low": "#131b2e",
                        "secondary": "#4cd7f6",
                        "secondary-fixed": "#acedff",
                        "on-primary-container": "#ede0ff",
                        "tertiary-fixed": "#ffd8e7",
                        "on-tertiary-fixed-variant": "#85145a",
                        "outline": "#958da1",
                        "on-surface": "#dae2fd",
                        "on-secondary-fixed-variant": "#004e5c",
                        "on-secondary": "#003640",
                        "surface-variant": "#2d3449",
                        "background": "#0b1326",
                        "surface-container": "#171f33",
                        "primary": "#d2bbff",
                        "on-primary-fixed-variant": "#5a00c6",
                        "secondary-fixed-dim": "#4cd7f6",
                        "inverse-primary": "#732ee4",
                        "surface-tint": "#d2bbff",
                        "error": "#ffb4ab",
                        "on-error": "#690005",
                        "inverse-on-surface": "#283044",
                        "on-primary": "#3f008e",
                        "on-error-container": "#ffdad6",
                        "surface-container-highest": "#2d3449",
                        "surface-bright": "#31394d",
                        "outline-variant": "#4a4455",
                        "tertiary-fixed-dim": "#ffafd3",
                        "on-surface-variant": "#ccc3d8",
                        "tertiary": "#ffafd3",
                        "on-tertiary-container": "#ffdce9",
                        "on-background": "#dae2fd",
                        "surface-container-lowest": "#060e20",
                        "surface": "#0b1326",
                        "primary-container": "#7c3aed",
                        "surface-dim": "#0b1326",
                        "on-secondary-fixed": "#001f26",
                        "surface-container-high": "#222a3d",
                        "on-tertiary": "#620040",
                        "on-secondary-container": "#00424e",
                        "inverse-surface": "#dae2fd",
                        "on-tertiary-fixed": "#3d0026",
                        "error-container": "#93000a",
                        "tertiary-container": "#ae397b",
                        "primary-fixed-dim": "#d2bbff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "section-gap": "120px",
                        "margin-mobile": "20px",
                        "container-max": "1280px",
                        "base": "8px"
                    },
                    "fontFamily": {
                        "display-lg": ["Geist"],
                        "label-mono": ["JetBrains Mono"],
                        "display-lg-mobile": ["Geist"],
                        "body-base": ["Inter"],
                        "headline-md": ["Geist"]
                    },
                    "fontSize": {
                        "display-lg": ["64px", {"lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "700"}],
                        "label-mono": ["12px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "display-lg-mobile": ["40px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-base": ["16px", {"lineHeight": "1.6", "letterSpacing": "0", "fontWeight": "400"}],
                        "headline-md": ["32px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
<style>
        body {
            background-color: #0b1326;
            color: #dae2fd;
            font-family: 'Inter', sans-serif;
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 1px solid rgba(255, 255, 255, 0.2);
        }
        .glow-accent {
            background: radial-gradient(circle at center, rgba(210, 187, 255, 0.15) 0%, transparent 70%);
        }
        .active-tab {
            border-bottom: 2px solid #d2bbff;
            color: #d2bbff;
        }
        .markdown-editor {
            background: rgba(6, 14, 32, 0.6);
            border: 1px solid rgba(149, 141, 161, 0.2);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(210, 187, 255, 0.2);
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-background h-screen flex">
<!-- Side Navigation Bar (Anchored from JSON) -->
<aside class="fixed left-0 top-0 h-screen w-72 flex flex-col py-base bg-surface-container/50 backdrop-blur-3xl border-r border-white/10 z-50">
<div class="px-gutter mb-10 mt-4">
<h1 class="font-headline-md text-headline-md font-bold text-primary tracking-tight">AI-Solutions</h1>
<p class="text-on-surface-variant text-xs mt-1">Enterprise Admin v2.4.0</p>
</div>
<nav class="flex-1 space-y-1 px-4 overflow-y-auto">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">monitoring</span>
<span class="font-body-base text-body-base">Analytics</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">chat_bubble</span>
<span class="font-body-base text-body-base">Inquiries</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">event</span>
<span class="font-body-base text-body-base">Events</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">folder_special</span>
<span class="font-body-base text-body-base">Projects</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">collections</span>
<span class="font-body-base text-body-base">Gallery</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">rate_review</span>
<span class="font-body-base text-body-base">Feedback</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-primary font-bold bg-primary-container/10 border-r-2 border-primary transition-all duration-200" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">edit_note</span>
<span class="font-body-base text-body-base">Content Management</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg group" href="#">
<span class="material-symbols-outlined group-hover:text-primary">health_and_safety</span>
<span class="font-body-base text-body-base">System Health</span>
</a>
</nav>
<div class="mt-auto px-4 space-y-1 pb-6">
<button class="w-full mb-6 py-2 px-4 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-white font-semibold text-sm hover:shadow-[0_0_20px_rgba(124,58,237,0.4)] transition-all active:scale-95">
            System Upgrade
        </button>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-body-base text-body-base">Settings</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-white/5 transition-all duration-200 rounded-lg" href="#">
<span class="material-symbols-outlined text-error">logout</span>
<span class="font-body-base text-body-base">Log Out</span>
</a>
</div>
</aside>
<div class="flex-1 flex flex-col relative overflow-hidden">
<!-- Top Navigation Bar (Anchored from JSON) -->
<header class="h-16 flex justify-between items-center px-gutter bg-background/80 backdrop-blur-2xl border-b border-white/10 z-40 left-72 fixed top-0 right-0">
<div class="flex items-center gap-4 flex-1">
<div class="relative w-96 group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full bg-surface-container-low border border-outline-variant rounded-lg py-2 pl-10 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-primary transition-all" placeholder="Search system resources..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 text-on-surface-variant">
<button class="hover:text-primary transition-colors">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="hover:text-primary transition-colors">
<span class="material-symbols-outlined">account_circle</span>
</button>
</div>
<div class="h-6 w-[1px] bg-white/10"></div>
<button class="text-sm font-medium hover:text-primary transition-colors">Support</button>
<button class="px-4 py-1.5 bg-surface-variant rounded-lg text-sm font-medium hover:bg-surface-container-highest transition-all">Logout</button>
</div>
</header>
<!-- Main Content Canvas -->
<main class="flex-1 overflow-y-auto custom-scrollbar p-gutter relative ml-72 pt-16">
<div class="absolute top-0 right-0 w-[600px] h-[600px] glow-accent pointer-events-none -z-10"></div>
<div class="max-w-container-max mx-auto space-y-gutter">
<!-- Section Header & Tabs -->
<div class="flex flex-col md:flex-row justify-between items-end gap-6">
<div class="space-y-4">
<h2 class="font-headline-md text-headline-md text-on-surface">Content Management</h2>
<div class="flex gap-8 border-b border-white/5">
<button class="pb-3 px-2 font-medium text-primary border-b-2 border-primary">Blogs</button>
<button class="pb-3 px-2 font-medium text-on-surface-variant hover:text-on-surface transition-colors">Insights</button>
<button class="pb-3 px-2 font-medium text-on-surface-variant hover:text-on-surface transition-colors">Gallery</button>
<button class="pb-3 px-2 font-medium text-on-surface-variant hover:text-on-surface transition-colors">Testimonials</button>
</div>
</div>
<button class="px-6 py-2.5 bg-gradient-to-r from-primary-container to-secondary-container text-white rounded-xl font-bold flex items-center gap-2 hover:shadow-[0_0_25px_rgba(124,58,237,0.3)] transition-all active:scale-95" onclick="document.getElementById('createModal').classList.remove('hidden')">
<span class="material-symbols-outlined text-[20px]">add</span>
                        Create New
                    </button>
</div>
<!-- Main Grid Layout (Bento Style) -->
<div class="grid grid-cols-12 gap-6">
<!-- Blog Post Grid (8 Columns) -->
<div class="col-span-12 lg:col-span-8 space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Card 1 -->
<div class="glass-card rounded-2xl overflow-hidden group">
<div class="h-48 relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A futuristic AI interface glowing in a deep blue and violet color palette with intricate neural network patterns and data streams. The aesthetic is clean and high-tech, representing advanced machine learning and predictive analytics. Soft highlights on glass edges evoke a premium digital environment for AI solutions." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAW4YdreUVCPR5DNL__K1yF0vgWJCzD1LfMqjNaj9WdJhf92-fqL_4doLq16lFMMmqEkGMlEt20elmvTcKebFZisDk9SOWw0bgEoZSnJ4xZZcqv1BwzBktPb66_YEtE9YgcJXkI_OTWUbxwLqiyTxRjGw2YgE6qpCfFMrIvOw0fc8-cT9xDwC2y2a2mPiurSNfjYaPmk9yc6Rw0m4C95UXUedta8hvSo0NfKNd_ObbWCV9f_Qnmc-GTB_fSTGvtD5xfxNdtYpHvG6Hx"/>
<div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
<span class="absolute top-3 left-3 px-3 py-1 glass-card rounded-full font-label-mono text-label-mono text-secondary uppercase">Product Update</span>
</div>
<div class="p-6 space-y-4">
<h3 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors">Introducing NeuralSync 2.0: Real-time Multi-Agent Orchestration</h3>
<div class="flex items-center gap-4 text-xs text-on-surface-variant">
<div class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">timer</span> 8 min read</div>
<div class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">calendar_month</span> Oct 24, 2023</div>
</div>
<div class="flex justify-between items-center pt-2">
<div class="flex -space-x-2">
<div class="w-8 h-8 rounded-full border-2 border-background bg-primary-container flex items-center justify-center text-[10px] font-bold">JD</div>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-white/10 rounded-lg transition-colors" title="Edit"><span class="material-symbols-outlined text-[20px]">edit</span></button>
<button class="p-2 hover:bg-white/10 rounded-lg transition-colors" title="Hide"><span class="material-symbols-outlined text-[20px]">visibility_off</span></button>
<button class="p-2 hover:bg-white/10 rounded-lg text-error transition-colors" title="Delete"><span class="material-symbols-outlined text-[20px]">delete</span></button>
</div>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="glass-card rounded-2xl overflow-hidden group">
<div class="h-48 relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Abstract representation of dark data structures with vibrant neon streaks of cyan and violet moving through a dark void. The scene is cinematic and minimal, focusing on the fluidity of information and the power of cloud computing. Reflections on glossy surfaces create a sense of depth and hyper-modern sophistication." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCG-NFEoFIetf8s5_MjgmBqNMCBDLHm92BFK9trS8ItBQo2wngldRLi0qrJRJ3cZNJ9M8vKG8XwHUXjwdVbzBmIQ4XTQhvCD7gYR7kv3Qi3f8VFwIb8P_GoDh-9RFH59RPG_5Rkqvtd6gwVIhXk1zSXWFKnSbw1t5QmFGp6qs756M4tMWXTqV28y1B1MXCv64MzTqH9wbVZAMPlsZ4M3OJyINmd_PVMF9oKP4KcbyRrThiEBQvqoDXg1YDS5_c1TLNgAeUZ3_xaL3Wd"/>
<div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
<span class="absolute top-3 left-3 px-3 py-1 glass-card rounded-full font-label-mono text-label-mono text-secondary uppercase">Case Study</span>
</div>
<div class="p-6 space-y-4">
<h3 class="font-bold text-lg leading-tight group-hover:text-primary transition-colors">Scaling Infrastructure for Next-Gen Generative Models</h3>
<div class="flex items-center gap-4 text-xs text-on-surface-variant">
<div class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">timer</span> 12 min read</div>
<div class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">calendar_month</span> Oct 22, 2023</div>
</div>
<div class="flex justify-between items-center pt-2">
<div class="flex -space-x-2">
<div class="w-8 h-8 rounded-full border-2 border-background bg-secondary flex items-center justify-center text-[10px] font-bold text-on-secondary">ML</div>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-white/10 rounded-lg transition-colors"><span class="material-symbols-outlined text-[20px]">edit</span></button>
<button class="p-2 hover:bg-white/10 rounded-lg transition-colors"><span class="material-symbols-outlined text-[20px]">visibility_off</span></button>
<button class="p-2 hover:bg-white/10 rounded-lg text-error transition-colors"><span class="material-symbols-outlined text-[20px]">delete</span></button>
</div>
</div>
</div>
</div>
</div>
<!-- Testimonial Manager Section -->
<div class="glass-card rounded-2xl p-6">
<div class="flex justify-between items-center mb-6">
<h3 class="font-bold text-xl">Testimonial Manager</h3>
<div class="flex items-center gap-2 text-sm text-primary">
<span class="">New Feedback (4)</span>
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
</div>
</div>
<div class="space-y-4">
<div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-low border border-white/5 group hover:border-primary/30 transition-all">
<div class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center font-bold text-sm shrink-0">EK</div>
<div class="flex-1 space-y-1">
<div class="flex justify-between items-center">
<span class="font-semibold text-on-surface">Elena Kovic</span>
<div class="flex text-primary gap-0.5">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
</div>
<p class="text-sm text-on-surface-variant italic">"The automated content pipeline has cut our production time in half. Truly revolutionary."</p>
<div class="flex gap-4 pt-2 text-xs">
<button class="text-primary hover:underline">Approve &amp; Feature</button>
<button class="text-outline hover:text-on-surface transition-colors">Dismiss</button>
</div>
</div>
</div>
<div class="flex items-start gap-4 p-4 rounded-xl bg-surface-container-low border border-white/5">
<div class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center font-bold text-sm shrink-0">MP</div>
<div class="flex-1 space-y-1">
<div class="flex justify-between items-center">
<span class="font-semibold text-on-surface">Mark P.</span>
<div class="flex text-primary gap-0.5">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]">star</span>
</div>
</div>
<p class="text-sm text-on-surface-variant italic">"Incredible UI responsiveness. The dashboard is a joy to use daily."</p>
<div class="flex gap-4 pt-2 text-xs">
<button class="text-primary hover:underline">Approve &amp; Feature</button>
<button class="text-outline hover:text-on-surface transition-colors">Dismiss</button>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Right Column (4 Columns): Mini Create Panel / Stats -->
<div class="col-span-12 lg:col-span-4 space-y-6">
<div class="glass-card rounded-2xl p-6">
<h3 class="font-bold text-lg mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary">analytics</span>
                                Content Metrics
                            </h3>
<div class="space-y-6">
<div class="flex justify-between items-center">
<span class="text-on-surface-variant text-sm">Monthly Published</span>
<span class="font-label-mono text-secondary text-lg">24</span>
</div>
<div class="flex justify-between items-center">
<span class="text-on-surface-variant text-sm">Avg. Engagement</span>
<span class="font-label-mono text-primary text-lg">18.4%</span>
</div>
<div class="h-2 w-full bg-surface-variant rounded-full overflow-hidden">
<div class="h-full bg-gradient-to-r from-primary to-secondary w-[72%]"></div>
</div>
<p class="text-[10px] text-outline uppercase tracking-widest font-bold">Content Distribution</p>
<div class="space-y-2">
<div class="flex items-center gap-2 text-xs">
<div class="w-2 h-2 rounded-full bg-primary"></div>
<span class="flex-1">Blogs</span>
<span class="">45%</span>
</div>
<div class="flex items-center gap-2 text-xs">
<div class="w-2 h-2 rounded-full bg-secondary"></div>
<span class="flex-1">Insights</span>
<span class="">35%</span>
</div>
<div class="flex items-center gap-2 text-xs">
<div class="w-2 h-2 rounded-full bg-tertiary"></div>
<span class="flex-1">Other</span>
<span class="">20%</span>
</div>
</div>
</div>
</div>
<div class="glass-card rounded-2xl p-6 relative overflow-hidden">
<div class="absolute -right-8 -bottom-8 w-32 h-32 bg-primary/10 rounded-full blur-3xl"></div>
<h3 class="font-bold text-lg mb-4">Quick Insights</h3>
<div class="p-4 rounded-xl bg-primary/5 border border-primary/20 space-y-3">
<p class="text-sm text-on-surface">"Posts with technical code snippets are currently performing <span class="text-primary font-bold">35% better</span> than generic overview articles."</p>
<button class="text-xs text-secondary font-bold hover:underline flex items-center gap-1">View Full Report <span class="material-symbols-outlined text-[14px]">arrow_forward</span></button>
</div>
</div>
<div class="glass-card rounded-2xl p-6">
<h3 class="font-bold text-lg mb-4">Gallery Snippets</h3>
<div class="grid grid-cols-2 gap-3">
<div class="aspect-square rounded-lg bg-surface-variant overflow-hidden group cursor-pointer relative">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" data-alt="A macro shot of shimmering silicon chips and complex circuitry with intense violet and deep indigo lighting. The details are crisp, showing high-performance computing hardware under a cinematic light. It feels energetic, powerful, and symbolizes the core of AI-Solutions hardware architecture." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLV8r59skbYDOxN1sqD_UlzGQnO3qE4rFf3Au8J4UXNB8NDHfQjFoPfrBVDFC_MQ56jvBI5hcD_rHGNWfvcw_5v975cPEOxLlt0RLzJLKupIueOPV3YDgb6q3UPegpUhDH0KewGGbxSjxZ6wLTzqOpKt-x3o-YKuApxmeqJ8qC83Y8WpNVIUUhejUCn6Mm2jpPp5ot9VZ94hRbIdtWIktybO1JhsSfo0yfGmKGkESNqtm8HLSfEJ2DKNw0aq4Mx57-0QcOfcm9IWji"/>
<div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
<span class="material-symbols-outlined text-white">open_in_full</span>
</div>
</div>
<div class="aspect-square rounded-lg bg-surface-variant overflow-hidden group cursor-pointer relative">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" data-alt="A dark server room with glowing green and blue LED indicators reflected on a polished floor. The perspective leads deep into a corridor of data racks, conveying massive scale and high-tier cybersecurity. The atmosphere is quiet, controlled, and professional, representing the enterprise-grade stability of AI-Solutions." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDh3q4LO4SjQnZ902jFn2KNmBiGFNEPnu8k_NR5bqSHkB7e4p7CwL26hRz3RXdS9OEjFxQXCm4osvzWOQ9B1Ui1lI19StHyMtkf60zwY9afDs1YCetpJUpXQeu7gbgjWSlAC-zdYtos4-RBsDi7p2EkxpZUFdRoOkXUe5JmAVRvY0fz5zWX69JNBXIOdK-kRthxZ_69iFfesqRLeNVnq18cYQ09qhtKpAvyuJAguo1sOW61otC-5OSFtyXY_zUAylTrs__9X6HzXfYV"/>
<div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
<span class="material-symbols-outlined text-white">open_in_full</span>
</div>
</div>
<div class="aspect-square rounded-lg bg-surface-variant overflow-hidden group cursor-pointer relative">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" data-alt="A high-definition shot of a modern CPU motherboard with glowing trace lines of light. The color palette is dominated by dark grays and bright electric blues. The lighting is dramatic, emphasizing the precision engineering and futuristic design of high-end technology components." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAweDO7C72-hgQviHRqcC4w01Md3iDR7isvffVaqL2y8EnN_6XYQiUUzsdUkqp5_Yz30FoA_1FtMcn3GaleKm9mYc0mA8eWcv8iILFnFmcmz31Ds3FV5fHNobddbnvIPoNj7i1wIQNkAAACOslPaAZoNpLTZ9PTDMXQd_DS7co1XgLLyxQY1tqN-ErjO-e9z5UyAnDT7fs7v082nkmjWCO_bYQYMqBoGSEayPxdZRw7usTxVo42YT8lMsO1Tx1lG7_G9nknhyE9NN_0"/>
<div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
<span class="material-symbols-outlined text-white">open_in_full</span>
</div>
</div>
<div class="aspect-square rounded-lg bg-surface-variant border-2 border-dashed border-outline-variant flex items-center justify-center text-outline hover:text-primary hover:border-primary transition-all cursor-pointer">
<span class="material-symbols-outlined">add</span>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<!-- Create New Modal (Technical Form) -->
<div class="hidden fixed inset-0 z-[100] flex items-center justify-center p-gutter" id="createModal">
<div class="absolute inset-0 bg-background/80 backdrop-blur-md" onclick="document.getElementById('createModal').classList.add('hidden')"></div>
<div class="glass-card w-full max-w-2xl rounded-3xl p-8 relative overflow-hidden">
<div class="flex justify-between items-center mb-8">
<div>
<h2 class="font-headline-md text-2xl font-bold">New Blog Post</h2>
<p class="text-on-surface-variant text-sm">Drafting technical content for the enterprise portal</p>
</div>
<button class="p-2 hover:bg-white/10 rounded-full transition-colors" onclick="document.getElementById('createModal').classList.add('hidden')">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<form class="space-y-6">
<div class="grid grid-cols-2 gap-6">
<div class="col-span-2 space-y-2">
<label class="font-label-mono text-[10px] text-outline uppercase tracking-wider">Post Title</label>
<input class="w-full bg-surface-container-low border border-outline-variant rounded-xl py-3 px-4 focus:ring-1 focus:ring-primary focus:outline-none transition-all" placeholder="e.g. Advancing Large Language Models..." type="text"/>
</div>
<div class="space-y-2">
<label class="font-label-mono text-[10px] text-outline uppercase tracking-wider">Category Tag</label>
<select class="w-full bg-surface-container-low border border-outline-variant rounded-xl py-3 px-4 focus:ring-1 focus:ring-primary focus:outline-none appearance-none">
<option>Technical Paper</option>
<option>Industry News</option>
<option>Product Update</option>
<option>Developer Insight</option>
</select>
</div>
<div class="space-y-2">
<label class="font-label-mono text-[10px] text-outline uppercase tracking-wider">Reading Time (min)</label>
<input class="w-full bg-surface-container-low border border-outline-variant rounded-xl py-3 px-4 focus:ring-1 focus:ring-primary focus:outline-none" type="number" value="5"/>
</div>
</div>
<div class="space-y-2">
<label class="font-label-mono text-[10px] text-outline uppercase tracking-wider">Featured Image</label>
<div class="w-full h-32 border-2 border-dashed border-outline-variant rounded-2xl flex flex-col items-center justify-center gap-2 hover:border-primary transition-colors cursor-pointer group bg-surface-container-low/50">
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">upload_file</span>
<span class="text-xs text-on-surface-variant">Click to upload or drag and drop</span>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between items-center">
<label class="font-label-mono text-[10px] text-outline uppercase tracking-wider">Markdown Content</label>
<div class="flex gap-2">
<button class="p-1 hover:text-primary transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">code</span></button>
<button class="p-1 hover:text-primary transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">format_bold</span></button>
<button class="p-1 hover:text-primary transition-colors" type="button"><span class="material-symbols-outlined text-[18px]">image</span></button>
</div>
</div>
<textarea class="markdown-editor w-full h-48 rounded-2xl p-4 font-label-mono text-sm custom-scrollbar focus:ring-1 focus:ring-primary focus:outline-none" placeholder="### Introduction..."></textarea>
</div>
<div class="flex justify-end gap-4 pt-4">
<button class="px-6 py-2 rounded-xl text-on-surface-variant hover:text-on-surface transition-colors" type="button">Save as Draft</button>
<button class="px-8 py-2 bg-primary text-on-primary rounded-xl font-bold hover:shadow-[0_0_20px_rgba(210,187,255,0.4)] transition-all" type="submit">Publish Post</button>
</div>
</form>
</div>
</div>
<script>
        // Micro-interactions and effects
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });

        // Simulating loading state for "Create New"
        const createForm = document.querySelector('form');
        if(createForm) {
            createForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const btn = e.target.querySelector('button[type="submit"]');
                const originalText = btn.innerText;
                btn.disabled = true;
                btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[18px]">sync</span> Publishing...';
                
                setTimeout(() => {
                    btn.disabled = false;
                    btn.innerText = originalText;
                    document.getElementById('createModal').classList.add('hidden');
                }, 1500);
            });
        }
    </script>
</body></html>