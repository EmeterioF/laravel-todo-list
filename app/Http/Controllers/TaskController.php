<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task; // import model 

class TaskController extends Controller
{   
    #SI INDEX YUNG NAG LALAGAY NG DATA SA HOME
    public function index(){
        $tasks = Task::all();#GETS ALL THE DATA FROM THE table
        return view('home', compact('tasks'));#PAGKATAPOS PUPUNTA SA HOME DALA DALA YUNG DATA NA FINETCH O GINET SA DB
    }

    #NAG DEDELETE NG TASK VIA ID 
    public function delete($id){
        Task::findOrFail($id)->delete();#DINEDELETE NIYA YUNG SPECIFIC TODO TASK 
        return redirect()->route('task.home');#PAGKATAPOS PUPUNTA GAGAWIN NIYA ULIT YUNG index function na nasa taas para MA UPDATE YUNG HOME PAGE
    }


    #ITO YUNG NAG HAHANDLE KAPAG GAGAWA NG BAGONG TASK
    public function createTask(Request $request){
        $request->validate([#VINAVALIDATE YUNG DATA NA PINASA FROM THE TASK CREATION PAGE
            'title' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date',
        ]);

        Task::create([#THEN GAMIT YUNG MODEL I-INSERT NIYA YUNG NEW VALUES
            'title' => $request->title,
            'priority' => $request->priority,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('task.home');#THEN PUPUNTA ULIT SIYA NG INDEX PARA MA UPDATE YUNG HOME PAGE
    }

    #FUNCTION PARA PUMUNTA NG EDIT PAGE WITH THE ID
    public function edit($id) {
        $task = Task::findOrFail($id);#GINEGET NIYA YUNG SPECIFIC NA TODO TASK 
        return view('edit', compact('task'));#THEN PINAPASA NIYA YUNG ID NIYA SA EDIT PAGE
    }

    #ITO NGAYON YUNG NAG U-UPDATE SA TODO TASK
    public function updateTask(Request $request, $id) {
        $request->validate([# VINAVALIDATE NIYA MUNA YUNG DATA FROM THE FORM AFTER MASUBMIT
            'title' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date',
        ]);

        $task = Task::findOrFail($id);#GINEGET NIYA YUNG SPECIFIC TASK
        $task->update([#THEN UPUPDATE NIYA 
            'title' => $request->title,
            'priority' => $request->priority,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('task.home');#AFTER NG UPDATE PUPUNTA ULIT SIYA NG index FUNCTION PARA MA UPDATE YUNG HOME
    }
    
    #FUNCTION PARA MA GET YUNG MGA DELETED RECRODS TAPOS IPAPASA SA MEMORY PAGE
    #YUNG MEMORY PAGE IS page na nag didisplay ng mga na delete na records kaya memory tawag
    public function getDeletedRecords(){
        $memories = Task::onlyTrashed()->get();
        return view('memory', compact('memories'));
    }

    #NI RERERSTORE NIYA YUNG DELETED RECORD AFTER I CLICK YUNG RESTORE SA memory PAGE
    public function restoreDeletedRecord($id){
        Task::withTrashed()->where('id',$id)->restore();
        return redirect()->route('task.home');
    }

    
}
