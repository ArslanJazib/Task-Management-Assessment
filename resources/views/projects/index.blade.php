@extends('layouts.layout')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>

    <div class="mb-3">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New Project</a>
    </div>

    <table id="projects-table" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="project-list">
            <!-- DataTables will populate this section -->
        </tbody>
    </table>
@endsection

@push('scripts')
    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#projects-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('projects.index') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush