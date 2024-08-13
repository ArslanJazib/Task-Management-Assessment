<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    // Display a listing of the projects with Yajra DataTables
    public function index()
    {
        if (request()->ajax()) {
            $projects = Project::select(['id', 'name']);

            return DataTables::of($projects)
                ->addColumn('actions', function($project) {
                    return view('projects.actions', compact('project'))->render();
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('projects.index');
    }

    // Show the form for creating a new project
    public function create()
    {
        return view('projects.create');
    }

    // Store a newly created project in storage
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());

        return redirect()->route('projects.index')
                         ->with('success', 'Project created successfully.');
    }

    // Show the form for editing the specified project
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Update the specified project in storage
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.index')
                         ->with('success', 'Project updated successfully.');
    }

    // Remove the specified project from storage
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Project deleted successfully.');
    }

    // Show the specified project and its associated tasks
    public function show(Project $project)
    {
        $tasks = $project->tasks;
        return view('projects.show', compact('project', 'tasks'));
    }
}