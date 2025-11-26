<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // import model 

class TaskController extends Controller
{
    
    public function index(){
        //basic syntax MODEL::method
        return $tasks = Task::all();
    }
}
