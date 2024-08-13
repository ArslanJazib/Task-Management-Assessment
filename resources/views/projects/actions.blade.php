<div class="btn-group">
    <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">View</a>
</div>