<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_role' => 'required|string|max:255',
            'is_verified' => 'nullable|boolean',
            'rating' => 'required|integer|between:1,5',
            'quote_text' => 'required|string',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $validated['is_verified'] = $request->has('is_verified');

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('uploads', 'public');
            $validated['client_avatar'] = '/storage/'.$path;
        } else {
            $validated['client_avatar'] = '/storage/uploads/default-avatar.png';
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Customer feedback logged successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_role' => 'required|string|max:255',
            'is_verified' => 'nullable|boolean',
            'rating' => 'required|integer|between:1,5',
            'quote_text' => 'required|string',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $validated['is_verified'] = $request->has('is_verified');

        if ($request->hasFile('avatar')) {
            if ($testimonial->client_avatar && str_contains($testimonial->client_avatar, '/storage/uploads/')) {
                $oldPath = str_replace('/storage/', '', $testimonial->client_avatar);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('avatar')->store('uploads', 'public');
            $validated['client_avatar'] = '/storage/'.$path;
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Customer feedback updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->client_avatar && str_contains($testimonial->client_avatar, '/storage/uploads/')) {
            $oldPath = str_replace('/storage/', '', $testimonial->client_avatar);
            Storage::disk('public')->delete($oldPath);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Customer feedback deleted.');
    }
}
