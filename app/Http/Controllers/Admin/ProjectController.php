<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = ['Front-End', 'Back-End', 'Full-Stack'];
        $programmingLanguages = ['PHP', 'JavaScript', 'Python', 'Ruby', 'Java', 'C#', 'C++'];
        $statuses = ['Completed', 'In Progress'];

        return view('admin.projects.create', compact('types', 'programmingLanguages', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        // Handle file upload
        if ($request->hasFile('preview')) {
            $file = $request->file('preview');
            $fileName = $file->getClientOriginalName();
            $imagePath = $file->storeAs('images', $fileName, 'public');
            $data['preview_path'] = 'storage/' . $imagePath;
        }

        $project = new Project();
        $project->title = $data['title'];
        $project->type = $data['type'];
        $project->description = $data['description'];
        $project->key_features = $data['key_features'];
        $project->programming_language = $data['programming_language'];
        $project->link_to_website = $data['link_to_website'];
        $project->slug = $data['slug'];
        $project->status = $data['status'];
        if (isset($data['preview_path'])) {
            $project->preview_path = $data['preview_path'];
        }
        $project->save();

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = ['Front-End', 'Back-End', 'Full-Stack'];
        $programmingLanguages = ['PHP', 'JavaScript', 'Python', 'Ruby', 'Java', 'C#', 'C++'];
        $statuses = ['Completed', 'In Progress'];

        return view('admin.projects.edit', compact('project', 'types', 'programmingLanguages', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        // Handle file upload
        if ($request->hasFile('preview')) {
            $file = $request->file('preview');
            $fileName = $file->getClientOriginalName();
            $imagePath = $file->storeAs('images', $fileName, 'public');
            $data['preview_path'] = 'storage/' . $imagePath;
        }

        $project->title = $data['title'];
        $project->type = $data['type'];
        $project->description = $data['description'];
        $project->key_features = $data['key_features'];
        $project->programming_language = $data['programming_language'];
        $project->link_to_website = $data['link_to_website'];
        $project->slug = $data['slug'];
        $project->status = $data['status'];
        if (isset($data['preview_path'])) {
            $project->preview_path = $data['preview_path'];
        }
        $project->save();

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
