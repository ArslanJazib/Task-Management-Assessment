@extends('layouts.layout')

@section('title', 'Tasks')

@section('content')
    <h1>Tasks</h1>

    <div class="mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
    </div>

    <table id="tasks-table" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Name</th>
                <th>Project</th>
                <th>Priority</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="task-list">
            <!-- DataTables will populate this section -->
        </tbody>
    </table>
@endsection

@push('scripts')
    <!-- Include jQuery UI Sortable -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#tasks-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('tasks.index') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'project', name: 'project.name' },
                    { data: 'priority', name: 'priority' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                drawCallback: function() {
                    // Initialize sortable on table rows
                    $('#task-list').sortable({
                        items: 'tr',
                        cursor: 'move',
                        update: function(event, ui) {
                            // Create an array of task IDs based on their new row positions
                            var order = [];
                            $('#task-list tr').each(function() {
                                // Extract task ID from the row (assuming ID is in the first column)
                                var taskId = $(this).find('td').first().text();
                                order.push(taskId);
                            });
                            updateTaskOrder(order);
                        }
                    });
                }
            });

            // Function to update task order via AJAX
            function updateTaskOrder(order) {
                $.ajax({
                    url: '{{ route('tasks.reorder') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_ids: order
                    },
                    success: function(response) {
                        console.log(response.message);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>
@endpush