<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(10);

        return view('admin.blogs.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'reading_time' => 'required|integer|min:1',
            'author_name' => 'nullable|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'body_content' => 'required|string',
            'blockquote_text' => 'nullable|string',
            'blockquote_source' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'tags' => 'nullable|string',
            'banner' => 'nullable|image|max:4096',
        ]);

        $validated['author_name'] = $validated['author_name'] ?? 'Administrator';
        $validated['author_role'] = $validated['author_role'] ?? 'System Master';
        $validated['published_at'] = $validated['status'] === 'published' ? now() : null;

        // Process technical metrics (optional inputs from form)
        $metrics = [];
        if ($request->has('metric_lbl')) {
            $lbls = $request->input('metric_lbl');
            $vals = $request->input('metric_val');
            $icons = $request->input('metric_icon');
            foreach ($lbls as $index => $lbl) {
                if (! empty($lbl)) {
                    $metrics[] = [
                        'label' => $lbl,
                        'val' => $vals[$index] ?? '',
                        'icon' => $icons[$index] ?? 'bolt',
                    ];
                }
            }
        }
        $validated['technical_metrics'] = $metrics;

        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('uploads', 'public');
            $validated['banner_image'] = '/storage/'.$path;
        } else {
            $validated['banner_image'] = '/storage/uploads/default-banner.png';
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Intelligence article dispatched successfully.');
    }

    public function show(BlogPost $blog)
    {
        $post = $blog;

        return view('admin.blogs.show', compact('post'));
    }

    public function edit(BlogPost $blog)
    {
        $post = $blog;

        return view('admin.blogs.edit', compact('post'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'reading_time' => 'required|integer|min:1',
            'author_name' => 'nullable|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'body_content' => 'required|string',
            'blockquote_text' => 'nullable|string',
            'blockquote_source' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'tags' => 'nullable|string',
            'banner' => 'nullable|image|max:4096',
        ]);

        $validated['author_name'] = $validated['author_name'] ?? 'Administrator';
        $validated['author_role'] = $validated['author_role'] ?? 'System Master';

        if ($blog->status !== 'published' && $validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        // Process technical metrics
        $metrics = [];
        if ($request->has('metric_lbl')) {
            $lbls = $request->input('metric_lbl');
            $vals = $request->input('metric_val');
            $icons = $request->input('metric_icon');
            foreach ($lbls as $index => $lbl) {
                if (! empty($lbl)) {
                    $metrics[] = [
                        'label' => $lbl,
                        'val' => $vals[$index] ?? '',
                        'icon' => $icons[$index] ?? 'bolt',
                    ];
                }
            }
        }
        $validated['technical_metrics'] = $metrics;

        if ($request->hasFile('banner')) {
            if ($blog->banner_image && str_contains($blog->banner_image, '/storage/uploads/')) {
                $oldPath = str_replace('/storage/', '', $blog->banner_image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('banner')->store('uploads', 'public');
            $validated['banner_image'] = '/storage/'.$path;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Intelligence article upgraded.');
    }

    public function destroy(BlogPost $blog)
    {
        if ($blog->banner_image && str_contains($blog->banner_image, '/storage/uploads/')) {
            $oldPath = str_replace('/storage/', '', $blog->banner_image);
            Storage::disk('public')->delete($oldPath);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Intelligence article purged from main net.');
    }
}
