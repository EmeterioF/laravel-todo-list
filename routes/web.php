<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/task/create', function() {
    return view('task_creation');
})->name('go.task_creation');

Route::get('/', [TaskController::class, 'index'])->name('task.home');
Route::post('/task', [TaskController::class, 'createTask'])->name('task.create');;
Route::put('/task/{id}/edit', [TaskController::class, 'index']);
Route::delete('/task/{id}', [TaskController::class, 'index']);
