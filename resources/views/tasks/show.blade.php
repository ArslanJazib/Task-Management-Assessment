@extends('layouts.layout')

@section('title', 'Task Details')

@section('content')
    <h1>Task Details</h1>

    <div class="card">
        <div class="card-header">
            Task: {{ $task->name }}
        </div>
        <div class="card-body">
            <p>Project: {{ $task->project->name }}</p>
            <p>Priority: {{ $task->priority }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-3">Back to Tasks</a>
@endsection