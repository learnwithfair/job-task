@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Task</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/api/tasks') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Task Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter task title" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add Task</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
