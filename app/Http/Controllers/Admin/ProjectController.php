<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'classification' => 'required|in:featured,present,legacy,horizon',
            'title' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'nullable|numeric|between:1.0,5.0',
            'tech_stack' => 'nullable|string|max:255',
            'footer_stat' => 'nullable|string|max:255',
            'metric1_val' => 'nullable|string|max:255',
            'metric1_lbl' => 'nullable|string|max:255',
            'metric2_val' => 'nullable|string|max:255',
            'metric2_lbl' => 'nullable|string|max:255',
            'metric3_val' => 'nullable|string|max:255',
            'metric3_lbl' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'project_code' => 'nullable|string|max:255',
            'estimated_date' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'banner' => 'nullable|image|max:4096',
        ]);

        $validated['rating'] = $validated['rating'] ?? 5.0;

        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('uploads', 'public');
            $validated['cover_image'] = '/storage/'.$path;
        } else {
            $validated['cover_image'] = '/storage/uploads/default-project.png';
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project deployment logged successfully.');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'classification' => 'required|in:featured,present,legacy,horizon',
            'title' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'nullable|numeric|between:1.0,5.0',
            'tech_stack' => 'nullable|string|max:255',
            'footer_stat' => 'nullable|string|max:255',
            'metric1_val' => 'nullable|string|max:255',
            'metric1_lbl' => 'nullable|string|max:255',
            'metric2_val' => 'nullable|string|max:255',
            'metric2_lbl' => 'nullable|string|max:255',
            'metric3_val' => 'nullable|string|max:255',
            'metric3_lbl' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'project_code' => 'nullable|string|max:255',
            'estimated_date' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'banner' => 'nullable|image|max:4096',
        ]);

        $validated['rating'] = $validated['rating'] ?? 5.0;

        if ($request->hasFile('banner')) {
            if ($project->cover_image && str_contains($project->cover_image, '/storage/uploads/')) {
                $oldPath = str_replace('/storage/', '', $project->cover_image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('banner')->store('uploads', 'public');
            $validated['cover_image'] = '/storage/'.$path;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project deployment specifications updated.');
    }

    public function destroy(Project $project)
    {
        if ($project->cover_image && str_contains($project->cover_image, '/storage/uploads/')) {
            $oldPath = str_replace('/storage/', '', $project->cover_image);
            Storage::disk('public')->delete($oldPath);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deployment purged.');
    }
}
