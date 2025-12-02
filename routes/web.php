<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/create', function() {
    return view('task_creation');
})->name('go.task_creation');


Route::get('/', [TaskController::class, 'index'])->name('task.home');
Route::get('/memory', [TaskController::class, 'getDeletedRecords'])->name('task.memory');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.editView');

Route::post('/task', [TaskController::class, 'createTask'])->name('task.create');;
Route::post('/task/{id}/restore', [TaskController::class, 'restoreDeletedRecord'])->name('task.restore');

Route::delete('/task/{id}/permanent', [TaskController::class, 'permaDelete'])->name('task.permaDelete');
Route::delete('/task/{id}', [TaskController::class, 'delete'])->name('task.delete');
Route::put('/task/{id}', [TaskController::class, 'updateTask'])->name('task.update');

Route::post('/task/{id}/toggle', [TaskController::class, 'toggleComplete'])->name('task.toggle');
