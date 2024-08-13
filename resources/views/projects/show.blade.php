@extends('layouts.layout')

@section('title', 'Project Details')

@section('content')
    <h1>Project: {{ $project->name }}</h1>

    <h2>Associated Tasks</h2>
    <ul>
        @forelse ($tasks as $task)
            <li>{{ $task->name }} (Priority: {{ $task->priority }})</li>
        @empty
            <li>No tasks associated with this project.</li>
        @endforelse
    </ul>
@endsection