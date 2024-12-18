<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );

// Task 1
Route::get( '/api/create-post', array( PostController::class, 'dispaly' ) );
Route::post( '/api/store-post', array( PostController::class, 'create' ) );
Route::get( '/api/posts', array( PostController::class, 'index' ) );
Route::get( '/api/posts/{id}', array( PostController::class, 'show' ) );

// Task 2
Route::get( '/api/create-user', array( UserController::class, 'dispaly' ) );
Route::post( '/api/register', array( UserController::class, 'register' ) );

// Task 3

Route::get( '/api/create-tasks', array( TaskController::class, 'dispaly' ) );
Route::get( '/api/showall-tasks', array( TaskController::class, 'showAll' ) );
Route::get( '/api/update-tasks/{id}', array( TaskController::class, 'updateDispaly' ) );
Route::post( '/api/tasks', array( TaskController::class, 'addTask' ) );
Route::patch( '/api/tasks/{id}', array( TaskController::class, 'markTaskCompleted' ) );
Route::get( '/api/tasks/pending', array( TaskController::class, 'getPendingTasks' ) );