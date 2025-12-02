<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index(){
        $tasks = Task::all();
        $total = $tasks->count();
        return view('home', compact('tasks', 'total'));
    }

    public function createTask(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date|after:today',

        ]);

        Task::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('task.home');
    }


    public function edit($id) {
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }

    public function updateTask(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date|after'
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'priority' => $request->priority,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('task.home');
    }

    public function delete($id){
        Task::findOrFail($id)->delete();
        return redirect()->route('task.home');
    }

    public function getDeletedRecords(){
        $memories = Task::onlyTrashed()->get();
        return view('memory', compact('memories'));
    }


    public function restoreDeletedRecord($id){
        Task::withTrashed()->where('id',$id)->restore();
        return redirect()->route('task.home');
    }


    public function permaDelete($id){
        Task::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('task.home');
    }


    public function toggleComplete($id){
        $task = Task::findOrFail($id);
        if($task->is_completed){
            $task->is_completed = false;
            $task->save();
        }else{
            $task->is_completed = true;
            $task->save();
        }
        return redirect()->route('task.home');
    }
}
