<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:infrastructure,vertical,step',
            'service_category' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'metric_subtitle' => 'nullable|string|max:255',
            'step_number' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Core service node established.');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'category' => 'required|in:infrastructure,vertical,step',
            'service_category' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'metric_subtitle' => 'nullable|string|max:255',
            'step_number' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Core service node updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service capability deleted successfully.');
    }
}
