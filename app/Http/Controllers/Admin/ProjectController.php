<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;

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
        $statuses = ['Completed', 'Pending'];

        return view('admin.projects.create', compact('types', 'programmingLanguages', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validated();

        $project = new Project();

        $project->title = $data['title'];
        $project->type = $data['type'];
        $project->programming_language = $data['programming_language'];
        $project->status = $data['status'];
        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
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
        $statuses = ['Completed', 'Pending'];

        return view('admin.projects.edit', compact('project', 'types', 'programmingLanguages', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $data = $request->validated();

        $project->title = $data['title'];
        $project->type = $data['type'];
        $project->programming_language = $data['programming_language'];
        $project->status = $data['status'];
        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
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
