  @extends('layouts.app')

@section('content')
  <div class="container mt-5">
        <h1 class="mb-4">Task List</h1>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>

                    <th>Title</th>
                    <th>Completed</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>

                        <td>{{ $task->title }}</td>
                        <td>
                            @if ($task->is_completed)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-warning">No</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ url('/api/update-tasks') }}/{{ $task->id }}" class="btn btn-primary btn-sm">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($tasks->isEmpty())
            <div class="alert alert-info">No tasks found.</div>
        @endif
    </div>
@endsection
