<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display listing
     */
    public function index()
    {
        $assets = GalleryAsset::latest()->paginate(10);

        return view('admin.gallery.index', compact('assets'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store new asset
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'media_type' => 'required|in:image,video',
            'upload_method' => 'required|in:upload,link',
            'file' => 'nullable|file|max:20480',
            'external_url' => 'nullable|url|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
        ]);

        // Normalize category (IMPORTANT FIX)
        $validated['category'] = Str::slug($validated['category'], '_');

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['file_path'] = null;

        // Upload handling
        if ($validated['upload_method'] === 'upload' && $request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('uploads', 'public');
        }

        GalleryAsset::create($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery asset created successfully.');
    }

    /**
     * Show single asset
     */
    public function show(GalleryAsset $gallery)
    {
        return view('admin.gallery.show', [
            'asset' => $gallery
        ]);
    }

    /**
     * Edit form
     */
    public function edit(GalleryAsset $gallery)
    {
        return view('admin.gallery.edit', [
            'asset' => $gallery
        ]);
    }

    /**
     * Update asset
     */
    public function update(Request $request, GalleryAsset $gallery)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'media_type' => 'required|in:image,video',
            'upload_method' => 'required|in:upload,link',
            'file' => 'nullable|file|max:20480',
            'external_url' => 'nullable|url|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
        ]);

        // Normalize category (CRITICAL for filtering consistency)
        $validated['category'] = Str::slug($validated['category'], '_');

        $validated['is_featured'] = $request->boolean('is_featured');

        // Replace file if new upload exists
        if ($validated['upload_method'] === 'upload' && $request->hasFile('file')) {
            if ($gallery->file_path) {
                Storage::disk('public')->delete($gallery->file_path);
            }

            $validated['file_path'] = $request->file('file')->store('uploads', 'public');
        }

        $gallery->update($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery asset updated successfully.');
    }

    /**
     * Delete asset
     */
    public function destroy(GalleryAsset $gallery)
    {
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery asset deleted successfully.');
    }
}