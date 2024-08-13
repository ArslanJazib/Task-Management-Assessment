@extends('layouts.layout')

@section('title', 'Edit Project')

@section('content')
    <h1>Edit Project</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
@endsection