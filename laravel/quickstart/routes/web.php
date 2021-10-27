<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Display All Tasks
 */
Route::get('/', [TaskController::class, 'showTaskList']);

/**
 * Add A New Task
 */
Route::post('/task', [TaskController::class, 'addTask']);

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', [TaskController::class, 'deleteTask']);