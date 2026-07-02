<?php

namespace App\Http\Controllers;

use App\AI\ChatAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NeuronAI\Chat\Messages\Stream\Chunks\TextChunk;
use NeuronAI\Chat\Messages\UserMessage;

class ChatbotController extends Controller
{
    public function stream(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Start session so we have a stable ID for this visit
        if (! $request->session()->isStarted()) {
            $request->session()->start();
        }

        $sessionId = $request->session()->getId();
        $message = $request->input('message');

        // Clean up last message if it was a user message (indicates previous error/interruption)
        // to prevent "Invalid message sequence" exception from consecutive user messages.
        $historyRow = DB::table('chat_histories')
            ->where('thread_id', $sessionId)
            ->first();
        if ($historyRow && ! empty($historyRow->messages)) {
            $existingMessages = json_decode($historyRow->messages, true);
            if (is_array($existingMessages) && ! empty($existingMessages)) {
                $lastMsg = end($existingMessages);
                if (isset($lastMsg['role']) && $lastMsg['role'] === 'user') {
                    array_pop($existingMessages);
                    DB::table('chat_histories')
                        ->where('thread_id', $sessionId)
                        ->update(['messages' => json_encode($existingMessages)]);
                }
            }
        }

        return response()->stream(function () use ($sessionId, $message) {
            try {
                $agent = ChatAgent::make($sessionId);
                $stream = $agent->stream(new UserMessage($message));

                foreach ($stream->events() as $event) {
                    if ($event instanceof TextChunk) {
                        echo $event->content;
                        ob_flush();
                        flush();
                    }
                }
            } catch (\Throwable $e) {
                // Smart dynamic fallback responder for offline/demo mode (when API key is rate-limited)
                $lower = strtolower($message);
                $reply = '';

                // 1. PROJECT-RELATED QUESTIONS
                if (str_contains($lower, 'project') || str_contains($lower, 'portfolio') || str_contains($lower, 'case stud') || str_contains($lower, 'past work')) {
                    $responses = [
                        'AI Solutions has worked on several high-impact projects, which we classify into Featured, Present, Legacy, and Horizon projects. You can browse through our portfolio and client case studies on the /projects page.',
                        'We take pride in our past delivery! From intelligent automated workflows to enterprise dashboards, you can read details about our engineering work and client testimonials at /projects.',
                        "If you'd like to see how we apply workflow automation and business intelligence in practice, visit /projects. We showcase both our current operations and future horizon concepts there!",
                    ];
                    $reply = $responses[array_rand($responses)];

                    // 2. EVENT-RELATED QUESTIONS
                } elseif (str_contains($lower, 'event') || str_contains($lower, 'meetup') || str_contains($lower, 'conference') || str_contains($lower, 'summit') || str_contains($lower, 'workshop')) {
                    $responses = [
                        'We host and participate in global AI events and technology summits! To see our upcoming schedule and register for virtual or in-person sessions, check out the /events page.',
                        'Keep up with AI Solutions in the community! We showcase our global events, speaking sessions, and tech workshops on our /events hub.',
                        'Looking for networking or learning opportunities? You can explore our global events line-up and past summit insights at /events.',
                    ];
                    $reply = $responses[array_rand($responses)];

                    // 3. SERVICE/CAPABILITIES QUESTIONS
                } elseif (str_contains($lower, 'service') || str_contains($lower, 'offer') || str_contains($lower, 'do you do') || str_contains($lower, 'capability')) {
                    $responses = [
                        'We specialize in helping businesses grow through intelligent tech! Our core services include Workflow Automation, Business Intelligence dashboards, Autonomous AI Agents, and Business Analytics. Read more at /services.',
                        'AI Solutions provides custom digital transformations: workflow automation (RPA), data dashboards (BI), autonomous agents, and predictive pipelines. Details are on /services.',
                        'Our team builds enterprise-grade automation and business intelligence systems. You can view all our capabilities and choose a plan on the /services page.',
                    ];
                    $reply = $responses[array_rand($responses)];

                    // 4. AUTOMATION QUESTIONS
                } elseif (str_contains($lower, 'automation') || str_contains($lower, 'rpa') || str_contains($lower, 'repetitive') || str_contains($lower, 'automate')) {
                    $responses = [
                        'Workflow Automation is one of our primary pillars! We use RPA (Robotic Process Automation) and smart triggers to eliminate manual work. Learn more at /about#automation.',
                        'Want to streamline your operations? Our automation systems handle data entry, task scheduling, and integration pipelines. See /about#automation for more details.',
                    ];
                    $reply = $responses[array_rand($responses)];

                    // 5. CONTACT/BOOKING/CONSULTATION QUESTIONS
                } elseif (str_contains($lower, 'contact') || str_contains($lower, 'touch') || str_contains($lower, 'book') || str_contains($lower, 'consult') || str_contains($lower, 'hire') || str_contains($lower, 'pricing') || str_contains($lower, 'price') || str_contains($lower, 'cost')) {
                    $responses = [
                        'We would love to collaborate! You can book a consultation session directly or submit an inquiry using the form on our /contact page.',
                        'To schedule a demo or speak with one of our automation experts, visit /contact. We typically reply within 24 hours!',
                        'Ready to start? You can submit your requirements or get in touch with our team at /contact.',
                    ];
                    $reply = $responses[array_rand($responses)];

                    // 6. ABOUT/COMPANY QUESTIONS
                } elseif (str_contains($lower, 'about') || str_contains($lower, 'company') || str_contains($lower, 'who are you') || str_contains($lower, 'zora')) {
                    $responses = [
                        'I am Zora, the official AI assistant for AI Solutions. Our company focuses on accelerating business growth through advanced intelligence. Read our story at /about.',
                        'AI Solutions is a team of forward-thinking developers and automation engineers. You can read about our team and vision at /about.',
                    ];
                    $reply = $responses[array_rand($responses)];

                    // 7. GREETINGS
                } elseif (str_contains($lower, 'hello') || str_contains($lower, 'hi') || str_contains($lower, 'hey') || str_contains($lower, 'greeting') || str_contains($lower, 'yo')) {
                    $responses = [
                        'Hello! I am Zora, your AI navigator. 👋 How can I help you explore AI Solutions today?',
                        'Hi there! How can I assist you with AI Solutions services, projects, or events today? 😊',
                        'Hey! Zora here. What would you like to know about our workflow automation or business intelligence services?',
                    ];
                    $reply = $responses[array_rand($responses)];

                    // 8. GENERAL FALLBACK
                } else {
                    $responses = [
                        "I'd be glad to help you explore that! At AI Solutions, we offer Workflow Automation (/about#automation), Business Intelligence (/about#bi), AI Agents (/about#agents), and Business Analytics (/about#analytics). What area interests you most?",
                        "That's an interesting question! While I'm running in offline assistant mode right now, I can direct you to our /services page to check out our plans, or our /insights page for industry news.",
                        'I want to make sure you get the best information! You can read about our client success stories at /projects, explore our services at /services, or reach out to our team directly at /contact.',
                    ];
                    $reply = $responses[array_rand($responses)];
                }

                // Simulate streaming chunk by chunk
                $chunks = str_split($reply, 4);
                foreach ($chunks as $chunk) {
                    echo $chunk;
                    ob_flush();
                    flush();
                    usleep(12000); // 12ms delay to feel natural
                }
            }
        }, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'X-Accel-Buffering' => 'no',   // disables nginx buffering
            'Cache-Control' => 'no-cache',
        ]);
    }

    public function history(Request $request)
    {
        if (! $request->session()->isStarted()) {
            $request->session()->start();
        }

        $sessionId = $request->session()->getId();
        try {
            $agent = ChatAgent::make($sessionId);
            $messages = $agent->getChatHistory()->getMessages();

            $formatted = array_map(function ($msg) {
                return [
                    'role' => $msg->getRole(),
                    'text' => $msg->getContent(),
                ];
            }, $messages);

            return response()->json($formatted);
        } catch (\Throwable $e) {
            return response()->json([]);
        }
    }
}
