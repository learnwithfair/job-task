@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Task</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/api/tasks') }}/{{ $id }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="is_completed">Mark as Completed</label>
                            <select name="is_completed" class="form-control" id="is_completed">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
