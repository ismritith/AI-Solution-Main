<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:summit,hackathon,webinar',
            'title' => 'required|string|max:255',
            'status_badge' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'ticket_tier' => 'nullable|string|max:255',
            'ticket_price' => 'nullable|string|max:255',
            'ticket_inclusions' => 'nullable|string',
            'banner' => 'nullable|image|max:4096',
        ]);

        // Process dynamic tracks
        $tracks = [];
        if ($request->has('track_lbl')) {
            $lbls = $request->input('track_lbl');
            $names = $request->input('track_name');
            $descs = $request->input('track_desc');
            $tags = $request->input('track_tags');
            foreach ($lbls as $index => $lbl) {
                if (! empty($lbl)) {
                    $tracks[] = [
                        'label' => $lbl,
                        'name' => $names[$index] ?? '',
                        'desc' => $descs[$index] ?? '',
                        'tags' => $tags[$index] ?? '',
                    ];
                }
            }
        }
        $validated['tracks'] = $tracks;

        // Process dynamic agenda
        $agenda = [];
        if ($request->has('agenda_time')) {
            $times = $request->input('agenda_time');
            $sessions = $request->input('agenda_session');
            $summaries = $request->input('agenda_summary');
            $stages = $request->input('agenda_stage');
            foreach ($times as $index => $time) {
                if (! empty($time)) {
                    $agenda[] = [
                        'time' => $time,
                        'session' => $sessions[$index] ?? '',
                        'summary' => $summaries[$index] ?? '',
                        'stage' => $stages[$index] ?? '',
                    ];
                }
            }
        }
        $validated['agenda'] = $agenda;

        $validated['speakers'] = []; // Keep speakers array clean

        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('uploads', 'public');
            $validated['main_image'] = '/storage/'.$path;
        } else {
            $validated['main_image'] = '/storage/uploads/default-event.png';
        }

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Global summit event configured successfully.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'category' => 'required|in:summit,hackathon,webinar',
            'title' => 'required|string|max:255',
            'status_badge' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'ticket_tier' => 'nullable|string|max:255',
            'ticket_price' => 'nullable|string|max:255',
            'ticket_inclusions' => 'nullable|string',
            'banner' => 'nullable|image|max:4096',
        ]);

        // Process dynamic tracks
        $tracks = [];
        if ($request->has('track_lbl')) {
            $lbls = $request->input('track_lbl');
            $names = $request->input('track_name');
            $descs = $request->input('track_desc');
            $tags = $request->input('track_tags');
            foreach ($lbls as $index => $lbl) {
                if (! empty($lbl)) {
                    $tracks[] = [
                        'label' => $lbl,
                        'name' => $names[$index] ?? '',
                        'desc' => $descs[$index] ?? '',
                        'tags' => $tags[$index] ?? '',
                    ];
                }
            }
        }
        $validated['tracks'] = $tracks;

        // Process dynamic agenda
        $agenda = [];
        if ($request->has('agenda_time')) {
            $times = $request->input('agenda_time');
            $sessions = $request->input('agenda_session');
            $summaries = $request->input('agenda_summary');
            $stages = $request->input('agenda_stage');
            foreach ($times as $index => $time) {
                if (! empty($time)) {
                    $agenda[] = [
                        'time' => $time,
                        'session' => $sessions[$index] ?? '',
                        'summary' => $summaries[$index] ?? '',
                        'stage' => $stages[$index] ?? '',
                    ];
                }
            }
        }
        $validated['agenda'] = $agenda;

        $validated['speakers'] = [];

        if ($request->hasFile('banner')) {
            if ($event->main_image && str_contains($event->main_image, '/storage/uploads/')) {
                $oldPath = str_replace('/storage/', '', $event->main_image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('banner')->store('uploads', 'public');
            $validated['main_image'] = '/storage/'.$path;
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Global event details upgraded.');
    }

    public function destroy(Event $event)
    {
        if ($event->main_image && str_contains($event->main_image, '/storage/uploads/')) {
            $oldPath = str_replace('/storage/', '', $event->main_image);
            Storage::disk('public')->delete($oldPath);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Global event purged from directory.');
    }
}
