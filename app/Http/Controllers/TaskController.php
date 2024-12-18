<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function dispaly() {

        return view( 'tasks.tasks' );
    }
    public function showAll() {

        $tasks = Task::all();

        return view( 'tasks.index', compact( 'tasks' ) );
    }
    public function updateDispaly( $id ) {

        return view( 'tasks.update_task', compact( 'id' ) );
    }
    // Add a Task
    public function addTask( Request $request ) {
        $validated = $request->validate( array(
            'title' => 'required|string|max:255',
        ) );

        $task = Task::create( array(
            'title'        => $validated['title'],
            'is_completed' => false,
        ) );

        return response()->json( $task, 201 );
    }

    // Mark Task as Completed
    public function markTaskCompleted( Request $request, $id ) {
        $task = Task::findOrFail( $id );

        $task->update( array(
            'is_completed' => $request->is_completed,
        ) );

        return response()->json( $task );
    }

    // Get Pending Tasks
    public function getPendingTasks() {
        $tasks = Task::where( 'is_completed', false )->get();
        return response()->json( $tasks );
    }
}