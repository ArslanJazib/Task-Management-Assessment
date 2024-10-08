@extends('layouts.layout')

@section('title', 'Create Project')

@section('content')
    <h1>Create Project</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Project</button>
    </form>
@endsection