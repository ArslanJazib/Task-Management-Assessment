@extends('layouts.layout')

@section('title', 'Edit Task')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Task Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
        </div>

        <div class="form-group">
            <label for="project_id">Select Project</label>
            <select name="project_id" id="project_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection