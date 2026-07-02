<!-- Floating Chatbot Component -->
<style>
    /* Custom notch or border clips if any, but let's use a beautiful futuristic rounded glass design */
    .chatbot-glass {
        background: rgba(12, 6, 26, 0.75) !important;
        backdrop-filter: blur(24px) !important;
        -webkit-backdrop-filter: blur(24px) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.5), 0 0 40px rgba(165, 16, 180, 0.1) !important;
    }
    
    /* Glowing borders */
    .chatbot-glow-border {
        position: relative;
        border-radius: 1rem;
        padding: 1px;
        background: linear-gradient(135deg, rgba(165, 16, 180, 0.4) 0%, rgba(255, 46, 147, 0.1) 100%);
    }

    /* Typing indicator dots */
    .lumina-typing span {
        display: inline-block;
        width: 6px; height: 6px;
        margin: 0 2px;
        background: #ff2e93;
        border-radius: 50%;
        animation: lumina-bounce 1.2s infinite;
    }
    .lumina-typing span:nth-child(2) { animation-delay: .2s; }
    .lumina-typing span:nth-child(3) { animation-delay: .4s; }
    @keyframes lumina-bounce {
        0%, 80%, 100% { transform: translateY(0); opacity: .4; }
        40%            { transform: translateY(-6px); opacity: 1; }
    }

    /* Scrollbar styling for messages */
    #chatbot-messages::-webkit-scrollbar { width: 4px; }
    #chatbot-messages::-webkit-scrollbar-track { background: transparent; }
    #chatbot-messages::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 4px; }
    #chatbot-messages::-webkit-scrollbar-thumb:hover { background: rgba(165, 16, 180, 0.4); }
</style>

<div class="fixed bottom-6 right-6 z-[999999] flex flex-col items-end gap-4" id="chatbot-container">

    <!-- Chatbot Window -->
    <div class="chatbot-glow-border w-[320px] md:w-[380px] transition-all duration-300 transform opacity-0 scale-95 pointer-events-none translate-y-4"
        id="chatbot-border-outer">
        <div class="chatbot-glass rounded-2xl flex flex-col overflow-hidden shadow-2xl" id="chatbot-window">

            <!-- Header -->
            <div class="p-4 bg-white/5 border-b border-white/5 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-gradient-to-tr from-secondary to-accent flex items-center justify-center shadow-lg shadow-secondary/30">
                        <span class="material-symbols-outlined text-white font-bold text-lg">hub</span>
                    </span>
                    <div>
                        <h4 class="font-display font-bold text-[16px] text-white tracking-tight leading-tight">Zora Assistant</h4>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" id="lumina-status-dot"></span>
                            <span class="font-mono text-[9px] text-on-surface-variant uppercase tracking-wider" id="lumina-status-text">Online</span>
                        </div>
                    </div>
                </div>
                <button class="text-on-surface-variant hover:text-white transition-colors" onclick="closeChatbot()">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <!-- Messages -->
            <div class="px-4 py-4 space-y-4 overflow-y-auto flex flex-col" style="max-height:360px;min-height:220px;" id="chatbot-messages">
                <!-- Initial greeting -->
                <div class="flex flex-col items-start gap-1 max-w-[85%] self-start" id="lumina-greeting">
                    <div class="bg-white/5 border border-white/5 p-3.5 rounded-2xl rounded-tl-none">
                        <p class="text-sm text-on-background leading-relaxed">Hello! I'm Zora, your AI navigator. 👋 How can I help you explore AI Solutions today?</p>
                    </div>
                </div>
            </div>

            <!-- Suggested prompts (shown before first message) -->
            <div class="px-4 pb-3 flex flex-wrap gap-2" id="lumina-suggestions">
                <button onclick="sendSuggestion(this)" class="text-[11px] px-3 py-1.5 rounded-full border border-white/10 text-on-surface-variant hover:text-white hover:bg-secondary/20 hover:border-secondary/40 transition-all">
                    What services do you offer?
                </button>
                <button onclick="sendSuggestion(this)" class="text-[11px] px-3 py-1.5 rounded-full border border-white/10 text-on-surface-variant hover:text-white hover:bg-secondary/20 hover:border-secondary/40 transition-all">
                    Tell me about Workflow Automation
                </button>
                <button onclick="sendSuggestion(this)" class="text-[11px] px-3 py-1.5 rounded-full border border-white/10 text-on-surface-variant hover:text-white hover:bg-secondary/20 hover:border-secondary/40 transition-all">
                    How do I get started?
                </button>
            </div>

            <!-- Input Form -->
            <div class="p-4 bg-white/5 border-t border-white/5">
                <div class="relative flex items-center">
                    <input
                        class="w-full bg-[#080313]/60 border border-white/10 rounded-xl px-4 py-3 text-sm focus:ring-1 focus:ring-secondary focus:border-secondary outline-none pr-12 text-white placeholder-on-surface-variant/40 transition-all"
                        placeholder="Type your message..."
                        type="text"
                        id="chatbot-input"
                        onkeydown="if(event.key==='Enter' && !event.shiftKey) { event.preventDefault(); sendMessage(); }" />
                    <button class="absolute right-3 text-secondary hover:text-accent hover:scale-110 transition-all disabled:opacity-40"
                            id="chatbot-send-btn"
                            onclick="sendMessage()">
                        <span class="material-symbols-outlined text-[20px]">send</span>
                    </button>
                </div>
                <p class="text-[10px] text-on-surface-variant/40 mt-2 text-center">Zora only answers questions about AI Solutions</p>
            </div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <button
        class="w-14 h-14 bg-gradient-to-tr from-secondary to-accent text-white rounded-full shadow-lg flex items-center justify-center hover:scale-110 shadow-secondary/20 hover:shadow-secondary/40 transition-all active:scale-95"
        id="chatbot-fab"
        onclick="toggleChatbot()">
        <span class="material-symbols-outlined text-[26px]" id="chatbot-fab-icon">chat_bubble</span>
    </button>
