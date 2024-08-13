<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    // Display a listing of the tasks
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tasks = Task::with('project')->orderBy('priority', 'asc')->get();
            return DataTables::of($tasks)
                ->addColumn('project', function($task) {
                    return $task->project->name;
                })
                ->addColumn('actions', function($task) {
                    return view('tasks.actions', compact('task'))->render();
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $projects = Project::all();
        return view('tasks.index', compact('projects'));
    }

    // Show the form for creating a new task
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    // Store a newly created task in storage
    public function store(StoreTaskRequest $request)
    {
        // Determine the priority for the new task
        $highestPriority = Task::where('project_id', $request->project_id)->max('priority');
        $newPriority = $highestPriority ? $highestPriority + 1 : 1;

        // Create and save the new task
        Task::create([
            'name' => $request->name,
            'priority' => $newPriority,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully.');
    }

    // Show the form for editing the specified task
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    // Update the specified task in storage
    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Update the task
        $task->update([
            'name' => $request->name,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully.');
    }

    // Remove the specified task from storage
    public function destroy(Task $task)
    {
        $projectId = $task->project_id; // Keep track of project for redirection
        $task->delete();

        // Reorder remaining tasks
        $this->reorderTasks($projectId);

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully.');
    }

    // Reorder tasks after drag-and-drop
    public function reorder(Request $request)
    {
        $taskIds = $request->input('task_ids');

        // Start with priority 1 and increment for each task ID
        foreach ($taskIds as $index => $id) {
            $task = Task::find($id);
            if ($task) {
                $task->priority = $index + 1;
                $task->save();
            }
        }

        return response()->json(['message' => 'Tasks reordered successfully.']);
    }


    // Show the specified task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
}