</div>

<script>
(function () {
    // ── State ────────────────────────────────────────────────────────────────
    let isOpen      = false;
    let isStreaming = false;
    // In-memory chat log
    let chatLog     = [];

    // ── Toggle open/close ────────────────────────────────────────────────────
    window.toggleChatbot = function () {
        isOpen ? closeChatbot() : openChatbot();
    };

    window.openChatbot = function () {
        isOpen = true;
        const outer = document.getElementById('chatbot-border-outer');
        const icon  = document.getElementById('chatbot-fab-icon');
        outer.classList.remove('opacity-0', 'scale-95', 'pointer-events-none', 'translate-y-4');
        icon.textContent = 'close';
        document.getElementById('chatbot-input').focus();
    };

    window.closeChatbot = function () {
        isOpen = false;
        const outer = document.getElementById('chatbot-border-outer');
        const icon  = document.getElementById('chatbot-fab-icon');
        outer.classList.add('opacity-0', 'scale-95', 'pointer-events-none', 'translate-y-4');
        icon.textContent = 'chat_bubble';
    };

    // Close on outside click
    document.addEventListener('click', function (e) {
        const container = document.getElementById('chatbot-container');
        if (isOpen && container && !container.contains(e.target)) {
            closeChatbot();
        }
    });

    // ── Suggestion chips ─────────────────────────────────────────────────────
    window.sendSuggestion = function (btn) {
        const text = btn.textContent.trim();
        // Hide suggestions after first use
        document.getElementById('lumina-suggestions').style.display = 'none';
        document.getElementById('chatbot-input').value = text;
        sendMessage();
    };

    // ── Link Renderer ────────────────────────────────────────────────────────
    function renderWithLinks(el, text) {
        el.innerHTML = text
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank" class="underline text-accent hover:text-white transition-colors">$1</a>')
            .replace(/\B(\/[a-zA-Z0-9\-\/#]+)/g, '<a href="$1" class="underline text-accent hover:text-white transition-colors">$1</a>');
    }

    // ── Render helpers ───────────────────────────────────────────────────────
    function appendBubble(role, text) {
        const wrap = document.getElementById('chatbot-messages');
        const outer = document.createElement('div');
        
        if (role === 'user') {
            outer.className = 'flex flex-col gap-1 max-w-[85%] self-end items-end';
        } else {
            outer.className = 'flex flex-col gap-1 max-w-[85%] self-start items-start';
        }

        const bubble = document.createElement('div');
        if (role === 'user') {
            bubble.className = 'bg-gradient-to-r from-secondary to-accent text-white px-4 py-3 rounded-2xl rounded-tr-none text-sm shadow-lg shadow-secondary/15';
        } else {
            bubble.className = 'bg-white/5 border border-white/5 px-4 py-3 rounded-2xl rounded-tl-none text-sm text-on-background leading-relaxed';
        }
        
        if (role === 'user') {
            bubble.textContent = text;
        } else {
            renderWithLinks(bubble, text);
        }

        outer.appendChild(bubble);
        wrap.appendChild(outer);
        wrap.scrollTop = wrap.scrollHeight;
        return bubble;
    }

    function showTypingIndicator() {
        const wrap = document.getElementById('chatbot-messages');
        const outer = document.createElement('div');
        outer.className = 'flex flex-col items-start gap-1 self-start';
        outer.id = 'lumina-typing-indicator';

        const bubble = document.createElement('div');
        bubble.className = 'bg-white/5 border border-white/5 px-4 py-3 rounded-2xl rounded-tl-none lumina-typing';
        bubble.innerHTML = '<span></span><span></span><span></span>';

        outer.appendChild(bubble);
        wrap.appendChild(outer);
        wrap.scrollTop = wrap.scrollHeight;
    }

    function removeTypingIndicator() {
        const el = document.getElementById('lumina-typing-indicator');
        if (el) el.remove();
    }

    function setInputLocked(locked) {
        isStreaming = locked;
        document.getElementById('chatbot-input').disabled  = locked;
        document.getElementById('chatbot-send-btn').disabled = locked;
    }

    function setStatus(online) {
        const dot  = document.getElementById('lumina-status-dot');
        const text = document.getElementById('lumina-status-text');
        if (online) {
            dot.className  = 'w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse';
            text.textContent = 'Online';
        } else {
            dot.className  = 'w-1.5 h-1.5 rounded-full bg-amber-400 animate-ping';
            text.textContent = 'Thinking…';
        }
    }

    // ── Send message ─────────────────────────────────────────────────────────
    window.sendMessage = async function () {
        if (isStreaming) return;

        const input   = document.getElementById('chatbot-input');
        const message = input.value.trim();
        if (!message) return;

        // Hide suggestions after first real send
        document.getElementById('lumina-suggestions').style.display = 'none';

        input.value = '';
        chatLog.push({ role: 'user', content: message });
        appendBubble('user', message);
        setInputLocked(true);
        setStatus(false);
        showTypingIndicator();

        try {
            const res = await fetch('{{ route("chatbot.stream") }}', {
                method : 'POST',
                headers: {
                    'Content-Type' : 'application/json',
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message })
            });

            if (!res.ok) throw new Error('Server error ' + res.status);

            removeTypingIndicator();
            const botBubble = appendBubble('bot', '');

            const reader  = res.body.getReader();
            const decoder = new TextDecoder();
            let full      = '';

            while (true) {
                const { done, value } = await reader.read();
                if (done) break;
                full += decoder.decode(value, { stream: true });
                renderWithLinks(botBubble, full);
                document.getElementById('chatbot-messages').scrollTop = 99999;
            }

            chatLog.push({ role: 'assistant', content: full });

        } catch (err) {
            removeTypingIndicator();
            appendBubble('bot', 'Sorry, I ran into a connection issue. Please try again in a moment.');
            console.error('[Lumina]', err);
        }

        setStatus(true);
        setInputLocked(false);
        input.focus();
    };
})();
</script>
